<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/
//Route::get('/', 'inicio@index');
if (Auth::user() == null) {

      Redirect::to('/');

}
Route::get('/', 'inicio@index');
//Route::get('/', 'autentController@index');
Route::get('salir', 'autentController@salir');
Route::resource('autenticacion', 'autentController');

Route::get('paginainicial', 'inicio@index');
Route::resource('puesto', 'puesto');
Route::resource('empleado', 'empleadoController');
Route::resource('usuario', 'usuarioController');
Route::get('github', 'PDFController@github');
Route::get('municipio', 'municipioController@index');
Route::get('persona', 'empleadoController@buscar');
Route::resource('presproducto', 'presproductoController');
Route::resource('producto', 'productoController');
Route::resource('proveedor', 'proveedorController');
Route::resource('envio', 'envioController');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
