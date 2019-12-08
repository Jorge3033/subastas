@extends('layouts.upFormsAdmin')

@section('tableName')
  Usuarios
@stop
 
@section('form')                    
                  {{ Form::open(['route'=>'modifyUsers','files'=>true]) }}
                  {{ Form::token() }}
                    

                    <div class="form-group">
                      <label for="">id</label>
                      <label for="" class="form-control text-center">{{ $info->id }}</label>
                      <input type="text" name="id" value="{{ $info->id }}" hidden="">
                    </div>

                    <div class="form-group">
                        @if($errors->first('usuario'))
                          {{ $errors->first('usuario'),"<br>"}}
                        @endif
                        {{ Form::label('usuario', 'Usuario',[ 'class'=>'btn'] ) }}
                        {{ Form::text('usuario', $info->user, ['class'=>'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        @if($errors->first('contrasena'))
                          {{ $errors->first('contrasena'),"<br>"}}
                        @endif
                        {{ Form::label('contrasena', 'Contraseña',[ 'class'=>'btn'] ) }}
                        {{ Form::text('contrasena', $info->password, ['class'=>'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        @if($errors->first('nombre'))
                          {{ $errors->first('nombre'),"<br>"}}
                        @endif
                        {{ Form::label('Nombre', 'Nombre',[ 'class'=>'btn'] ) }}
                        {{ Form::text('nombre', $info->name, ['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                        @if($errors->first('apellidos'))
                          {{ $errors->first('apellidos'),"<br>"}}
                        @endif
                        {{ Form::label('apellidos', 'Apellidos',[ 'class'=>'btn'] ) }}
                        {{ Form::text('apellidos', $info->LastName, ['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                        @if($errors->first('correo'))
                          {{ $errors->first('correo'),"<br>"}}
                        @endif
                        {{ Form::label('correo', 'Correo',[ 'class'=>'btn'] ) }}
                        {{ Form::text('correo', $info->mail, ['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        @if($errors->first('telefono'))
                          {{ $errors->first('telefono'),"<br>"}}
                        @endif
                        {{ Form::label('telefono', 'Telefono',[ 'class'=>'btn'] ) }}
                        {{ Form::text('telefono', $info->phone, ['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                      <label for="">Sexo</label>
                      <select name="sexo" id="" class="form-control">
                        <option value="H">Hombre</option>
                        <option value="M">Mujer</option>
                      </select>
                    </div>

                    <div class="form-group">
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

                  
                 
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
                    {{ Form::submit('Modificar', ['class'=>'btn btn-warning']) }}            
                    {{ Form::close() }}
                  
             


@stop

