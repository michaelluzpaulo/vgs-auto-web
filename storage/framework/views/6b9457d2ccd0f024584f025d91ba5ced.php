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
                            <li class="breadcrumb-item active" aria-current="page">Localização</li>
                        </ol>
                    </nav>
                    <a href="javascript:history.back();" class="breadcrumb-item-text">Voltar</a>

                </div>
            </div>
        </div>

        <div class="p-geral">
            <div class="container">
                <div class="row">
                    <h1 class="col-12"><?php echo $institucional->titulo; ?></h1>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12">
                        <p><?php echo $institucional->texto; ?></p>
                    </div>
                    <div class="mt-3">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.3313859568884!2d-51.13759042469943!3d-29.998639629153388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951976e2d4ffd51f%3A0xdf844d14df0e3441!2sAv.%20Sert%C3%B3rio%2C%207130%20-%20Sarandi%2C%20Porto%20Alegre%20-%20RS%2C%2091130-721!5e0!3m2!1spt-BR!2sbr!4v1724073655884!5m2!1spt-BR!2sbr"
                            width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\work\www\vgs carros\vgs-auto-web\Modules/Site\Resources/views/localizacao.blade.php ENDPATH**/ ?>