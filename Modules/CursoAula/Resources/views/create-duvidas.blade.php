<form id="cursoAulaResponderForm" role="form">
    <div class="modal-header">
        <h5 class="modal-title" id="cursoAulaResponderModalLabel">Curso Aula / Responder</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="id" id="id" value="0">
        <div class="row">
            <strong>Pergunta</strong>
            <p>Como faz para curar do reiki</p>
            <hr>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="texto" class="control-label">Texto: </label>
                    <textarea class="form-control ckeditor" name="texto" id="texto" rows="8"></textarea>
                </div>
                <button type="button" class="btn btn-success"><i class="bi bi-save"></i>Responder a pergunta</button>
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
