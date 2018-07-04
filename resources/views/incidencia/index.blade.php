@extends('template')

@section('css')


<!-- Datatables -->
<link href="{{ URL::asset('../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

@endsection

@section('contenido')
<!-- viene de <div class="right_col" role="main">-->

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Tickets</h3>
        </div>

    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    @include('sessionmessages/details')
                    <ul class="nav navbar-right panel_toolbox">
                        <a href='{{ URL::to("/user/$user->id/incidencia/create") }}' class="btn btn-default"><i class="fa fa-plus" style="margin-right: 5px"></i>Abrir Ticket</a>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <table id="datatable2" class="table table-striped table-bordered" style="text-align: center;vertical-align: middle;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hotel</th>
                            <th>Habitacion/Zona</th>
                            <th>Tipo</th>
                            <th>Problema</th>
                            <th>Estado</th>
                            <th>Creada</th>
                            <th>Cerrada</th>

                            <?php
                            if($user->tipocliente=='ADMIN'){
                            ?>
                                <th>Ver/Resolver</th>
                            <?php
                            }
                            else
                            {
                            ?>
                                <th>Ver/</th>
                            <?php
                            }
                            ?>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($incidencias as $incidencia)
                        <tr>
                            <td>{{ $incidencia->id }}</td>
                            <td>{{ $incidencia->user->name }}</td>
                            <td>{{ $incidencia->habitacion }}</td>
                            <td>{{ $incidencia->tipoincidencia }}</td>
                            <td>{{ $incidencia->problema }}</td>
                            <?php
                                    if ($incidencia->estado=="OPEN")
                                        echo '<td  style="background-color:#00A000;color: white">'.$incidencia->estado.'</td>';
                                    else if ($incidencia->estado=="CLOSED")
                                        echo '<td>'.$incidencia->estado.'</td>';
                            ?>

                            <td>{{ $incidencia->created_at }}</td>
                            <td>{{ $incidencia->solution_at }}</td>
                            <?php
                                     if($user->tipocliente=='ADMIN'){
                            ?>
                            <td style="text-align:center;"><a href='{{ URL::to("/user/$user->id/incidencia/$incidencia->id/show") }}' class="btn btn-default"><i class="fa fa-search"></i><i class="fa fa-check"></i></i></a></td>


                            <?php
                            }
                            else
                            {
                            ?>
                            <td style="text-align:center;"><a href='{{ URL::to("/user/$user->id/incidencia/$incidencia->id/show") }}' class="btn btn-default"><i class="fa fa-search"></i></a></td>

                            <?php
                            }
                            ?>
                        </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts');

<!-- Datatables -->
<!-- Datatables -->
<script type="text/javascript" src="{{ URL::asset('../vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('../vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('../vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('../vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('../vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('../vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('../vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('../vendors/jszip/dist/jszip.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('../vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('../vendors/pdfmake/build/vfs_fonts.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#datatable2').DataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        } );
    } );
</script>

<script>
    //escondemos los mensajes de error /exito de forma automatica a los 15 segs
    setTimeout(function() {
        $('#successMessage').fadeOut('fast');
        $('#errorMessage').fadeOut('fast');
    }, 15000); // <-- time in milliseconds
</script>

@endsection