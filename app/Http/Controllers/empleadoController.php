<?php

namespace Alifarmat\Http\Controllers;

use Illuminate\Http\Request;

use Alifarmat\Http\Requests;
use \Alifarmat\Empleado;
use \Alifarmat\Departamento;
use \Alifarmat\PUESTO;
use \Validator;
use Session;
class empleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $empleados = Empleado::All();
        return view('empleado.index', compact('empleados'),['activo'=>'administracion']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::getAll();
        $puestos = PUESTO::getPuestos();
        return view('empleado.nempleado', ['activo'=>'administracion', 'puestos'=>$puestos, 'departamentos'=>$departamentos]);
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
          'min' => 'Hey! El campo :attribute debe tener como minimo :min caracteres!!!',
          'max' => 'Hey! El campo :attribute no puede tener mas de :max caracteres!!!',
          'alpha' => 'Hey! El campo :attribute solo puede contener letras del alfabeto!!!',
          'unique' => 'Hey! El valor del campo :attribute ya existe en la base de datos, tiene que ser unico!!!',
          'numeric' => 'Hey! El campo :attribute tiene que ser numerico!!!',
          'date_format' => 'Hey! El campo :attribute no cumple con el formato año-mes-día!!!'
          );
          //crear las reglas de validacion
          $v = Validator::make(
          $request->all(),
          [
            'nombre_empleado' => 'required|max:50|alpha',
            'apellidos_empleado' => 'required|max:50|alpha',
            'dpi_empleado' => 'required|min:13|unique:EMPLEADO,dpi_empleado|numeric',
            'genero_empleado' => 'required',
            'domicilio_empleado' => 'required',
            'zona_empleado' => 'required',
            'telefono_empleado' => 'required|min:8|numeric',
            'telefono_emergencias_empleado' => 'min:8|numeric',
            'fecha_nacimiento_empleado' => 'required|date_format:"Y-m-d"',
            'correo_empleado' => 'required|email',
            'id_municipio' => 'required',
            'id_puesto' => 'required'
          ],
          $mensajes
        );

        //verificando si todas las validaciones fueron correctas
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $nombre = mb_strtolower($request['nombre_empleado']);
        $apellidos = mb_strtolower($request['apellidos_empleado']);
        $dpi = $request['dpi_empleado'];
        $genero = $request['genero_empleado'];
        $domicilio = mb_strtolower($request['domicilio_empleado']);
        $zona = $request['zona_empleado'];
        $tel1 = $request['telefono_empleado'];
        $tel2 = $request['telefono_emergencias_empleado'];
        $fechaNacimiento = $request['fecha_nacimiento_empleado'];
        $edad = date('Y') - $fechaNacimiento;
        $correo = mb_strtolower($request['correo_empleado']);
        $municipio = $request['id_municipio'];
        $puesto = $request['id_puesto'];
        $tipoSangre = $request['tipo_sangre_empleado'];

        if (isset($request['antecedentes_empleado'])) {
          $antecedentes = $request['antecedentes_empleado'];
        } else {
          $antecedentes = false;
        }


        $msg = EMPLEADO::setEmpleado($nombre, $apellidos, $genero, $domicilio, $zona, $tel1, $tel2, $fechaNacimiento, $edad, $tipoSangre, $antecedentes, $correo, $municipio, $puesto, $dpi);
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
      //obtenemos los datos del empleado a buscar
        $datos = EMPLEADO::findEmpleado($id);
        $departamentos = Departamento::getAll();
        $puestos = PUESTO::getPuestos();
      //retornamos la vista donde se editaran los datos
      return view('empleado.eempleado', ['activo'=>'administracion', 'empleado'=>$datos, 'puestos'=>$puestos, 'departamentos'=>$departamentos]);       
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
