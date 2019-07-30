<?php
/*
echo '<pre>';
print_r($encargos);
echo '</pre>';
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WOPH</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('public/images/favicon.png') }}" />
	
	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- CSS de Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- Material Design Bootstrap -->
  	<link href="{{ URL::asset('public/css/mdb.min.css') }}" rel="stylesheet">

	<!-- CSS del sitio -->
	<link rel="stylesheet" href="{{ URL::asset('public/style.css') }}">		

</head>
<body>
	
	<!-- HEADER DE LA PÁGINA DE INICIO, ES DIFERENTE A LAS PÁGINAS INTERIORES -->
	<section id="header-home">
		<!--<video autoplay="autoplay" loop poster="images/imago-place-home.jpg">-->
		<video autoplay playsinline autoplay muted loop autoplay="autoplay">
			<!--<source src="videos/Blurry Video Of Lights.mp4" type="video/mp4">-->
			<source src="{{ URL::asset('public/videos/spot.webm') }}" type="video/webm">
			Su navegador no soporta este tipo de vídeo.
		</video>

			<div id="contenido-header-home">
				<div id="navegacion">
					<img src="{{ URL::asset('public/images/logo-portada.png') }}" alt="Logo en portada">
					<ul class="nav justify-content-end">
					  <li class="nav-item">
					    <a class="nav-link active" href="{{ url('/faq') }}">FAQ</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" href="{{ url('/encargo/compra') }}">Purchases</a>
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

				<div id="desc-header-home">
					<h2>It's <span>worth</span> shopping around the world</h2>
					<p>Make or order purchases with a complete tracking and get the best price through our network of buyers around the world.</p>					
				</div> <!-- desc-header-home -->

				<!-- FILTROS DE BÚSQUEDA EN LA PÁGINA DE INICIO -->
				<div id="barra-filtros" class="container">
					<form action="">
						<div class="row">
							<div class="col-lg-3 col-md-3">
								<div class="form-group">	
									<input type="text" class="form-control" id="filtro_buscar" placeholder="Keywords">
								</div>
							</div> <!-- col-lg-3 col-md-3 -->

							<div class="col-lg-3 col-md-3">
								<div class="form-group">
							      <select id="inputState" class="form-control">
							        <option selected>All regions</option>
							        <option>...</option>
							        <option>...</option>
							      </select>
							    </div> <!-- .form-group -->
							</div> <!-- .col-lg-3 col-md-3 -->

							<div class="col-lg-3 col-md-3">
								<div class="form-group">
							      <select id="inputState" class="form-control">
							        <option selected>Any category</option>
							        <option>...</option>
							        <option>...</option>
							      </select>
							    </div> <!-- .form-group -->
							</div> <!-- .col-lg-3 col-md-3 -->

							<div class="col-lg-3 col-md-3">
								<button class="btn btn-block btn-light">Search</button>
							</div>
						</div> <!-- .row -->
					</form>
				</div> <!-- #barra-filtros .container -->
				

				<div class="container" id="seleccion-perfiles">
					<div class="row row-eq-height justify-content-md-center">
						<div class="col-lg-4 col-md-5 seleccion-perfil mr-1">
							<h3>Become a buyer</h3>
							<p>Be part of our network and make your offer to purchase requests we receive from around the world.</p>
							<button type="button" class="btn btn-outline-light">Click here</button>
						</div>
						<div class="col-lg-4 col-md-5 seleccion-perfil">
							<h3>Place an order</h3>
							<p>Did you find a product that you do not have in your city? Find a member of our network who will buy and send you what you need at the best price.</p>
							<button type="button" class="btn btn-outline-light">Click here</button>
						</div>
					</div> <!-- row -->
				</div><!-- container -->
			</div> <!-- contenido-header-home -->
	</section> <!-- #header-home -->

	
	<!-- ÚLTIMAS OFERTAS -->
	<section id="ultimas-compras-disponibles" class="container">
		<div class="row">
			<div class="col-12 pt-4 pb-4">
				<h2>Latest purchase available</h2>
			</div>
			@if (count($encargos) > 0 )
				
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Product</th>
							<th>Description</th>
							<th>City</th>
							<th>Country</th>
							<th>Commision</th>
							<th>Delivery time</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					@foreach($encargos as $encargo)
						<tr><!-- disponible -->
							<td class="text-center">
								<!-- Al estar disponible ocupa el icono ubicado en "images/table-open-bid.png"-->
								<img src="{{ URL::asset('public/images/table-open-bid.png') }}" class="img-tabla-disponible" alt="disponible">
							</td>
							<!-- Detalle -->
							<td>{{$encargo->producto}}</td>
							<td>{{$encargo->descripcion}}</td>
							<td><i class="fas fa-map-marker-alt"></i> {{$encargo->pais}}</td>
							<td><i class="fas fa-map-marker-alt"></i> {{$encargo->ciudad}}</td>
							<td><span  class="pull-right"><strong>CLP ${{number_format( $encargo->comision,0,'.','.')}}</strong></span></td>
							<td>{{$encargo->tiempo_entrega}}</td>
							<td>{{$encargo->estado}}</td>
							<!-- Cierre de detalle -->
							<td>
								<a href="{{url('/encargo/detalle/'.$encargo->id) }}" data-type="detalle" title="View details"><i class="fas fa-clipboard-list text-primary"></i></a>
								@if ($encargo->estado!="ADJUDICADO")
								<a href="{{url('/encargo/postular/'.$encargo->id) }}" data-type="postular" title="Apply to order"><i class="fas fa-tags text-secondary pull-right" style="margin-left: 5px"></i></a>
								@endif
								<!-- Al estar disponible se ocupa este botón -->
								<!--<button class="btn btn-block btn-success btn-sm">bid</button>
								<!-- Si no ocupas el button puedes ocupar
								<a href="#" class="btn btn-block btn-success btn-sm">bid</a>
								-->
							</td>
						</tr> <!-- disponible -->
					@endforeach
					</tbody>
				</table>
			</div> <!-- .table-responsive-sm -->
			@endif
		</div> <!-- row -->
	</section> <!-- .container #ultimas-compras-disponibles -->

	<!-- DESCRIPCIÓN -->
	<section id="descripcion-trabajo" class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2>How does <span>World Opportunities Hunter</span> works?</h2>
				<p>WORLD OPPORTUNITIES HUNTER, is the best personalized shopping service in the network. Here you can acquire from an element as small as a ring or a cell phone to a house, all thanks to the contracting that you yourself will make of the most efficient and effective emissaries. This profile of the emissary will be visible to the buyer, after which you can choose the one that best corresponds to your needs and geographical location.</p>
			</div> <!-- .col-12 .text-center -->
		</div> <!-- row -->	
		<div class="row row-eq-height justify-content-md-center text-center mt-2 mb-4 servicios-home">
			<div class="col-lg-2 col-4 font-weight-bold"><img src="{{ URL::asset('public/images/ico-electronics.gif') }}" alt=""><br>Electronics</div>
			<div class="col-lg-2 col-4 font-weight-bold"><img src="{{ URL::asset('public/images/ico-jewel.gif') }}" alt=""><br>Jewelry</div>
			<div class="col-lg-2 col-4 font-weight-bold"><img src="{{ URL::asset('public/images/ico-accesoires.gif') }}" alt=""><br>Accessories</div>
			<div class="col-lg-2 col-6 font-weight-bold"><img src="{{ URL::asset('public/images/ico-toys.gif') }}" alt=""><br>Toys</div>
			<div class="col-lg-2 col-6 font-weight-bold"><img src="{{ URL::asset('public/images/ico-everything-else.gif') }}" alt=""><br>Everything else</div>
		</div>	<!-- row -->
	</section> <!-- .container #descripcion-trabajo -->

	<!-- PIE DE PÁGINA (FOOTER) -->
	<footer>
		<section id="footer-question" class="text-center">
			<div class="container">
				<div class="row">
					<h2 class="col-12">Got a question?</h2>
					<p class="col-12">We're here to help. Check out our FAQs, send us an email or call us at 1 (800) 555-5555</p>
				</div>
			</div>
		</section>
		
		<section id="footer-contenido">
			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col-lg-4 division-footer">
						<h2>Site map</h2>
						<div class="container">
							<div class="row">
								<div class="col-lg-6 col-6">
									<a href="{{ url('/') }}">> Home</a> <br> 
									<a href="{{ url('/faq') }}">> FAQ</a> <br>
									<a href="{{ url('/login') }}">> Sign in</a>
								</div>
								<div class="col-lg-6 col-6">
									<a href="{{ url('/encargo/compra') }}">> Shoppings</a> <br>
									<a href="{{ url('/registro') }}">> Register</a> <br>
									<a href="#">> About</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 division-footer">
						<h2>Forms</h2>
						<div class="seleccion-perfil-footer">
							<h3>Become a buyer</h3>
							<p>Register and start publishing your orders right now.</p>
							<button type="button" class="btn btn-outline-light" onclick="javascript:location.href='{{ url('/registro') }}'" >Click here</button>
						</div>
						<div class="seleccion-perfil-footer mb-0">
							<h3>Place an order</h3>
							<p>Publish your order and forget about the procedures</p>
							<button type="button" class="btn btn-outline-light" onclick="javascript:location.href='{{ url('/encargo/compra') }}'">Click here</button>
						</div>
					</div>

					<div class="col-lg-4 division-footer" id="contacto-footer">
						<div class="container">
							<div class="row justify-content-md-center">
								<div class="col-lg-12 text-center">
									<img src="{{ URL::asset('public/images/logo-portada.png') }}" alt="Logo en portada"> 
									<div class="container mt-3">
										<div class="row justify-content-md-center">
											<div class="col-3"><a href="#"><i class="fab fa-facebook fa-2x"></i></a></div>
											<div class="col-3"><a href="#"><i class="fab fa-twitter-square fa-2x"></i></a></div>
											<div class="col-3"><a href="#"><i class="fab fa-linkedin fa-2x"></i></a></div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 pl-5 pt-3">
									<p>Manuel Bulnes 351, 6th floor. <br>
										<span>Temuco. Chile</span> <br>
										<i class="fas fa-phone-square"></i> 45 2 217789	<br>
										<i class="fas fa-mobile-alt"></i> +56 9 74509823 <br>
										<i class="far fa-envelope"></i> ventas@woph.cl
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</footer>


	<!-- js de Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="{{ URL::asset('public/js/mdb.min.js') }}"></script>
	<script src="{{ URL::asset('public/script.js') }}"></script>


</body>
</html>