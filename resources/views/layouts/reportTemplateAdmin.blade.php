
@extends('layouts.adminTemplate')


@section('content')
<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div class="container-fluid" id="container-wrapper">
                    <!-- Row -->
          
            
            <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">@yield('tableTitle')</h6>
                </div>
                <div class="table-responsive ">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                         @yield('topTitle') 
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        @yield('lowerTitle')
                      </tr>
                    </tfoot>
                    <tbody>
                      
                        @yield('records')
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!--Row-->
          </div>

        </div>
        <!---Container Fluid-->
      </div>

      
    </div>
  

  
@stop
  

