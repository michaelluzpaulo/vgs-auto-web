<form id="newsletterForm" role="form" enctype="multipart/form-data">
    <div class="modal-header">
        <h5 class="modal-title" id="newsletterModalLabel">Newsletter / #<?php echo $newsletter->id; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

        <input type="hidden" name="id" id="id" value="<?php echo $newsletter->id; ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome" class="control-label">Nome: </label>
                    <input type="text" class="form-control" name="nome" id="nome" maxlength="70"
                        value="<?php echo $newsletter->nome; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email" class="control-label">E-mail: </label>
                    <input type="email" class="form-control" name="email" id="email" maxlength="150"
                        value="<?php echo $newsletter->email; ?>">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="telefone" class="control-label">Telefone: </label>
                    <input type="text" class="form-control" name="telefone" id="telefone" maxlength="15"
                        data-mask-type="telefone" value="<?php echo $newsletter->telefone; ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="ativo" class="control-label active">Ativo: </label>
                    <select class="form-control" name="ativo" id="ativo">
                        <option value="S" <?php echo $newsletter->ativo == 'S' ? 'selected' : ''; ?>>Sim</option>
                        <option value="N" <?php echo $newsletter->ativo == 'N' ? 'selected' : ''; ?>>Não</option>
                    </select>
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
<?php /**PATH D:\work\www\vgs_carros\vgs-auto-web\Modules/Newsletter\Resources/views/edit.blade.php ENDPATH**/ ?>