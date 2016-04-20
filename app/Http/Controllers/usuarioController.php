<?php

namespace Alifarmat\Http\Controllers;

use Illuminate\Http\Request;

use Alifarmat\Http\Requests;
Use Alifarmat\User;
use \Validator;
use Session;
class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $usuarios = User::All();
        return view('usuario.index', ['usuarios'=>$usuarios, 'activo'=>'administracion']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.nusuario', ['activo'=>'administracion']);
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
          'date_format' => 'Hey! El campo :attribute no cumple con el formato año-mes-día!!!',
          'same'=>'Hey! El campo Repetir Contraseña debe ser igual al campo Contraseña'
          );
          //crear las reglas de validacion
          $v = Validator::make(
          $request->all(),
          [
            'name' => 'required|max:100',
            'password' => 'required|max:20|min:5',
            'repeat_password' => 'required|min:5|max:20|same:password',
            'email' => 'required|email|unique:users,email'
          ],
          $mensajes
        );

        //verificando si todas las validaciones fueron correctas
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        User::create([
          'name'=>$request['name'],
          'email'=>$request['email'],
          'password'=>bcrypt($request['password'])
        ]);
        Session::flash('message', 'El nuevo usuario a sido registrado exitosamente ahora ya puede ingresar al sistema con su correo y password registrados!!!');
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
