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
<link rel="stylesheet" href="{{ '../css/app.css' }}" />
</head>
<body>

<div id="body" class="theme-cyan">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{'images/logo.png'}}" width="220" height="114" alt="Ventura"></div>
            <p>Aguarde...</p>
        </div>
    </div>

    <div id="wrapper">
    <!-- MENU -->
        <!-- Menu de Cima -->
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-left">
                    <div class="navbar-btn">
                        <a href="index.html"><img src="{{'../images/logo.png'}}" alt="Logo" class="img-fluid logo"></a>
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
            {{-- <a href="#" class="menu_toggle"><i class="fa fa-angle-left"></i></a> --}}
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
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="section_title">
                            <div class="mr-3">
                                <h3>Earning By Countries</h3>
                                <small>Statistics, Predictive Analytics Data Visualization, Big Data Analytics, etc.</small>
                            </div>
                            <div>
                                <div class="btn-group mb-3">
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">14 March 2020</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);">Today’s</a>
                                            <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                            <a class="dropdown-item" href="javascript:void(0);">This Month</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last 12 Month</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Custom Dates</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-default"><i class="fa fa-send"></i> <span class="hidden-md">Report</span></button>
                                    <button type="button" class="btn btn-default"><i class="fa fa-file-pdf-o"></i> <span class="hidden-md">Export</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="w60">
                                                            <img src="{{'images/flag/au.svg'}}" class="w30 rounded">
                                                        </td>
                                                        <td>
                                                            <a href="#" title="">Australia</a>
                                                            <p class="mb-0">Scott Ortega</p>
                                                        </td>
                                                        <td>
                                                            <div>231K <span class="text-red font-10">4% <i class="fa fa-level-down"></i></span></div>
                                                            <small class="font-12 text-muted">Total Orders</small>
                                                        </td>
                                                        <td>
                                                            <div>21K <span class="text-green font-10">3% <i class="fa fa-level-up"></i></span></div>
                                                            <small class="font-12 text-muted">Total Returns</small>
                                                        </td>
                                                        <td>
                                                            <div>21M <span class="text-green font-10">8% <i class="fa fa-level-up"></i></span></div>
                                                            <small class="font-12 text-muted">Total Earnings</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w60">
                                                            <img src="{{'images/flag/ca.svg'}}" class="w30 rounded">
                                                        </td>
                                                        <td>
                                                            <a href="#" title="">Canada</a>
                                                            <p class="mb-0">Scott Ortega</p>
                                                        </td>
                                                        <td>
                                                            <div>231K <span class="text-red font-10">4% <i class="fa fa-level-down"></i></span></div>
                                                            <small class="font-12 text-muted">Total Orders</small>
                                                        </td>
                                                        <td>
                                                            <div>21K <span class="text-green font-10">3% <i class="fa fa-level-up"></i></span></div>
                                                            <small class="font-12 text-muted">Total Returns</small>
                                                        </td>
                                                        <td>
                                                            <div>21M <span class="text-green font-10">8% <i class="fa fa-level-up"></i></span></div>
                                                            <small class="font-12 text-muted">Total Earnings</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w60">
                                                            <img src="{{'images/flag/france.svg'}}" class="w30 rounded">
                                                        </td>
                                                        <td>
                                                            <a href="#" title="">France</a>
                                                            <p class="mb-0">Scott Ortega</p>
                                                        </td>
                                                        <td>
                                                            <div>231K <span class="text-red font-10">4% <i class="fa fa-level-down"></i></span></div>
                                                            <small class="font-12 text-muted">Total Orders</small>
                                                        </td>
                                                        <td>
                                                            <div>21K <span class="text-green font-10">3% <i class="fa fa-level-up"></i></span></div>
                                                            <small class="font-12 text-muted">Total Returns</small>
                                                        </td>
                                                        <td>
                                                            <div>21M <span class="text-green font-10">8% <i class="fa fa-level-up"></i></span></div>
                                                            <small class="font-12 text-muted">Total Earnings</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w60">
                                                            <img src="{{'images/flag/us.svg'}}" class="w30 rounded">
                                                        </td>
                                                        <td>
                                                            <a href="#" title="">USA</a>
                                                            <p class="mb-0">Scott Ortega</p>
                                                        </td>
                                                        <td>
                                                            <div>231K <span class="text-red font-10">4% <i class="fa fa-level-down"></i></span></div>
                                                            <small class="font-12 text-muted">Total Orders</small>
                                                        </td>
                                                        <td>
                                                            <div>21K <span class="text-green font-10">3% <i class="fa fa-level-up"></i></span></div>
                                                            <small class="font-12 text-muted">Total Returns</small>
                                                        </td>
                                                        <td>
                                                            <div>21M <span class="text-green font-10">8% <i class="fa fa-level-up"></i></span></div>
                                                            <small class="font-12 text-muted">Total Earnings</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w60">
                                                            <img src="{{'images/flag/nl.svg'}}" class="w30 rounded">
                                                        </td>
                                                        <td>
                                                            <a href="#" title="">Netherlands</a>
                                                            <p class="mb-0">Scott Ortega</p>
                                                        </td>
                                                        <td>
                                                            <div>231K <span class="text-red font-10">4% <i class="fa fa-level-down"></i></span></div>
                                                            <small class="font-12 text-muted">Total Orders</small>
                                                        </td>
                                                        <td>
                                                            <div>21K <span class="text-green font-10">3% <i class="fa fa-level-up"></i></span></div>
                                                            <small class="font-12 text-muted">Total Returns</small>
                                                        </td>
                                                        <td>
                                                            <div>21M <span class="text-green font-10">8% <i class="fa fa-level-up"></i></span></div>
                                                            <small class="font-12 text-muted">Total Earnings</small>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Javascript -->
<script src=" {{ '../js/libscripts.bundle.js' }} "></script>
<script src=" {{ '../js/vendorscripts.bundle.js' }} "></script>
<script src=" {{ '../js/mainscripts.bundle.js' }} "></script>
</body>
</html>
