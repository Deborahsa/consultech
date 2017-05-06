@extends('layout.principal')
@section('conteudo')
<div class="row">
    <form action="/funcionarios">

        <div class="form-group col-sm-6 ">
            <input type="text" name="busca" class="form-control input-sm" placeholder="Pesquisa por nome">
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary btn-sm">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-warning btn-sm pull-right" id="novo_fun" data-toggle="modal" data-target="#modal_cadastro">Novo</button>
        </div>

    </form>
    <div class="col-sm-12 tb_usuarios">

        <h3>Funcionarios</h3>

        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th style="width:30%;">Nome</th>
                    <th style="width:20%;">Admissão</th>
                    <th style="width:20%;">Função</th>
                    <th style="width:20%;">Horário de Trabalho</th>
                    <th style="width:5%;">Ações</th>
                </tr>
            </thead>
            <tbody>
            <!--
                Não implementar o php na tela de cadastro
                JOÃO
            -->

            <?php foreach ($funcionarios as $key => $f): ?>
                    <tr>
                        <th>{{$f->nome}}</th>
                        <th>{{$f->admissao}}</th>
                        <th>{{$f->funcao}}</th>
                        <th>{{$f->horario_trabalho}}</th>
                        <th>
                        <a href="javascrip:void(0)" class="btn btn-warning btn-xs editar_fun" 
                            id_funcionario="{{$f->id_funcionario}}" 
                            nome="{{$f->nome}}" 
                            data_nacimento="{{$f->data_nacimento}}" 
                            endereco="{{$f->endereco}}" 
                            bairro="{{$f->bairro}}"
                            cidade="{{$f->cidade}}" 
                            numero="{{$f->numero}}"
                            telefone="{{$f->telefone}}" 
                            cpf="{{$f->cpf}}"
                            rg="{{$f->rg}}" 
                            admissao="{{$f->admissao}}"
                            funcao="{{$f->funcao}}" 
                            hora_trabalho="{{$f->horario_trabalho}}"
                            crm="{{$f->crm}}" 
                            situcao="{{$f->ativo}}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a href="{{Route('excluir_funcionario')}}?id={{$f->id_funcionario}}}" class="btn btn-danger btn-xs">
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
                <h4 class="modal-title">Cadastrar Funcionario</h4>
            </div>
            <div class="modal-body">
                    <!--
                        João-> deixar as ACTION em branco
                            -mudar id em paciente para pac_cadastro
                            -mudar as informções da tela de cadastro de usuario
                    -->
                <form action="{{Route('cadastro_funcionario')}}" id="fun_cadastro" method="post">
                    {{ csrf_field() }}
                    <div class="col-sm-8 pad-left">
                        <label for="nome">Nome: </label>
                        <input type="text" name="nome" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="data">Data de Nacimento: </label>
                        <input type="text" name="data_nacimento" class="form-control input-sm data" placeholder="xx/xx/xxxx" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="endereco">Endereço: </label>
                        <input type="text" name="endereco" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="bairro">Beirro: </label>
                        <input type="text" name="bairro" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="cidade">Cidade: </label>
                        <input type="text" name="cidade" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="numero">Numero: </label>
                        <input type="text" name="numero" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="telefone">Telefone: </label>
                        <input type="text" name="telefone" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="cpf">CPF: </label>
                        <input type="text" name="cpf" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="rg">RG: </label>
                        <input type="text" name="rg" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="admissao">Admissão: </label>
                        <input type="text" name="admissao" class="form-control input-sm data" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="funcao">Função: </label>
                        <input type="text" name="funcao" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="hora_trabalho">Horáro de Trabalho: </label>
                        <input type="text" name="hora_trabalho" class="form-control input-sm data" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="crm">CRM: </label>
                        <input type="text" name="crm" class="form-control input-sm" required>
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

                <form action="{{Route('cadastro_funcionario')}}" id="fun_cadastro" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_funcionario" id="edt_id_funcionario">
                    <div class="col-sm-8 pad-left">
                        <label for="nome">Nome: </label>
                        <input type="text" name="nome" id="edt_nome" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="data">Data de Nacimento: </label>
                        <input type="text" name="data_nacimento" id="edt_data_nacimento" class="form-control input-sm data" placeholder="xx/xx/xxxx" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="endereco">Endereço: </label>
                        <input type="text" name="endereco" id="edt_endereco" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="bairro">Beirro: </label>
                        <input type="text" name="bairro" id="edt_bairro" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="cidade">Cidade: </label>
                        <input type="text" name="cidade" id="edt_cidade" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="numero">Numero: </label>
                        <input type="text" name="numero" id="edt_numero" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="telefone">Telefone: </label>
                        <input type="text" name="telefone" id="edt_telefone" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="cpf">CPF: </label>
                        <input type="text" name="cpf" id="edt_cpf" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="rg">RG: </label>
                        <input type="text" name="rg" id="edt_rg" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="admissao">Admissão: </label>
                        <input type="text" name="admissao" id="edt_admissao" class="form-control input-sm data" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="funcao">Função: </label>
                        <input type="text" name="funcao" id="edt_funcao" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="hora_trabalho">Horáro de Trabalho: </label>
                        <input type="text" name="hora_trabalho" id="edt_hora_trabalho" class="form-control input-sm data" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="crm">CRM: </label>
                        <input type="text" name="crm" id="edt_crm" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left" >
                        <label for="">Situação: </label>
                        <div class="radio">
                            <label><input type="radio" name="situcao" id="edt_ativo" value="1" checked="checked">Ativo</label>
                            <label><input type="radio" name="situcao" id="edt_inativo" value="2">Inativo</label>
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
</div> <!-- fim editar cadastro -->


       


@stop