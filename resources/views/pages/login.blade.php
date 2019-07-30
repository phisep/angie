<section class="register-hero w-100">
	<img src="{{ URL::asset('public/images/fondo-registro.gif') }}" alt="">
	<div id="contenido-interior-hero">
		<h2>Login</h2>
	</div> 
</section>
<section id="contenido-interior">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-lg-8">
					<form role="form" method="post" action="{{ url('/login/signin') }}" name="form" class="text-center border border-light">
					    <div class="card">
					    	<h5 class="card-header logo-color white-text text-center py-4"><img src="images/ico-Identificaiton.png" alt="" class="img-form-register">  Sign in</h5>
					    	
					    	<div class="md-form card-body px-lg-5 pt-0">
					    		<!-- Email -->
					    		<div class="md-form">
					                <input class="form-control" type="email" name="user" required>
					                <label for="email">E-mail</label>
					            </div>
					    		
					    		<!-- Password -->
					    		<div class="md-form">
					                <input type="password" name="password" class="form-control" required>
					                <label for="password">Password</label>
					              </div>
					    		
					    		<!-- Sign in button -->
					    		<button class="btn btn-outline-logo btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>
					    		
					    		<!-- Recuperar contraseña -->
					    		<p>
					    		    <a href="{{ url('/login/recover') }}">Forgot password</a>
					    		</p>

					    		<!-- Register -->
					    		<p>Not a member?
					    		    <a href="{{ url('/registro') }}">Register</a>
					    		</p>

					    	</div> <!-- .card-body -->
					    </div><!-- .card -->
						<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
					</form>
				</div><!-- .col-lg-8 -->
			</div><!-- .row -->
		</div> <!-- .container -->
</section>

