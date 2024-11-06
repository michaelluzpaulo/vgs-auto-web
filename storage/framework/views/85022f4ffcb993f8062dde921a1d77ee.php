<?php $__env->startSection('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
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
                            <li class="breadcrumb-item active" aria-current="page">Vitrine</li>
                        </ol>
                    </nav>
                    <a href="javascript:history.back();" class="breadcrumb-item-text">Voltar</a>

                </div>
            </div>
        </div>

        <div class="all-content p-geral">
            <div class="container">
                <div class="row">
                    <?php $__currentLoopData = $carro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-6">
                            <a href="/carro/<?php echo e($c->ref_amigavel); ?>" class="carro-card">
                                <img class="g-background-1 carro-card_img"
                                    style="background-image: url(/storage/carro/big_<?php echo e($c->img); ?>);width: 100%;background-repeat: no-repeat;background-position: center center;">
                                <div class="carro-card_box d-flex flex-column gap-3">
                                    <div class="carro-card_box-categoria"><?php echo e($c->CATEGORIA); ?></div>
                                    <div class="carro-card_box-titulo"><?php echo e($c->titulo); ?></div>
                                    <div class="d-flex justify-content-between">
                                        <div class="carro-card_box-ano"><strong>ANO:</strong> <?php echo e($c->ano); ?></div>
                                        <div class="carro-card_box-combustivel"><strong>COMB:</strong> <?php echo e($c->combustivel); ?>

                                        </div>
                                    </div>
                                    <div class="carro-card_box-valor">R$ <?php echo $c->valor; ?></div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>




    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\work\www\vgs carros\vgs-auto-web\Modules/Site\Resources/views/carros.blade.php ENDPATH**/ ?>