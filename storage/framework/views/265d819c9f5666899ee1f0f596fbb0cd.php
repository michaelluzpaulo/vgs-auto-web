<form id="carroForm" role="form">
    <div class="modal-header">
        <h5 class="modal-title" id="carroModalLabel">Carro / Novo cadastro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="id" id="id" value="0">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="titulo" class="control-label">Título: </label>
                    <input type="text" class="form-control" name="titulo" id="titulo" maxlength="70">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ativo" class="control-label">Categoria: </label>
                    <select class="form-control" name="categoria_id" id="categoria_id" required>
                        <option value="" selected="selected">Selecione...</option>
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat['id']); ?>"><?php echo e($cat->nome); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="status" class="control-label">Status: </label>
                    <select class="form-control" name="status" id="status">
                        <option value="D" selected="selected">Disponível</option>
                        <option value="V">Vendido</option>
                        <option value="R">Reservado</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ativo" class="control-label">Ativo: </label>
                    <select class="form-control" name="ativo" id="ativo">
                        <option value="S" selected="selected">Sim</option>
                        <option value="N">Não</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cor" class="control-label">Cor: </label>
                    <input type="text" class="form-control" name="cor" id="cor" maxlength="40">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ano" class="control-label">Ano: </label>
                    <input type="text" class="form-control" name="ano" id="ano" maxlength="40">
                </div>
            </div>
            <!--  <div class="col-md-3">
                <div class="form-group">
                    <label for="motorizacao" class="control-label">Motorização: </label>
                    <input type="text" class="form-control" name="motorizacao" id="motorizacao" maxlength="40">
                </div>
            </div> -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="km" class="control-label">KM: </label>
                    <input type="text" class="form-control" name="km" id="km" maxlength="40">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="cambio" class="control-label">Câmbio: </label>
                    <input type="text" class="form-control" name="cambio" id="cambio" maxlength="40">
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for="combustivel" class="control-label">Combustível: </label>
                    <input type="text" class="form-control" name="combustivel" id="combustivel" maxlength="40">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="valor" class="control-label">Valor R$: </label>
                    <input type="text" class="form-control" name="valor" id="valor"
                        data-mask-type="moeda">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="img" class="control-label">Imagem (600 largura): </label>
                    <input type="file" class="form-control" name="img" id="img" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="texto" class="control-label">Texto: </label>
                    <textarea class="form-control ckeditor" name="texto" id="texto" rows="8"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="bi bi-door-closed"></i>
            Fechar
        </button>
        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Salvar</button>
    </div>
</form>
<?php /**PATH /Volumes/work/www/vgs_auto_group/vgs_auto/Modules/Carro/Resources/views/create.blade.php ENDPATH**/ ?>