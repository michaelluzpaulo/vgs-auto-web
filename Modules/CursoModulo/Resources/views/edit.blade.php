<form id="cursomoduloForm" role="form" enctype="multipart/form-data">
    <div class="modal-header">
        <h5 class="modal-title" id="cursomoduloModalLabel">Módulo / #<?php echo $cursomodulo->id; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

        <input type="hidden" name="id" id="id" value="<?php echo $cursomodulo->id; ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="curso_id" class="control-label">Curso: </label>
                    <select class="form-control" name="curso_id" id="curso_id">
                        @foreach ($cursos as $c)
                            <option value="{{ $c->id }}"
                                {{ $c->id == $cursomodulo->curso_id ? 'selected' : '' }}>
                                {{ $c->nome }}
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="titulo" class="control-label">Nome: </label>
                    <input type="text" class="form-control" name="titulo" id="titulo"
                        value="<?php echo $cursomodulo->titulo; ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="ordem" class="control-label">Ordem: </label>
                    <input type="number" class="form-control" name="ordem" id="ordem" min="1"
                        max="99" value="<?php echo $cursomodulo->ordem; ?>">
                </div>
            </div>

            <div class="col-md-12">
                <hr />
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="texto" class="control-label">Texto: </label>
                    <textarea class="form-control ckeditor" name="texto" id="texto" rows="8"><?php echo $cursomodulo->texto; ?></textarea>
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
