@extends('layouts.reportTemplateAdmin')

@section('tableTitle')
	Peventas
  <a href="formUpPresale"><i class="fas fa-plus-circle text-success"></i></a> 
@stop

@section('topTitle')
	<th>id</th>
	<th>Comprador</th>
  <th>Precio Ofrecido</th>
	<th>Articulo</th>
  <th>estado</th>
  <th>Acciones</th>
@stop

@section('lowerTitle')
	<th>id</th>
  <th>Comprador</th>
  <th>Precio Ofrecido</th>
  <th>Articulo</th>
  <th>estado</th>
  <th>Acciones</th>

@stop 
 
@section('records')  
	@foreach ($report as $r)
		<tr>
			<td>{{ $r->id }}</td>
			<td>{{ $r->buyerName }}</td>
      <td>{{ $r->offeredPrice }}</td>
      <td>{{ $r->articleName }}</td>
			<td>
          @if ($r->status=="aceptada")
                <div class="btn btn-success">{{ $r->status }}</div>
          @else        
                @if ($r->status=="pendiente")
                  <div class="btn btn-warning">{{ $r->status }}</div>
                @else
                  <div class="btn btn-danger">{{ $r->status }}</div>
                @endif

          @endif
        
      </td>
      <td>
        @if ($r->status!="aceptada")
          <a href="{{ URL::action('PresaleController@unlock',['PresaleId'=>$r->id]) }}"><div class="h2 "><i class="fas fa-unlock-alt"></i></div></a>
        @else
        
    
          <a href="{{ URL::action('PresaleController@lock',['PresaleId'=>$r->id]) }}"><div class="btn btn-danger"><i class="fas fa-lock "></i></div></a>
          <a href="{{ URL::action('PresaleController@modificarPresale',['PresaleId'=>$r->id]) }}"><i class="fas fa-edit btn btn-warning"></i></a>
        




        <!-- Modal De informacion de Usuarios-->
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal--{{ $r->id }}" hidden="">
            <i class="fas fa-info-circle"></i>
           </button>
          <!-- The Modal -->
          <div class="modal fade" id="myModal--{{ $r->id }}">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">   
                <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title"><img src="{{ asset('public/photos/folder.jfif') }}" width="50" height="50"> </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                 <!-- Modal body -->
                  <div class="modal-body">
                    <label for="">Id: {{ $r->id }}</label><br>
                    <label for="">Nombre: </label><br>
                    <label for="">Categoria: </label><br>
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

