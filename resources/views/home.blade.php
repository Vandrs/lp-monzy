@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Leads</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <h4>Filtrar</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-3">
                            <label for="name">Nome</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-2">
                            <label for="profile">Perfil de interesse</label>
                            <select name="profile" id="profile" class="form-control">
                                <option value="">Selecione</option>
                                <option value="teacher">Treinador</option>
                                <option value="student">Aluno</option>
                                <option value="both">Ambos</option>
                            </select>
                        </div>

                        <div class="col-xs-12 col-md-2">
                            <label for="dt_ini">Data inicio</label>
                            <div class="input-group">
                                <input type="text" id="dt_ini" name="dt_ini" class="form-control" readonly="">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="dt_ini_calendar" type="button">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                    </button>
                                </span>
                            </div>
                            
                        </div>
                        <div class="col-xs-12 col-md-2">
                            <label for="dt_fim">Data fim</label>
                            <div class="input-group">
                                <input type="text" id="dt_fim" name="dt_fim" class="form-control" readonly="">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="dt_fim_calendar" type="button">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3 text-right">
                            <div>
                                <label class="control-label">&nbsp;</label>
                            </div>
                            <button id="search" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Pesquisar</button>
                            <button id="clear" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Limpar</button>
                        </div>
                    </div>
                    <table class="table table-bordered table-stripped margin-top-10" id="leadTable">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Perfil Selecionado</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
