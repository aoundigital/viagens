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
<link rel="stylesheet" href="{!! '../css/app.css' !!}" />
</head>
<body>
<div id="body" class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{'../images/logo.png'}}" width="220" height="114" alt="Ventura"></div>
            <p>Aguarde...</p>
        </div>
    </div>
    <div id="wrapper">
    <!-- MENU -->
        <!-- Menu de Cima -->
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-left">
                    <h3 class="azul">@yield('title')</h3>
                    <div class="navbar-btn">
                        <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-align-left"></i></button>
                    </div>
                </div>

                <div class="navbar-right">
                    <div id="navbar-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown hidden-xs">
                                <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">Create</a>
                                <div class="dropdown-menu pb-0 mt-0">
                                    <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);">User</a>
                                    <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);">Product</a>
                                    <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);">Category</a>
                                    <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);">Report</a>
                                </div>
                            </li>
                            <li class="hidden-xs"><a href="javascript:void(0);" id="btnFullscreen" class="icon-menu"><i class="fa fa-arrows-alt"></i></a></li>
                            <li><a href="page-login.html" class="icon-menu"><i class="fa fa-power-off"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>

        <!-- Menu Lateral -->
        <div id="left-sidebar" class="sidebar">
            <div class="navbar-brand">
                <img src="{{'../images/logo.png'}}" alt="Logotipo" class="img-fluid logo">
                <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="fa fa-close"></i></button>
            </div>
            <div class="sidebar-scroll">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu">
                        <li class="header">Páginas</li>
                        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                        <li><a href="#"><i class="fa fa-calendar"></i> <span>Calendário</span></a></li>
                        <li><a href="#"><i class="fa fa-th-list"></i> <span>Afazeres</span></a></li>
                        <li>
                            <a href="#charts" class="has-arrow"><i class="fa fa-pie-chart"></i><span>Gráficos</span></a>
                            <ul>
                                <li><a href="#">Apex Charts</a></li>
                                <li><a href="#">C3 Charts</a></li>
                                <li><a href="#">Morris Chart</a></li>
                                <li><a href="#">Flot Chart</a></li>
                                <li><a href="#">ChartJS</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Pages" class="has-arrow"><i class="fa fa-folder"></i><span>Outras Páginas</span></a>
                            <ul>
                                <li><a href="#">Login</a></li>
                                <li><a href="#">Register</a></li>
                                <li><a href="#">Forgot Password</a></li>
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
<script src=" {!! '../js/libscripts.bundle.js' !!} "></script>
<script src=" {!! '../js/vendorscripts.bundle.js' !!} "></script>
<script src=" {!! '../js/mainscripts.bundle.js' !!} "></script>
</body>
</html>
