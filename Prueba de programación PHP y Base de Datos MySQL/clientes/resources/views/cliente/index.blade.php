@extends('layouts.app')
@section('content')
<div class="container">


  

    @if(Session::has('mensaje'))
      <div class="alert alert-success alert-dismissible" role="alert">    
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><!--para q desaparezca alert-->
            <span aria-hidden="true">&times;</span>
        </button>
      </div>

    @endif

  
   
    <a href="{{ url('cliente/create') }}" class="btn btn-outline-success">Registrar cliente nuevo</a>
    <br>
    <br>

    <table class="table table-bordered text-center shadow p-3 mb-5 bg-body rounded ">
        <thead class= "thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Ruc</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Activo</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="text-secondary">
            @foreach( $clientes as $cliente )<!--captura datos de bd-->
            <tr>
                <td class=" text-dark">{{ $cliente->id }}</td>
                <td class="text-left">{{ $cliente->nombre }}</td>
                <td>{{ $cliente->ruc }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td class="text-left">{{ $cliente->direccion }}</td>
                <td>{{ $cliente->activo }}</td>
                <td>
                    <a href="{{ url('/cliente/'.$cliente->id.'/edit') }}" class="btn btn-info">
                        Editar
                    </a>
                    | 
                    

                    
                    <form action="{{ url('/cliente/'.$cliente->id) }}" class="d-inline" method="post">
                    @csrf 
                    {{ method_field('DELETE') }}<!--para validar el delete-->
                    <input class="btn btn-danger " type="submit" onclick="return confirm('¿Desea eliminar?') " value="Eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
