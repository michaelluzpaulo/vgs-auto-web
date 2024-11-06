<?php $__env->startSection('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="/dist/js/site/CursoCadastroSimplificado.js?v=<?php echo e(env('APP_VERSION_ARQUIVE_STATIC')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <div class="all-breadcrumb">
            <div class="container ">
                <div class="d-flex justify-content-between">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="breadcrumb-item-text">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Curso</li>
                        </ol>
                    </nav>
                    <a href="javascript:history.back();" class="breadcrumb-item-text">Voltar</a>

                </div>
            </div>
        </div>

        <div class="p-geral pg-internas content-artigo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="title-geral-p d-flex flex-column">
                                    <h2 class="title-geral"><?php echo $carro->titulo; ?></h2>
                                    <div class="title-geral-traco"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="cursos-box_content">
                                    <?php echo $carro->texto; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
            <?php if($carroFotos && count($carroFotos) > 0): ?>
                <section class="galeria_fotos">
                    <div class="container">
                        <div class="row">
                            <?php $__currentLoopData = $carroFotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-3">
                                    <a data-fancybox="gallery" data-caption="<?php echo e($g->legenda); ?>"
                                        href="/storage/carro/big_<?php echo e($g->img); ?>">
                                        <img src="/storage/carro/tmb_<?php echo e($g->img); ?>" alt="<?php echo e($g->legenda); ?>"
                                            title="<?php echo e($g->legenda); ?>">
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\work\www\vgs carros\vgs-auto-web\Modules/Site\Resources/views/carro.blade.php ENDPATH**/ ?>