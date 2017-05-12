@extends('layout.principal')
@section('conteudo')
<div class="row">

    <form action="/especialidades">

        <div class="form-group col-sm-6 ">
            <input type="text" name="busca" class="form-control input-sm" placeholder="Pesquisa por nome">
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary btn-sm">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-warning btn-sm pull-right" id="novo_fun" data-toggle="modal" data-target="#modal_cadastro">Novo</button>
        </div>

    </form>

    <div class="col-md-12 tb_usuarios">
        <h3>Funções</h3>
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th width="10%">Identificador</th>
                    <th width="80%">Especialidade</th>
                    <th width="10%">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($especialidades as $e): ?>
                <tr>
                    <td>{{$e->id_especialidade}}</td>
                    <td>{{$e->descricao}}</td>
                    <td>
                        <a href="javascrip:void(0)" class="btn btn-warning btn-xs editar_especialidade" id_especialidade="{{$e->id_especialidade}}" descricao="{{$e->descricao}}">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>

                        <a href="{{route('excluir_especialidade')}}?id_especialidade={{$e->id_especialidade}}" class="btn btn-danger btn-xs delete">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
                
            <?php endforeach ?>
            </tr>
        </tbody>
    </table>
</div>

</div>



<!-- Modal cadastro-->
<div class="modal fade" id="modal_cadastro" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cadastrar Especialidade</h4>
            </div>
            <form action="{{Route('cadastro_especialidade')}}" id="especialidade_cadastro" method="post">
                <div class="modal-body">
                    <div class="container-fluid">

                        {{ csrf_field() }}
                        <input type="hidden" name="id_especialidade" id="id_especialidade">

                        <div class="col-sm-6 pad-left">
                            <label for="descricao">Especialidade: </label>
                            <input type="text" name="descricao" id="descricao" class="form-control input-sm" required>
                        </div>

                    </div> <!-- fim container-fluid -->
                </div> <!-- fim modal-body -->

                <div class="modal-footer ">                        
                    <span class="text-danger pull-left">Todos os campos são obrigatorios.</span>
                    <button type="submit" class="btn btn-primary btn-sm">Incluir</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>


        </div> <!-- fim modal content -->

    </div>
</div> <!-- fim modal cadastro -->
@stop