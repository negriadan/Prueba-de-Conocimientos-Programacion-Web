    <h1>{{ $modo }} cliente</h1>

    @if(count($errors)>0) <!--error al no insertar todos los datos-->

        <div class="alert alert-danger" role="alert">
         <ul>
       
            @foreach( $errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>

    @endif

    <div class="form-group">
        <label for="Nombre"> Nombre</label>
        <input type="text" class="form-control" name="Nombre" value="{{ isset($cliente->nombre)?$cliente->nombre:old('nombre') }}" id="txtNombre"> <!--isset para validar-->
    </div>

    <div class="form-group">
        <label for="Ruc"> Ruc</label>
        <input type="text" class="form-control" name="Ruc" value="{{ isset($cliente->ruc)?$cliente->ruc:old('ruc')}}" id="txtRuc">
    </div>

    <div class="form-group">
        <label for="Telefono"> Telefono</label>
        <input type="text"  class="form-control" name="Telefono" value="{{ isset($cliente->telefono)?$cliente->telefono:old('telefono') }}" id="txtTelefono">
    </div>

    <div class="form-group">   
        <label for="Direccion"> Direccion</label>
        <input type="text"  class="form-control" name="Direccion" value="{{ isset($cliente->direccion)?$cliente->direccion:old('direccion') }}" id="txtDireccion">
    </div>

    <div class="form-group">
        <label for="Activo"> Activo</label>
        <input type="text"  class="form-control" name="Activo"  value="{{ isset($cliente->activo)?$cliente->activo:old('activo') }}" id="txtActivo">      
    </div>

   <div class="pr-3 pt-3 float-left">
    <input  class="btn btn-warning btn-lg "type="submit" value="{{ $modo }} datos" > 
   </div>
    
   <div class="pt-3">
    <a href="{{ url('cliente/') }}" class="btn btn-primary btn-lg ">Volver atras</a>
    </div>