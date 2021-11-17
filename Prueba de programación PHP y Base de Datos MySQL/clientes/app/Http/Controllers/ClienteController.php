<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['clientes']=cliente::paginate(5);//consulta info
        return view('cliente.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validar datos
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Ruc'=>'required|string|max:100',
            'Telefono'=>'required|string|max:100',
            'Direccion'=>'required|string|max:100',
            'Activo'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Direccion.required'=>'La direccion es requerida'

        ];

        $this->validate($request,$campos,$mensaje);

        // $datosCliente = request()->all();//obtiene todos los  datos
        $datosCliente = request()->except('_token');//obtiene los datos menos el campo token
        cliente::insert($datosCliente);//inserta los datos
       // return response()->json($datosCliente);//retorna los datos enviados

       return redirect('cliente')->with('mensaje','Cliente agregado! ');//redirecciona al index con mensaje
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cliente = cliente::findOrFail($id);//busca info por id
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Ruc'=>'required|string|max:100',
            'Telefono'=>'required|string|max:100',
            'Direccion'=>'required|string|max:100',
            'Activo'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Direccion.required'=>'La direccion es requerida'

        ];

        $this->validate($request,$campos,$mensaje);


        //
        $datosCliente = request()->except(['_token','_method']);//recepciona datos
        cliente::where('id','=',$id)->update($datosCliente);
        //regresa al formulario
        $cliente = cliente::findOrFail($id);
        //return view('cliente.edit', compact('cliente'));
        return redirect('cliente')->with('mensaje','Ha sido actualizado correctamente! ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        cliente::destroy($id);//borra

        //redirecciona a los registros
        return redirect('cliente')->with('mensaje','Ha sido borrado correctamente! ');
    }
}
