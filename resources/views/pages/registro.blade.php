

<section class="register-hero w-100">
	<img src="{{ URL::asset('public/images/fondo-registro.gif') }}" alt="">
	<div id="contenido-interior-hero">
		<h2>Registration form</h2>
	</div> <!-- #contenido-interior-hero -->
</section>
<section id="contenido-interior">
		<div class="container">
			<div class="row">
			
			
				<div class="col-lg-8 text-left">
					@if ($errors->any())
					<div class="row alto" >
						<div class="col-md-12">
							<div class="col-md-6 alert alert-info div-center margen-top-msg">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					@endif
					<br>
					<form class="text-center" enctype="multipart/form-data" method="post" action="{{ url('/registro/crear') }}" name="form">
					    <!-- Identification data -->
					    <div class="card border border-light">
					    	<h5 class="card-header logo-color white-text text-center py-4"><img src="images/ico-Identificaiton.png" alt="" class="img-form-register"> Identification data</h5>
					    	
					    	<div class="md-form card-body px-lg-5 pt-0 text-left">
					    		<!-- DNI -->
								  <div class="md-form">
									  <input type="text" class="form-control" id="rut" name="rut" value="{{old('rut')}}" required>
									  <label for="rut">Rut/DNI/Passaport</label>
								  </div>
								  <!-- FULL NAME -->
								  <div class="md-form">
									  <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" required>
									  <label for="nombre">Full name</label>
								  </div>
								  <!-- FULL NAME -->
								  <div class="md-form">
									  <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" required>
									  <label for="fecha_nacimiento">Date of Birth</label>
								  </div>
								  <!-- GENERE -->
								<span class="text-left">Genere</span>
								<select class="browser-default custom-select mb-4" id="sexo" name="sexo" value="{{old('sexo')}}" required>
									<option value="">Choose option</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>

								<!-- FOTO -->
								<div class="custom-file">
									  <label for="foto">Picture</label>
									  <input type="file" class="form-control" id="foto" name="foto" value="{{old('foto')}}" required>
						
								</div>
					    	</div> <!-- .card-body -->
					    </div><!-- .card Identification data -->
							
							<!-- Localization data -->
							<div class="card mt-3 border border-light text-left">
								<h5 class="card-header logo-color white-text text-center py-4"><img src="images/ico-localization.png" alt="" class="img-form-register"> Localization data</h5>
								
								<div class="md-form card-body px-lg-5 pt-0">
									<div class="md-form">
										<span class="text-left">Country</span>
										<select class="browser-default custom-select" name="pais" id="pais" required>
											  <option selected="">Country</option>
											  <option value="chile">Chile</option>
											  <option value="peru">Perú</option>
											  <option value="argentina">Argentina</option>
											  <option value="...">...</option>
											</select>
									</div>
									<!-- City -->
									<div class="md-form">
									  <input type="text" id="ciudad" name="ciudad" class="form-control" value="{{old('ciudad')}}" required>
									  <label for="city" class="">City</label>
									</div>
								</div> <!-- .card-body -->
							</div><!-- .card Localization data -->

							<!-- Login Data -->
							<div class="card mt-3 border border-light text-left">
					    	<h5 class="card-header logo-color white-text text-center py-4"><img src="images/ico-signUp.png" alt="" class="img-form-register"> Login Data</h5>
					    	
					    	<div class="md-form card-body px-lg-5 pt-0">
					    		<!-- E-mail -->
			            <div class="md-form">
			                <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" required>
			                <label for="email">E-mail</label>
			            </div>
			            <!-- Confirm E-mail -->
			            <div class="md-form">
			                <input type="text" id="confirmar-email" name="confirmar-email" class="form-control" value="{{old('confirmar-email')}}" required>
			                <label for="confirm-email">Confirm E-mail</label>
			            </div>
			            <!-- Password -->
			            <div class="md-form">
			                <input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelpBlock" required>
			                <label for="password">Password</label>
			                <small id="passwordHelpBlock" class="form-text text-muted mb-4">
			                    At least 8 characters and 1 digit
			                </small>
			            </div>
			            <!-- Confirm Password -->
			            <div class="md-form">
			                <input type="password" id="confirmar-password" name="confirmar-password" class="form-control" required>
			                <label for="confirm-password">Confirm password</label>
			            </div>
					    	</div> <!-- .card-body -->
					    </div><!-- .card Login Data -->
					    <!-- Newsletter -->
	            <div class="form-check mt-3">
	                <input type="checkbox" class="form-check-input" id="acepto" value="acepto" name="acepto" required>
	                <label class="form-check-label" for="materialRegisterFormNewsletter">I accept the terms and conditions</label>
	            </div>
	            <!-- Sign up button -->
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign up
					
				</button>
				<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
				</form></div><!-- .col-lg-8 -->

				<div class="col-lg-4">
					<h2>Terms and Conditions</h2>
					<p>WOPH es una página web cuyo sustrato legal se encuentra en los artículos 2116 y 2117 del Código Civil chileno, y en relación a lo que éste mismo código establece respecto a los contratos (1438); así como lo que los diversos tratados internacionales suscritos por Chile establecen en materia de intercambio comercial</p>
					<p>WOPH es una página que tiene como objetivo tratar directamente con los distintos emisarios la compra o la realización de cualquier servicio, evitando de ésta manera la relación con intermediarios que dificulten la adquisición de lo que lo que necesites, ya sea porque existen pedidos antes que el tuyo o porque el bien o servicio a prestar no está dentro de sus prioridades más próximas. Woph es una página que trata con personas de cualquier parte del mundo que estén interesadas en registrarse como emisarios o compradores o mandantes</p>
					<p>Luego de que el mandante o comprador reciba conforme el producto de acuerdo a lo convenido, o tenga en su poder alguna evidencia concreta del trámite realizado (fotocopia notarial de escritura pública, recibo de pago de la encomienda enviada o cualquier documento que acredite el trámite realizado) no podrá solicitar un recambio del producto o un nuevo trámite</p>
					<p>Será deber del emisario enviar continuos registros fotográficos o auditivos de sus actividades para concretar la compra del producto o de las acciones realizadas para cumplir con el trámite necesario que el mandante o comprador haya solicitado, siguiendo en todo momento las instrucciones que éste le asigne para lograr su plena satisfacción</p>
					<p>Dos evaluaciones negativas sucesivas por parte del comprador o mandante respecto a un mismo emisario, darán como resultado la eliminación de los registros de WOPH. No obstante, aquel que fue calificado de manera deficiente como emisario, podrá seguir contratando los servicios de WOPH, pero ahora como comprador o mandante.</p>
				</div>
			</div><!-- .row -->
		</div> <!-- .container -->
	</section>



