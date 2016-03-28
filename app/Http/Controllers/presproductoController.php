<?php

namespace Alifarmat\Http\Controllers;

use Illuminate\Http\Request;

use Alifarmat\Http\Requests;
use \Alifarmat\Presentacion_producto;
use \Validator;
use Session;
class presproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $presentaciones = Presentacion_producto::getAll();
        return view('presproducto.index', ['activo'=>'inventario', 'presproducto'=>$presentaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('presproducto.npresproducto', ['activo'=>'inventario']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //mensajes personalizados de validacion.
          $mensajes = array(
          'required' => 'Hey! EL campo :attribute es requerido!!!.',
          'max' => 'Hey! El campo :attribute no puede tener mas de :max caracteres!!!',
          'unique' => 'Hey! El valor del campo :attribute ya existe en la base de datos, tiene que ser unico!!!',

          );

          //crear las reglas de validacion para los campos
          $v = Validator::make(
          $request->all(),
          [
            'nombre_presentacion_producto' => 'required|max:50|unique:PRESENTACION_PRODUCTO,nombre_presentacion_producto',
          ],
          $mensajes
        );

        //verificando si todas las validaciones fueron correctas
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $nombre = mb_strtolower($request['nombre_presentacion_producto']);
        $msg = Presentacion_producto::setPresProducto($nombre);
        $aux = '';
        foreach ($msg as $key => $value) {
          $aux = $value->msg;//buscamos el contenido del mensaje
        }
        Session::flash('message',$aux);//creamos la variable temporal que contendra el mensaje
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $presentacion = Presentacion_producto::findPresProducto($id);
        return view('presproducto.epresproducto', ['activo'=>'inventario', 'presentacion'=>$presentacion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //mensajes personalizados de validacion.
      $mensajes = array(
      'required' => 'Hey! EL campo :attribute es requerido!!!.',
      'max' => 'Hey! El campo :attribute no puede tener mas de :max caracteres!!!',
      'unique' => 'Hey! El valor del campo :attribute ya existe en la base de datos, tiene que ser unico!!!',
      );

      //crear las reglas de validacion para los campos
      $v = Validator::make(
      $request->all(),
      [
        'nombre_presentacion_producto' => 'required|max:50|unique:PRESENTACION_PRODUCTO,nombre_presentacion_producto,'.$id.',id_presentacion_producto',
      ],
      $mensajes
    );

    //verificando si todas las validaciones fueron correctas
    if ($v->fails())
    {
        return redirect()->back()->withInput()->withErrors($v->errors());
    }
    $nombre = mb_strtolower($request['nombre_presentacion_producto']);
    $msg = Presentacion_producto::updatePresProducto($nombre, $id);
    $aux = '';
    foreach ($msg as $key => $value) {
      $aux = $value->msg;//buscamos el contenido del mensaje
    }
    Session::flash('message',$aux);//creamos la variable temporal que contendra el mensaje
    return $this->index();
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
