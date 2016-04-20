<?php

namespace Alifarmat\Http\Controllers;

use Illuminate\Http\Request;

use Alifarmat\Http\Requests;
use \Alifarmat\Empleado;
use \Alifarmat\Departamento;
use \Alifarmat\PUESTO;
use \Alifarmat\Municipio;
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
      $empleados = Empleado::paginate(2);
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
            'nombre_empleado' => 'required|max:50',
            'apellidos_empleado' => 'required|max:50',
            'dpi_empleado' => 'required|min:13|unique:EMPLEADO,dpi_empleado|numeric',
            'genero_empleado' => 'required',
            'domicilio_empleado' => 'required',
            'zona_empleado' => 'required',
            'telefono_empleado' => 'required|min:8|numeric',
            'telefono_emergencias_empleado' => 'min:8|numeric',
            'fecha_nacimiento_empleado' => 'required|date_format:"Y-m-d"',
            'correo_empleado' => 'required|email',
            'id_municipio' => 'required|numeric',
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
        $datos = EMPLEADO::findEmpleado($id);//obtemeos todos los datos del empleado
        $departamentos = Departamento::getAll();//obtenemos todos los nombres de los departamentos
        $puestos = PUESTO::getPuestos();//obtenemos todos los nombres de lospuestos
      //extraemos de los datos del empleado el id_municipio que le corresponde
        $idDepto = Municipio::findDepto( $datos->id_municipio);//buscamos el id_departamento al que le pertenece el municipio
        $municipios = Municipio::findMunicipios($idDepto->id_departamento);//buscamos los municipios de ese departamento
      //retornamos la vista donde se editaran los datos
      return view('empleado.eempleado', ['activo'=>'administracion', 'empleado'=>$datos, 'puestos'=>$puestos, 'departamentos'=>$departamentos, 'municipios'=>$municipios, 'idDepto' => $idDepto->id_departamento]);
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
            'nombres_empleado' => 'required|max:50',
            'apellidos_empleados' => 'required|max:50',
            'dpi_empleado' => 'required|min:13|numeric|unique:EMPLEADO,dpi_empleado,'.$id.',id_empleado',
            'genero_empleado' => 'required',
            'domicilio_empleado' => 'required',
            'zona_empleado' => 'required',
            'telefono_empleado' => 'required|min:8|numeric',
            'telefono_emergencias_empleado' => 'min:8|numeric',
            'fecha_nacimiento_empleado' => 'required|date_format:"Y-m-d"',
            'correo_empleado' => 'required|email',
            'id_municipio' => 'required|numeric',
            'id_puesto' => 'required'
          ],
          $mensajes
          );

          //verificando si todas las validaciones fueron correctas
          if ($v->fails())
          {
              return redirect()->back()->withInput()->withErrors($v->errors());
          }
          $nombre = mb_strtolower($request['nombres_empleado']);
          $apellidos = mb_strtolower($request['apellidos_empleados']);
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

          $msg = EMPLEADO::updateEmpleado($id, $nombre, $apellidos, $genero, $domicilio, $zona, $tel1, $tel2, $fechaNacimiento, $edad, $tipoSangre, $antecedentes, $correo, $municipio, $puesto, $dpi);
          $aux = $msg[0]->msg;
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

    public function buscar(Request $request)
    {
      $resultado = Empleado::searchEmpleado($request['apellidos']);
      return json_encode($resultado);
    }
}
