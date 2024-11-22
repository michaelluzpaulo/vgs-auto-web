<?php

namespace Modules\Carro\Services;

use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Carro\Repositories\CarroRepository;
use Modules\Carro\Repositories\CarroFotoRepository;

class CarroFotoService
{

  /**
   * @var CarroRepository
   */
  private $carroRepository;
  private $carroFotoRepository;

  /**
   * Periodoervice constructor.
   * @param CarroRepository $repository
   */
  public function __construct(CarroRepository $carroRepository, CarroFotoRepository $carroFotoRepository)
  {
    $this->carroRepository = $carroRepository;
    $this->carroFotoRepository = $carroFotoRepository;
  }

  public static function __deleteArquivoFisico($img)
  {
    if (File::exists("storage/carro/tmb_{$img}")) {
      File::delete("storage/carro/tmb_{$img}");
      File::delete("storage/carro/big_{$img}");
    }
  }

  public function destroyFoto($id)
  {
    $obj = $this->carroRepository->find($id);
    if (File::exists("storage/carro/tmb_{$obj->img}")) {
      $this->__deleteArquivoFisico($obj->img);
    }
    $obj->img = null;
    $obj->save();
    return response()->json(['error' => 0, 'message' => 'A foto foi removida com sucesso.', 'data' => ['id' => $obj->id]], 200);
  }

  public function saveFoto($id = 0, $request)
  {

    try {
      $obj = $this->carroRepository->find($id);

      if (!$request->file('img')) {
        throw new Exception('Nenhuma imagem enviada! ');
      }

      $file = $request->file('img');

      //verificar se ini_set está habilitado e se tamanho do arquivo é maior que o permitido
      if (ini_get('upload_max_filesize') < $file->getSize()) {
        throw new Exception("Tamanho do arquivo excede o upload_max_filesize permitido: " . ini_get('upload_max_filesize') . ', memory_limit: ' . ini_get('memory_limit'));
      }

      if (ini_get('post_max_size') < $file->getSize()) {
        throw new Exception("Tamanho do arquivo excede o post_max_size permitido: " . ini_get('post_max_size') . ', memory_limit: ' . ini_get('memory_limit'));
      }

      if (ini_get('max_execution_time') < 120) {
        throw new Exception("Tempo de execução excede o max_execution_time permitido: " . ini_get('max_execution_time') . ', memory_limit: ' . ini_get('memory_limit'));
      }

      if (ini_get('max_input_time') < 120) {
        throw new Exception("Tempo de execução excede o max_input_time permitido: " . ini_get('max_execution_time') . ', memory_limit: ' . ini_get('memory_limit'));
      }


      if ($file->isValid()) {
        $name = uniqid(date('HisYmd'));

        // Recupera a extensão do arquivo
        $extension = $file->extension();

        // Define finalmente o nome
        $nameFile = "{$name}.{$extension}";
        $upload = Image::make($file)->fit(600, 450, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        })->save("storage/carro/big_{$nameFile}");

        $upload = Image::make($file)->fit(400, 300, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        })->save("storage/carro/tmb_{$nameFile}");

        if (!$upload) {
          throw new Exception('Falha ao fazer upload da imagem pequena');
        }

        if ($obj->img) {
          // @unlink("storage/carro/tmb_{$obj->img}");
          // @unlink("storage/carro/big_{$obj->img}");
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
    $obj = $this->carroFotoRepository->find($fotoId);
    $parent_id = $obj->carro_id;
    if (File::exists("storage/carro/tmb_{$obj->img}")) {
      File::delete("storage/carro/tmb_{$obj->img}");
      File::delete("storage/carro/big_{$obj->img}");
    }
    $obj->delete();
    return response()->json(['error' => 0, 'message' => "Registro removido com sucesso", 'data' => ['id' => $parent_id]], 200);
  }

  public function saveGalleryFoto($id = 0, $request)
  {
    try {
      $obj = $this->carroRepository->find($id);

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

          // $dir = __DIR__ . '/../../../public/storage/carro/' . $obj->id;
          // if (!is_dir($dir)) {
          //   mkdir($dir, 0755, true);
          // }

          // dd($file);
          $upload = Image::make($file)->resize(1200, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
          })->save("storage/carro/big_{$nameFile}");

          $upload = Image::make($file)->fit(600, 450, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
          })->save("storage/carro/tmb_{$nameFile}");

          // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

          // Verifica se NÃO deu certo o upload (Redireciona de volta)
          if (!$upload) {
            throw new \Exception("Falha ao fazer upload! ");
          }
          $nomeOriginal = explode('.', $file->getClientOriginalName());
          $objFoto = null;
          $objFoto = new CarroFotoRepository();
          $objFoto->legenda = $nomeOriginal[0];
          $objFoto->img = $nameFile;
          $objFoto->carro_id = $obj->id;
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
