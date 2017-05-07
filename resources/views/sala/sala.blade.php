@extends('layout.principal')
@section('conteudo')
<div class="row">
	<form action="/sala">

        <div class="form-group col-sm-6 ">
            <input type="text" name="busca" class="form-control input-sm" placeholder="Pesquisa por nome">
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary btn-sm">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-warning btn-sm pull-right" id="novo_fun" data-toggle="modal" data-target="#modal_cadastro">Novo</button>
        </div>

    </form>

    <div class="col-sm-12 tb_usuarios">

        <h3>Salas</h3>

        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th style="width:15%;">Identificador</th>
                    <th style="width:60%;">Nome</th>      
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
                <h4 class="modal-title">Cadastrar Salas</h4>
            </div>
            <div class="modal-body">
                    <!--
                        João-> deixar as ACTION em branco
                            -mudar id em paciente para pac_cadastro
                            -mudar as informções da tela de cadastro de usuario
                            action="{{Route('cadastro_funcionario')}}"
                    -->
                <form  id="sala_cadastro" method="post">
                	<!--O que é isso ?? - João-->
                	<!-- Nome dos imputs igual ao das tabelas do banco -->

                    {{ csrf_field() }}
                    <div class="col-sm-8 pad-left">
                        <label for="descricao">Nome: </label>
                        <input type="text" name="descricao" class="form-control input-sm" required>
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
                <h4 class="modal-title">Editar Salas</h4>
            </div>
            <div class="modal-body">

            	<!--
				action="{{Route('cadastro_funcionario')}}"
				retirar action do form de editar
            	-->

             <form  id="salas_cadastro" method="post">
                	<!--O que é isso ?? - João-->
                	<!-- Nome dos imputs igual ao das tabelas do banco -->

                    {{ csrf_field() }}
                    <div class="col-sm-8 pad-left">
                        <label for="descricao">Nome: </label>
                        <input type="text" name="descricao" class="form-control input-sm" required>
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