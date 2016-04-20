<?php

namespace Alifarmat\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use Alifarmat\Http\Requests;
use Alifarmat\Http\Requests\LoginRequest;

class autentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::user() != null) {
        return Redirect::to('paginainicial');
      }else {
        return view('autenticacion.index');
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $miRequest)
    {
        if (Auth::attempt(['email'=>$miRequest['email'], 'password'=>$miRequest['password']])) {
          return Redirect::to('paginainicial');
        }
        Session::flash('message-error', 'Datos son incorrectos');
        return Redirect::to('/');
    }

    public function salir()
    {
      Auth::logout();
      return Redirect::to('/');
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

    }
}
