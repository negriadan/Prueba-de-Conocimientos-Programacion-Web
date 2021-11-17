@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/cliente/'.$cliente->id )}}" method="post">
        @csrf

        {{ method_field('PATCH') }}<!--uso de patch envia al controlador update-->

        @include( 'cliente.form',['modo'=>'Editar']);

    </form>

</div>
@endsection


