@extends('layouts.adminTemplate')

@section('content')
	<div class="container w-50">
  
  <div class="card" style="width:400px">
    <img class="card-img-top" src="{{ $imagen }}" alt="Card image" style="width:50%">
    <div class="card-body">
      <h4 class="card-title">{{ $category }}</h4>
		Ha sido {{ $action }}
      	</p>
      <a href="/reportCategories" class="btn btn-primary">Continuar</a>
    </div>
  </div>
  
  
</div>
@stop