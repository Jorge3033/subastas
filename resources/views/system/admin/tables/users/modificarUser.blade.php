@extends('layouts.upFormsAdmin')
@section('tableName')
  Modificar a {{ $consulta->user }}
@stop

@section('form')

   
     {{ Form::open(['route'=>'modificarUsers','files'=>true]) }}
                  {{ Form::token() }}
                    

                    <div class="form-group">
                      <label for="">id</label>
                      <label for="" class="form-control ">{{ $consulta->id }}</label>
                      <input type="text" name="id" value="{{ $consulta->id }}" hidden="">
                    </div>

                    <div class="form-group">
                        @if($errors->first('usuario'))
                          {{ $errors->first('usuario'),"<br>"}}
                        @endif
                        {{ Form::label('usuario', 'Usuario',[ 'class'=>'btn'] ) }}
                        {{ Form::text('usuario', $consulta->user, ['class'=>'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        @if($errors->first('contrasena'))
                          {{ $errors->first('contrasena'),"<br>"}}
                        @endif
                        {{ Form::label('contrasena', 'Contraseña',[ 'class'=>'btn'] ) }}
                        {{ Form::text('contrasena', $consulta->password, ['class'=>'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        @if($errors->first('nombre'))
                          {{ $errors->first('nombre'),"<br>"}}
                        @endif
                        {{ Form::label('Nombre', 'Nombre',[ 'class'=>'btn'] ) }}
                        {{ Form::text('nombre', $consulta->name, ['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                        @if($errors->first('apellidos'))
                          {{ $errors->first('apellidos'),"<br>"}}
                        @endif
                        {{ Form::label('apellidos', 'Apellidos',[ 'class'=>'btn'] ) }}
                        {{ Form::text('apellidos', $consulta->LastName, ['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                        @if($errors->first('correo'))
                          {{ $errors->first('correo'),"<br>"}}
                        @endif
                        {{ Form::label('correo', 'Correo',[ 'class'=>'btn'] ) }}
                        {{ Form::text('correo', $consulta->mail, ['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        @if($errors->first('telefono'))
                          {{ $errors->first('telefono'),"<br>"}}
                        @endif
                        {{ Form::label('telefono', 'Telefono',[ 'class'=>'btn'] ) }}
                        {{ Form::text('telefono', $consulta->phone, ['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                      <label for="">Sexo</label>
                      <select name="sexo" id="" class="form-control">
                        @if ($consulta->sex=='H')
                          <option value="H" selected>Hombre</option>
                          <option value="M" >Mujer</option>

                        @else
                          <option value="M" selected>Mujer</option>
                          <option value="H" >Hombre</option>  
                        @endif
                      </select>
                    </div>

                    <div class="form-group">
                      @if($errors->first('photo'))
                          {{ $errors->first('photo'),"<br>"}}
                        @endif
                      <label for="">Cambiar Foto</label>
                      {{ Form::file('photo', ['class'=>'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                      <label for="">Estado</label>  
                      <select name="estado" id="" class="form-control">
                          <option value="activo">Activo</option>
                          <option value="inactivo">Inactivo</option>
                      </select>
                    </div>  

                    <input type="text"  name="imagen" value="{{ $consulta->photo }}" hidden="true"> 
                 
                    <a href="/reportUsers" class="btn btn-danger" data-dismiss="modal">Cancelar</a> 
                    {{ Form::submit('Modificar', ['class'=>'btn btn-warning']) }}            
                    {{ Form::close() }}
   

@stop