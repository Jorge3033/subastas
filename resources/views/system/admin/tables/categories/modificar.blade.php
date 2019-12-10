@extends('layouts.upFormsAdmin')

@section('tableName')
  Usuarios
@stop

@section('form')


                    <h4 class="modal-title"><img src="{{ asset('public/photos/folder.jfif') }}" width="50" height="50"> Modificar Categoria</h4>
                  
                  <div class="modal-body">
                    {{ Form::open(['route'=>'modificarCategories']) }}
                  {{ Form::token() }}
                    

                    <div class="form-group">
                      <label for="">id</label>
                      <label for="" class="form-control">{{ $consulta->id}}</label>
                      <input type="text" name="id" value="{{ $consulta->id }}" hidden="" >
                    </div>                   
                    <div class="form-group">
                        @if($errors->first('nombre'))
                          {{ $errors->first('nombre'),"<br>"}}
                        @endif
                        {{ Form::label('Nombre', 'Nombre',[ 'class'=>'btn'] ) }}
                        {{ Form::text('nombre', $consulta->Name, ['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                        @if($errors->first('descripcion'))
                          {{ $errors->first('descripcion'),"<br>"}}
                        @endif
                        {{ Form::label('descripcion', 'Descripcion',[ 'class'=>'btn'] ) }}
                        {{ Form::text('descripcion', $consulta->description, ['class'=>'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                      <label for="">Estado</label>  
                      <select name="estado" id="" class="form-control">
                          <option value="activo">Activo</option>
                          <option value="inactivo">Inactivo</option>
                      </select>
                    </div>  
                  </div>
                    
                    <a href="/reportCategories" class="btn btn-danger" data-dismiss="modal">Cancelar</a> 
                    {{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}            
                    {{ Form::close() }}
@stop