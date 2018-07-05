@extends('template')

@section('contenido')

<div class="page-title">
    <div class="title_left">
        <h3>Servicios asociados para {{$user->nombre_completo}}</h3>
    </div>

</div>
<div class="clearfix"></div>
@include('sessionmessages/details')

@include('deletedialog/deletedialog')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <br />
                <form id="main" name="main" class="form-horizontal"  action="{{ URL::to('user/'.$user->id.'/servicios')}}" method="post" novalidate>


                    <!------- -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="nombrepaquete">Seleccione servicios para este cliente</label>
                        <div class="col-sm-5">

                            <table id="datatable2" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Seleccionar</th>
                                    <th>Servicio</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($servicios as $servicio)
                                <tr>
                                    <td align="center">
                                        <input id="{{$servicio->servicio}}" name="{{$servicio->servicio}}" type="checkbox" checked />

                                    <td>{{ $servicio->servicio }}</td>
                                </tr>
                                @endforeach

                                @foreach($serviciosNoSeleccionados as $servicio)
                                <tr>
                                    <td align="center">
                                        <input id="{{$servicio->servicio}}" name="{{$servicio->servicio}}" type="checkbox" />
                                    <td>{{ $servicio->servicio }}</td>
                                </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>



                    <div class="clearfix">&nbsp;</div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-md-2"> <a href="{{ url('user')}}" class="btn btn-danger">Cancelar</a></div>
                        <div class="col-sm-offset-2 col-md-4"><button style="align:right;" type="submit" class="btn btn-primary">Actualizar</button> </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-5">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        </div>
                        <!-- como kite esto se va a la picha-->
                        <div class="col-sm-5 messages">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-5">
                            <input name="_method" type="hidden" value="PATCH">
                        </div>
                        <!-- como kite esto se va a la picha-->
                        <div class="col-sm-5 messages">
                        </div>
                    </div>

                </form>



            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

<!-- librerias para la validacion -->
<script src="{{URL::asset('../vendors/validatejsnuevo/validate.min.js') }}"></script>
<script src="{{URL::asset('../vendors/validatejsnuevo/underscore-min.js') }}"></script>
<script src="{{URL::asset('../vendors/validatejsnuevo/moment.min.js') }}"></script>



<script>
    //escondemos los mensajes de error /exito de forma automatica a los 15 segs
    setTimeout(function() {
        $('#successMessage').fadeOut('fast');
        $('#errorMessage').fadeOut('fast');
    }, 15000); // <-- time in milliseconds
</script>


@endsection
