<form id="cursoAulaForm" role="form" enctype="multipart/form-data">
    <div class="modal-header">
        <h5 class="modal-title" id="cursoAulaModalLabel">Aula / #<?php echo $cursoAula->id; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

        <input type="hidden" name="id" id="id" value="<?php echo $cursoAula->id; ?>">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Aulas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="avaliacao-tab" data-bs-toggle="tab" data-bs-target="#avaliacao-tab-pane"
                    type="button" role="tab" aria-controls="avaliacao-tab-pane"
                    aria-selected="false">Avaliações</button>
            </li>

        </ul>
        <div class="tab-content mt-2" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="curso_id" class="control-label">Curso: </label>
                            <select class="form-control" name="curso_id" id="curso_id">
                                @foreach ($cursos as $c)
                                    <option value="{{ $c->id }}"
                                        {{ $c->id == $cursoModulo->curso_id ? 'selected' : '' }}>
                                        {{ $c->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="curso_modulo_id" class="control-label">Módulo:
                                {{ $cursoAula->curso_modulo_id }}</label>
                            <select class="form-control" name="curso_modulo_id" id="curso_modulo_id">
                                @foreach ($cursosModulos as $c)
                                    <option value="{{ $c->id }}"
                                        {{ $c->id == $cursoAula->curso_modulo_id ? 'selected' : '' }}>
                                        {{ $c->titulo }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="titulo" class="control-label">Nome: </label>
                            <input type="text" class="form-control" name="titulo" id="titulo"
                                value="<?php echo $cursoAula->titulo; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="duracao" class="control-label">Duração: </label>
                            <input type="text" class="form-control" name="duracao" id="duracao"
                                value="<?php echo $cursoAula->duracao; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ordem" class="control-label">Ordem:</label>
                            <input type="number" class="form-control" min="1" max="99" name="ordem"
                                id="ordem" maxlength="99" value="<?php echo $cursoAula->ordem; ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="video" class="control-label">Vídeo: </label>
                            <textarea class="form-control ckeditor" name="video" id="video" rows="8"><?php echo $cursoAula->video; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="texto" class="control-label">Texto: </label>
                            <textarea class="form-control ckeditor" name="texto" id="texto" rows="8"><?php echo $cursoAula->texto; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="avaliacao-tab-pane" role="tabpanel" aria-labelledby="avaliacao-tab"
                tabindex="0">
                <br />
                <table id="cursoAulaDuvidaTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 8%;">ID</th>
                            <th style="width: 15%">Data</th>
                            <th>Nome</th>
                            <th style="width: 10%; text-align: center">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
