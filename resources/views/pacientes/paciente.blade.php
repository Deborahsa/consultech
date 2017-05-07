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
                    <th style="width:30%;">Nome</th>
                    <th style="width:20%;">Endereço</th>
                    <th style="width:20%;">Telefone</th>
                    <th style="width:15%;">CPF</th>
                    <th style="width:15%;">RG</th>
                    <th style="width:5%;">Ações</th>
                </tr>
            </thead>
            <tbody>
            <!--
                Não implementar o php na tela de cadastro
                JOÃO
            -->

          
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
                <h4 class="modal-title">Cadastrar Paciente</h4>
            </div>
            <div class="modal-body">
                    <!--
                        João-> deixar as ACTION em branco
                            -mudar id em paciente para pac_cadastro
                            -mudar as informções da tela de cadastro de usuario
                            action="{{Route('cadastro_funcionario')}}"
                    -->
                <form  id="pac_cadastro" method="post">
                	<!--O que é isso ?? - João-->
                	<!-- Nome dos imputs igual ao das tabelas do banco -->

                    {{ csrf_field() }}
                    <div class="col-sm-8 pad-left">
                        <label for="nome">Nome: </label>
                        <input type="text" name="nome" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="data">Data de Nacimento: </label>
                        <input type="text" name="data_nacimento" class="form-control input-sm data" placeholder="xx/xx/xxxx" required>
                    </div>

                    <div class="col-sm-8 pad-left">
                        <label for="endereco">Endereço: </label>
                        <input type="text" name="endereco" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="bairro">Bairro: </label>
                        <input type="text" name="bairro" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="cidade">Cidade: </label>
                        <input type="text" name="cidade" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="uf">UF: </label>
                        <input type="text" name="uf" class="form-control input-sm" required>
                    </div>


                    <div class="col-sm-4 pad-left">
                        <label for="telefone">Telefone: </label>
                        <input type="text" name="telefone" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="celular">Celular: </label>
                        <input type="text" name="celular" class="form-control input-sm" required>
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
                        <label for="orgao_emissor">Emissor </label>
                        <input type="text" name="orgao_emissor" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="data_emissao">Data de Emissão: </label>
                        <input type="text" name="data_emissao" class="form-control input-sm data" placeholder ="xx/xx/xxxx"required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="estado_civil">Estado Civil: </label>
                        <input type="text" name="estado_civil_" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="data_cadastro">Data de Cadastro </label>
                        <input type="text" name="data_cadastro" class="form-control input-sm data" placeholder="xx/xx/xxxx" required>
                    </div>

                    <div class="col-sm-8 pad-left">
                        <label for="nome_mae">Nome da Mãe: </label>
                        <input type="text" name="nome_mae" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left" >
                        <label for="sexo">Sexo: </label>
                        <div class="radio">
                            <label><input type="radio" name="sexo" value="1" checked="checked">Masculino</label>
                            <label><input type="radio" name="sexo" value="2">Feminino</label>
                        </div>
                    </div>



                    <div class="col-sm-8 pad-left">
                        <label for="nome_pai">Nome da Pai: </label>
                        <input type="text" name="nome_pai" class="form-control input-sm" required>
                    </div>                    
                    
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-sm">Incluir</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Sair</button>
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
                <h4 class="modal-title">Editar Paciente</h4>
            </div>
            <div class="modal-body">

            	<!--
				action="{{Route('cadastro_funcionario')}}"
				retirar action do form de editar
            	-->

             <form  id="pac_cadastro" method="post">
                	<!--O que é isso ?? - João-->
                	<!-- Nome dos imputs igual ao das tabelas do banco -->

                    {{ csrf_field() }}
                    <div class="col-sm-8 pad-left">
                        <label for="nome">Nome: </label>
                        <input type="text" name="nome" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="data">Data de Nacimento: </label>
                        <input type="text" name="data_nacimento" class="form-control input-sm data" placeholder="xx/xx/xxxx" required>
                    </div>

                    <div class="col-sm-8 pad-left">
                        <label for="endereco">Endereço: </label>
                        <input type="text" name="endereco" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="bairro">Bairro: </label>
                        <input type="text" name="bairro" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="cidade">Cidade: </label>
                        <input type="text" name="cidade" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="uf">UF: </label>
                        <input type="text" name="uf" class="form-control input-sm" required>
                    </div>


                    <div class="col-sm-4 pad-left">
                        <label for="telefone">Telefone: </label>
                        <input type="text" name="telefone" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="celular">Celular: </label>
                        <input type="text" name="celular" class="form-control input-sm" required>
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
                        <label for="orgao_emissor">Emissor </label>
                        <input type="text" name="orgao_emissor" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="data_emissao">Data de Emissão: </label>
                        <input type="text" name="data_emissao" class="form-control input-sm data" placeholder ="xx/xx/xxxx"required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="estado_civil">Estado Civil: </label>
                        <input type="text" name="estado_civil_" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left">
                        <label for="data_cadastro">Data de Cadastro </label>
                        <input type="text" name="data_cadastro" class="form-control input-sm data" placeholder="xx/xx/xxxx" required>
                    </div>

                    <div class="col-sm-8 pad-left">
                        <label for="nome_mae">Nome da Mãe: </label>
                        <input type="text" name="nome_mae" class="form-control input-sm" required>
                    </div>

                    <div class="col-sm-4 pad-left" >
                        <label for="sexo">Sexo: </label>
                        <div class="radio">
                            <label><input type="radio" name="sexo" value="1" checked="checked">Masculino</label>
                            <label><input type="radio" name="sexo" value="2">Feminino</label>
                        </div>
                    </div>

                    <div class="col-sm-8 pad-left">
                        <label for="nome_pai">Nome da Pai: </label>
                        <input type="text" name="nome_pai" class="form-control input-sm" required>
                    </div>

                    
                    
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-sm">Incluir</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Sair</button>
                    </div>

                </form>

                <div class="form-group" style="padding-bottom: 5px;">
                    <span class="text-danger">Todos os campos são obrigatorios.</span>
                </div>


<!--limite-->
            </div>

        </div> <!-- fim modal content -->

    </div>
</div> <!-- fim editar cadastro -->






</div>
@stop