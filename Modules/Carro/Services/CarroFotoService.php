<?php

namespace Modules\Carro\Services;

use Exception;
use Illuminate\Support\Facades\File;
use Modules\Carro\Repositories\CarroRepository;
use Modules\Carro\Repositories\CarroFotoRepository;

use Intervention\Image\Laravel\Facades\Image;

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
    ini_set('memory_limit', '256M');

    try {
      $obj = $this->carroRepository->find($id);

      if (!$request->file('img')) {
        throw new Exception('Nenhuma imagem enviada! ');
      }

      if (!$request->file('img')->isValid()) {
        throw new Exception('Erro de validação! ');
      }

      $name = uniqid(date('HisYmd'));

      // Recupera a extensão do arquivo
      $extension = $request->file('img')->extension();
      $nameFile = "{$name}.{$extension}";

      $image = Image::read($request->file('img'));
      $image->cover(600, 450)->save("storage/carro/big_{$nameFile}");
      $image->cover(400, 300)->save("storage/carro/tmb_{$nameFile}");

      if ($obj->img) {
        $this->__deleteArquivoFisico($obj->img);
      }

      $obj->img = $nameFile;
      $obj->save();


      return response()->json(['error' => 0, 'message' => '<br />O upload da imagem foi concluído com sucesso.', 'data' => ['id' => $obj->id]], 200);
    } catch (Exception $e) {

      $msg = $e->getMessage();
      // $msg .= "<br />upload_max_filesize: " . ini_get('upload_max_filesize');
      // $msg .= "<br />post_max_size: " . ini_get('post_max_size');
      // $msg .= "<br />max_execution_time: " . ini_get('max_execution_time');
      // $msg .= "<br />max_input_time: " . ini_get('max_input_time');
      // $msg .= "<br />memory_limit: " . ini_get('memory_limit');

      return response()->json(['error' => 1, 'message' => $msg, 'data' => []], 400);
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
    ini_set('memory_limit', '256M');

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
          $nameFile = "{$name}.{$extension}";

          $image = Image::read($file);


          $image->scaleDown(800, null)->save("storage/carro/big_{$nameFile}");
          $image->cover(600, 450)->save("storage/carro/tmb_{$nameFile}");

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
