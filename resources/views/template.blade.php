<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tickets Control </title>


    <!-- Bootstrap -->
    <!--<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="{{ URL::asset('../vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <!--<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">-->
    <link href="{{ URL::asset('../vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset('../vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ URL::asset('../vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ URL::asset('../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ URL::asset('../vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ URL::asset('../vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}"   rel="stylesheet">

    @yield('css')

    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('css/custom.min.css') }}" rel="stylesheet">



</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{ url('main')}}" class="site_title"><i class="fa fa-list"></i><span style="font-size: 17px"> Tickets Control</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{ URL::asset('images/fondomini.png') }}" alt="..." class="img-circle profile_img">
                    </div>

                    <div class="profile_info" style="margin-left: -15px;">
                        <span>Bienvenido</span>
                        <h2>{{ Auth::user()->name }}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">

                        @if( Auth::user()->tipocliente=='ALMACEN' )

                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-television"></i>IPTVs<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ url('iptv/stockfree') }}">IPTV Stock (No-Inst)</a></li>
                                    <li><a href="{{ url('iptv/create') }}">Alta IPTV</a></li>
                                    <li><a href="{{ url('iptv/create-masivo') }}">Alta IPTV Masivo</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-exchange"></i>RMA<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ url('rma-almacen') }}">Ver RMA</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i>Salir</a>
                            </li>

                        </ul>

                        @elseif( Auth::user()->tipocliente=='PRODUCTOR' )

                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-bar-chart"></i>Estadisticas<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ url('reventapaquetes') }}">Importes por canal</a></li>
                                    <li><a href="{{ url('historicoreventapaquetes') }}">Historico facturacion</a></li>
                                </ul>
                            </li>

                            <li><a><i class="fa fa-list"></i>Canales<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ url('canal') }}">Canales</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i>Salir</a>
                            </li>

                        </ul>

                        @else

                        <ul class="nav side-menu">
                            @if( Auth::user()->tipocliente=='ADMIN' )
                            <li><a><i class="fa fa-user"></i>Usuarios<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ url('user')}}">Usuarios</a></li>
                                    <li><a href="{{ URL::to('user/create') }}">Alta Usuario</a></li>

                                </ul>
                            </li>
                            <li><a><i class="fa fa-ellipsis-v "></i>Servicios<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ url('servicio')}}">Servicios</a></li>
                                    <li><a href="{{ URL::to('servicio/create') }}">Alta Servicio</a></li>

                                </ul>
                            </li>
                            <li><a><i class="fa fa-list-ol  "></i>Enunciados<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ url('enunciado')}}">Enunciados</a></li>
                                    <li><a href="{{ URL::to('enunciado/create') }}">Alta Enunciado</a></li>

                                </ul>
                            </li>
                            @endif

                            @if( Auth::user()->tipocliente=='HOTEL' )

                            <li><a><i class="fa fa-list"></i>Tickets<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">

                                    <li><a href="{{ url('user/'.Auth::user()->id.'/incidencia') }}">Tickets</a></li>
                                    <li><a href="{{ url('user/'.Auth::user()->id.'/incidencia/create') }}">Abrir Ticket</a></li>
                                </ul>
                            </li>

                            @else

                            <li><a><i class="fa fa-list"></i>Tickets<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">

                                    <li><a href="{{ url('user/'.Auth::user()->id.'/incidencia') }}">Tickets</a></li>
                                    <li><a href="{{ url('user/'.Auth::user()->id.'/incidenciaclosed') }}">Tickets cerrados</a></li>
                                    <li><a href="{{ url('user/'.Auth::user()->id.'/incidencia/create') }}">Abrir Ticket</a></li>
                                </ul>
                            </li>

                            @endif


                            <li>
                                <a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i>Salir</a>
                            </li>

                        </ul>


                        @endif


                    </div>


                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <!--<div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>-->
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                               <!-- <img src="{{ URL::asset('images/iptvimgmini.png') }}" alt="">{{ Auth::user()->name }}-->
                                Salir
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i>Salir</a></li>
                            </ul>
                        </li>

                        <!--<li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
        @yield('contenido');

        </div>

        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Tickets Control by <a href="https://nexwrf.es">Grupo NEXWRF</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script type="text/javascript" src="{{ URL::asset('../vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script type="text/javascript" src="{{ URL::asset('../vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script type="text/javascript" src="{{ URL::asset('../vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script type="text/javascript" src="{{ URL::asset('../vendors/nprogress/nprogress.js') }}"></script>
<!-- Chart.js -->
<script type="text/javascript" src="{{ URL::asset('../vendors/Chart.js/dist/Chart.min.js') }}"></script>
<!-- gauge.js -->
<script type="text/javascript" src="{{ URL::asset('../vendors/gauge.js/dist/gauge.min.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{URL::asset('../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{URL::asset('../vendors/iCheck/icheck.min.js') }}"></script>
<!-- Skycons -->
<script src="{{URL::asset('../vendors/skycons/skycons.js') }}"></script>
<!-- Flot -->
<script src="{{URL::asset('../vendors/Flot/jquery.flot.js') }}"></script>
<script src="{{URL::asset('../vendors/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{URL::asset('../vendors/Flot/jquery.flot.time.js') }}"></script>
<script src="{{URL::asset('../vendors/Flot/jquery.flot.stack.js') }}"></script>
<script src="{{URL::asset('../vendors/Flot/jquery.flot.resize.js') }}"></script>
<!-- Flot plugins -->
<script src="{{URL::asset('../vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
<script src="{{URL::asset('../vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{URL::asset('../vendors/flot.curvedlines/curvedLines.js') }}"></script>
<!-- DateJS -->
<script src="{{URL::asset('../vendors/DateJS/build/date.js') }}"></script>
<!-- JQVMap -->
<script src="{{URL::asset('../vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
<script src="{{URL::asset('../vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{URL::asset('../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{URL::asset('../vendors/moment/min/moment.min.js') }}"></script>
<script src="{{URL::asset('../vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{URL::asset('../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

<!--scripts de otras vistas yield aqui-->
@yield('scripts');


<!-- Custom Theme Scripts -->
<script src="{{URL::asset('js/custom.min.js') }}"></script>

</body>
</html>
