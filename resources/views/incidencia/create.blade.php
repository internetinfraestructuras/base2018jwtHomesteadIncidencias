@extends('template')

@section('contenido')

<div class="page-title">
    <div class="title_left">
        <h3>Abrir Ticket</h3>
    </div>

</div>
<div class="clearfix"></div>
@include('sessionmessages/details')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <br />
                <form id="main" name="main" class="form-horizontal" action="{{ URL::to('incidencia')}}" method="post" novalidate>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="habitacion">Habitación/Zona</label>
                        <div class="col-sm-5">
                            <input id="habitacion" class="form-control" type="text" placeholder="Habitacion/Zona" name="habitacion" value="{{ old('habitacion') }}">
                        </div>
                        <div class="col-sm-5 messages">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="tipoincidencia">Servicio afectado</label>
                        <div class="col-sm-5">
                            <select id="tipoincidencia" class="form-control" name="tipoincidencia" onchange="mostrarOcultarTipos(this)">

                                <option value=""></option>
                                @if (old('tipoincidencia') == "Internet")
                                <option value="Internet" selected>Internet</option>
                                @else
                                <option value="Internet">Internet</option>
                                @endif

                                @if (old('tipoincidencia') == "Telefonia")
                                <option value="Telefonia" selected>Telefonia</option>
                                @else
                                <option value="Telefonia">Telefonia</option>
                                @endif

                                @if (old('tipoincidencia') == "Television")
                                <option value="Television" selected>Television</option>
                                @else
                                <option value="Television">Television</option>
                                @endif

                            </select>
                        </div>
                        <div class="col-sm-5 messages"></div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="problema">Problema</label>
                        <div class="col-sm-5">

                            <!-- puedo poner los mismo id, problemas y cambiar los names o algo asi...-->

                            <select id="problematelefonia" class="form-control" name="problematelefonia" style="display:none">
                                <option value="" selected></option>
                                <option value="Terminal sin linea">Terminal sin linea</option>
                                <option value="No funciona servicio despertador">No funciona servicio despertador</option>
                                <option value="Linea cruzada">Linea cruzada</option>
                                <option value="No puede realizar llamadas a un destino concreto">No puede realizar llamadas a un destino concreto</option>
                            </select>

                            <select id="problemainternet" class="form-control" name="problemainternet"  style="display:none">
                                <option value="" selected></option>
                                <option value="Sin internet en todo el Hotel">Sin internet en todo el Hotel</option>
                                <option value="Problemas con el servicio Wifi">Problemas con el servicio Wifi</option>
                                <option value="Baja velocidad de internet">Baja velocidad de internet</option>
                                <option value="Equipo concreto no puede acceder a internet">Equipo concreto no puede acceder a internet</option>
                                <option value="Cliente concreto no puede acceder a internet">Cliente concreto no puede acceder a internet</option>
                            </select>

                            <select id="problemaiptv" class="form-control" name="problemaiptv"  style="display:none">
                                <option value="" selected></option>
                                <option value="Fallo TV">Fallo TV</option>
                                <option value="HDMI TV sin señal">HDMI TV sin señal</option>
                                <option value="Mando no enciende TV">Mando no enciende TV</option>
                            </select>


                        </div>
                        <div class="col-sm-5 messages"></div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" id="textarealabel" for="observaciones">Notas adicionales</label>
                        <div class="col-sm-5">
                            <textarea id="observaciones" class="form-control" type="text" placeholder="Observaciones" name="observaciones"></textarea>
                        </div>
                        <div class="col-sm-5 messages" id="textareaerrores">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Abrir Ticket</button>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-5">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
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

<!-- jquery.inputmask -->
<script src="{{URL::asset('../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>

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

            tipoincidencia: {
                // You also need to input where you live
                presence: true,
                // And we restrict the countries supported to Sweden
            },
            habitacion: {
                presence: true,
                /*format: {
                 // We don't allow anything that a-z and 0-9
                 pattern:  /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$/,
                 message: "^Formato incorrecto"
                 }*/
            },

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

<script>

    //pulsado en tipo de incidencia
    function mostrarOcultarTipos(elem){
        if(elem.value == 'Telefonia') {
            document.getElementById('problematelefonia').style.display = "block";
            document.getElementById('problemainternet').style.display = "none";
            document.getElementById('problemaiptv').style.display = "none";

            //document.getElementById('tipoincidenciapass').value="Telefonia";
        }
        if(elem.value == 'Internet') {
            document.getElementById('problematelefonia').style.display = "none";
            document.getElementById('problemainternet').style.display = "block";
            document.getElementById('problemaiptv').style.display = "none";

            //document.getElementById('tipoincidenciapass').value="Internet";
        }
        if(elem.value == 'Television') {
            document.getElementById('problematelefonia').style.display = "none";
            document.getElementById('problemainternet').style.display = "none";
            document.getElementById('problemaiptv').style.display = "block";

            //document.getElementById('tipoincidenciapass').value="IPTV";
        }
    }


</script>



@endsection