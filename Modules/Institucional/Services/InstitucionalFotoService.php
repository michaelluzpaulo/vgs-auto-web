<?php

namespace Modules\Institucional\Services;

use Exception;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
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
    ini_set('memory_limit', '256M');

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
        $nameFile = "{$name}.{$extension}";

        $image = Image::read($file);

        $image->cover(600, 450)->save("storage/institucional/big_{$nameFile}");
        $image->cover(400, 300)->save("storage/institucional/tmb_{$nameFile}");

        if ($obj->img) {
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
    ini_set('memory_limit', '256M');
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
          $nameFile = "{$name}.{$extension}";


          $image = Image::read($file);

          $image->scaleDown(1200, null)->save("storage/institucional/big_{$nameFile}");
          $image->cover(600, 450)->save("storage/institucional/tmb_{$nameFile}");


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
