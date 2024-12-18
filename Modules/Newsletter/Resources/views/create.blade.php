<form id="newsletterForm" role="form">
    <div class="modal-header">
        <h5 class="modal-title" id="newsletterModalLabel">Newsletter / Novo cadastro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="id" id="id" value="0">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome" class="control-label">Nome: </label>
                    <input type="text" class="form-control" name="nome" id="nome" maxlength="70">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email" class="control-label">Email: </label>
                    <input type="email" class="form-control" name="email" id="email" maxlength="150">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="telefone" class="control-label">Telefone: </label>
                    <input type="text" class="form-control" name="telefone" id="telefone" maxlength="15"
                        data-mask-type="telefone">
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
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="bi bi-door-closed"></i>
            Fechar
        </button>
        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Salvar</button>
    </div>
</form>
