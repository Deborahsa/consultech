<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Listagem</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/sweetalert.css">
    

    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/sweetalert.min.js"></script>
    
    <style>
        .menu{
            border-radius: 0;
        }
        .pad-left{
            padding-left: 0;
        }

        .tb_usuarios{
            height:400px;
            background-color: white;
            border-radius: 5px;
            overflow:auto;
        }

    </style>
</head>
<body>

    <nav class="navbar navbar-inverse menu">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">ConsulTech</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active dropdown"><a href="#"  class="dropdown-toggle" data-toggle="dropdown">Cadastro <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="/funcionarios">Funcionários</a></li>
                        <li><a href="/usuarios">Usuários</a></li>
                        <li><a href="#">Pacientes</a></li>
                    </ul>
                </li>

                <li class="dropdown"><a href="#"  class="dropdown-toggle" data-toggle="dropdown">Consultas <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Marcar Consulta</a></li>
                        <li><a href="#">Editar Consulta</a></li>
                        <li><a href="#">Finalizar Consulta</a></li>
                    </ul>
                </li>

                <li class="dropdown"><a href="#"  class="dropdown-toggle" data-toggle="dropdown">Escalas <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Criar Escala</a></li>
                        <li><a href="#">Editar Escala</a></li>
                        <li><a href="#">Cadastro de Escala</a></li>
                    </ul>
                </li>

                <li class="dropdown"><a href="#"  class="dropdown-toggle" data-toggle="dropdown">Relatórios <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Relatórios</a></li>
                        <li><a href="#">Receituários</a></li>
                        <li><a href="#">Atestados</a></li>
                    </ul>
                </li>
                
                <li><a href="#">Sobre</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i></span> Sair</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('conteudo')
    </div>


    <script>
$(document).ready(function(){

        //reseta o formulario de cadastro de usuario
        function reseta_usuario(){
            $("#novo_user").click(function(){
                $("#user_cadastro")[0].reset();
            });
        }

        //reseta o formulario de cadastro de Funcionario
        function reseta_funcionario(){
            $("#novo_fun").click(function(){
                $("#fun_cadastro")[0].reset();
            });
        }
        reseta_usuario();
        reseta_funcionario();
        //datepicker no formato brasileiro
        $(".data").datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });


    // preenche os campos para edicao
    $(".editar_user").click(function(){
        reseta_usuario();

        var id_usuario      = $(this).attr("usuario");
        var id_funcionario  = $(this).attr("id_funcionario");
        var data            = $(this).attr("data");
        var nome            = $(this).attr("nome");
        var login           = $(this).attr("login");
        var senha           = $(this).attr("senha");
        var funcao          = $(this).attr("funcao");
        var ativo           = $(this).attr("ativo");

        //
        $("#edt_id_u").val(id_usuario);
        $("#edt_fun").val(id_funcionario);
        $("#edt_data").val(data);
        $("#edt_nome").val(nome);
        $("#edt_funcao").val(funcao);
        $("#edt_login").val(login);
        $("#edt_senha").val(senha);

        if (ativo == 1) {
            $("#edt_ativo").attr("checked", true);                    
        } else {
            $("#edt_inativo").attr("checked", true);
        }
        $('#modal_editar').modal('show'); 
    });

    $(".editar_fun").click(function(){
        reseta_funcionario();

         var id_funcionario  = $(this).attr("id_funcionario");
        var nome            = $(this).attr("nome");
        var data_nacimento            = $(this).attr("data_nacimento");
        var endereco           = $(this).attr("endereco");
        var bairro           = $(this).attr("bairro");
        var cidade          = $(this).attr("cidade");
        var numero           = $(this).attr("numero");
        var telefone           = $(this).attr("telefone");
        var cpf           = $(this).attr("cpf");
        var rg          = $(this).attr("rg");
        var admissao         = $(this).attr("admissao");
        var funcao          = $(this).attr("funcao");
        var hora_trabalho          = $(this).attr("hora_trabalho");
        var crm           = $(this).attr("crm");
        var ativo           = $(this).attr("situcao");


        //
        $("#edt_id_funcionario").val(id_funcionario);
        $("#edt_nome").val(nome);
        $("#edt_data_nacimento").val(data_nacimento);
        $("#edt_endereco").val(endereco);
        $("#edt_bairro").val(bairro);
        $("#edt_cidade").val(cidade);
        $("#edt_numero").val(numero);
        $("#edt_telefone").val(telefone);
        $("#edt_cpf").val(cpf);
        $("#edt_rg").val(rg);
        $("#edt_admissao").val(admissao);
        $("#edt_funcao").val(funcao);
        $("#edt_hora_trabalho").val(hora_trabalho);
        $("#edt_crm").val(crm);

        if (ativo == 1) {
            $("#edt_ativo").attr("checked", true);                    
        } else {
            $("#edt_inativo").attr("checked", true);
        }
        
        $('#modal_editar').modal('show'); 
    });

    

    // $(".delete").click(function() {
    //         $(location).attr('href',$(this).attr("urlattr"));
    //     swal({
    //         title: "Are you sure?",
    //         text: "You will not be able to recover this imaginary file!",
    //         type: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#DD6B55",
    //         confirmButtonText: "Yes, delete it!",
    //         closeOnConfirm: false
    //     },
    //     function(){
    //         swal("Deleted!", "Your imaginary file has been deleted.", "success");
    //     });
    // });


    // $(".delete").on("click", function(){

    //     swal({
    //         title: "Are you sure?",
    //         text: "You will not be able to recover this imaginary file!",
    //         type: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#DD6B55",
    //         confirmButtonText: "Yes, delete it!",
    //         closeOnConfirm: false
    //     },
    //     function(){
    //         swal("Deleted!", "Your imaginary file has been deleted.", "success");
    //         $(location).attr('href',$(this).attr("urlattr"));
    //     });
    // });


});

    
</script>
</body>
</html>