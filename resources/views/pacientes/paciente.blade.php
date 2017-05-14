@extends('layout.principal')
@section('conteudo')
<div class="row">
    <form action="/pacientes">

        <div class="form-group col-sm-6 ">
            <input type="text" name="busca" class="form-control input-sm" placeholder="Pesquisa por nome">
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary btn-sm">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-warning btn-sm pull-right" id="novo_fun" data-toggle="modal" data-target="#modal_cadastro">Novo</button>
        </div>

    </form>
    <!--
		Layout da tabela de usuarios do layout principal
    -->
    <div class="col-sm-12 tb_usuarios">

        <h3>Pacientes</h3>

        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th style="width:25%;">Nome</th>
                    <th style="width:20%;">Endereço</th>
                    <th style="width:15%;">Telefone</th>
                    <th style="width:15%;">CPF</th>
                    <th style="width:15%;">RG</th>
                    <th style="width:10%;">Ações</th>
                </tr>
            </thead>
            <tbody>
            <!--
                Não implementar o php na tela de cadastro
                JOÃO
                `id_paciente``nome_paciente``dt_nascimento``endereco``bairro``cidade``uf``nome_mae``nome_pai``telefone``celular``cpf``rg``orgao_emissor``dt_emissao``sexo``estado_civil``dt_cadastro`
            -->
            <?php foreach ($pacientes  as $p): ?>
                <tr>
                    <td>{{$p->nome_paciente}}</td>
                    <td>{{$p->endereco}}</td>
                    <td>{{$p->telefone}}</td>
                    <td>{{$p->cpf}}</td>
                    <td>{{$p->rg}}</td>
                    <td>
                        <a href="javascrip:void(0)" class="btn btn-warning btn-xs editar_paci" 
                        id_paciente="{{$p->id_paciente}}"
                        nome_paciente="{{$p->nome_paciente}}"
                        dt_nascimento="{{implode('/',array_reverse(explode('-',$p->dt_nascimento)))}}"
                        endereco="{{$p->endereco}}"
                        bairro="{{$p->bairro}}"
                        cidade="{{$p->cidade}}"
                        uf="{{$p->uf}}"
                        nome_mae="{{$p->nome_mae}}"
                        nome_pai="{{$p->nome_pai}}"
                        telefone="{{$p->telefone}}"
                        celular="{{$p->celular}}"
                        cpf="{{$p->cpf}}"
                        rg="{{$p->rg}}"
                        orgao_emissor="{{$p->orgao_emissor}}"
                        dt_emissao="{{implode('/',array_reverse(explode('-',$p->dt_emissao)))}}"
                        sexo="{{$p->sexo}}"
                        estado_civil="{{$p->estado_civil}}"
                        dt_cadastro="{{implode('/',array_reverse(explode('-',$p->dt_cadastro)))}}"
                        >
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <a href="{{route('excluir_paciente')}}?id_paciente={{$p->id_paciente}}" class="btn btn-danger btn-xs delete">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

</div>

</div>

</div>


<!-- Modal cadastro-->
<div class="modal fade" id="modal_cadastro" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cadastrar Paciente</h4>
            </div>
            <form action="{{Route('cadastro_paciente')}}" id="pac_cadastro" method="post">
                    <!--
                        João-> deixar as ACTION em branco
                            -mudar id em paciente para pac_cadastro
                            -mudar as informções da tela de cadastro de usuario
                            action="{{Route('cadastro_funcionario')}}"

                        -->
                    <div class="modal-body">
                        <div class="container-fluid">
                               <!--O que é isso ?? - João-->
                               <!-- Nome dos imputs igual ao das tabelas do banco -->

                               {{ csrf_field() }}
                               <input type="hidden" name="id_paciente" id="id_paciente">

                            <div class="col-sm-8 pad-left">
                                <label for="nome_paciente">Nome: </label>
                                <input type="text" name="nome_paciente" id="nome_paciente" class="form-control input-sm" required>
                            </div>

                            <div class="col-sm-4 pad-left">
                                <label for="dt_nascimento">Data de Nacimento: </label>
                                <input type="text" name="dt_nascimento" id="dt_nascimento" class="form-control input-sm data" placeholder="xx/xx/xxxx" required>
                            </div>

                            <div class="col-sm-8 pad-left">
                                <label for="endereco">Endereço: </label>
                                <input type="text" name="endereco" id="endereco" class="form-control input-sm" required>
                            </div>

                            <div class="col-sm-4 pad-left">
                                <label for="bairro">Bairro: </label>
                                <input type="text" name="bairro" id="bairro" class="form-control input-sm" required>
                            </div>

                            <div class="col-sm-4 pad-left">
                                <label for="cidade">Cidade: </label>
                                <input type="text" name="cidade" id="cidade" class="form-control input-sm" required>
                            </div>

                            <div class="col-sm-4 pad-left">
                                <label for="uf">UF: </label>
                                <input type="text" name="uf" id="uf" class="form-control input-sm" required>
                            </div>


                            <div class="col-sm-4 pad-left">
                                <label for="telefone">Telefone: </label>
                                <input type="text" name="telefone" id="telefone" class="form-control input-sm" required>
                            </div>

                            <div class="col-sm-4 pad-left">
                                <label for="celular">Celular: </label>
                                <input type="text" name="celular" id="celular" class="form-control input-sm" required>
                            </div>

                            <div class="col-sm-4 pad-left">
                                <label for="cpf">CPF: </label>
                                <input type="text" name="cpf" id="cpf" class="form-control input-sm" required>
                            </div>

                            <div class="col-sm-4 pad-left">
                                <label for="rg">RG: </label>
                                <input type="text" name="rg" id="rg" class="form-control input-sm" required>
                            </div>

                            <div class="col-sm-4 pad-left">
                                <label for="orgao_emissor">Emissor </label>
                                <input type="text" name="orgao_emissor" id="orgao_emissor" class="form-control input-sm" required>
                            </div>

                            <div class="col-sm-4 pad-left">
                                <label for="dt_emissao">Data de Emissão: </label>
                                <input type="text" name="dt_emissao" id="dt_emissao" class="form-control input-sm data" placeholder ="xx/xx/xxxx"required>
                            </div>

                            <div class="col-sm-4 pad-left">
                                <label for="estado_civil">Estado Civil: </label>
                                <input type="text" name="estado_civil" id="estado_civil" class="form-control input-sm" required>
                            </div>

                            <div class="col-sm-4 pad-left">
                                <label for="dt_cadastro">Data de Cadastro </label>
                                <input type="text" name="dt_cadastro" id="dt_cadastro" class="form-control input-sm data" placeholder="xx/xx/xxxx" required>
                            </div>

                            <div class="col-sm-8 pad-left">
                                <label for="nome_mae">Nome da Mãe: </label>
                                <input type="text" name="nome_mae" id="nome_mae" class="form-control input-sm" required>
                            </div>

                            <div class="col-sm-4 pad-left" >
                                <label for="sexo">Sexo: </label>
                                <div class="radio">
                                    <label><input type="radio" name="sexo" id="m" value="m" checked="checked">Masculino</label>
                                    <label><input type="radio" name="sexo" id="f" value="f">Feminino</label>
                                </div>
                            </div>

                            <div class="col-sm-8 pad-left">
                                <label for="nome_pai">Nome da Pai: </label>
                                <input type="text" name="nome_pai" id="nome_pai" class="form-control input-sm" required>
                            </div>                    


                            <div class="modal-footer col-sm-12">
                                <span class="text-danger pull-left">Todos os campos são obrigatorios.</span>

                                <button type="submit" class="btn btn-primary btn-sm">Incluir</button>
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Sair</button>
                            </div>


                        </div> <!-- fim container-fluid -->
                    </div> <!-- fim modal-body -->

                </form>

            </div> <!-- fim modal content -->

        </div>
    </div> <!-- fim modal cadastro -->

    @stop