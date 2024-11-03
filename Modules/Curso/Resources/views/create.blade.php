<form id="cursoForm" role="form">
    <div class="modal-header">
        <h5 class="modal-title" id="cursoModalLabel">Curso / Novo cadastro</h5>
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
            <div class="col-md-3">
                <div class="form-group">
                    <label for="valor" class="control-label">Valor: </label>
                    <input type="text" class="form-control" name="valor" id="valor" data-mask-type="moeda">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="tipo" class="control-label">Tipo: </label>
                    <select class="form-control" name="tipo" id="tipo">
                        <option value="">Selecione...</option>
                        @foreach ($listTipos as $tipo)
                            <option value="{{ $tipo['id'] }}">{{ $tipo['nome'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="data_inicial" class="control-label">Data Inicial: </label>
                    <input type="text" class="form-control" name="data_inicial" id="data_inicial"
                        data-mask-type="date">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="data_final" class="control-label">Data Final: </label>
                    <input type="text" class="form-control" name="data_final" id="data_final" data-mask-type="date">
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
                    <label for="img" class="control-label">Imagem: (500x500)</label>
                    <input type="file" class="form-control" name="img" id="img">
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
