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
                        <li><a href="#">Funcionários</a></li>
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
</body>
</html>