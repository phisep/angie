<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WOPH</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('public/images/favicon.png') }}" />
	
	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- CSS de Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	
	<!-- Material Design Bootstrap -->
  <link href="{{ URL::asset('public/css/mdb.min.css') }}" rel="stylesheet">
	 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet">
	<!-- CSS del sitio -->
	<link rel="stylesheet" href="{{ URL::asset('public/style.css') }}">	
	<link rel="stylesheet" href="{{ URL::asset('public/css/style.css') }}">	
	<!-- jquery -->
	<script src="{{ URL::asset('public/js/jquery-3.3.1.min.js') }}"></script>
	

</head>
<body>
	<section id="header-interiores">
			<div id="contenido-header-interiores">
				<div id="navegacion">
					<a href="{{ url('/') }}"><img src="{{ URL::asset('public/images/logo-interior.gif') }}" alt="Logo de woph"></a>
					<ul class="nav justify-content-end">
					  <li class="nav-item">
					    <a class="nav-link active" href="{{ url('/faq') }}">FAQ</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" href="{{ url('/encargo') }}">Purchases</a> 
					  </li>
					  @if (!Auth::check())
					  <!-- Ocultar item al logear -->
					  <li class="nav-item">
					    <a class="nav-link" href="{{ url('/registro') }}">Sing up</a>
					  </li>
					  <!-- Ocultar item al logear -->
					  <li class="nav-item">
					    <a class="nav-link btn btn-info" href="{{ url('/login') }}">Login</a>
					  </li>
					  @else
					<?php 
						$id = Auth::user()->id;
					?>
					  <!-- Dejar visible este item cuando esté logeado -->
					  <li class="nav-item">
					  	<div class="dropdown dropleft">
						    <!--Trigger-->
						    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
						      aria-haspopup="true" aria-expanded="false">Mi perfil</button>
						    <!--Menu-->
						    <div class="dropdown-menu dropdown-primary">
						      <a class="dropdown-item" href="{{ url('usuario/perfil/'.$id) }}"><i class="fas fa-user"></i> Perfil</a>
						      <a class="dropdown-item" href="{{ url('usuario/notificaciones') }}"><i class="fas fa-envelope"></i> Notificaciones</a>
							  <hr>
						      <a class="dropdown-item" href="{{ url('usuario/editar') }}"><i class="fas fa-chalkboard-teacher"></i> Mis datos</a>
						      <a class="dropdown-item" href="{{ url('usuario/encargos') }}"><i class="fas fa-cart-arrow-down"></i> Mis encargos</a>
						      <hr>
						      <a class="dropdown-item" href="{{ url('usuario/foto') }}"><i class="fas fa-camera"></i> Foto</a>
						      <a class="dropdown-item" href="{{ url('usuario/video') }}"><i class="fas fa-video"></i> Vídeo de presentación</a>
						      <hr>
						      <a class="dropdown-item" href="{{ url('usuario/finanzas') }}"><i class="fas fa-money-bill"></i> Pagos y finanzas</a>
						      <hr>
						      <a class="dropdown-item" href="{{ url('usuario/security') }}"><i class="fas fa-key"></i> Contraseña</a>
						      <a class="dropdown-item" href="{{ url('login/logout') }}"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
						    </div><!-- dropdown-menu -->
						  </div> <!-- dropdown -->
					  </li>
					  @endif 
					</ul>
				</div> <!-- navegacion -->
	</section> <!-- header-interiores -->