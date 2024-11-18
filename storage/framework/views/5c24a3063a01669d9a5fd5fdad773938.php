<?php $__env->startSection('js'); ?>
    <script src="/vendorjs/lightbox2/dist/js/lightbox.min.js"></script>
    <script>
        <?php if($carro->vendido == 'S'): ?>
            document.querySelector('.nav-link-2').classList.add("active");
        <?php else: ?>
            document.querySelector('.nav-link-1').classList.add("active");
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="/vendorjs/lightbox2/dist/css/lightbox.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <div class="all-breadcrumb">
            <div class="container ">
                <div class="d-flex justify-content-between">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="breadcrumb-item-text">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Vitrine</li>
                        </ol>
                    </nav>
                    <a href="javascript:history.back();" class="breadcrumb-item-text">Voltar</a>

                </div>
            </div>
        </div>

        <div class="p-geral" id="pg-carro">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <figure class="zommcontainer">
                            <img src="/storage/carro/big_<?php echo e($carro->img); ?>" class="modify-img-principal"
                                style="width: 100%">
                        </figure>
                        <div class="desktop">
                            <div class="row m-0 ">
                                <?php if(count($carroFotos) > 0): ?>
                                    <?php $__currentLoopData = $carroFotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class=" col-lg-3 col-md-6 col-sm-4">
                                            <figure class="thumb-selector">
                                                <a href="/storage/carro/big_<?php echo e($foto->img); ?>" title="<?php echo $foto['legenda']; ?>"
                                                    style="display: block" class="galeria-img amplia-imagem">
                                                    <img src="/storage/carro/tmb_<?php echo e($foto->img); ?>" />
                                                </a>
                                            </figure>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="valor-produto text-center">
                            <?php if($carro->vendido == 'S'): ?>
                                VENDIDO
                            <?php else: ?>
                                R$ <?php echo __currency_mysql_to_iso($carro->valor); ?>
                            <?php endif; ?>
                        </div>
                        <div class="descricao-produto">
                            <div class="descricao-produto-group">
                                <table>
                                    <tr>
                                        <th>Marca</th>
                                        <td style="text-transform: uppercase"><?php echo e($categoria->nome); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Modelo</th>
                                        <td style="text-transform: uppercase"><?php echo e($carro->titulo); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Cor</th>
                                        <td><?php echo e($carro->cor); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Ano</th>
                                        <td><?php echo e($carro->ano); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Combustível</th>
                                        <td><?php echo e($carro->combustivel); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Km</th>
                                        <td><?php echo e($carro->km); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Câmbio</th>
                                        <td><?php echo e($carro->cambio); ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="/aprove-seu-credito" class="pg-carro_aprove_credito">Aprove o seu crédito</a>
                            </div>
                            <p><?php echo $carro->texto; ?></p>
                        </div>
                    </div>

                    <div class="col-lg-6 mobile">
                        <div class="d-flex flex-wrap">
                            <?php if(count($carroFotos) > 0): ?>
                                <?php $__currentLoopData = $carroFotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-4 p-2">
                                        <figure class="thumb-selector g-transparencia">
                                            <a href="/storage/carro/big_<?php echo e($foto->img); ?>" title="<?php echo $foto['legenda']; ?>"
                                                style="display: block" class="galeria-img amplia-imagem">
                                                <img src="/storage/carro/tmb_<?php echo e($foto->img); ?>" />
                                            </a>
                                        </figure>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\work\www\vgs_carros\vgs-auto-web\Modules/Site\Resources/views/carro.blade.php ENDPATH**/ ?>