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
                        <div class="col-lg-3 col-12">
                            <a href="/carro/<?php echo e($c->ref_amigavel); ?>" class="carro-card">
                                <div class="position-relative">
                                    <div class="g-background-1  carro-card_img"
                                        style="background-image: url(/storage/carro/big_<?php echo e($c->img); ?>);width: 100%">
                                    </div>
                                    <div class="carro-card-mask"></div>
                                </div>
                                <div class="carro-card_box-categoria"><?php echo e($c->CATEGORIA); ?></div>
                                <div class="carro-card_box d-flex flex-column gap-3">
                                    <div class="carro-card_box-titulo"><?php echo e($c->titulo); ?></div>
                                    <div class="carro-card_box-ano">Ano: <?php echo e($c->ano); ?></div>
                                    <?php if($c->status == 'D'): ?>
                                        <div class="carro-card_box-valor">R$ <?php echo __currency_mysql_to_iso($c->valor); ?></div>
                                    <?php endif; ?>
                                    <?php if($c->status == 'R'): ?>
                                        <div class="text-center text-bg-dark bg-secondary carro-card_box-valor-vendido">
                                            RESERVADO</div>
                                    <?php endif; ?>
                                    <?php if($c->status == 'V'): ?>
                                        <div class="text-center text-bg-dark bg-secondary carro-card_box-valor-vendido">
                                            VENDIDO</div>
                                    <?php endif; ?>
                                    <div class="carro-card_box-desc">
                                        <hr>
                                        <div class="d-flex justify-content-center mt-2">

                                            <div class="carro-card_box-km">KM: <strong><?php echo e($c->km); ?></strong></div>
                                            <div class="carro-card_box-combustivel"><span>&nbsp;-&nbsp;</span>Comb: <strong>
                                                    <?php echo e($c->combustivel); ?></strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>




    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\work\www\vgs_carros\vgs-auto-web\Modules/Site\Resources/views/carros.blade.php ENDPATH**/ ?>