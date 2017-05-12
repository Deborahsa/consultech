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
                <a class="navbar-brand" href="/">ConsulTech</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active dropdown"><a href="#"  class="dropdown-toggle" data-toggle="dropdown">Cadastro <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="/funcionarios">Funcionários</a></li>
                        <li><a href="/usuarios">Usuários</a></li>
                        <li><a href="/pacientes">Pacientes</a></li>
                        <li><a href="/funcoes">Funções</a></li>
                        <li><a href="/especialidades">Especialidades</a></li>
                        <li><a href="/salas">Salas</a></li>
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

        var id_usuario      = $(this).attr("id_usuario");
        var id_funcionario  = $(this).attr("id_funcionario");
        var login           = $(this).attr("login");
        var senha           = $(this).attr("senha");

        //
        $("#id_usuario").val(id_usuario);
        $("#id_funcionario").val(id_funcionario);
        $("#login").val(login);
        $("#senha").val(senha);

        $('#modal_cadastro').modal('show'); 
    });

    $(".editar_fun").click(function(){
        reseta_funcionario();

        // id_funcionario nome dt_nascimento cep endereco bairro cidade uf numero nome_mae nome_pai telefone celular cpf rg orga_emissor sexo estado_civil dt_adimissao id_funcao carga_horaria CRM ativo(ativo,inativo)

        

        var id_funcionario  = $(this).attr("id_funcionario");
        var nome            = $(this).attr("nome");
        var dt_nascimento            = $(this).attr("dt_nascimento");
        var cep            = $(this).attr("cep");
        var endereco           = $(this).attr("endereco");
        var bairro           = $(this).attr("bairro");
        var cidade          = $(this).attr("cidade");
        var uf          = $(this).attr("uf");
        var numero           = $(this).attr("numero");
        var nome_mae           = $(this).attr("nome_mae");
        var nome_pai           = $(this).attr("nome_pai");
        var telefone           = $(this).attr("telefone");
        var celular           = $(this).attr("celular");
        var cpf           = $(this).attr("cpf");
        var rg          = $(this).attr("rg");
        var orga_emissor         = $(this).attr("orga_emissor");
        var sexo         = $(this).attr("sexo");
        var estado_civil         = $(this).attr("estado_civil");
        var dt_adimissao         = $(this).attr("dt_adimissao");
        var id_funcao          = $(this).attr("id_funcao");
        var carga_horaria          = $(this).attr("carga_horaria");
        var CRM           = $(this).attr("CRM");
        var id_especialidade           = $(this).attr("id_especialidade");
        var ativo           = $(this).attr("ativo");
        

        
        $("#id_funcionario").val(id_funcionario);
        $("#nome").val(nome);
        $("#dt_nascimento").val(dt_nascimento);
        $("#cep").val(cep);
        $("#endereco").val(endereco);
        $("#bairro").val(bairro);
        $("#cidade").val(cidade);
        $("#uf").val(uf);
        $("#numero").val(numero);        
        $("#nome_mae").val(nome_mae);
        $("#nome_pai").val(nome_pai);
        $("#telefone").val(telefone);
        $("#celular").val(celular);
        $("#cpf").val(cpf);
        $("#rg").val(rg);
        $("#orga_emissor").val(orga_emissor);
        $("#sexo").val(sexo);
        $("#estado_civil").val(estado_civil);
        $("#dt_adimissao").val(dt_adimissao);
        $("#id_funcao").val(id_funcao);
        $("#carga_horaria").val(carga_horaria);
        $("#CRM").val(CRM);
        $("#id_especialidade").val(id_especialidade);


        if (ativo == 0) {
            $("#ativo").attr("checked", true);                    
        } else {
            $("#inativo").attr("checked", true);
        }
        
        $('#modal_cadastro').modal('show'); 
    });


    $(".editar_paci").click(function() {

        var id_paciente = $(this).attr('id_paciente');
        var nome_paciente = $(this).attr("nome_paciente");
        var dt_nascimento = $(this).attr('dt_nascimento');
        var endereco = $(this).attr('endereco');
        var bairro = $(this).attr('bairro');
        var cidade = $(this).attr('cidade');
        var uf = $(this).attr('uf');
        var nome_mae = $(this).attr('nome_mae');
        var nome_pai = $(this).attr('nome_pai');
        var telefone = $(this).attr('telefone');
        var celular = $(this).attr('celular');
        var cpf = $(this).attr('cpf');
        var rg = $(this).attr('rg');
        var orgao_emissor = $(this).attr('orgao_emissor');
        var dt_emissao = $(this).attr('dt_emissao');
        var sexo = $(this).attr('sexo');
        var estado_civil = $(this).attr('estado_civil');
        var dt_cadastro = $(this).attr('dt_cadastro');



        $("#id_paciente").val(id_paciente); 
        $("#nome_paciente").val(nome_paciente); 
        $("#dt_nascimento").val(dt_nascimento); 
        $("#endereco").val(endereco); 
        $("#bairro").val(bairro); 
        $("#cidade").val(cidade); 
        $("#uf").val(uf); 
        $("#nome_mae").val(nome_mae); 
        $("#nome_pai").val(nome_pai);  
        $("#telefone").val(telefone); 
        $("#celular").val(celular); 
        $("#cpf").val(cpf); 
        $("#rg").val(rg); 
        $("#orgao_emissor").val(orgao_emissor); 
        $("#dt_emissao").val(dt_emissao); 
        $("#estado_civil").val(estado_civil); 
        $("#dt_cadastro").val(dt_cadastro);


        if (sexo == "m") {
            $("#m").attr("checked", true);                    
        } else {
            $("#f").attr("checked", true);
        }
        
        $('#modal_cadastro').modal('show'); 

    });
    
    
    $(".editar_funcao").click(function() {

        var id_funcao = $(this).attr("id_funcao");
        var descricao = $(this).attr("descricao");

        $("#id_funcao").val(id_funcao);
        $("#descricao").val(descricao);

        
        $('#modal_cadastro').modal('show'); 

    });

    $(".editar_especialidade").click(function() {

        var id_especialidade = $(this).attr("id_especialidade");
        var descricao = $(this).attr("descricao");

        $("#id_especialidade").val(id_especialidade);
        $("#descricao").val(descricao);

        
        $('#modal_cadastro').modal('show'); 

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