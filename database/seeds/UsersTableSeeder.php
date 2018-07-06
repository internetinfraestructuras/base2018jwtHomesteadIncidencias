<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //invocamos al factory que genera los users y le decimos que lo haga con 10
       // factory(App\User::class,10)->create();

        //factory para la relacion, creo 10 usuarios y por cada uno de ellos creo una moto
        //dadas las definiciones en la relacion del metodo motos() de la clase usuario, ha
        //de encontrar la tabla pivote y rellenarla auto
      /*  factory(App\User::class, 10)->create()->each(function ($user) {
            //$user->motos()->save(factory(App\Moto::class)->make());
            $ubicacion = factory(App\Ubicacion::class)->create();
            $ubicacion->user_id=$user->id;
            //$user->ubicaciones()->save($ubicacion);
            $ubicacion->save();
        });*/
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'telefonia@nexwrf.es',
            'tipocliente' => 'ADMIN',
            'password' => bcrypt('telereq1430'),
        ]);

        DB::table('users')->insert([
            'name' => 'maioris',
            'email' => 'maiiors@asdf.com',
            'tipocliente' => 'HOTEL',
            'password' => bcrypt('maioris1430'),
        ]);

        DB::table('users')->insert([
            'name' => 'miguel',
            'email' => 'miggg@asdf.com',
            'tipocliente' => 'TECNICO',
            'password' => bcrypt('123456'),
        ]);

            //relleno algunos servicios, enunciados,categorias,problemas y facturables desde aqui al maioris

            $user = App\User::find(2);
            $servicio = new \App\Servicio();

            $servicio->servicio='Television';
            $servicio->save();

            $enunciado = new \App\Enunciado();

            $enunciado->enunciado='Televisión no funciona';
            $servicio->enunciado()->save($enunciado);
            $enunciado = new \App\Enunciado();
            $enunciado->enunciado='Pantalla negra';
            $servicio->enunciado()->save($enunciado);
            $enunciado = new \App\Enunciado();
            $enunciado->enunciado='Mando a distancia no responde';
            $servicio->enunciado()->save($enunciado);

            $enunciado = new \App\Enunciado();
            $enunciado->enunciado='Otro, detallado en observaciones';
            $servicio->enunciado()->save($enunciado);

            $user->servicios()->save($servicio);

            //añado algunas categorias a este tipo de servicio
            $categoria = new \App\Categoria();
            $categoria->categoria="Mando IPTV";
            $servicio->categoria()->save($categoria);


                        //añado algunos problemas y soluciones y facturables a esta categoria

                        //problemas
                        $problema = new \App\Problema();
                        $problema->problema="Mando sin Pilas";
                        $categoria->problema()->save($problema);

                        $problema = new \App\Problema();
                        $problema->problema="Mando desconfigurado";
                        $categoria->problema()->save($problema);

                        $problema = new \App\Problema();
                        $problema->problema="Mando averiado";
                        $categoria->problema()->save($problema);

                        $problema = new \App\Problema();
                        $problema->problema="Mando desaparecido";
                        $categoria->problema()->save($problema);

                        //soluciones
                        $solucion = new \App\Solucion();
                        $solucion->solucion="Cambio pilas nuevas";
                        $categoria->solucion()->save($solucion);

                        $solucion = new \App\Solucion();
                        $solucion->solucion="Reconfigurar Mando";
                        $categoria->solucion()->save($solucion);

                        $solucion = new \App\Solucion();
                        $solucion->solucion="Sustitucion Mando en garantia";
                        $categoria->solucion()->save($solucion);

                        $solucion = new \App\Solucion();
                        $solucion->solucion="Reposicion mando sustraido";
                        $categoria->solucion()->save($solucion);

                        //facturable
                        $facturable = new \App\Facturable();
                        $facturable->facturable="Pilas mando a distancia";
                        $categoria->facturable()->save($facturable);

                        $facturable = new \App\Facturable();
                        $facturable->facturable="Mando completo por reposicion";
                        $categoria->facturable()->save($facturable);


            $categoria = new \App\Categoria();
            $categoria->categoria="Unidad IPTV";
            $servicio->categoria()->save($categoria);


                        //añado algunos problemas y soluciones y facturables a esta categoria

                        //problemas
                        $problema = new \App\Problema();
                        $problema->problema="Sin problema IPTV todo correcto";
                        $categoria->problema()->save($problema);

                        $problema = new \App\Problema();
                        $problema->problema="IPTV Bloqueado";
                        $categoria->problema()->save($problema);

                        $problema = new \App\Problema();
                        $problema->problema="IPTV no aprovisionado";
                        $categoria->problema()->save($problema);

                        $problema = new \App\Problema();
                        $problema->problema="IPTV averiado";
                        $categoria->problema()->save($problema);

                        $problema = new \App\Problema();
                        $problema->problema="Mando desaparecido";
                        $categoria->problema()->save($problema);

                        //soluciones
                        $solucion = new \App\Solucion();
                        $solucion->solucion="Ninguna, todo estaba correcto";
                        $categoria->solucion()->save($solucion);

                        $solucion = new \App\Solucion();
                        $solucion->solucion="Reinicio IPTV";
                        $categoria->solucion()->save($solucion);

                        $solucion = new \App\Solucion();
                        $solucion->solucion="Reiniciamos y aprovisiona";
                        $categoria->solucion()->save($solucion);

                        $solucion = new \App\Solucion();
                        $solucion->solucion="Sustitucion IPTV completo";
                        $categoria->solucion()->save($solucion);

                        $solucion = new \App\Solucion();
                        $solucion->solucion="Sustitucion tarjeta SD";
                        $categoria->solucion()->save($solucion);

                        //facturable
                        $facturable = new \App\Facturable();
                        $facturable->facturable="mano de obra 15 minutos";
                        $categoria->facturable()->save($facturable);

                        $facturable = new \App\Facturable();
                        $facturable->facturable="tarjeta SD, no en garantia";
                        $categoria->facturable()->save($facturable);

                        $facturable = new \App\Facturable();
                        $facturable->facturable="IPTV completo por acto vandalico";
                        $categoria->facturable()->save($facturable);



            $categoria = new \App\Categoria();
            $categoria->categoria="Cableado IPTV";
            $servicio->categoria()->save($categoria);


                    //añado algunos problemas y soluciones y facturables a esta categoria

                    //problemas
                    $problema = new \App\Problema();
                    $problema->problema="IPTV con cable red desconectado";
                    $categoria->problema()->save($problema);

                    $problema = new \App\Problema();
                    $problema->problema="Cable red cortado";
                    $categoria->problema()->save($problema);


                    //soluciones
                    $solucion = new \App\Solucion();
                    $solucion->solucion="Se conecta cable red a IPTV";
                    $categoria->solucion()->save($solucion);

                    $solucion = new \App\Solucion();
                    $solucion->solucion="Tirar nuevo cable de red";
                    $categoria->solucion()->save($solucion);


                    //facturable
                    $facturable = new \App\Facturable();
                    $facturable->facturable="Nueva tirada cable de red";
                    $categoria->facturable()->save($facturable);

                    $facturable = new \App\Facturable();
                    $facturable->facturable="mano de obra 15 minutos";
                    $categoria->facturable()->save($facturable);


            $categoria = new \App\Categoria();
            $categoria->categoria="Television";
            $servicio->categoria()->save($categoria);


                    //añado algunos problemas y soluciones y facturables a esta categoria

                    //problemas
                    $problema = new \App\Problema();
                    $problema->problema="HDMI sin señal";
                    $categoria->problema()->save($problema);

                    $problema = new \App\Problema();
                    $problema->problema="Cable HDMI desconectado";
                    $categoria->problema()->save($problema);

                    $problema = new \App\Problema();
                    $problema->problema="TV sin corriente electrica";
                    $categoria->problema()->save($problema);



                    //soluciones
                    $solucion = new \App\Solucion();
                    $solucion->solucion="Conmutamos TV a HDMI";
                    $categoria->solucion()->save($solucion);

                    $solucion = new \App\Solucion();
                    $solucion->solucion="Reconectamos cable HDMI";
                    $categoria->solucion()->save($solucion);

                    $solucion = new \App\Solucion();
                    $solucion->solucion="Conectamos TV a la corriente";
                    $categoria->solucion()->save($solucion);


                    //facturable
                    $facturable = new \App\Facturable();
                    $facturable->facturable="mano de obra 15 minutos";
                    $categoria->facturable()->save($facturable);



            $categoria = new \App\Categoria();
            $categoria->categoria="Otros";
            $servicio->categoria()->save($categoria);


        /**/
            $servicio = new \App\Servicio();
            $servicio->servicio='Telefonia';
            $servicio->save();

            $enunciado = new \App\Enunciado();

            $enunciado->enunciado='Terminal no tiene linea';
            $servicio->enunciado()->save($enunciado);
            $enunciado = new \App\Enunciado();
            $enunciado->enunciado='No funciona servicio despertador';
            $servicio->enunciado()->save($enunciado);

            $enunciado = new \App\Enunciado();
            $enunciado->enunciado='Sin llamadas entrantes en el hotel';
            $servicio->enunciado()->save($enunciado);

            $enunciado = new \App\Enunciado();
            $enunciado->enunciado='Sin llamadas salientes en el hotel';
            $servicio->enunciado()->save($enunciado);

            $enunciado = new \App\Enunciado();
            $enunciado->enunciado='Linea ascensor';
            $servicio->enunciado()->save($enunciado);

         $enunciado = new \App\Enunciado();
            $enunciado->enunciado='Otro, detallado en observaciones';
            $servicio->enunciado()->save($enunciado);

            $user->servicios()->save($servicio);

            //añado algunas categorias a este tipo de servicio
            $categoria = new \App\Categoria();
            $categoria->categoria="Terminal telefonico";
            $servicio->categoria()->save($categoria);


                    //añado algunos problemas y soluciones y facturables a esta categoria

                    //problemas
                    $problema = new \App\Problema();
                    $problema->problema="Terminal averiado por acto vandalico";
                    $categoria->problema()->save($problema);

                    $problema = new \App\Problema();
                    $problema->problema="Tecla telefono pisada";
                    $categoria->problema()->save($problema);

                    $problema = new \App\Problema();
                    $problema->problema="auricular descolgado";
                    $categoria->problema()->save($problema);



                    //soluciones
                    $solucion = new \App\Solucion();
                    $solucion->solucion="Cambiar terminal telefonico";
                    $categoria->solucion()->save($solucion);

                    $solucion = new \App\Solucion();
                    $solucion->solucion="Despisar tecla telefono";
                    $categoria->solucion()->save($solucion);

                    $solucion = new \App\Solucion();
                    $solucion->solucion="Colgar auricular";
                    $categoria->solucion()->save($solucion);


                    //facturable
                    $facturable = new \App\Facturable();
                    $facturable->facturable="mano de obra 15 minutos";
                    $categoria->facturable()->save($facturable);




            $categoria = new \App\Categoria();
            $categoria->categoria="Cableado Telefónico";
            $servicio->categoria()->save($categoria);


                    //añado algunos problemas y soluciones y facturables a esta categoria

                    //problemas
                    $problema = new \App\Problema();
                    $problema->problema="Cable telefono roto";
                    $categoria->problema()->save($problema);

                    $problema = new \App\Problema();
                    $problema->problema="Cable telefono desaparecido";
                    $categoria->problema()->save($problema);

                    $problema = new \App\Problema();
                    $problema->problema="Error de conexión con ICT";
                    $categoria->problema()->save($problema);



                    //soluciones
                    $solucion = new \App\Solucion();
                    $solucion->solucion="Reponer latiguillo telefono";
                    $categoria->solucion()->save($solucion);

                    $solucion = new \App\Solucion();
                    $solucion->solucion="Recrimpar en ICT";
                    $categoria->solucion()->save($solucion);

                    $solucion = new \App\Solucion();
                    $solucion->solucion="Reconfigurar en ATA";
                    $categoria->solucion()->save($solucion);


                    //facturable
                    $facturable = new \App\Facturable();
                    $facturable->facturable="latiguillo telefono";
                    $categoria->facturable()->save($facturable);

                    $facturable = new \App\Facturable();
                    $facturable->facturable="mano de obra 15 minutos";
                    $categoria->facturable()->save($facturable);




            $categoria = new \App\Categoria();
            $categoria->categoria="Roseta";
            $servicio->categoria()->save($categoria);

            $categoria = new \App\Categoria();
            $categoria->categoria="Ata y Configuracion";
            $servicio->categoria()->save($categoria);

            $categoria = new \App\Categoria();
            $categoria->categoria="Otros";
            $servicio->categoria()->save($categoria);


        /**/


            /**/
            $servicio = new \App\Servicio();
            $servicio->servicio='Internet';
            $servicio->save();

            $enunciado = new \App\Enunciado();

            $enunciado->enunciado='Cliente no conecta a la wifi';
            $servicio->enunciado()->save($enunciado);
             $enunciado = new \App\Enunciado();
            $enunciado->enunciado='Sin Wifi en el Hotel';
            $servicio->enunciado()->save($enunciado);
            $enunciado = new \App\Enunciado();
            $enunciado->enunciado='Sin conexión a internet en el hotel';
            $servicio->enunciado()->save($enunciado);

            $enunciado = new \App\Enunciado();
            $enunciado->enunciado='Sin conexión a internet en un equipo';
            $servicio->enunciado()->save($enunciado);

            $enunciado = new \App\Enunciado();
            $enunciado->enunciado='Otro, detallado en observaciones';
            $servicio->enunciado()->save($enunciado);

            $user->servicios()->save($servicio);

            //añado algunas categorias a este tipo de servicio
            $categoria = new \App\Categoria();
            $categoria->categoria="Problemas PC";
            $servicio->categoria()->save($categoria);


                    //problemas
                    $problema = new \App\Problema();
                    $problema->problema="PC con virus";
                    $categoria->problema()->save($problema);

                    $problema = new \App\Problema();
                    $problema->problema="PC desconfigurado";
                    $categoria->problema()->save($problema);


                    //soluciones
                    $solucion = new \App\Solucion();
                    $solucion->solucion="Reparar PC";
                    $categoria->solucion()->save($solucion);


                    //facturable


                    $facturable = new \App\Facturable();
                    $facturable->facturable="mano de obra 15 minutos";
                    $categoria->facturable()->save($facturable);




            $categoria = new \App\Categoria();
            $categoria->categoria="Cableado Internet";
            $servicio->categoria()->save($categoria);

            $categoria = new \App\Categoria();
            $categoria->categoria="Configuracion Central";
            $servicio->categoria()->save($categoria);

            /**/




    }
}
