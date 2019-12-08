@extends('layouts.upFormsAdmin')

@section('tableName')
  Subcategorias 
@stop

@section('form')


                    <h4 class="modal-title"><img src="{{ asset('Photos/folder.jfif') }}" width="50" height="50"> Alta Subcategoria</h4>
                  
                  <div class="modal-body">
                    {{ Form::open(['route'=>'modificarSubCategories']) }}
                  {{ Form::token() }}
                    

                    <div class="form-group">
                      <label for="">id</label>
                      <label for="" class="form-control ">{{ $consulta->id}}</label>
                      <input type="text" name="id" value="{{ $consulta->id }}" hidden="" >
                    </div>                   
                    <div class="form-group">
                        @if($errors->first('nombre'))
                          {{ $errors->first('nombre'),"<br>"}}
                        @endif
                        {{ Form::label('Nombre', 'Nombre',[ 'class'=>'btn'] ) }}
                        {{ Form::text('nombre', $consulta->name, ['class'=>'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                      <label for="">Categoria</label>
                      <select name="categoria" id="" class="form-control">
                        
                        @foreach ($categories as $c)
                          @if ($c->id==$consulta->idCategory)
                              <option value="{{ $c->id }}" selected="true">{{ $c->name }}</option>
                          @else
                            <option value="{{ $c->id }}">{{ $c->name }}</option>  
                          @endif
                        @endforeach
                      </select>
                    </div>  

                    <div class="form-group">
                      <label for="">Estado</label>  
                      <select name="estado" id="" class="form-control">
                          <option value="activo">Activo</option>
                          <option value="inactivo">Inactivo</option>
                      </select>
                    </div>  
                  </div>
                    
                    <a href="/reportSubCategories" class="btn btn-danger" data-dismiss="modal">Cancelar</a> 
                    {{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}            
                    {{ Form::close() }}
@stop

                  