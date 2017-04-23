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
                <th style="width:20%;">Senha</th>
                <th style="width:5%;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $u): ?>
                <tr>
                    <th>{{$u->nome}}</th>
                    <th>{{$u->funcao}}</th>
                    <th>{{$u->login}}</th>
                    <th>{{$u->senha}}</th>
                    <th>
                        <a href="javascrip:void(0)" class="btn btn-warning btn-xs editar_user" usuario="{{$u->id_usuario}} " id_funcionario="{{$u->id_funcionario}}" data="{{$u->data}}" nome="{{$u->nome}}" login="{{$u->login}}" senha="{{$u->senha}}" ativo="{{$u->ativo}}" funcao="{{$u->funcao}}">
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
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cadastrar Usuario</h4>
            </div>
            <div class="modal-body">

                <form action="{{Route('realizar_cadastro')}}" id="user_cadastro" method="post">
                    {{ csrf_field() }}
                    <div class="col-sm-8 pad-left">
                        <label for="funcionario">Funcionário: </label>
                        <input type="text" name="funcionario" class="form-control input-sm" placeholder="Pesquisar Funcionário" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="data">Data: </label>
                        <input type="text" name="data" class="form-control input-sm data" id="datepicker" placeholder="xx/xx/xxxx" required>
                    </div>

                    <div class="col-sm-8 pad-left">
                        <label for="nome">Nome: </label>
                        <input type="text" name="nome" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="funcao">Função: </label>
                        <input type="text" name="funcao" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="login">Login: </label>
                        <input type="text" name="login" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="senha">Senha: </label>
                        <input type="password" name="senha" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left" >
                        <label for="">Situação: </label>
                        <div class="radio">
                            <label><input type="radio" name="situcao" value="1" checked="checked">Ativo</label>
                            <label><input type="radio" name="situcao" value="2">Inativo</label>
                        </div>
                    </div>
                    
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-sm">Incluir</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>

                </form>

                <div class="form-group" style="padding-bottom: 5px;">
                    <span class="text-danger">Todos os campos são obrigatorios.</span>
                </div>

            </div>

        </div> <!-- fim modal content -->

    </div>
</div> <!-- fim modal cadastro -->



<!-- Modal editar-->
<div class="modal fade" id="modal_editar" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Usuario</h4>
            </div>
            <div class="modal-body">

                <form action="{{Route('realizar_cadastro')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_usuario" id="edt_id_u">
                    <div class="col-sm-8 pad-left">
                        <label for="funcionario">Funcionário: </label>
                        <input type="text" name="funcionario" class="form-control input-sm" id="edt_fun" placeholder="Pesquisar Funcionário" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="data">Data: </label>
                        <input type="text" name="data" class="form-control input-sm data" id="edt_data" placeholder="xx/xx/xxxx" required>
                    </div>

                    <div class="col-sm-8 pad-left">
                        <label for="nome">Nome: </label>
                        <input type="text" name="nome" class="form-control input-sm" id="edt_nome" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="funcao">Função: </label>
                        <input type="text" name="funcao" class="form-control input-sm" id="edt_funcao" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="login">Login: </label>
                        <input type="text" name="login" class="form-control input-sm" id="edt_login" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="senha">Senha: </label>
                        <input type="password" name="senha" class="form-control input-sm" id="edt_senha" required>
                    </div>

                    <div class="col-sm-4 pad-left" >
                        <label for="">Situação: </label>
                        <div class="radio">
                            <label><input type="radio" name="situcao" value="1" checked="checked" id="edt_ativo">Ativo</label>
                            <label><input type="radio" name="situcao" value="2" id="edt_inativo">Inativo</label>
                        </div>
                    </div>
                    
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-sm">Editar</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    </div>

                </form>

                <div class="form-group" style="padding-bottom: 5px;">
                    <span class="text-danger">Todos os campos são obrigatorios.</span>
                </div>

            </div>

        </div> <!-- fim modal content -->

    </div>
</div> <!-- fim editar cadastro -->


@stop