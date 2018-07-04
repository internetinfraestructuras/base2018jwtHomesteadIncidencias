<?php

namespace App\Http\Controllers;

use App\Incidencia;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Redirect;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //crear una incidencia

        return View('incidencia/create')->with('user',User::find($id));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $incidencia = new Incidencia();
        $incidencia->habitacion= $request->habitacion;
        $incidencia->tipoincidencia= $request->tipoincidencia;
        $incidencia->observaciones= $request->observaciones;

        if($request->problematelefonia !="" )
            $incidencia->problema= $request->problematelefonia;
        else if($request->problemainternet != "")
            $incidencia->problema= $request->problemainternet;
        else
            $incidencia->problema= $request->problemaiptv;


        $incidencia->user_id=Auth::user()->id;
        $incidencia->estado="OPEN";
        $incidencia->save();




        Session::flash('message', 'Ticket abierto con éxito');
        Session::forget('errors');

        $user= User::find(Auth::user()->id);


        return Redirect('user/'.$user->id.'/incidencia');
        //->with('incidencias',$incidencias)->with('user',$user);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$idinci)
    {
        //echo "user $id, incidencia $idinci";
        $incidencia = Incidencia::find($idinci);
        $user = User::find($id);

        return View('incidencia/show')->with('incidencia',$incidencia)->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$idinci)
    {
        //echo "user $id, incidencia $idinci";
        $incidencia = Incidencia::find($idinci);

        return View('incidencia/edit')->with('incidencia',$incidencia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$idinci)
    {
        //echo "updateando incidencia $idinci";
        $incidencia = Incidencia::find($idinci);

        $incidencia->actualizar($request);

        echo "hecho";

       /* Session::flash('message', 'Ticket actualizado con éxito');
        Session::forget('errors');


        return Redirect('user/'.$id.'/incidencia');
*/




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
