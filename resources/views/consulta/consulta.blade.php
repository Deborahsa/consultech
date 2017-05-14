@extends('layout.principal')
@section('conteudo')
<style>
    .alert-sm{
    padding-bottom: 5px;
    padding-top: 5px;
    padding-left: 20px;
    padding-right: 20px;
    }
</style>


<div class="row">

    <form action="/consultas">

        <div class="form-group col-sm-6 ">
            <input type="text" name="busca" class="form-control input-sm" placeholder="Pesquisa por nome">
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary btn-sm">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-warning btn-sm pull-right" id="novo_fun" data-toggle="modal" data-target="#modal_cadastro">Novo</button>
        </div>

    </form>

    <div class="col-md-12 tb_usuarios">
        <h3>Consultas</h3>
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th width="10%">Identificador</th>
                    <th width="80%">Salas</th>
                    <th width="10%">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="javascrip:void(0)" class="btn btn-warning btn-xs editar_sala" id_sala="" descricao="">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>

                        <a href="{{route('excluir_sala')}}?id_sala=" class="btn btn-danger btn-xs delete">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
                
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
                <h4 class="modal-title">Cadastrar Salas</h4>
            </div>
            <form action="{{Route('cadastro_sala')}}" id="sala_cadastro" method="post">
                <div class="modal-body">
                    <div class="container-fluid">

                        {{ csrf_field() }}
                        <input type="hidden" name="id_sala" id="id_sala">

                        <div class="col-sm-8 pad-left">
                            <label for="descricao">Paciente: </label>
                            <input type="text" name="descricao" id="descricao" class="form-control input-sm" required>
                        </div>

                        <div class="col-sm-4 pad-left">
                            <label for="descricao">Sala: </label>
                            <input type="text" name="descricao" id="descricao" class="form-control input-sm" required>
                        </div>

                        <div class="col-sm-8 pad-left">
                            <label for="descricao">Mediaco: </label>
                            <input type="text" name="descricao" id="descricao" class="form-control input-sm" required>
                        </div>

                        <div class="col-sm-4 pad-left">
                            <label for="descricao">Data Consulta: </label>
                            <input type="text" name="descricao" id="descricao" class="form-control input-sm" required>
                        </div>

                        <div class="col-sm-4 pad-left">
                            <label for="descricao">Status: </label>
                        <br>
                    <?php if (true): ?>
                                <span class="alert-sm alert-success text-center">Ativa</span>
                    <?php else: ?>
                                <span class="alert-sm alert-danger text-center">Cancelada</span>
                    <?php endif ?>
                        </div>

                        <div class="col-sm-offset-4 col-sm-4 pad-left">
                            <label for="descricao">Hora Atendimento: </label>
                            <input type="text" name="descricao" id="descricao" class="form-control input-sm" required>
                        </div>


                    <?php if (false): ?>
                        <div class="col-sm-12 pad-left">
                            <label for="descricao">Descricao principal: </label>
                            <textarea name="descricao" id="descricao" class="form-control input-sm"></textarea>

                        </div>

                        <div class="col-sm-4 pad-left">
                            <label for="descricao">Peso: </label>
                            <input type="text" name="descricao" id="descricao" class="form-control input-sm" required>
                        </div>

                        <div class="col-sm-4 pad-left">
                            <label for="descricao">Altura: </label>
                            <input type="text" name="descricao" id="descricao" class="form-control input-sm" required>
                        </div>

                        <div class="col-sm-4 pad-left">
                            <label for="descricao">Status Alergico: </label>
                            <input type="text" name="descricao" id="descricao" class="form-control input-sm" required>
                        </div>

                        <div class="col-sm-6 pad-left">
                            <label for="descricao">Descricao Alergia: </label>
                            <textarea name="descricao" id="descricao" class="form-control input-sm"></textarea>

                        </div>

                        <div class="col-sm-6 pad-left">
                            <label for="descricao">Observacoes gerais : </label>
                            <textarea name="descricao" id="descricao" class="form-control input-sm"></textarea>
                            
                        </div>
                        
                    <?php endif ?>

                    <?php if (false): ?>
                        <div class="col-sm-8 pad-left form-group has-error">
                            <label for="descricao" class="text-danger">Motivo Cancelamento: </label>
                            <textarea name="descricao" id="descricao" class="form-control input-sm "></textarea>
                        </div>
                            
                        <div class="col-sm-4 pad-left form-group has-error">
                            <label for="descricao" class="text-danger">Data Cancelamento: </label>
                            <input type="text" name="descricao" id="descricao" class="form-control input-sm" required>
                        </div>
                    <?php endif ?>

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