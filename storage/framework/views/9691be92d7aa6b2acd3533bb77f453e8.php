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

        <div class="p-geral pg-internas content-artigo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <figure class="zommcontainer mt-3 ">
                            <img src="/storage/carro/big_<?php echo e($carro->img); ?>" class="modify-img-principal"
                                style="width: 100%">
                        </figure>
                        <div class="desktop">
                            <div class="row m-0 ">

                                <?php if(count($carroFotos) > 0): ?>
                                    <?php $__currentLoopData = $carroFotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class=" col-lg-3 col-md-6 col-sm-4 p-2">
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
                    <div class="col-lg-6">
                        <div class="valor-produto text-center">
                            <?php if($carro->vendido == 'S'): ?>
                                VENDIDO
                            <?php else: ?>
                                <?php echo $carro->valor; ?>
                            <?php endif; ?>
                        </div>
                        <div class="descricao-produto">
                            <div class="descricao-produto-group">
                                <table>
                                    <tr>
                                        <th>Marca</th>
                                        <td><?php echo e($categoria->nome); ?></td>
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
                                        <th>Motorização</th>
                                        <td><?php echo e($carro->motorizacao); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Câmbio</th>
                                        <td><?php echo e($carro->cambio); ?></td>
                                    </tr>
                                </table>
                            </div>
                            <?php echo $carro->texto; ?>

                        </div>
                        <div class="atendimento-whatsapp pt-4 text-center">
                            <img src="/img/site/atendimento-whats.png" title="Atendimento" />
                            <br />
                            <a target="_blank"
                                href="https://api.whatsapp.com/send?phone=5551981640439&text=Ol%C3%A1%2C%20visitei%20o%20site%20da%20Auto%20Top%20Multimarcas%20e%20gostaria%20de%20receber%20mais%20informa%C3%A7%C3%B5es"
                                class="telefone text-dark">(51) 98164 0439</a>
                            <br />
                            <a target="_blank"
                                href="https://api.whatsapp.com/send?phone=5551999260123&text=Ol%C3%A1%2C%20visitei%20o%20site%20da%20Auto%20Top%20Multimarcas%20e%20gostaria%20de%20receber%20mais%20informa%C3%A7%C3%B5es"
                                class="telefone text-dark">(51) 99926 0123</a>
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

<?php echo $__env->make('site::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\work\www\vgs carros\vgs-auto-web\Modules/Site\Resources/views/carro.blade.php ENDPATH**/ ?>