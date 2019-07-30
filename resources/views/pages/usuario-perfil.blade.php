<section class="register-hero w-100">
	<img src="{{ URL::asset('public/images/fondo-userInfo.png') }}" alt="">
	<div id="contenido-interior-hero">
		<h2>User profile</h2>
	</div> <!-- #contenido-interior-hero -->
</section>
<section id="contenido-interior">
		
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-lg-12">
					<div class="container" id="user-profile">
						<div class="row row-eq-height">
							<div class="col-lg-4 col-12 text-center" id="foto-user">
								@if ($user->foto==NULL)
									<img src="https://picsum.photos/200/200/?random" class="rounded img-fluid z-depth-1" alt=""> 
								@else
									<img src="{{ url('storage/app/'.$user->foto) }}" class="rounded img-fluid z-depth-1" alt="">
								@endif
								
							</div><!-- col-4 --> 

							<div class="col-lg-8 col-12 align-text-bottom" id="descripcion-user-profile">
								<h2>{{$user->nombre}}</h2>
								@if ($user->descripcion==NULL) 
								<p>The user has not entered a description</p>
								@else
								<p>{{$user->descripcion}}</p>	
								@endif
								<p>{{ucwords (strtolower ($user->ciudad))}}, {{$user->pais}} <br>
										<b>Miembro desde</b> {{$user->fecha_registro}} <br>
										<b>Fecha de nacimiento</b> {{$user->fecha_nacimiento}} <br>
										<b>Sexo</b> {{$user->sexo}}</p>
							</div> <!-- #descripcion-user-profile -->
						</div><!-- row -->
						
						<!-- Barra de estadísticas -->
						<div class="container z-depth-1" id="barra-estadisticas-user">
							<div class="div-barra-estadisticas-user" id="titulo-barra-estadisticas-user">
								<div class="w-logo">W</div>
								<div class="pt-4 text-center"><h3>
									Orders <br><span class="small">Order stats</span></h3>
								</div>
							</div> <!-- div-barra-estadisticas-user -->
							<div class="div-barra-estadisticas-user div-gris">
								<div class="w-logo pl-4"><img src="images/ico-published-orders.png" alt=""></div>
								<div class="pt-4 text-center">
									<h3>Published <br>orders</h3>
								</div>
							</div> <!-- div-barra-estadisticas-user -->
							<div class="div-barra-estadisticas-user">
								<div class="w-logo pl-4"><img src="images/iconset-published.png" alt=""></div>
								<div class="pt-3 text-center">
									<h2>0</h2>
								</div>
							</div> <!-- div-barra-estadisticas-user -->
							<div class="div-barra-estadisticas-user div-gris">
								<div class="w-logo pl-4"><img src="images/ico-orders-completed.png" alt=""></div>
								<div class="pt-4 text-center">
									<h3>Orders <br>completed</h3>
								</div></div> <!-- div-barra-estadisticas-user -->
							<div class="div-barra-estadisticas-user">
								<div class="w-logo pl-4"><img src="images/iconset-published.png" alt=""></div>
								<div class="pt-3 text-center">
									<h2>0</h2>
								</div>
							</div> <!-- div-barra-estadisticas-user -->
						</div> <!-- container -->

						<!-- iframes -->
						<div class="row row-eq-height mt-4" id="complemento-user-profile">
							<div class="col-12 col-lg-6">
								@if ($user->video==NULL)
									<div>The user has not uploaded a video yet</div>
								@else
								<iframe width="560" class="rounded" src="https://www.youtube.com/embed/o26qoCYLdS8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
								@endif
							</div>
							<div class="col-12 col-lg-6">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d212998.49337965949!2d-70.76991444761985!3d-33.472709165627215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c5410425af2f%3A0x8475d53c400f0931!2sSantiago%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses-419!2scl!4v1539389548033" width="600" class="rounded" frameborder="0" style="border:0" allowfullscreen=""></iframe>
							</div>
						</div>
					</div><!-- container -->
				</div><!-- .col-lg-12 -->
			</div><!-- .row -->
		</div> <!-- .container -->
	</section>

