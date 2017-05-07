@extends('layout.principal')
@section('conteudo')
<div class="row">

    <form action="/pacientes">

        <div class="form-group col-sm-6 ">
            <input type="text" name="busca" class="form-control input-sm" placeholder="Pesquisa por nome">
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary btn-sm">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
        </div>

    </form>
        <div class="col-sm-12">
            
        <h1 class="pull-left">Consultas Marcadas</h1>
        </div>
        <div class="col-sm-9 tb_usuarios">

            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th style="width:20%;">Paciente</th>
                        <th style="width:10%;">CPF</th>
                        <th style="width:10%;">Idade</th>
                        <th style="width:20%;">Médiaco </th>
                        <th style="width:10%;">Sala</th>
                        <th style="width:15%;">Data</th>
                        <th style="width:15%;">Horários</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    @stop