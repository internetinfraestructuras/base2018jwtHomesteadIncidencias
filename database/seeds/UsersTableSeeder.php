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
            'nombre_completo' => 'admin admin',
            'cif' => 'b11',
            'direccion' => 'dir',
            'poblacion' => 'pob',
            'password' => bcrypt('telereq1430'),
        ]);

        DB::table('users')->insert([
            'name' => 'maioris',
            'email' => 'maiiors@asdf.com',
            'tipocliente' => 'HOTEL',
            'nombre_completo' => 'MAIORIS',
            'cif' => 'bsdafe',
            'direccion' => 'dir',
            'poblacion' => 'pob',
            'password' => bcrypt('maioris1430'),
        ]);

            //relleno algunos servicios  y enunciados desde aqui al maioris

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

            $user->servicios()->save($servicio);

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

            $user->servicios()->save($servicio);
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
            $enunciado->enunciado='Sin conexión a internet en un equipo';
            $servicio->enunciado()->save($enunciado);

            $user->servicios()->save($servicio);
            /**/




    }
}
