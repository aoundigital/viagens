<!doctype html>
<html lang="pt_br">
<head>
<title>DashBoard</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="author" content="Ricardo Aoun">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="{{ 'http://127.0.0.1:8000/css/estilo.css' }}" />
</head>
<body>

<div id="body" class="theme-cyan">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{'http://127.0.0.1:8000/images/logo.png'}}" width="220" height="114" alt="Ventura"></div>
            <p>Aguarde...</p>
        </div>
    </div>

    <div id="wrapper">
    <!-- MENU -->
        <!-- Menu de Cima -->
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-left">
                    <h3>@yield('title')</h3>
                    <div class="navbar-btn">
                        <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-align-left"></i></button>
                    </div>
                </div>

                <div class="navbar-right">
                    <div id="navbar-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown hidden-xs">
                                <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">Criar</a>
                                <div class="dropdown-menu pb-0 mt-0">
                                    <a class="dropdown-item pt-2 pb-2" href="{{ route('registrar') }}">Usuario</a>
                                    <a class="dropdown-item pt-2 pb-2" href="{{ route('viagens.criar') }}">Viagem</a>
                                    <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);">Propriedade</a>
                                    <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);">Equipamento</a>
                                </div>
                            </li>
                            <li class="hidden-xs"><a href="javascript:void(0);" id="btnFullscreen" class="icon-menu"><i class="fa fa-arrows-alt"></i></a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{-- {{ __('Log Out') }} --}}
                                        <i class="fa fa-power-off"></i>
                                    </x-jet-dropdown-link>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>
        <!-- Menu Lateral -->
        <div id="left-sidebar" class="sidebar">
            {{-- <a href="#" class="menu_toggle"><i class="fa fa-angle-left"></i></a> --}}
            <div class="navbar-brand">
                <img src="{{'http://127.0.0.1:8000/images/logo.png'}}" alt="Logotipo" class="img-fluid logo">
                <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="fa fa-close"></i></button>
            </div>
            <div class="sidebar-scroll">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu">
                        <li class="header">Páginas</li>
                        <li class="{{ (request()->is('viagens')) ? 'active' : '' }}">
                            <a href="{{ route('viagens.index') }}"><i class="fa fa-map-marker"></i><span>Viagens</span></a>
                        </li>
                        <li class="{{ (request()->is('viagens/criar')) ? 'active' : '' }}">
                            <a href="{{ route('viagens.criar') }}"><i class="fab fa-avianex"></i><span>Nova Viagem</span></a>
                        </li>
                        <li class="{{ (request()->is('propriedades')) ? 'active' : '' }}">
                            <a href="{{ route('propriedades.index') }}"><i class="fa fa-home"></i> <span>Propriedades</span></a>
                        </li>
                        <li class="{{ (request()->is('socios')) ? 'active' : '' }}">
                            <a href="{{ route('socios.index') }}"><i class="fa fa-window-restore"></i> <span>Avaliadores</span></a>
                        </li>
                        <li>
                            <a href="#charts" class="has-arrow"><i class="fa fa-arrows-v"></i><span>Relatórios</span></a>
                            <ul>
                                <li><a href="#">Gráfico 1</a></li>
                                <li><a href="#">Gráfico 2</a></li>
                                <li><a href="#">Gráfico 3</a></li>
                                <li><a href="#">Gráfico 4</a></li>
                                <li><a href="#">Gráfico 5</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    <!-- FINAL MENU -->

        <!-- Conteúdo  -->
        <div id="main-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

    </div>
</div>

<!-- Javascript -->
<script src=" {{ 'http://127.0.0.1:8000/js/libscripts.bundle.js' }} "></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src=" {{ 'http://127.0.0.1:8000/js/vendorscripts.bundle.js' }} "></script>
<script src=" {{ 'http://127.0.0.1:8000/js/mainscripts.bundle.js' }} "></script>
</body>
</html>
