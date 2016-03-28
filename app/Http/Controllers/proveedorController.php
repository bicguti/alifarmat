<?php

namespace Alifarmat\Http\Controllers;

use Illuminate\Http\Request;

use Alifarmat\Http\Requests;
use \Alifarmat\Proveedor;
use \Alifarmat\Departamento;
use \Validator;
use Session;
class proveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provedores = Proveedor::getAll();
        return view('proveedor.index', ['activo'=>'inventario', 'provedores'=>$provedores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::getAll();
        return view('proveedor.nproveedor', ['activo'=>'inventario', 'departamentos'=>$departamentos]);
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
          );
          //crear las reglas de validacion
          $v = Validator::make(
          $request->all(),
          [
            'nombre_proveedor' => 'required|max:50|unique:PROVEEDOR,nombre_proveedor',
            'domicilio_proveedor' => 'required|max:50',
            'zona_proveedor' => 'required',
            'id_municipio' => 'required',
            'telefono_proveedor' => 'required|min:8|numeric',
            'telefono_secundario_proveedor' => 'min:8|numeric',
            'representante_proveedor' => 'required|max:100',
          ],
          $mensajes
        );

        //verificando si todas las validaciones fueron correctas
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        //si la validacion fue correcta capturamos los datos de todos los campos
        $nombre = mb_strtolower($request['nombre_proveedor']);
        $domicilio = mb_strtolower($request['nombre_proveedor']);
        $zona = $request['zona_proveedor'];
        $municipio = $request['id_municipio'];
        $telefono = $request['telefono_proveedor'];
        $telefonoSecundario = $request['telefono_secundario_proveedor'];
        $representante = $request['representante_proveedor'];
        //registramos los datos
        $msg = Proveedor::setProveedor($nombre, $domicilio, $zona, $telefono, $telefonoSecundario, $representante, $municipio);
        $aux = '';
        foreach ($msg as $key => $value) {
          $aux = $value->msg;
        }
        Session::flash('message',$aux);
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
