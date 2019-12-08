@extends('layouts.upFormsAdmin')
@section('tableName')
  Modificar admin: {{ $consulta->name }}
@stop

@section('form')
     {{ Form::open(['route'=>'modificarAdmins','files'=>true]) }}
                  {{ Form::token() }}
                    

                    <div class="form-group">
                      <label for="">id</label>
                      <label for="" class="form-control ">{{ $consulta->id }}</label>
                      <input type="text" name="id" value="{{ $consulta->id }}" hidden="">
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
                        {{ Form::text('apellidos', $consulta->lastName, ['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                        @if($errors->first('correo'))
                          {{ $errors->first('correo'),"<br>"}}
                        @endif
                        {{ Form::label('correo', 'Correo',[ 'class'=>'btn'] ) }}
                        {{ Form::text('correo', $consulta->email, ['class'=>'form-control']) }}
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
                 
                    <a href="/reportAdmins" class="btn btn-danger" data-dismiss="modal">Cancelar</a> 
                    {{ Form::submit('Modificar', ['class'=>'btn btn-warning']) }}            
                    {{ Form::close() }}
@stop