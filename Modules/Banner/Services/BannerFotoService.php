<?php

namespace Modules\Banner\Services;

use Exception;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
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
    ini_set('memory_limit', '256M');

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
        $nameFile = "{$name}.{$extension}";

        $w = 1920;
        $h = 400;
        if ($tipoImg != 'img') {
          $w = 640;
          $h = 480;
        }

        $image = Image::read($file);

        $image->cover($w, $h)->save("storage/banner/big_{$nameFile}");
        $image->cover(300, 200)->save("storage/banner/tmb_{$nameFile}");

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
