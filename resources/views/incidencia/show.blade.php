@extends('template')

@section('contenido')

<div class="page-title" xmlns:background-color="http://www.w3.org/1999/xhtml">
    <div class="title_left">
        <h3>Detalles incidencia {{$incidencia->id}}. Hab/Zona: {{$incidencia->habitacion}}</h3>
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
                            <?php
                                if($incidencia->estado=="OPEN"){
                             ?>
                                    <input id="estado" class="form-control" type="text" readonly="true" placeholder="Habitacion/Zona" name="estado" value="{{ $incidencia->estado }}"
                                           style="background-color:#00A000;color: white">
                             <?php
                                }
                                else if($incidencia->estado=="CLOSED")
                                {
                            ?>
                                    <input id="estado" class="form-control" type="text" readonly="true" placeholder="Habitacion/Zona" name="estado" value="{{ $incidencia->estado }}">
                            <?php
                            }
                            ?>


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
                        <label class="col-sm-2 control-label" for="tipoincidencia">Tipo Incidencia</label>
                        <div class="col-sm-5">
                            <input id="tipoincidencia" class="form-control" type="text" readonly="true" name="tipoincidencia" value="{{ $incidencia->tipoincidencia }}">
                        </div>
                        <div class="col-sm-5 messages">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="tipoincidencia">Problema</label>
                        <div class="col-sm-5">
                            <?php if($user->tipocliente=='ADMIN'){ ?>
                                <input id="problema" class="form-control" type="text"  name="problema" value="{{ $incidencia->problema }}">
                            <?php }else{ ?>
                                <input id="problema" class="form-control" type="text" readonly="true" name="problema" value="{{ $incidencia->problema }}">
                            <?php } ?>
                        </div>
                        <div class="col-sm-5 messages">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="tipoincidencia">Problema real</label>
                        <div class="col-sm-5">
                            <?php if($user->tipocliente=='ADMIN'){ ?>

                            <!-- soluciones por tipo de incidencia -->
                                        <?php if($incidencia->tipoincidencia=='Telefonia') { ?>

                                        <select id="problemareal" class="form-control" name="problemareal">
                                            <option value="" selected></option>
                                            <option value="Terminal no tiene tono">Terminal no tiene tono</option>
                                            <option value="Terminal en mal estado">Terminal en mal estado</option>
                                            <option value="Cableado en mal estado">Cableado en mal estado</option>
                                            <option value="Roseta en mal estado">Roseta en mal estado</option>
                                            <option value="No hay telefono fisico en la habitacion">No hay telefono fisico en la habitacion</option>
                                            <option value="Hay tlf pero no latiguillo">Hay tlf pero no latiguillo</option>
                                            <option value="Hay tlf y lat. pero no esta conectado">Hay tlf y lat. pero no esta conectado</option>
                                            <option value="El telefono esta mal colgado">El telefono esta mal colgado</option>
                                        </select>

                                        <?php }else if($incidencia->tipoincidencia=='Internet') { ?>
                                        <select id="problemareal" class="form-control" name="problemareal">
                                            <option value="" selected></option>
                                            <option value="Red equipo desconfigurada">Red equipo desconfigurada</option>
                                            <option value="Revision cable internet">Revision cable internet</option>
                                            <option value="Cable internet roto,recrimpar">Cable internet roto, recrimpar</option>
                                            <option value="No se atienden problemas de wifi de clientes">No se atienden problemas de wifi de clientes</option>
                                        </select>

                                        <?php }else if($incidencia->tipoincidencia=='Television') { ?>

                                        <select id="problemareal" class="form-control" name="problemareal">
                                            <option value="" selected></option>
                                            <option value="HDMI TV sin señal">HDMI TV sin señal</option>
                                            <option value="Mando no enciende TV">Mando no enciende TV</option>
                                            <option value="Mando no responde a los controles">Mando no responde a los controles</option>
                                            <option value="Mando ha desaparecido">Mando ha desaparecido</option>
                                            <option value="Aparece un canal bloqueado o cargando">Aparece un canal bloqueado o cargando</option>
                                            <option value="IPTV no reproduce ningun canal">IPTV no reproduce ningun canal</option>
                                            <option value="Error arranque letras blancas">Error arranque letras blancas</option>
                                            <option value="IPTV se reinicia constantemente">IPTV se reinicia constantemente</option>
                                            <option value="Se entrecorta la reproduccion">Se entrecorta la reproduccion</option>
                                            <option value="IPTV dañado externamente">IPTV dañado externamente</option>

                                        </select>




                                        <?php } ?>

                            <?php }else{ ?>
                            <input id="solucion" class="form-control" type="text" readonly="true" name="solucion" value="{{ $incidencia->solucion }}">
                            <?php } ?>

                        </div>
                        <div class="col-sm-5 messages">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="tipoincidencia">Acciones</label>
                        <div class="col-sm-5">
                            <?php if($user->tipocliente=='ADMIN'){ ?>

                                    <!-- soluciones por tipo de incidencia -->
                                    <?php if($incidencia->tipoincidencia=='Telefonia') { ?>

                                    <select id="solucion" class="form-control" name="solucion">
                                        <option value="" selected></option>
                                        <option value="Revision cableado vertical">Revision cableado vertical</option>
                                        <option value="Recrimpado roseta">Recrimpado roseta</option>
                                        <option value="Reparación linea cruzada">Reparación linea cruzada</option>
                                        <option value="Se repone latiguillo">Se repone latiguillo</option>


                                        @if (old('solucion',$incidencia->solucion) == "Se repone latiguillo")
                                        <option value="Se repone latiguillo" selected>Se repone latiguillo</option>
                                        @else
                                        <option value="Se repone latiguillo">Se repone latiguillo</option>
                                        @endif


                                        @if (old('solucion',$incidencia->solucion) == "Se conecta latiguillo a la pared")
                                        <option value="Se conecta latiguillo a la pared" selected>Se conecta latiguillo a la pared</option>
                                        @else
                                        <option value="Se conecta latiguillo a la pared">Se conecta latiguillo a la pared</option>
                                        @endif


                                        <option value="Se cuelga correctamente el telefono">Se cuelga correctamente el telefono</option>
                                        <option value="Cambio de boca del ATA">Cambio de boca del ATA</option>
                                        <option value="Se instala cable nuevo">Se instala cable nuevo</option>
                                        <option value="Se recrimpa de nuevo en el ICT">Se recrimpa de nuevo en el ICT</option>
                                    </select>

                                    <?php }else if($incidencia->tipoincidencia=='Internet') { ?>
                                    <select id="solucion" class="form-control" name="solucion">
                                        <option value="" selected></option>
                                        <option value="Revision infraestructura">Revision infraestructura</option>
                                        <option value="Reparacion problema configuracion PC">Reparacion problema configuracion PC</option>
                                        <option value="Reparacion cable de red">Reparacion cable de red</option>
                                        <option value="No se atienden problemas de wifi de clientes">No se atienden problemas de wifi de clientes</option>
                                    </select>

                                    <?php }else if($incidencia->tipoincidencia=='Television') { ?>
                                    <select id="solucion" class="form-control" name="solucion">
                                        <option value="" selected></option>
                                        <option value="Ninguna todo estaba correcto">Ninguna todo estaba correcto</option>
                                        <option value="Ninguna, no podemos acceder a la habitacion">Ninguna, no podemos acceder a la habitacion</option>
                                        <option value="Reiniciamos iptv para desbloquear y todo ok">Reiniciamos iptv para desbloquear y todo ok</option>
                                        <option value="Tv no conmutada a HDMI,la conmutamos">Tv no conmutada a HDMI,la conmutamos</option>
                                        <option value="Reconectamos cable HDMI estaba desconectado">Reconectamos cable HDMI estaba desconectado</option>
                                        <option value="Se reprograma mando para que encienda TV">Se reprograma mando para que encienda TV</option>
                                        <option value="Mando en mal estado,cambiado,facturable">Mando en mal estado,cambiado,facturable</option>
                                        <option value="Se cambia dongle usb del mando de puerto y todo ok">Se cambia dongle usb del mando de puerto y todo ok</option>
                                        <option value="No hay mando, ha sido robado, se repone, facturable">No hay mando, ha sido robado, se repone, facturable</option>
                                        <option value="Cambio pilas mando, facturable">Cambio pilas mando, facturable</option>
                                        <option value="Pulsamos STOP y volvemos al listado original de canales">Pulsamos STOP y volvemos al listado original de canales</option>
                                        <option value="Sustituimos unidad POE">Sustituimos unidad POE</option>
                                        <option value="Sustituimos latiguillo interno POE-RASPE">Sustituimos latiguillo interno POE-RASPE</option>
                                        <option value="Sustituimos solo RASPE">Sustituimos solo RASPE</option>
                                        <option value="Sustituimos RASPE+SD">Sustituimos RASPE+SD</option>
                                        <option value="Sustituimos solo SD">Sustituimos solo SD</option>
                                        <option value="Sustituimos IPTV completo (Raspe+Poe+SD)">Sustituimos IPTV completo (Raspe+Poe+SD)</option>
                                        <option value="Sustituimos IPTV completo por acto vandalico, facturable">Sustituimos IPTV completo por acto vandalico, facturable</option>
                                    </select>

                                    <?php } ?>



                            <?php }else{ ?>
                                <input id="solucion" class="form-control" type="text" readonly="true" name="solucion" value="{{ $incidencia->solucion }}">
                            <?php } ?>

                        </div>
                        <div class="col-sm-5 messages">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" id="textarealabel" for="observaciones">Notas adicionales</label>
                        <div class="col-sm-5">
                            <?php if($user->tipocliente=='ADMIN'){ ?>
                                <textarea id="observaciones" class="form-control" type="text"  placeholder="Observaciones" name="observaciones">{{$incidencia->observaciones}}</textarea>
                            <?php }else{ ?>
                                <textarea id="observaciones" class="form-control" type="text" readonly="yes" placeholder="Observaciones" name="observaciones">{{$incidencia->observaciones}}</textarea>
                            <?php } ?>

                        </div>
                        <div class="col-sm-5 messages" id="textareaerrores">
                        </div>
                    </div>


                    <?php if($user->tipocliente=='ADMIN'){ ?>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="tipoincidencia">Facturable</label>
                        <div class="col-sm-5">
                            <select id="facturable" class="form-control" name="facturable">
                                <option value="" selected></option>
                                <option value="Terminal analogico por acto vandalico o sustraccion">Terminal analogico por acto vandalico o sustraccion</option>
                                <option value="Roseta">Roseta</option>
                                <option value="Pilas mando a distancia">Pilas mando a distancia</option>
                                <option value="Mando ha desaparecido">Mando ha desaparecido</option>
                                <option value="Mando a distancia por Rotura o Sustraccion.">Mando a distancia por Rotura o Sustraccion.</option>
                                <option value="Cable de red por rotura">Cable de red por rotura</option>
                                <option value="Unidad IPTV completa por rotura o sustraccion">Unidad IPTV completa por rotura o sustraccion</option>

                            </select>
                        </div>
                        <div class="col-sm-5 messages">
                        </div>
                    </div>

                    <?php } ?>




                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="creada">Aperturada</label>
                        <div class="col-sm-5">
                            <input id="creada" class="form-control" type="text" readonly="true" name="creada" value="{{ $incidencia->created_at }}">
                        </div>
                        <div class="col-sm-5 messages">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="creada">Cerrada</label>
                        <div class="col-sm-5">
                            <input id="sol" class="form-control" type="text" readonly="true" name="sol" value="{{ $incidencia->solution_at }}">
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

                    <?php if($user->tipocliente=='ADMIN'){ ?>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-md-2">
                            <a class = "btn btn-danger"href="{{ url('user/'.Auth::user()->id.'/incidencia') }}" class="btn btn-danger">Cancelar</a>
                        </div>
                        <div class="col-md-2"> </div>
                        <div class="col-md-4"><input style="align:right;" type="submit" class="btn btn-primary" value="Editar"> </div>
                    </div>
                    <?php } ?>

                </form>

                <?php if($user->tipocliente!='ADMIN'){ ?>
                    <form id="borrarclienteformulario" name=borrarclienteformulario" action="#" method="post" novalidate>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-md-4"> <a href="{{ url('user/'.$user->id.'/incidencia')}}" class="btn btn-primary">Volver</a></div>
                        </div>
                    </form>
                <?php } ?>



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
            habitacion: {
                // Email is required
                presence: true,
                // and must be an email (duh)

            },
            tipoincidencia: {
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


@endsection