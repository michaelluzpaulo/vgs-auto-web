<?php

namespace Modules\Institucional\Services;

use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Institucional\Repositories\InstitucionalRepository;
use Modules\Institucional\Repositories\InstitucionalFotoRepository;

class InstitucionalFotoService
{

  /**
   * @var InstitucionalRepository
   */
  private $institucionalRepository;
  private $institucionalFotoRepository;

  /**
   * Periodoervice constructor.
   * @param InstitucionalRepository $repository
   */
  public function __construct(InstitucionalRepository $institucionalRepository, InstitucionalFotoRepository $institucionalFotoRepository)
  {
    $this->institucionalRepository = $institucionalRepository;
    $this->institucionalFotoRepository = $institucionalFotoRepository;
  }

  public static function __deleteArquivoFisico($img)
  {
    if (File::exists("storage/institucional/tmb_{$img}")) {
      File::delete("storage/institucional/tmb_{$img}");
      File::delete("storage/institucional/big_{$img}");
    }
  }

  public function destroyFoto($id)
  {
    $obj = $this->institucionalRepository->find($id);
    if (File::exists("storage/institucional/tmb_{$obj->img}")) {
      $this->__deleteArquivoFisico($obj->img);
    }
    $obj->img = null;
    $obj->save();
    return response()->json(['error' => 0, 'message' => 'A foto foi removida com sucesso.', 'data' => ['id' => $obj->id]], 200);
  }

  public function saveFoto($id = 0, $request)
  {

    try {
      $obj = $this->institucionalRepository->find($id);

      if (!$request->file('img')) {
        throw new Exception('Nenhuma imagem enviada! ');
      }

      $file = $request->file('img');

      if ($file->isValid()) {
        $name = uniqid(date('HisYmd'));

        // Recupera a extensão do arquivo
        $extension = $file->extension();

        // Define finalmente o nome
        $nameFile = "{$name}.{$extension}";
        $upload = Image::make($file)->fit(600, 450, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        })->save("storage/institucional/big_{$nameFile}");
        $upload = Image::make($file)->fit(400, 300, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        })->save("storage/institucional/tmb_{$nameFile}");

        if (!$upload) {
          throw new Exception('Falha ao fazer upload da imagem pequena');
        }

        if ($obj->img) {
          // @unlink("storage/institucional/tmb_{$obj->img}");
          // @unlink("storage/institucional/big_{$obj->img}");
          $this->__deleteArquivoFisico($obj->img);
        }

        $obj->img = $nameFile;
        $obj->save();
      }

      return response()->json(['error' => 0, 'message' => 'O upload da imagem foi concluído com sucesso.', 'data' => ['id' => $obj->id]], 200);
    } catch (Exception $e) {
      return response()->json(['error' => 1, 'message' => $e->getMessage(), 'data' => []], 400);
    }
  }


  public function destroyGalleryFoto($id, $fotoId)
  {
    $obj = $this->institucionalFotoRepository->find($fotoId);
    $parent_id = $obj->institucional_id;
    if (File::exists("storage/institucional/tmb_{$obj->img}")) {
      File::delete("storage/institucional/tmb_{$obj->img}");
      File::delete("storage/institucional/big_{$obj->img}");
    }
    $obj->delete();
    return response()->json(['error' => 0, 'message' => "Registro removido com sucesso", 'data' => ['id' => $parent_id]], 200);
  }

  public function saveGalleryFoto($id = 0, $request)
  {
    try {
      $obj = $this->institucionalRepository->find($id);

      if (!$request->file('file')) {
        throw new \Exception("Nenhuma imagem enviada! ");
      }

      foreach ($request->file('file') as $file) {
        if ($file->isValid()) {

          $name = uniqid(date('HisYmd'));

          // Recupera a extensão do arquivo
          $extension = $file->extension();

          // Define finalmente o nome
          $nameFile = "{$name}.{$extension}";

          // $dir = __DIR__ . '/../../../public/storage/institucional/' . $obj->id;
          // if (!is_dir($dir)) {
          //   mkdir($dir, 0755, true);
          // }

          // dd($file);
          $upload = Image::make($file)->resize(1200, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
          })->save("storage/institucional/big_{$nameFile}");

          $upload = Image::make($file)->fit(600, 450, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
          })->save("storage/institucional/tmb_{$nameFile}");

          // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

          // Verifica se NÃO deu certo o upload (Redireciona de volta)
          if (!$upload) {
            throw new \Exception("Falha ao fazer upload! ");
          }
          $nomeOriginal = explode('.', $file->getClientOriginalName());
          $objFoto = null;
          $objFoto = new InstitucionalFotoRepository();
          $objFoto->legenda = $nomeOriginal[0];
          $objFoto->img = $nameFile;
          $objFoto->institucional_id = $obj->id;
          $objFoto->save();
        }
      }

      $status = 200;
      $response = ['error' => 0, 'message' => "<br />Upload concluido com sucesso", 'data' => ['id' => $obj->id]];
    } catch (\Exception $e) {
      $status = 400;
      $response = [
        'message' => $e->getMessage()
      ];
    } finally {

      return response()->json($response, $status);
    }
  }
}
