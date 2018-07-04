<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/** RECURSO users */

Route::get('users', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return \App\User::all()->makeHidden('password');
});

Route::get('users/{id}', function($id) {
    return \App\User::find($id)->makeHidden('password');
});

//SIN PUT, POST O DELETE, SE HACE EN ESTA PLATAFORMA

/* en verdad creo que lo suyo es mandarlo a un metodo deun controlador como apicontroller y alli mirar
si por ejemplo el parametro estado= stock, retirado,rma o instalado...*/

/*
Route::get('users/{id}/iptvstock', function($id) {
    $user=\App\User::find($id);
    $iptvs= $user->iptvsStock();
    return $iptvs;

});

Route::get('users/{id}/iptvinstalados', function($id) {
    $user=\App\User::find($id);
    $iptvs= $user->iptvsInstalados();
    return $iptvs;

});

Route::get('users/{id}/iptvretirados', function($id) {
    $user=\App\User::find($id);
    $iptvs= $user->iptvsRetirados();
    return $iptvs;

});

Route::get('users/{id}/iptvrma', function($id) {
    $user=\App\User::find($id);
    $iptvs= $user->iptvsRMA();
    return $iptvs;

});*/


//Route::get('users/{id}/iptvs', [ 'uses' => 'ApiController@iptvs']);


/** RECURSO IPTVS */

//se pasa por post un parametro "estado" tal que stock,rma,instalado,retirado
Route::post('users/{idusuario}/iptvs', [ 'uses' => 'ApiController@iptvs']);

//C
//crear un iptv
Route::post('iptvs', [ 'uses' => 'ApiController@iptvsCreate']);

//R
Route::get('iptvs/{id}', function($id) {
    return \App\Iptv::find($id);
});


/** RECURSO CLIENTES O HABITACIONES */

Route::get('users/{idusuario}/clientes', [ 'uses' => 'ApiController@clientes']);

Route::post('users/{idusuario}/clientes', function(Request $request) {
    return Article::create($request->all);
});







