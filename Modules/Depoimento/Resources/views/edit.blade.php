<form id="depoimentoForm" role="form" enctype="multipart/form-data">
    <div class="modal-header">
        <h5 class="modal-title" id="depoimentoModalLabel">Depoimento / #<?php echo $depoimento->id; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

        <input type="hidden" name="id" id="id" value="<?php echo $depoimento->id; ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome" class="control-label">Nome: </label>
                    <input type="text" class="form-control" name="nome" id="nome" maxlength="70"
                        value="<?php echo $depoimento->nome; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ativo" class="control-label active">Ativo: </label>
                    <select class="form-control" name="ativo" id="ativo">
                        <option value="S" <?php echo $depoimento->ativo == 'S' ? 'selected' : ''; ?>>Sim</option>
                        <option value="N" <?php echo $depoimento->ativo == 'N' ? 'selected' : ''; ?>>Não</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="mensagem" class="control-label">Mensagem: </label>
                    <textarea class="form-control" name="mensagem" id="mensagem" rows="8"><?php echo $depoimento->mensagem; ?></textarea>
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
