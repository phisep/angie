<section class="register-hero w-100">
	<img src="{{ URL::asset('public/images/fondo-registro.gif') }}" alt="">
	<div id="contenido-interior-hero">
		<h2>Recover</h2>
	</div> <!-- #contenido-interior-hero -->
</section>
<section id="contenido-interior">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-lg-8">
				<form class="text-center border border-light" method="post" action="{{ url('/login/message') }}" name="form">
					<div class="card">
						<h5 class="card-header logo-color white-text text-center py-4"><img src="images/ico-Identificaiton.png" alt="" class="img-form-register">  Recover password</h5>
						<div class="md-form card-body px-lg-5 pt-0">
							<!-- Email -->
							<div class="md-form">
								<input type="email" id="materialLoginFormEmail" class="form-control" name="user" required>
								<label for="materialLoginFormEmail">E-mail</label>
							</div>
							<!-- Sign in button -->
							<button class="btn btn-outline-logo btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Recover</button>
						</div> <!-- .card-body -->
					</div><!-- .card -->
					 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
				</form>
			</div><!-- .col-lg-8 -->
		</div><!-- .row -->
	</div> <!-- .container -->
</section>
