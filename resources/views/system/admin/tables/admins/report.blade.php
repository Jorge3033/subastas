@extends('layouts.reportTemplateAdmin')

@section('tableTitle')
	Admin
  <a href="formUpAdmin"><i class="fas fa-plus-circle text-success"></i></a> 
@stop

@section('topTitle')
	<th>Foto</th>
	<th>Nombre</th>
	<th>Apellidos</th>
	<th>Correo</th>
	<th>Estado</th>
  <th>Acciones</th>
@stop

@section('lowerTitle')
	<th>Foto</th>
	<th>Nombre</th>
	<th>Apellidos</th>
	<th>Correo</th>
	<th>Estado</th>
  <th>Acciones</th>

@stop

@section('records')
	@foreach ($report as $r)
		<tr>
			<td><img src="{{ asset('photos/adminsPhotos/'.$r->photo) }}" width="50" height="50"></td>
			<td>{{ $r->name }}</td>
			<td>{{ $r->lastName }}</td>
			<td>{{ $r->email }}</td>
			<td>
          @if ($r->status=="activo")
                <div class="btn btn-success">{{ $r->status }}</div>
          @else        
                <div class="btn btn-danger">{{ $r->status }}</div>
          @endif
        
      </td>
      <td>
        @if ($r->status!="activo")
          <a href="{{ URL::action('AdminController@unlock',['AdminId'=>$r->id]) }}"><div class="h2 "><i class="fas fa-unlock-alt"></i></div></a>
        @else
        
    
          <a href="{{ URL::action('AdminController@lock',['AdminId'=>$r->id]) }}"><div class="btn btn-danger"><i class="fas fa-lock "></i></div></a>
          <a href="{{ URL::action('AdminController@modificarAdmin',['AdminId'=>$r->id]) }}"><i class="fas fa-edit btn btn-warning"></i></a>
        




        <!-- Modal De informacion de Admin-->
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal--{{ $r->id }}">
            <i class="fas fa-info-circle"></i>
           </button>
          <!-- The Modal -->
          <div class="modal fade" id="myModal--{{ $r->id }}">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">   
                <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title"><img src="{{ asset('photos/adminsPhotos/'.$r->photo) }}" width="50" height="50"> {{ $r->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                 <!-- Modal body -->
                  <div class="modal-body">
                    <label for="">Id: {{ $r->id }}</label><br>
                    <label for="">Nombre: {{ $r->name }}</label><br>
                    <label for="">Apellido: {{ $r->lastName }}</label><br>
                    <label for="">sexo: {{ $r->sex }}</label><br>
                    <label for="">Correo: {{ $r->email }}</label><br>
                    <label for="">Telefono: {{ $r->phone }}</label><br>
                    <label for="">Contraseña: {{ $r->password }}</label><br>
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

