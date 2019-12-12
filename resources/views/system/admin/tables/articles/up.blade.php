@extends('layouts.upFormsAdmin')

@section('tableName')
  Articulos 
@stop

@section('form') 


                    <h4 class="modal-title"><img src="{{ asset('public/photos/articlesPhotos/box.jpg') }}" width="50" height="50"> Alta de Articulos</h4>
                  
                  <div class="modal-body">
                    {{ Form::open(['route'=>'upArticles','files'=>true]) }}
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
                        {{ Form::label('Nombre', 'Nombre del Producto',[ 'class'=>'btn'] ) }}
                        {{ Form::text('nombre', old('nombre'), ['class'=>'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        @if($errors->first('marca'))
                          {{ $errors->first('marca'),"<br>"}}
                        @endif
                        {{ Form::label('marca', 'Marca',[ 'class'=>'btn'] ) }}
                        {{ Form::text('marca', old('marca'), ['class'=>'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        @if($errors->first('precio'))
                          {{ $errors->first('precio'),"<br>"}}
                        @endif
                        {{ Form::label('precio', 'Precio',[ 'class'=>'btn'] ) }}
                        {{ Form::number('precio', old('precio'), ['class'=>'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        @if($errors->first('fechaInicial'))
                          {{ $errors->first('fechaInicial'),"<br>"}}
                        @endif
                        {{ Form::label('fecha', 'Fecha inicial de Publicacion',[ 'class'=>'btn'] ) }}
                        <input type="date" class="form-control" name="fechaInicial">
                    </div>
                    <div class="form-group">
                        @if($errors->first('fechaFinal'))
                          {{ $errors->first('fechaFinal'),"<br>"}}
                        @endif
                        {{ Form::label('fecha', 'Fecha final de Publicacion',[ 'class'=>'btn'] ) }}
                        <input type="date" class="form-control" name="fechaFinal">
                    </div>

                    <div class="form-group">
                      <label for="">Categoria</label>
                      <select name="categorias" id="" class="form-control">
                          @foreach ($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="">Vendedor</label>
                      <select name="vendedor" id="" class="form-control">
                        @foreach ($sellers as $s)
                          <option value="{{ $s->id }}">{{ $s->name }}</option>
                        @endforeach
                      </select>
                    </div>  
                    
                    <div class="form-group">
                       @if($errors->first('photo'))
                          {{ $errors->first('photo'),"<br>"}}
                        @endif
                      <label for="">Foto <i class="text-danger">*</i></label>
                      {{ Form::file('photo', ['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                      <label for="">Estado</label>  
                      <select name="estado" id="" class="form-control">
                          <option value="activo">Activo</option>
                      </select>
                    </div>  
                  </div>
                    
                    
                    <a href="/reportArticles" class="btn btn-danger" data-dismiss="modal">Cancelar</a> 
                    {{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}            
                    {{ Form::close() }}
@stop

                  