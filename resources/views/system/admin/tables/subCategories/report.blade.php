@extends('layouts.reportTemplateAdmin')

@section('tableTitle')
	Subcategorias 
  <a href="formUpSubCategory"><i class="fas fa-plus-circle text-success"></i></a> 
@stop

@section('topTitle')
	<th>Foto</th>
	<th>Nombre</th>
  <th>Categoria</th>
	<th>Estado</th>
  <th>Acciones</th>
@stop

@section('lowerTitle')
	<th>Foto</th>
  <th>Nombre</th>
  <th>Categoria</th>
  <th>Esado</th>
  <th>Acciones</th>

@stop 

@section('records')
	@foreach ($report as $r)
		<tr>
			<td><img src="{{ asset('public/photos/folder.jfif') }}" width="50" height="50"></td>
			<td>{{ $r->name }}</td>
			<td>{{ $r->category }}</td>
			<td>
          @if ($r->status=="activo")
                <div class="btn btn-success">{{ $r->status }}</div>
          @else        
                <div class="btn btn-danger">{{ $r->status }}</div>
          @endif
        
      </td>
      <td>
        @if ($r->status!="activo")
          <a href="{{ URL::action('SubCategoryController@unlock',['SubCategoryId'=>$r->id]) }}"><div class="h2 "><i class="fas fa-unlock-alt"></i></div></a>
        @else
        
    
          <a href="{{ URL::action('SubCategoryController@lock',['SubCategoryId'=>$r->id]) }}"><div class="btn btn-danger"><i class="fas fa-lock "></i></div></a>
          <a href="{{ URL::action('SubCategoryController@modificarSubCategory',['SubCategoryId'=>$r->id]) }}"><i class="fas fa-edit btn btn-warning"></i></a>
        




        <!-- Modal De informacion de Usuarios-->
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal--{{ $r->id }}">
            <i class="fas fa-info-circle"></i>
           </button>
          <!-- The Modal -->
          <div class="modal fade" id="myModal--{{ $r->id }}">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">   
                <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title"><img src="{{ asset('public/photos/folder.jfif') }}" width="50" height="50"> {{ $r->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                 <!-- Modal body -->
                  <div class="modal-body">
                    <label for="">Id: {{ $r->id }}</label><br>
                    <label for="">Nombre: {{ $r->name }}</label><br>
                    <label for="">Categoria: {{ $r->category }}</label><br>
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
              </div>
            </div>
          </div>
          @endif
      </td>
		</tr>
	@endforeach

@stop

