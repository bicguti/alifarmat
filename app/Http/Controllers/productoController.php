<?php

namespace Alifarmat\Http\Controllers;

use Illuminate\Http\Request;

use Alifarmat\Http\Requests;
use \Alifarmat\Producto;
use \Alifarmat\Proveedor;
use \Validator;
use Session;
use \Alifarmat\Presentacion_producto;
class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::getAll();
        return view('producto.index', ['activo'=>'inventario', 'productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $presentaciones = Presentacion_producto::getAll();
      $variableproveedor = Proveedor::getAll();

      return view('producto.nproducto', ['activo'=>'inventario', 'presentaciones'=>$presentaciones, 'proveedor' => $variableproveedor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //crear el arreglo de los mensajes de validacion
      $mensajes = array(
      'required' => 'Hey! EL campo :attribute es requerido!!!.',

      'max' => 'Hey! El campo :attribute no puede tener mas de :max caracteres!!!',
      'unique' => 'Hey! El valor del campo :attribute ya existe en la base de datos, tiene que ser unico!!!',
      'numeric' => 'Hey! El campo :attribute tiene que ser numerico!!!',
      'date_format' => 'Hey! El campo :attribute no cumple con el formato año-mes-día!!!'
      );
      //crear las reglas de validacion

      $v = Validator::make(
      $request->all(),
      [
        'nombre_producto' => 'required|max:50|unique:PRODUCTO,nombre_producto',
        'cantidad_en_inventario' => 'required|numeric ',
        'tamano_producto'=> 'required|max:20',
        'descripcion_producto' => 'required|max:500' ,
        'id_proveedor' => 'required',
      ],
      $mensajes
      );

      //verificando si todas las validaciones fueron correctas
      if ($v->fails())
      {
          return redirect()->back()->withInput()->withErrors($v->errors());
      }
      $nombre = mb_strtolower ($request ['nombre_producto']);
      $cantidad = mb_strtolower ($request ['cantidad_en_inventario']);
      $tamano = mb_strtolower ($request ['tamano_producto']);
      $descripcion = mb_strtolower ($request ['descripcion_producto']);
      $idproveedor = mb_strtolower ($request ['id_proveedor']);

      $msg = Producto::setProducto($nombre, $cantidad, $tamano, $descripcion, $idproveedor);

      Session::flash('message',$msg[0]->msg);
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
        //
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
        //
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
