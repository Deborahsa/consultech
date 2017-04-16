@extends('layout.principal')
@section('conteudo')
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">

        <form action="">
            <fieldset>
                <legend>Cadastro de Usuario</legend>    
                <div class="col-sm-6 pad-left">
                    <label for="funcionario">Funcionário: </label>
                    <input type="text" name="funcionario" class="form-control input-sm" placeholder="Pesquisar Funcionário">
                </div>

                <div class="col-sm-6 pad-left">
                    <div class="col-sm-6">
                        <label for="data">Data: </label>
                        <input type="text" name="data" class="form-control input-sm" placeholder="xx/xx/xxxx">
                    </div>
                </div>

                <div class="col-sm-6 pad-left">
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome" class="form-control input-sm" required>
                </div>

                <div class="col-sm-6 pad-left">
                    <div class="col-sm-6">
                        <label for="funcao">Função: </label>
                        <input type="text" name="funcao" class="form-control input-sm" required>
                    </div>
                </div>

                <div class="col-sm-4 pad-left">
                    <label for="login">Login: </label>
                    <input type="text" name="login" class="form-control input-sm" required>
                </div>

                <div class="col-sm-4 pad-left">
                    <label for="senha">Senha: </label>
                    <input type="password" name="senha" class="form-control input-sm">
                </div>

                <div class="col-sm-4 pad-left" style="padding-top: 15px;">
                    <div class="radio">
                        <label for="">Situação: </label>
                        <label><input type="radio" name="situcao" value="1" checked="checked">Ativo</label>
                        <label><input type="radio" name="situcao" value="2">Inativo</label>
                    </div>
                </div>

                <div class="col-sm-12 pad-left" style="padding-top: 15px;">
                    <button type="submit" class="btn btn-primary btn-sm">Incluir</button>
                    <button type="button" class="btn btn-warning btn-sm">Cancelar</button>
                </div>

            </fieldset>
        </form>

    </div>
</div>
@stop