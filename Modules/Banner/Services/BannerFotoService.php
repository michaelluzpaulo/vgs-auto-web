<?php

namespace Modules\Banner\Services;

use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Banner\Repositories\BannerRepository;

class BannerFotoService
{

  /**
   * @var BannerRepository
   */
  private $bannerRepository;

  /**
   * Periodoervice constructor.
   * @param BannerRepository $repository
   */
  public function __construct(BannerRepository $bannerRepository)
  {
    $this->bannerRepository = $bannerRepository;
  }

  public static function __deleteArquivoFisico($img)
  {
    if (File::exists("storage/banner/tmb_{$img}")) {
      File::delete("storage/banner/tmb_{$img}");
      File::delete("storage/banner/big_{$img}");
    }
  }

  public function destroyFoto($id, $tipoImg = 'img')
  {
    $obj = $this->bannerRepository->find($id);
    if (File::exists("storage/banner/tmb_" . $obj->{$tipoImg})) {
      $this->__deleteArquivoFisico($obj->{$tipoImg});
    }
    $obj->img = null;
    $obj->save();
    return response()->json(['error' => 0, 'message' => 'A foto foi removida com sucesso.', 'data' => ['id' => $obj->id]], 200);
  }

  public function saveFoto($id = 0, $request)
  {
    try {
      $obj = $this->bannerRepository->find($id);
      $tipoImg  = $request->all()['tipo'] == 1 ? 'img' : 'img_mob';

      if (!$request->file($tipoImg)) {
        throw new \Exception('Nenhuma imagem enviada! ');
      }

      $file = $request->file($tipoImg);
      if ($file->isValid()) {

        $name = uniqid(date('HisYmd'));
        // Recupera a extensão do arquivo
        $extension = $file->extension();

        // Define finalmente o nome
        $nameFile = "{$name}.{$extension}";

        $w = 1920;
        $h = 384;
        if ($tipoImg != 'img') {
          $w = 600;
          $h = 600;
        }

        $upload = Image::make($file)->fit($w, $h, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        })->save("storage/banner/big_{$nameFile}");
        $upload = Image::make($file)->fit(300, 200, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        })->save("storage/banner/tmb_{$nameFile}");

        if (!$upload) {
          throw new \Exception('Falha ao fazer upload da imagem pequena');
        }

        if ($obj->{$tipoImg}) {
          $this->__deleteArquivoFisico($obj->{$tipoImg});
        }

        $obj->{$tipoImg} = $nameFile;
        $obj->save();
      }

      return response()->json(['error' => 0, 'message' => '<br>O upload da imagem foi concluído com sucesso.', 'data' => ['id' => $obj->id]], 200);
    } catch (Exception $e) {
      return response()->json(['error' => 1, 'message' => $e->getMessage(), 'data' => []], 400);
    }
  }
}
