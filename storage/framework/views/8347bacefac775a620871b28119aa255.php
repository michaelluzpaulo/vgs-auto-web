<form id="bannerForm" role="form" enctype="multipart/form-data">
    <div class="modal-header">
        <h5 class="modal-title" id="bannerModalLabel">Banner / #<?php echo $banner->id; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

        <input type="hidden" name="id" id="id" value="<?php echo $banner->id; ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome" class="control-label">Titulo: </label>
                    <input type="text" class="form-control" name="nome" id="nome" maxlength="70"
                        value="<?php echo $banner->nome; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="url" class="control-label">Url:</label>
                    <input type="text" class="form-control" name="url" id="url" maxlength="255"
                        value="<?php echo $banner->url; ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="ordem" class="control-label">Ordem:</label>
                    <input type="number" class="form-control" min="1" max="99" name="ordem"
                        id="ordem" maxlength="99" value="<?php echo $banner->ordem; ?>">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ativo" class="control-label active">Ativo: </label>
                    <select class="form-control" name="ativo" id="ativo">
                        <option value="S" <?php echo $banner->ativo == 'S' ? 'selected' : ''; ?>>Sim</option>
                        <option value="N" <?php echo $banner->ativo == 'N' ? 'selected' : ''; ?>>Não</option>
                    </select>
                </div>
            </div>



            <div class="col-md-12">
                <hr />
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="img" class="control-label">Imagem: (1920x384)</label>
                    <input type="file" class="form-control" name="img" id="img">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="img" class="control-label">&nbsp;</label>
                    <?php if($banner->img): ?>
                        <div><a href="/storage/banner/big_<?php echo e($banner->img); ?>" target="_blank"
                                class="btn btn-secondary">Ver imagem</a></div>
                    <?php else: ?>
                        <div class="alert alert-warning" role="alert">
                            <i class="fa fa-exclamation-triangle"></i> Nenhum arquivo encontrado.
                        </div>
                    <?php endif; ?>
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
<?php /**PATH D:\work\www\vgs carros\vgs-auto-web\Modules/Banner\Resources/views/edit.blade.php ENDPATH**/ ?>