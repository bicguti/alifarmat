<?php

namespace Alifarmat\Http\Controllers;

use Illuminate\Http\Request;

use Alifarmat\Http\Requests;
use Session;
//use DispatchesJobs, ValidatesRequests;

class puesto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $puestos = \Alifarmat\PUESTO::All();
        return view('puesto.index', compact('puestos'), ['activo'=>'administracion']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('puesto.npuesto', ['activo'=>'administracion']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Crea la matriz de mensajes.
      $mensajes = array(
      'required' => 'Hey! EL campo :attribute es requerido!!!.',
      'min' => 'Hey! El campo :attribute debe tener como minimo :min caracteres!!!',
      'max' => 'Hey! El campo :attribute no puede tener mas de :max caracteres!!!',
      'alpha' => 'Hey! El campo :attribute solo puede contener letras del alfabeto!!!',
      'unique' => 'Hey! El valor del campo :attribute ya existe en la base de datos, tiene que ser unico!!!'
      );

      //Crear las reglas de validacion
        $v = \Validator::make($request->all(), [

            'nombre' => 'required|min:3|max:45|unique:PUESTO,nombre_puesto|alpha',
        ], $mensajes);
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $msg = \Alifarmat\PUESTO::setPuesto(mb_strtolower($request['nombre']));
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
        $puesto = \Alifarmat\PUESTO::findPuesto($id);
        //$puesto = \Alifarmat\PUESTO::find($id);
        return view('puesto.epuesto', ['puesto'=>$puesto]);
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
      //mensajes de validacion
        $mensajes = array(
        'required' => 'Hey! EL campo :attribute es requerido!!!.',
        'min' => 'Hey! El campo :attribute debe tener como minimo :min caracteres!!!',
        'max' => 'Hey! El campo :attribute no puede tener mas de :max caracteres!!!',
        'alpha' => 'Hey! El campo :attribute solo puede contener letras del alfabeto!!!',
        'unique' => 'Hey! El valor del campo :attribute ya existe en la base de datos, tiene que ser unico!!!'
        );

        //reglas de validacion
        $v = \Validator::make($request->all(), [
            'nombre_puesto' => 'required|min:3|max:45|unique:PUESTO,nombre_puesto|alpha',
        ], $mensajes);

        //si falla la validacion
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        //de lo contrario se actualiza en la base de datos
        $msg = \Alifarmat\PUESTO::updatePuesto($id, mb_strtolower($request['nombre_puesto']));
        $aux = '';
        foreach ($msg as $key => $value) {
          $aux = $value->msg;
        }

        Session::flash('message',$aux);
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
