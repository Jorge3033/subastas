@extends('layouts.homeTemplate')

@section('sectionPage')
	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Login / Registrarte</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Login/Register</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  <!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>Nuevo en nuestro sitio Web?</h4>
							<p>Todos los días se hacen Subastas, y un buen ejemplo de esto es GMR Company</p>
							<a class="button button-account" href="/register">Unete a nosotros</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Inicias sesión</h3>
						{{ Form::open(['route'=>'checkLogin','class'=>"row login_form"]) }}
						{{ Form::token() }}	
							<div class="col-md-12 form-group">
								@if($errors->first('correo'))
									{{ $errors->first('correo')}}
    							@endif
								<input type="text" class="form-control" id="name" name="correo" placeholder="correo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'correo'"	value="{{ old('correo') }}"> 
							</div>
							<div class="col-md-12 form-group">
								@if($errors->first('password'))
       								{{ $errors->first('password')}}
       
    							@endif
								<input type="password" class="form-control" id="name" name="password" placeholder="Contraseña" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Contraseña'">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Mantenme conectado</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="button button-login w-100">Log In</button>
								<a href="#">olvidé mi contraseña!</a>
							</div>
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
	@if($errors->first('correo'))
       <script>
		window.alert("{{ $errors->first('correo')}}");
       </script>
    @endif
	
	@if($errors->first('password'))
       <script>
		window.alert("{{ $errors->first('password')}}");
       </script>
    @endif
	
	@if (Session::has('error'))
		<script>
		window.alert("{{ Session::get('error') }}");
       </script>
	@endif	
	
	           

@stop