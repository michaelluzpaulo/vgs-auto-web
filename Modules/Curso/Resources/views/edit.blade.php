<form id="cursoForm" role="form" enctype="multipart/form-data">
    <div class="modal-header">
        <h5 class="modal-title" id="cursoModalLabel">Curso / #<?php echo $curso->id; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

        <input type="hidden" name="id" id="id" value="<?php echo $curso->id; ?>">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">Curso</button>
                <button class="nav-link" id="nav-foto-tab" data-bs-toggle="tab" data-bs-target="#nav-foto"
                    type="button" role="tab" aria-controls="nav-foto" aria-selected="false">Foto</button>
                <button class="nav-link" id="nav-alunos-tab" data-bs-toggle="tab" data-bs-target="#nav-alunos"
                    type="button" role="tab" aria-controls="nav-alunos" aria-selected="false">Alunos</button>
            </div>
        </nav>
        <div class="tab-content  mt-2" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                tabindex="0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome" class="control-label">Nome: </label>
                            <input type="text" class="form-control" name="nome" id="nome" maxlength="70"
                                value="<?php echo $curso->nome; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ref_amigavel" class="control-label">Ref Amigável: </label>
                            <input type="text" class="form-control" name="ref_amigavel" id="ref_amigavel"
                                value="<?php echo $curso->ref_amigavel; ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="valor" class="control-label">Valor: </label>
                            <input type="text" class="form-control" name="valor" id="valor"
                                data-mask-type="moeda" value="<?php echo __currency_mysql_to_iso($curso->valor); ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tipo" class="control-label active">Tipo: </label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option value="">Selecione...</option>
                                @foreach ($listTipos as $tipo)
                                    <option value="{{ $tipo['id'] }}"
                                        {{ $curso->tipo == $tipo['id'] ? 'selected' : '' }}>
                                        {{ $tipo['nome'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="data_inicial" class="control-label">Data Inicial: </label>
                            <input type="text" class="form-control" name="data_inicial" id="data_inicial"
                                data-mask-type="date" value="<?php echo __date_mysql_to_iso($curso->data_inicial); ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="data_final" class="control-label">Data Final: </label>
                            <input type="text" class="form-control" name="data_final" id="data_final"
                                data-mask-type="date" value="<?php echo __date_mysql_to_iso($curso->data_final); ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ordem" class="control-label">Ordem:</label>
                            <input type="number" class="form-control" min="1" max="99" name="ordem"
                                id="ordem" maxlength="99" value="<?php echo $curso->ordem; ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ativo" class="control-label active">Ativo: </label>
                            <select class="form-control" name="ativo" id="ativo">
                                <option value="S" <?php echo $curso->ativo == 'S' ? 'selected' : ''; ?>>Sim</option>
                                <option value="N" <?php echo $curso->ativo == 'N' ? 'selected' : ''; ?>>Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="img" class="control-label">Imagem: (500x500)</label>
                            <input type="file" class="form-control" name="img" id="img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="img" class="control-label">&nbsp;</label>
                            @if ($curso->img)
                                <div><a href="/storage/curso/big_{{ $curso->img }}" target="_blank"
                                        class="btn btn-secondary">Ver imagem</a></div>
                            @else
                                <div class="alert alert-warning" role="alert">
                                    <i class="fa fa-exclamation-triangle"></i> Nenhum arquivo encontrado.
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="texto" class="control-label">Texto: </label>
                            <textarea class="form-control ckeditor" name="texto" id="texto" rows="8"><?php echo $curso->texto; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-foto" role="tabpanel" aria-labelledby="nav-foto-tab"
                tabindex="0">
                <br />
                <div class="row">
                    <div class="col-lg-12">
                        <label for="img_input" class="label_file">
                            <i class="fa fa-upload" style="padding-right: 10px;" aria-hidden="true"></i>
                            <strong>Selecionar fotos...</strong>
                        </label>
                        <input class="img_input componete_invisibilite" type="file" id='img_input' name="files[]"
                            multiple="multiple" accept="image/jpeg, image/png, image/jpg, image/webp">
                        <div class="img_output">

                        </div>
                    </div>
                    <div class="col-lg-12">
                        Imagens cadastradas<br />
                        <div class="table-responsive">
                            <table id="cursoFotoTable" class="table table-striped table-bordered" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th width="150" class="text-center"> - </th>
                                        <th>Legenda</th>
                                        <th width="120" class="text-center">Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($fotos && count($fotos) > 0)
                                        @foreach ($fotos as $f)
                                            <tr class="cursoFotoTable_tr-{{ $f->id }}">
                                                <td style="text-align:center;vertical-align: middle">
                                                    <a target="_blank" href="/storage/curso/big_{{ $f->img }}">
                                                        <img alt="{{ $f->legenda }}" title="{{ $f->legenda }}"
                                                            src="/storage/curso/tmb_{{ $f->img }}"
                                                            style="max-width:100px" />
                                                    </a>
                                                </td>
                                                <td style="vertical-align: middle">{{ $f->legenda }}</td>
                                                <td style="text-align:center;vertical-align: middle">
                                                    <button type="button" class="btn btn-danger run-remove-foto"
                                                        data-foto-id='{{ $f->id }}'>
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" align="center">Nenhum registro encontrado</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show active" id="nav-alunos" role="tabpanel" aria-labelledby="nav-alunos-tab"
                tabindex="0">
                <div class="row">
                    <div class="col-lg-12">

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nome</th>
                            </tr>
                            @foreach ($alunos as $aluno)
                                <tr>
                                    <td>
                                        {{ $aluno->nome }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
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
