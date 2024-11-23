@extends('admin::layouts.master')

@section('css')
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('shared/ckeditor4/ckeditor.js') }}?v=<?php echo time(); ?>"></script>
    <script type="text/javascript" src="{{ asset('shared/ckeditor4/adapters/jquery.js') }}"></script>
    <script type="text/javascript" src="/dist/js/modules/Carro.js?v=<?php echo time(); ?>"></script>
    <script type="text/javascript" src="/dist/js/modules/CarroGaleria.js?v=<?php echo time(); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            Carro.init();
        });
    </script>
@endsection

@section('module_title')
    <h1><small>Cadastros /</small> Carros</h1>
@endsection

@section('content')
    <section class="content">
        <div class="card card-secondary card-outline">
            <div class="card-header">

                <form name="form-carro-principal" id="form-carro-principal">
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
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="control-label" for="filtro_active">Ativo</label>
                                <select class="form-control" name="filtro_active" id="filtro_active" style="width:100%">
                                    <option value="" selected>Todos</option>
                                    <option value="S">Ativo</option>
                                    <option value="N">Inativo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="control-label" for="filtro_status">Status</label>
                                <select class="form-control" name="filtro_status" id="filtro_status" style="width:100%">
                                    <option value="" selected>Todos</option>
                                    <option value="D">Disponível</option>
                                    <option value="V">Vendido</option>
                                    <option value="R">Reservado</option>
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
                            <table id="carroTable" class="table table-striped dataTable table-bordered" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Título</th>
                                        <th>Categoria</th>
                                        <th class="text-end">Valor R$</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Ativo</th>
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
