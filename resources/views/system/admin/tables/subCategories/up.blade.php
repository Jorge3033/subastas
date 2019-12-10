@extends('layouts.upFormsAdmin')

@section('tableName')
  Subcategorias 
@stop

@section('form')


                    <h4 class="modal-title"><img src="{{ asset('public/photos/folder.jfif') }}" width="50" height="50"> Alta Subcategoria</h4>
                  
                  <div class="modal-body">
                    {{ Form::open(['route'=>'upSubCategories']) }}
                  {{ Form::token() }}
                    

                    <div class="form-group">
                      <label for="">id</label>
                      <label for="" class="form-control ">{{ $nextId}}</label>
                      <input type="text" name="id" value="{{ $nextId }}" hidden="" >
                    </div>                   
                    <div class="form-group">
                        @if($errors->first('nombre'))
                          {{ $errors->first('nombre'),"<br>"}}
                        @endif
                        {{ Form::label('Nombre', 'Nombre',[ 'class'=>'btn'] ) }}
                        {{ Form::text('nombre', old('nombre'), ['class'=>'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                      <label for="">Categoria</label>
                      <select name="categoria" id="" class="form-control">
                        @foreach ($categories as $c)
                          <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                      </select>
                    </div>  

                    <div class="form-group">
                      <label for="">Estado</label>  
                      <select name="estado" id="" class="form-control">
                          <option value="activo">Activo</option>
                      </select>
                    </div>  
                  </div>
                    
                    <a href="/reportSubCategories" class="btn btn-danger" data-dismiss="modal">Cancelar</a> 
                    {{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}            
                    {{ Form::close() }}
@stop

                  