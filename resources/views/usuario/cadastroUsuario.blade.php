@extends('layout.principal')
@section('conteudo')
<div class="row">
    <form action="/usuarios">

        <div class="form-group col-sm-6 ">
            <input type="text" name="busca" class="form-control input-sm" placeholder="Pesquisa por nome">
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary btn-sm">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-warning btn-sm pull-right" id="novo_user" data-toggle="modal" data-target="#modal_cadastro">Novo</button>
        </div>

    </form>
    <div class="col-sm-12 tb_usuarios">

        <h3>Usuarios</h3>
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th style="width:30%;">Nome</th>
                    <th style="width:20%;">Funções</th>
                    <th style="width:20%;">Login</th>
                    <th style="width:5%;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <th>{{$u->nome}}</th>
                        <th>{{$u->id_funcao}}</th>
                        <th>{{$u->login}}</th>
                        <th>
                            <a href="javascrip:void(0)" class="btn btn-warning btn-xs editar_user" id_usuario="{{$u->id_usuario}} " id_funcionario="{{$u->id_funcionario}}"  login="{{$u->login}}" senha="{{$u->senha}}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a href="{{route('excluir_usuario')}}?id_usuario={{$u->id_usuario}}" class="btn btn-danger btn-xs delete">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </th>
                    </tr>
                <?php endforeach ?>
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
                <h4 class="modal-title">Cadastrar Usuario</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

                    <form action="{{Route('realizar_cadastro')}}" id="user_cadastro" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_usuario" id="id_usuario">

                        <div class="col-sm-10 pad-left">
                            <label for="id_funcionario">Funcionário: </label>
                            <select name="id_funcionario" id="id_funcionario" class="form-control input-sm">
                                <?php foreach ($funcionarios as $key => $f): ?>
                                    <option value="{{$f->id_funcionario}}">{{$f->nome}}</option>        
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="col-sm-4 pad-left">
                            <label for="login">Login: </label>
                            <input type="text" name="login" id="login" class="form-control input-sm" required>
                        </div>

                        <div class="col-sm-4 pad-left">
                            <label for="senha">Senha: </label>
                            <input type="password" name="senha" id="senha" class="form-control input-sm" required>
                        </div>
                    
                    </div>
                    
                    <div class="modal-footer ">                        
                        <span class="text-danger pull-left">Todos os campos são obrigatorios.</span>
                        <button type="submit" class="btn btn-primary btn-sm">Incluir</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>

        </div> <!-- fim modal content -->

    </div>
</div> <!-- fim modal cadastro -->

@stop