@extends('layouts.upFormsAdmin')

@section('tableName')
  Usuarios
@stop

@section('form')


                    <h4 class="modal-title"><img src="{{ asset('public/photos/usersPhotos/noPhotoMan.png') }}" width="50" height="50"> Alta Usuario</h4>
                  
                  <div class="modal-body">
                    {{ Form::open(['route'=>'upUsers','files'=>true]) }}
                  {{ Form::token() }}
                    

                    <div class="form-group">
                      <label for="">id</label>
                      <label for="" class="form-control ">{{ $nextId}}</label>
                      <input type="text" name="id" value="{{ $nextId }}" hidden="" >
                    </div>
 
                    <div class="form-group">
                        @if($errors->first('usuario'))
                          {{ $errors->first('usuario'),"<br>"}}
                        @endif
                        {{ Form::label('usuario', 'Usuario',[ 'class'=>'btn'] ) }}
                        {{ Form::text('usuario', old('usuario'), ['class'=>'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        @if($errors->first('contrasena'))
                          {{ $errors->first('contrasena'),"<br>"}}
                        @endif
                        {{ Form::label('contrasena', 'Contraseña',[ 'class'=>'btn'] ) }}
                        {{ Form::text('contrasena', old('Contrasena'), ['class'=>'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        @if($errors->first('nombre'))
                          {{ $errors->first('nombre'),"<br>"}}
                        @endif
                        {{ Form::label('Nombre', 'Nombre',[ 'class'=>'btn'] ) }}
                        {{ Form::text('nombre', old('nombre'), ['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                        @if($errors->first('apellidos'))
                          {{ $errors->first('apellidos'),"<br>"}}
                        @endif
                        {{ Form::label('apellidos', 'Apellidos',[ 'class'=>'btn'] ) }}
                        {{ Form::text('apellidos', old('apelldo'), ['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                        @if($errors->first('correo'))
                          {{ $errors->first('correo'),"<br>"}}
                        @endif
                        {{ Form::label('correo', 'Correo',[ 'class'=>'btn'] ) }}
                        {{ Form::email('correo', old('correo'), ['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        @if($errors->first('telefono'))
                          {{ $errors->first('telefono'),"<br>"}}
                        @endif
                        {{ Form::label('telefono', 'Telefono',[ 'class'=>'btn'] ) }}
                        {{ Form::number('telefono', old('telefono'), ['class'=>'form-control']) }}
                    </div>              
                    <div class="form-group">
                      <label for="">Sexo</label>
                        <select name="sexo" id="" class="form-control">
                            <option value="H">Hombre</option>
                            <option value="M">Mujer</option>
                        </select>                                
                        
                            
                        
                    </div>

                    <div class="form-group">
                      @if($errors->first('photo'))
                          {{ $errors->first('photo'),"<br>"}}
                        @endif
                      <label for="">Subir Foto</label>
                      {{ Form::file('photo', ['class'=>'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                      <label for="">Estado</label>  
                      <select name="estado" id="" class="form-control">
                          <option value="activo">Activo</option>
                      </select>
                    </div>  
                  </div>
                    
                    <a href="/reportUsers" class="btn btn-danger" data-dismiss="modal">Cancelar</a> 
                    {{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}            
                    {{ Form::close() }}
@stop

                  