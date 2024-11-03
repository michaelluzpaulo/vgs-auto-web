<form id="institucionalForm" role="form">
    <div class="modal-header">
        <h5 class="modal-title" id="institucionalModalLabel">Institucional / Novo cadastro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="id" id="id" value="0">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="titulo" class="control-label">Título: </label>
                    <input type="text" class="form-control" name="titulo" id="titulo" maxlength="70">
                </div>
            </div>

            <!--  <div class="row">
                <div class="col-lg-12">
                    <div class="modal-form-title">Galeria</div>
                    <div style="border: 1px solid #ccc;padding:10px;margin:0 0 10px">
                        <label for="img_input" class="label_file">
                            <i class="fa fa-upload" style="padding-right: 10px;" aria-hidden="true"></i>
                            <strong>Selecionar fotos...</strong>
                        </label>
                        <input class="img_input componete_invisibilite" type="file" id='img_input' name="files[]"
                            multiple="multiple" accept="image/jpeg, image/png, image/jpg, image/webp">
                        <div class="img_output">
                        </div>
                    </div>
                </div>
            </div> -->
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
