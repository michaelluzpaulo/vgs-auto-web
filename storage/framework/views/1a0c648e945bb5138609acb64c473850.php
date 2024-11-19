<form id="carroForm" role="form" enctype="multipart/form-data">
    <div class="modal-header">
        <h5 class="modal-title" id="carroModalLabel">Carro / #<?php echo $carro->id; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

        <input type="hidden" name="id" id="id" value="<?php echo $carro->id; ?>">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">Dados</button>
                <button class="nav-link" id="nav-foto-tab" data-bs-toggle="tab" data-bs-target="#nav-foto"
                    type="button" role="tab" aria-controls="nav-foto" aria-selected="false">Imagens</button>
            </div>
        </nav>
        <div class="tab-content  mt-2" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                tabindex="0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="titulo" class="control-label">Título: </label>
                            <input type="text" class="form-control" name="titulo" id="titulo" maxlength="70"
                                value="<?php echo $carro->titulo; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ref_amigavel" class="control-label">Ref. Amigavel: </label>
                            <input type="text" class="form-control" name="ref_amigavel" id="ref_amigavel" readonly
                                value="<?php echo $carro->ref_amigavel; ?>">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ativo" class="control-label">Categoria: </label>
                            <select class="form-control" name="categoria_id" id="categoria_id" required>
                                <option value="" selected="selected">Selecione...</option>
                                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cat->id); ?>" <?php echo $carro->categoria_id == $cat->id ? 'selected' : ''; ?>><?php echo e($cat->nome); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="status" class="control-label active">Vendido: </label>
                            <select class="form-control" name="status" id="status">
                                <option value="D" <?php echo $carro->status == 'D' ? 'selected' : ''; ?>>Disponível
                                </option>
                                <option value="V" <?php echo $carro->status == 'V' ? 'selected' : ''; ?>>Vendido
                                </option>
                                <option value="R" <?php echo $carro->status == 'R' ? 'selected' : ''; ?>>Reservado
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ativo" class="control-label active">Ativo: </label>
                            <select class="form-control" name="ativo" id="ativo">
                                <option value="S" <?php echo $carro->ativo == 'S' ? 'selected' : ''; ?>>Sim</option>
                                <option value="N" <?php echo $carro->ativo == 'N' ? 'selected' : ''; ?>>Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cor" class="control-label">Cor: </label>
                            <input type="text" class="form-control" name="cor" id="cor"
                                value="<?php echo $carro->cor; ?>" maxlength="40">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ano" class="control-label">Ano: </label>
                            <input type="text" class="form-control" name="ano" id="ano"
                                value="<?php echo $carro->ano; ?>" maxlength="40">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="km" class="control-label">KM: </label>
                            <input type="text" class="form-control" name="km" id="km"
                                value="<?php echo $carro->km; ?>" maxlength="40">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cambio" class="control-label">Câmbio: </label>
                            <input type="text" class="form-control" name="cambio" id="cambio"
                                value="<?php echo $carro->cambio; ?>" maxlength="40">
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="combustivel" class="control-label">Combustível: </label>
                            <input type="text" class="form-control" name="combustivel" id="combustivel"
                                value="<?php echo $carro->combustivel; ?>" maxlength="40">
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="valor" class="control-label">Valor R$: </label>
                            <input type="text" class="form-control" name="valor" id="valor"
                                data-mask-type="moeda" value="<?php echo $carro->valor; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <hr />
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="img" class="control-label">Imagem (1380 largura): </label>
                            <input type="file" class="form-control" name="img" id="img" />
                            <?php if($carro->img):?>
                            <p class="center" style="padding: 30px">
                                <button type="button" onclick="Carro.deleteFoto(<?php echo $carro->id; ?>)"
                                    class="btn btn-danger"><i class="fa fa-trash-o"></i>
                                    Excluir Foto
                                </button>
                            </p>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php if($carro->img){ ?>
                        <br />
                        <a href="<?php echo e(asset("storage/carro/big_{$carro->img}")); ?>" target="_blank"><img
                                class="img-responsive pad" src="<?php echo e(asset("storage/carro/tmb_{$carro->img}")); ?>"
                                alt="Foto"></a>
                        <?php }?>
                    </div>
                </div>

                <div class="row">
                    <hr />
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="texto" class="control-label">Texto: </label>
                            <textarea class="form-control ckeditor" name="texto" id="texto" rows="8"><?php echo $carro->texto; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-foto" role="tabpanel" aria-labelledby="nav-foto-tab"
                tabindex="0">
                <br />
                <div class="row">
                    <div class="col-lg-12">
                        <label for="img_input" class="label_file">
                            <i class="fa fa-upload" style="padding-right: 10px;" aria-hidden="true"></i>
                            <strong>Selecionar fotos...</strong>
                        </label>
                        <input class="img_input componete_invisibilite" type="file" id='img_input' name="files[]"
                            multiple="multiple" accept="image/jpeg, image/png, image/jpg, image/webp">
                        <div class="img_output">

                        </div>
                    </div>
                    <div class="col-lg-12">
                        Imagens cadastradas<br />
                        <div class="table-responsive">
                            <table id="carroFotoTable" class="table table-striped table-bordered" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th width="150" class="text-center"> - </th>
                                        <th>Legenda</th>
                                        <th width="120" class="text-center">Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($carroFotos && count($carroFotos) > 0): ?>
                                        <?php $__currentLoopData = $carroFotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="carroFotoTable_tr-<?php echo e($f->id); ?>">
                                                <td style="text-align:center;vertical-align: middle">
                                                    <a target="_blank" href="/storage/carro/big_<?php echo e($f->img); ?>">
                                                        <img alt="<?php echo e($f->legenda); ?>" title="<?php echo e($f->legenda); ?>"
                                                            src="/storage/carro/tmb_<?php echo e($f->img); ?>"
                                                            style="max-width:100px" />
                                                    </a>
                                                </td>
                                                <td style="vertical-align: middle"><?php echo e($f->legenda); ?></td>
                                                <td style="text-align:center;vertical-align: middle">
                                                    <button type="button" class="btn btn-danger run-remove-foto"
                                                        data-foto-id='<?php echo e($f->id); ?>'>
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3" class="center">Nenhum registro encontrado</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="bi bi-door-closed"></i>
            Fechar
        </button>
        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Salvar</button>
        <button type="button" class="btn btn-danger run-btn-delete"><i class="bi bi-trash"></i> Excluir</button>
    </div>
</form>
<?php /**PATH D:\work\www\vgs_carros\vgs-auto-web\Modules/Carro\Resources/views/edit.blade.php ENDPATH**/ ?>