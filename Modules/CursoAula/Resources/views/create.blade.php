<form id="cursoAulaForm" role="form">
    <div class="modal-header">
        <h5 class="modal-title" id="cursoAulaModalLabel">Curso Aula / Novo cadastro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="id" id="id" value="0">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="curso_id" class="control-label">Curso: </label>
                    <select class="form-control" name="curso_id" id="curso_id">
                        <option value="">Selecione...</option>
                        <?php foreach ($cursos as $c) {
                            echo "<option value='{$c->id}'>{$c->nome}</option>";
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="curso_modulo_id" class="control-label">Módulo: </label>
                    <select class="form-control" name="curso_modulo_id" id="curso_modulo_id">
                        <option value="">Selecione...</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="titulo" class="control-label">Título: </label>
                    <input type="text" class="form-control" name="titulo" id="titulo" maxlength="150">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="duracao" class="control-label">Duração: </label>
                    <input type="text" class="form-control" name="duracao" id="duracao">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ordem" class="control-label">Ordem:</label>
                    <input type="number" class="form-control" min="1" max="99" name="ordem"
                        id="ordem" maxlength="99">
                </div>
            </div>
            <hr>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="video" class="control-label">Vídeo: </label>
                    <textarea class="form-control ckeditor" name="video" id="video" rows="8"></textarea>
                </div>
            </div>
            <hr>
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
