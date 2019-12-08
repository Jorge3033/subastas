@extends('layouts.upFormsAdmin')

@section('tableName')
  Preventas 
@stop

@section('form')


                    <h4 class="modal-title"><img src="{{ asset('Photos/folder.jfif') }}" width="50" height="50"> Alta Preventas</h4>
                  
                  <div class="modal-body">
                    {{ Form::open(['route'=>'upPresales']) }}
                  {{ Form::token() }}
                    

                    <div class="form-group">
                      <label for="">id</label>
                      <label for="" class="form-control ">{{ $nextId}}</label>
                      <input type="text" name="id" value="{{ $nextId }}" hidden="" >
                    </div>                   
                    
                     <div class="form-group">
                      <label for="">Comprador</label>
                      <select name="usuario" id="" class="form-control">
                        @foreach ($users as $c)
                          <option value="{{ $c->id }}">{{ $c->user }}</option>
                        @endforeach
                      </select>
                    </div> 
                    
                    <div class="form-group">
                      <label for="">Productos</label>
                      <select name="categoria" id="" class="form-control">
                        @foreach ($articles as $c)
                          <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                      </select>
                    </div>  
                    
                    <div class="form-group">
                        @if($errors->first('oferta'))
                          {{ $errors->first('oferta'),"<br>"}}
                        @endif
                        {{ Form::label('oferta', 'Precio A ofertar',[ 'class'=>'btn'] ) }}
                        {{ Form::number('oferta', old('oferta'), ['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                      <label for="">Estado</label>  
                      <select name="estado" id="" class="form-control">
                          <option value="pendiente">Activo</option>
                      </select>
                    </div>  
                  </div>
                    
                    <a href="/reportPresales" class="btn btn-danger" data-dismiss="modal">Cancelar</a> 
                    {{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}            
                    {{ Form::close() }}
@stop

                  