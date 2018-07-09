@extends('template')

@section('contenido')

<div class="page-title">
    <div class="title_left">
        <h3>Alta Facturable</h3>
    </div>

</div>
<div class="clearfix"></div>
@include('sessionmessages/details')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <br />
                <form id="main" name="main" class="form-horizontal" action="{{ URL::to('facturable')}}" method="post" novalidate>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="servicio">Seleccione Servicio</label>
                        <div class="col-sm-5">
                            <select id="servicio" class="form-control" name="servicio" >
                                <option value=""></option>
                                @foreach($servicios as $servicio)
                                    @if (old('servicio') == $servicio->servicio)
                                    <option value="{{$servicio->id}}" selected>{{$servicio->servicio}}</option>
                                    @else
                                    <option value="{{$servicio->id}}">{{$servicio->servicio}}</option>
                                    @endif
                                @endforeach


                            </select>
                        </div>
                        <div class="col-sm-5 messages"></div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="categoria">Seleccione Categoria</label>
                        <div class="col-sm-5">
                            <select id="categoria" class="form-control" name="categoria" >
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-sm-5 messages"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="facexists">Facturables ya existentes</label>
                        <div class="col-sm-5">
                            <select id="facexists" class="form-control" name="facexists" >
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-sm-5 messages"></div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="facturable">Facturable</label>
                        <div class="col-sm-5">
                            <input id="facturable" class="form-control" type="facturable" placeholder="Intro facturable" name="facturable" value="{{ old('facturable') }}">
                        </div>
                        <div class="col-sm-5 messages">
                        </div>
                    </div>

                    <br>

                    <div class="form-group">
                        <div class="col-sm-offset-6 col-sm-10">
                            <button type="submit" class="btn btn-primary">Alta</button>
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
            facturable: {
                presence: true,
                /*format: {
                 // We don't allow anything that a-z and 0-9
                 pattern:  /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$/,
                 message: "^Formato incorrecto"
                 }*/
            },
            categoria: {
                // You also need to input where you live
                presence: true,
                // And we restrict the countries supported to Sweden
            },
            servicio: {
                // You also need to input where you live
                presence: true,
                // And we restrict the countries supported to Sweden
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


<script>

    jQuery(document).ready(function($){
        $('#servicio').change(function(){
            //alert($(this).val());
            $.get("{{ URL('obtenercategoriasfromservicios') }}/get?servicio_id=" + $(this).val(),
                function(data) {
                    //alert("yea");
                    var model = $('#categoria');
                    model.empty();

                    model.append("<option value='seleccione'>Seleccione</option>");
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.categoria + "</option>");
                    });
                });




        });



    });


    jQuery(document).ready(function($){
        $('#categoria').change(function(){
            //alert($(this).val());
            $.get("{{ URL('obtenerfacturablesfromcategorias') }}/get?categoria_id=" + $(this).val(),
                function(data) {
                    //alert("yea");
                    var model = $('#facexists');
                    model.empty();

                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.facturable + "</option>");
                    });
                });
        });


    });

</script>




@endsection