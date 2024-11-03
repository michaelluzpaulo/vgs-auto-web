@extends('admin::layouts.master')

@section('css')
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('vendorjs/ckeditor4/ckeditor.js') }}?v=<?php echo time(); ?>"></script>
    <script type="text/javascript" src="{{ asset('vendorjs/ckeditor4/adapters/jquery.js') }}"></script>
    <script type="text/javascript" src="/dist/js/modules/CursoAula.js?v=<?php echo time(); ?>"></script>
    <script type="text/javascript" src="/dist/js/modules/CursoAulaDuvida.js?v=<?php echo time(); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            CursoAula.init();
        });
    </script>
@endsection

@section('module_title')
    <h1><small>Cadastros / Cursos /</small> Aulas</h1>
@endsection

@section('content')
    <section class="content">
        <div class="card card-secondary card-outline">
            <div class="card-header">

                <form name="form-cursoAula-principal" id="form-cursoAula-principal">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="filtro_id" class="control-label">Registro ID</label>
                                <input type="number" class="form-control" name="filtro_id" id="filtro_id" autofocus="">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="filtro_nome" class="control-label">Nome</label>
                                <input type="text" class="form-control" name="filtro_nome" id="filtro_nome"
                                    placeholder="Digite uma palavra chave">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="filtro_curso_id" class="control-label">Curso</label>
                                <select class="form-control" name="filtro_curso_id" id="filtro_curso_id">
                                    <option value=''>Selecione</option>
                                    <?php
                                    foreach ($cursos as $c) {
                                        echo "<option value='{$c->id}'>{$c->nome}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="filtro_curso_modulo_id" class="control-label">Módulo</label>
                                <select class="form-control" name="filtro_curso_modulo_id" id="filtro_curso_modulo_id">
                                    <option value="">Selecione...</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <label class="control-label">&nbsp;</label>
                            <button type="submit" class="run-search btn btn-secondary btn-block" data-toggle="tooltip"
                                data-placement="top" title="" id="btn-refresh"
                                data-original-title="Carregar resultados"><i class="fa fa-search"></i>
                            </button>
                        </div>
                        <div class="col-lg-1">
                            <label class="control-label">&nbsp;</label>
                            <button type="button" class="btn  btn-secondary btn-block run-add-cadastro"
                                data-toggle="tooltip" data-placement="top" title=""
                                data-original-title="Adicionar um cadastro"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body pb-4">
                <div class="row">
                    <div class="col-12">
                        <br />
                        <div class="table-responsive">
                            <table id="cursoAulaTable" class="table table-striped dataTable table-bordered" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th style="text-align: center">Ordem</th>
                                        <th>Título</th>
                                        <th>Módulo</th>
                                        <th>Curso</th>
                                        <th class="text-center">Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
