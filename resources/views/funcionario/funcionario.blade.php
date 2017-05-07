@extends('layout.principal')
@section('conteudo')

<?php 
$uf = array(    
    'AL' => 'AL',
    'AM' => 'AM',
    'AP' => 'AP',
    'BA' => 'BA',
    'CE' => 'CE',
    'DF' => 'DF',
    'ES' => 'ES',
    'GO' => 'GO',
    'MA' => 'MA',
    'MG' => 'MG',
    'MS' => 'MS',
    'MT' => 'MT',
    'PA' => 'PA',
    'PB' => 'PB',
    'PE' => 'PE',
    'PI' => 'PI',
    'PR' => 'PR',
    'RJ' => 'RJ',
    'RN' => 'RN',
    'RO' => 'RO',
    'RR' => 'RR',
    'RS' => 'RS',
    'SC' => 'SC',
    'SE' => 'SE',
    'SP' => 'SP',
    'TO' => 'TO'        
    );


    ?>


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
                              ativo(ativo,inativo)
                          -->

                          <?php foreach ($funcionarios as $key => $f): ?>
                            <tr>
                                <th>{{$f->nome}}</th>
                                <th>{{implode("/",array_reverse(explode("-",$f->dt_adimissao)))}}</th>
                                <th>{{$f->id_funcao}}</th>
                                <th>{{$f->carga_horaria}}</th>
                                <th>
                                    <a href="javascrip:void(0)" class="btn btn-warning btn-xs editar_fun" 
                                    id_funcionario="{{$f->id_funcionario}}" 
                                    nome="{{$f->nome}}" 
                                    dt_nascimento="{{implode('/',array_reverse(explode('-',$f->dt_nascimento)))}}" 
                                    cep="{{$f->cep}}"
                                    endereco="{{$f->endereco}}" 
                                    bairro="{{$f->bairro}}"
                                    cidade="{{$f->cidade}}"
                                    uf="{{$f->uf}}"
                                    numero="{{$f->numero}}"
                                    nome_mae="{{$f->nome_mae}}"
                                    nome_pai="{{$f->nome_pai}}"    
                                    telefone="{{$f->telefone}}"
                                    celular="{{$f->celular}}"
                                    cpf="{{$f->cpf}}"
                                    rg="{{$f->rg}}"       
                                    orga_emissor="{{$f->orga_emissor}}"
                                    sexo="{{$f->sexo}}"
                                    estado_civil="{{$f->estado_civil}}"
                                    dt_adimissao="{{implode('/',array_reverse(explode('-',$f->dt_adimissao)))}}"
                                    id_funcao="{{$f->id_funcao}}" 
                                    carga_horaria="{{$f->carga_horaria}}"
                                    CRM="{{$f->CRM}}" 
                                    id_especialidade="{{$f->id_especialidade}}" 
                                    ativo="{{$f->ativo}}">
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
        <div class="modal-dialog modal-lg">

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
                    id_funcionario nome dt_nascimento cep endereco bairro cidade uf numero nome_mae nome_pai telefone celular cpf rg orga_emissor sexo estado_civil dt_adimissao id_funcao carga_horaria CRM id_especialidade ativo(ativo,inativo)
                -->
                <div class="container-fluid">
                    
                    <form action="{{Route('cadastro_funcionario')}}" id="fun_cadastro" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="id_funcionario" id="id_funcionario">

                        <div class="col-sm-8 pad-left">
                            <label for="nome">Nome: </label>
                            <input type="text" name="nome" id="nome" class="form-control input-sm" required>
                        </div>

                        <div class="col-sm-4 pad-left">
                            <label for="dt_nascimento">Data de Nacimento: </label>
                            <input type="text" name="dt_nascimento" id="dt_nascimento" class="form-control input-sm data" placeholder="xx/xx/xxxx" required>
                        </div>
                        
                        <div class="col-sm-4 pad-left">
                            <label for="cep">cep: </label>
                            <input type="text" name="cep" id="cep" class="form-control input-sm" required>
                        </div>
                        
                        <div class="col-sm-4 pad-left">
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
                            <select name="uf" id="uf" class="form-control input-sm">
                                <?php foreach ($uf as $u): ?>
                                    <option value="{{$u}}">{{$u}}</option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="col-sm-4 pad-left">
                            <label for="numero">Numero: </label>
                            <input type="text" name="numero" id="numero" class="form-control input-sm" required>
                        </div>
                        
                        <div class="col-sm-4 pad-left">
                            <label for="nome_mae">Nome da Mãe: </label>
                            <input type="text" name="nome_mae" id="nome_mae" class="form-control input-sm" required>
                        </div>

                        <div class="col-sm-4 pad-left">
                            <label for="nome_pai">Nome da Pai: </label>
                            <input type="text" name="nome_pai" id="nome_pai" class="form-control input-sm" required>
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
                            <label for="orga_emissor">Órgão Emissor: </label>
                            <input type="text" name="orga_emissor" id="orga_emissor" class="form-control input-sm" required>
                        </div>
                        
                        <div class="col-sm-4 pad-left">
                            <label for="sexo">Sexo: </label>
                            <select name="sexo" id="sexo" class="form-control input-sm">
                                <option value="m">Masculino</option>
                                <option value="f">Feminino</option>
                            </select>
                        </div>
                        
                        <div class="col-sm-4 pad-left">
                            <label for="estado_civil">Estado Civil: </label>
                            <select name="estado_civil" id="estado_civil" class="form-control input-sm">
                                <option value="1">Solteiro</option>
                                <option value="2">Casado</option>
                            </select>
                        </div>
                        
                        <div class="col-sm-4 pad-left">
                            <label for="dt_adimissao">Data Admissão: </label>
                            <input type="text" name="dt_adimissao" id="dt_adimissao" class="form-control input-sm data" required>
                        </div>
                        
                        <div class="col-sm-4 pad-left">
                            <label for="id_funcao">Função: </label>
                            <select name="id_funcao" id="id_funcao" class="form-control input-sm">
                                <option value="1">funcao 01</option>
                                <option value="2">funcao 02</option>
                            </select>
                        </div>

                        <div class="col-sm-4 pad-left">
                            <label for="id_especialidade">Especialidade: </label>
                            <select name="id_especialidade" id="id_especialidade" class="form-control input-sm">
                                <option value="1">Especialidade 01</option>
                                <option value="2">Especialidade 02</option>
                            </select>
                        </div>
                        
                        <div class="col-sm-4 pad-left">
                            <label for="carga_horaria">Carga Horária: </label>
                            <input type="text" name="carga_horaria" id="carga_horaria" class="form-control input-sm" required>
                        </div>

                        <div class="col-sm-4 pad-left">
                            <label for="CRM">CRM: </label>
                            <input type="text" name="CRM" id="CRM" class="form-control input-sm" required>
                        </div>

                        <div class="col-sm-4 pad-left" >
                            <label for="ativo">Situação: </label>
                            <div class="radio">
                                <label><input type="radio" name="ativo" id="ativo" value="0" checked="checked">Ativo</label>
                                <label><input type="radio" name="ativo" id="inativo" value="1">Inativo</label>
                            </div>
                        </div>
                        
                        <div class="modal-footer col-sm-12">
                            <span class="text-danger pull-left">Todos os campos são obrigatorios.</span>
                            <button type="submit" class="btn btn-primary btn-sm">Incluir</button>
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        </div>

                    </form>

                </div>

            </div>

        </div> <!-- fim modal content -->

    </div>
</div> <!-- fim modal cadastro -->


@stop