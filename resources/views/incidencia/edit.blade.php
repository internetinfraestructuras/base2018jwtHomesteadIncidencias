@extends('template')

@section('contenido')

<div class="page-title" xmlns:background-color="http://www.w3.org/1999/xhtml">
    <div class="title_left">
        <h3>Resolver incidencia {{$incidencia->id}}. Hab/Zona: {{$incidencia->habitacion}}</h3>
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
                <form id="main" name="main" class="form-horizontal"  action="{{ URL::to('user/'.$user->id.'/incidencia/'.$incidencia->id)}}"  method="POST" novalidate>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="estado">Estado</label>
                        <div class="col-sm-5">

                            @if($incidencia->estado=="ABIERTO")
                            <input id="estado" class="form-control" type="text" readonly="true" placeholder="Habitacion/Zona" name="estado" value="{{ $incidencia->estado }}"
                                   style="background-color:#00A000;color: white">
                            @elseif($incidencia->estado=="CERRADO")
                            <input id="estado" class="form-control" type="text" readonly="true" placeholder="Habitacion/Zona" name="estado" value="{{ $incidencia->estado }}">
                            @elseif($incidencia->estado=="POSPUESTO")
                            <input id="estado" class="form-control" type="text" readonly="true" placeholder="Habitacion/Zona" name="estado" value="{{ $incidencia->estado }}"
                                   style="background-color:#e9cf28;color: black">
                            @endif


                        </div>
                        <div class="col-sm-5 messages">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="habitacion">Habitación/Zona</label>
                        <div class="col-sm-5">
                            <input id="habitacion" class="form-control" type="text" readonly="true" placeholder="Habitacion/Zona" name="habitacion" value="{{ $incidencia->habitacion }}">
                        </div>
                        <div class="col-sm-5 messages">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="servicio">Tipo Incidencia</label>
                        <div class="col-sm-5">
                            <input id="servicio" class="form-control" type="text" readonly="true" name="servicio" value="{{ $incidencia->servicio->servicio }}">
                        </div>
                        <div class="col-sm-5 messages">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="enunciado">Problema comentado</label>
                        <div class="col-sm-5">
                            <input id="enunciado" class="form-control" type="text" readonly="true" name="enunciado" value="{{ $incidencia->enunciado->enunciado }}">
                        </div>
                        <div class="col-sm-5 messages">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="servicio">Servicio afectado</label>
                        <div class="col-sm-5">
                            <input id="servicio" class="form-control" type="text" readonly="true" name="servicio" value="{{ $incidencia->servicio->servicio }}">
                        </div>
                        <div class="col-sm-5 messages">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="observacionescliente">Observaciones cliente</label>
                        <div class="col-sm-5">
                            <textarea id="observacionescliente" readonly="yes" class="form-control" type="text"  placeholder="Observaciones" name="observacionescliente">{{$incidencia->observacionescliente}}</textarea>

                        </div>
                        <div class="col-sm-5 messages" id="observacionescliente">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="categoria">Categoria resolucion</label>
                        <div class="col-sm-5">
                            <select id="categoria" class="form-control" name="categoria" >
                                <option value=""></option>
                                @foreach($categorias as $categoria)
                                    @if ($incidencia->categoria_id == $categoria->id)
                                    <option value="{{$categoria->id}}" selected>{{$categoria->categoria}}</option>
                                    @else
                                    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                                    @endif
                                @endforeach


                            </select>
                        </div>
                        <div class="col-sm-5 messages"></div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="problema">Seleccione Problema Real</label>
                        <div class="col-sm-5">
                            <select id="problema" class="form-control" name="problema" >
                                @if($incidencia->problema_id != NULL)
                                    <option value="{{$incidencia->problema_id}}" selected>{{$incidencia->problema->problema}}</option>
                                @else
                                    <option value=""></option>
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-5 messages"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="solucion">Seleccione Solucion</label>
                        <div class="col-sm-5">
                            <select id="solucion" class="form-control" name="solucion" >
                                @if($incidencia->solucion_id != NULL)
                                <option value="{{$incidencia->solucion_id}}" selected>{{$incidencia->solucion->solucion}}</option>
                                @else
                                <option value=""></option>
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-5 messages"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="facturable">Seleccione Facturable</label>
                        <div class="col-sm-5">
                            <select id="facturable" class="form-control" name="facturable" >
                                @if($incidencia->facturable_id != NULL)
                                <option value="{{$incidencia->facturable_id}}" selected>{{$incidencia->facturable->facturable}}</option>
                                @else
                                <option value=""></option>
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-5 messages"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" id="textarealabel" for="observacionestecnico">Notas adicionales</label>
                        <div class="col-sm-5">
                            <textarea id="observacionestecnico" class="form-control" type="text"  placeholder="Observaciones" name="observacionestecnico">{{$incidencia->observacionestecnico}}</textarea>

                        </div>
                        <div class="col-sm-5 messages" id="textareaerrores">
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="creada">Aperturada</label>
                        <div class="col-sm-5">
                            <input id="creada" class="form-control" type="text" readonly="true" name="creada" value="{{ $incidencia->created_at }}">
                        </div>
                        <div class="col-sm-5 messages">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="checkposponer">Posponer</label>

                        <div class="checkbox">
                            <label class="">
                                <div class="icheckbox_flat-green">
                                    <input id="checkposponer" name="checkposponer" class="flat"  style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                </div>&nbsp;<span >Posponer cierre</span>
                            </label>
                        </div>


                        <div class="col-sm-5 messages">
                        </div>
                    </div>



                    <div class="clearfix">&nbsp;</div>


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



                    <div class="form-group">
                        <div class="col-sm-offset-2 col-md-2">
                            <a class = "btn btn-danger"href="{{ url('user/'.Auth::user()->id.'/incidencia') }}" class="btn btn-danger">Volver</a>
                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-4"><input style="align:right;" type="submit" class="btn btn-primary" value="Actualizar"> </div>
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
    (function() {
        // Before using it we must add the parse and format functions
        // Here is a sample implementation using moment.js
        validate.extend(validate.validators.datetime, {
            // The value is guaranteed not to be null or undefined but otherwise it
            // could be anything.
            parse: function(value, options) {
                return +moment.utc(value);
            },
            // Input is a unix timestamp
            format: function(value, options) {
                var format = options.dateOnly ? "YYYY-MM-DD" : "YYYY-MM-DD hh:mm:ss";
                return moment.utc(value).format(format);
            }
        });

        // These are the constraints used to validate the form
        var constraints = {
            categoria: {
                // Email is required
                presence: true,
                // and must be an email (duh)

            },
            problema: {
                // Email is required
                presence: true,
                // and must be an email (duh)

            },
            solucion: {
                // Email is required
                presence: true,
                // and must be an email (duh)

            }

        };

        //customizar mensaje error email
        validate.validators.email.message="no tiene formato válido";

        //el cant be blank
        validate.validators.presence.message="no puede estar vacío";


        // Hook up the form so we can prevent it from being posted
        var form = document.querySelector("form#main");
        form.addEventListener("submit", function(ev) {
            ev.preventDefault();
            handleFormSubmit(form);
        });

        // Hook up the inputs to validate on the fly
        var inputs = document.querySelectorAll("input, textarea, select")
        for (var i = 0; i < inputs.length; ++i) {
            inputs.item(i).addEventListener("change", function(ev) {
                var errors = validate(form, constraints) || {};
                showErrorsForInput(this, errors[this.name])
            });
        }

        function handleFormSubmit(form, input) {
            // validate the form aainst the constraints
            var errors = validate(form, constraints);
            // then we update the form to reflect the results
            showErrors(form, errors || {});
            //alert("hola");
            if (!errors) {
                //showSuccess();

                $("#main").submit();
            }
        }

        // Updates the inputs with the validation errors
        function showErrors(form, errors) {
            // We loop through all the inputs and show the errors for that input
            _.each(form.querySelectorAll("input[name], select[name]"), function(input) {
                // Since the errors can be null if no errors were found we need to handle
                // that
                showErrorsForInput(input, errors && errors[input.name]);
            });
        }

        // Shows the errors for a specific input
        function showErrorsForInput(input, errors) {
            // This is the root of the input
            var formGroup = closestParent(input.parentNode, "form-group")
                // Find where the error messages will be insert into
                , messages = formGroup.querySelector(".messages");
            // First we remove any old messages and resets the classes
            resetFormGroup(formGroup);
            // If we have errors
            if (errors) {
                // we first mark the group has having errors
                formGroup.classList.add("has-error");
                // then we append all the errors
                _.each(errors, function(error) {
                    addError(messages, error);
                });
            } else {
                // otherwise we simply mark it as success
                formGroup.classList.add("has-success");
            }
        }

        // Recusively finds the closest parent that has the specified class
        function closestParent(child, className) {
            if (!child || child == document) {
                return null;
            }
            if (child.classList.contains(className)) {
                return child;
            } else {
                return closestParent(child.parentNode, className);
            }
        }

        function resetFormGroup(formGroup) {
            // Remove the success and error classes
            formGroup.classList.remove("has-error");
            formGroup.classList.remove("has-success");
            // and remove any old messages
            _.each(formGroup.querySelectorAll(".help-block.error"), function(el) {
                el.parentNode.removeChild(el);
            });
        }

        // Adds the specified error with the following markup
        // <p class="help-block error">[message]</p>
        function addError(messages, error) {
            var block = document.createElement("p");
            block.classList.add("help-block");
            block.classList.add("error");
            block.innerText = error;
            messages.appendChild(block);
        }

        function showSuccess() {
            // We made it \:D/
            alert("Success!");
        }
    })();
</script>

<script>
    //escondemos los mensajes de error /exito de forma automatica a los 15 segs
    setTimeout(function() {
        $('#successMessage').fadeOut('fast');
        $('#errorMessage').fadeOut('fast');
    }, 15000); // <-- time in milliseconds
</script>


<!--delete dialog form modal-->
<script type="text/javascript">
    $('.formConfirm').on('click', function(e) {
        e.preventDefault();
        var el = $(this).parent();
        var title = el.attr('data-title');
        var msg = el.attr('data-message');
        var dataForm = el.attr('data-form');

        $('#formConfirm')
            .find('#frm_body').html(msg)
            .end().find('#frm_title').html(title)
            .end().modal('show');

        $('#formConfirm').find('#frm_submit').attr('data-form', dataForm);
    });

    $('#formConfirm').on('click', '#frm_submit', function(e) {
        var id = $(this).attr('data-form');
        $(id).submit();
        //alert("yea");
        //alert(id);
    });
</script>





<script>

    jQuery(document).ready(function($){
        $('#categoria').change(function(){
            //alert($(this).val());
            $.get("{{ URL('obtenerproblemasfromcategorias') }}/get?categoria_id=" + $(this).val(),
                function(data) {
                    //alert("yea");
                    var model = $('#problema');
                    model.empty();

                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.problema + "</option>");
                    });
                });

            $.get("{{ URL('obtenersolucionesfromcategorias') }}/get?categoria_id=" + $(this).val(),
                function(data) {
                    //alert("yea");
                    var model = $('#solucion');
                    model.empty();

                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.solucion + "</option>");
                    });
                });

            $.get("{{ URL('obtenerfacturablesfromcategorias') }}/get?categoria_id=" + $(this).val(),
                function(data) {
                    //alert("yea");
                    var model = $('#facturable');
                    model.empty();

                    model.append("<option value=''></option>");
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.facturable + "</option>");
                    });
                });


        });

    });





</script>



@endsection