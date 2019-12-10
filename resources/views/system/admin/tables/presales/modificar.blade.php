@extends('layouts.upFormsAdmin')

@section('tableName')
  Modificar Precentas 
@stop

@section('form') 


                    <h4 class="modal-title"><img src="{{ asset('public/photos/folder.jfif') }}" width="50" height="50"> Modificar Preventas</h4>
                  
                  <div class="modal-body">
                    {{ Form::open(['route'=>'modificarPresales']) }}
                  {{ Form::token() }}
                    

                    <div class="form-group">
                      <label for="">id</label>
                      <label for="" class="form-control ">{{ $consulta->id }}</label>
                      <input type="text" name="id" value="{{ $consulta->id }}" hidden="" >
                    </div>                   
                    
                     <div class="form-group">
                      <label for="">Comprador</label>
                      <select name="usuario" id="" class="form-control" disabled>
                          <option value="{{ $consulta->buller }}">{{ $consulta->buyer }}</option>
                      </select>
                    </div> 
                    
                    <div class="form-group">
                      <label for="">Productos</label>
                      <select name="categoria" id="" class="form-control" disabled  >
                          <option value="{{ $consulta->article }}">{{ $consulta->article }}</option>
                      </select>
                    </div>  
                    
                    <div class="form-group">
                        @if($errors->first('oferta'))
                          {{ $errors->first('oferta'),"<br>"}}
                        @endif
                        {{ Form::label('oferta', 'Precio A ofertar',[ 'class'=>'btn'] ) }}
                        {{ Form::number('oferta', $consulta->offeredPrice, ['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                      <label for="">Estado</label>  
                      <select name="estado" id="" class="form-control" >
                          <option value="activo">Activo</option>
                          <option value="pendiente">Pendiente</option>
                      </select>
                    </div>  
                  </div>
                    
                    <a href="/reportPresales" class="btn btn-danger" data-dismiss="modal">Cancelar</a> 
                    {{ Form::submit('Modificar', ['class'=>'btn btn-warning']) }}            
                    {{ Form::close() }}
@stop

                  