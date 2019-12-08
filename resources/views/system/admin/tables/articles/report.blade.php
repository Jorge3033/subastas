@extends('layouts.reportTemplateAdmin')

@section('tableTitle')
	Articulos
  <a href="formUpArticle"><i class="fas fa-plus-circle text-success"></i></a> 
@stop

@section('topTitle')
	<th>Foto</th>
	<th>Nombre</th>
  <th>Precio</th>
  <th>Subcategoria</th>
  <th>Vendedor</th>
  <th>Estado</th>
  <th>Acciones</th>
@stop

@section('lowerTitle')
	<th>Foto</th>
  <th>Nombre</th>
  <th>Precio</th>
  <th>Subcategoria</th>
  <th>Vendedor</th>
  <th>Estado</th>
  <th>Acciones</th>

@stop 

@section('records')
	@foreach ($report as $r)
		<tr>
			<td><img src="{{ asset('photos/articlesPhotos/'.$r->photo) }}" width="50" height="50"></td>
      <td>{{ $r->name }}</td>
      <td>{{ $r->price }}</td>
      <td>{{ $r->subCategory }}</td>
      <td>{{ $r->sellerUser }}</td>
			<td>
          @if ($r->status=="activo")
                <div class="btn btn-success">{{ $r->status }}</div>
          @else        
                <div class="btn btn-danger">{{ $r->status }}</div>
          @endif
        
      </td>
      <td>
        @if ($r->status!="activo")
          <a href="{{ URL::action('ArticleController@unlock',['ArticleId'=>$r->id]) }}"><div class="h2 "><i class="fas fa-unlock-alt"></i></div></a>
        @else
        
    
          <a href="{{ URL::action('ArticleController@lock',['ArticleId'=>$r->id]) }}"><div class="btn btn-danger"><i class="fas fa-lock "></i></div></a>
          <a href="{{ URL::action('ArticleController@modificarArticle',['ArticleId'=>$r->id]) }}"><i class="fas fa-edit btn btn-warning"></i></a>
        




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
                    <h4 class="modal-title">
                      <img src="{{ asset('photos/articlesPhotos/'.$r->photo) }}" width="50" height="50"> 
                        {{ $r->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                 <!-- Modal body -->
                  <div class="modal-body">
                    <label for="">Id Producto: {{ $r->id }}</label><br>
                    <label for="">Articulo: {{ $r->name }}</label><br>
                    <label for="">Marca: {{ $r->maker }}</label><br>
                    <label for="">Precio: {{ $r->price }}</label><br>
                    <label for="">Fecha de inicio: {{ $r->initialDate }}</label><br>
                    <label for="">Fecha de cierre: {{ $r->finalDate }}</label><br>
                    <label for="">Subcategoria: {{ $r->subCategory }}</label><br>
                    <label for="">Categoria: {{ $r->category }}</label><br>
                    <div class="container">
                      <div class="form-group">
                        <label for="" class="form-control border-0 btn btn-info">Vendedor</label>
                        <img src="{{ asset('photos/usersPhotos/'.$r->sellerPhoto) }}" alt="" width="50" height="50">
                        <label for="" class="ml-2"> {{ $r->sellerUser }}</label>
                        <br>
                        <label for="">Nombre: {{ $r->sellerName }}</label><br>
                        <label for="">Telefono: {{ $r->sellerPhone }}</label><br>
                        <label for="">Telefono: {{ $r->sellerMail }}</label><br>
                      </div>
                    </div>
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

