
@extends('layouts.adminTemplate')
@section('title2')
  Alta
@stop
@section('content')

<div class="container-fluid" id="container-wrapper">
  
           <div class="">
              <!-- Form Basic -->
              <div class="card ">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary ">@yield('tableName')</h6>
                </div> 
                <div class="card-body">
                    @yield('form')
                </div>
              </div>
           </div>
          
</div>  

@stop