<form id="institucionalForm" role="form" enctype="multipart/form-data">
    <div class="modal-header">
        <h5 class="modal-title" id="institucionalModalLabel">Institucional / #<?php echo $institucional->id; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

        <input type="hidden" name="id" id="id" value="<?php echo $institucional->id; ?>">
        <ul class="nav nav-tabs component-tabs"
            style="position: relative;margin-left:-15px;margin-right:-15px;padding-left:15px;padding-right:15px">
            <li class="nav-item active">
                <button class="nav-link active component-item-tabs" id="dados-tab" data-bs-toggle="tab"
                    data-bs-target="#tab-dados" type="button">Dados</button>
            </li>
            <li class="nav-item">
                <button class="nav-link component-item-tabs" id="gallery-tab" data-bs-toggle="tab"
                    data-bs-target="#tab-gallery" type="button">Galeria</button>
            </li>
        </ul>

        <div class="tab-content">
            <div id="tab-dados" class="tab-pane fade show active">
                <br />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="titulo" class="control-label">Título: </label>
                            <input type="text" class="form-control" name="titulo" id="titulo" maxlength="70"
                                value="<?php echo $institucional->titulo ?? ''; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ref_amigavel" class="control-label">Ref. Amigavel: </label>
                            <input type="text" class="form-control" name="ref_amigavel" id="ref_amigavel" readonly
                                disabled value="<?php echo $institucional->ref_amigavel ?? ''; ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="texto" class="control-label">Texto: </label>
                            <textarea class="form-control ckeditor" name="texto" id="texto" rows="12"><?php echo $institucional->texto ?? ''; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-gallery" class="tab-pane fade">
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
                            <table id="institucionalFotoTable" class="table table-striped table-bordered"
                                cellspacing="0" width="100%">
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
                                            <tr class="institucionalFotoTable_tr-{{ $f->id }}">
                                                <td style="text-align:center;vertical-align: middle">
                                                    <a target="_blank"
                                                        href="/storage/institucional/big_{{ $f->img }}">
                                                        <img alt="{{ $f->legenda }}" title="{{ $f->legenda }}"
                                                            src="/storage/institucional/tmb_{{ $f->img }}"
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
