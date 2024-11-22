<form id="bannerForm" role="form">
    <div class="modal-header">
        <h5 class="modal-title" id="bannerModalLabel">Banner / Novo cadastro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="id" id="id" value="0">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome" class="control-label">Titulo: </label>
                    <input type="text" class="form-control" name="nome" id="nome" maxlength="70">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="url" class="control-label">Url:</label>
                    <input type="text" class="form-control" name="url" id="url" maxlength="255">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="ordem" class="control-label">Ordem:</label>
                    <input type="number" class="form-control" min="1" max="99" name="ordem"
                        id="ordem" maxlength="99">
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
            <hr>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="img" class="control-label">Imagem Desktop: (1920x400)</label>
                    <input type="file" class="form-control" name="img" id="img">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="img_mob" class="control-label">Imagem Mobile: (640x480)</label>
                    <input type="file" class="form-control" name="img_mob" id="img_mob">
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
