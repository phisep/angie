<section class="register-hero w-100">
	<img src="{{ URL::asset('public/images/fondo-userInfo.png') }}" alt="">
	<div id="contenido-interior-hero">
		<h2>Password</h2>
	</div> <!-- #contenido-interior-hero -->
</section>
<section id="contenido-interior">
	<div class="container">
		<div class="row justify-content-md-center">
			<br>
			@if (session('status-password')) <div class="alert alert-success"> {{ session('status-password') }} </div> @endif 
			<div class="row">
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
			</div>
			
			<div class="col-lg-8">
				<form class="text-center border border-light" name="form-security" method="post" action="{{ url('usuario/update_password') }}">

					<div class="card">
						<h5 class="card-header logo-color white-text text-center py-4"><img src="{{ URL::asset('public/images/ico-Identificaiton.png') }}" alt="" class="img-form-register">  Password</h5>
						
						<div class="md-form card-body px-lg-5 pt-0">
							<!-- Password -->
							<div class="md-form">
								<input type="password" id="actual" name="actual" required class="form-control">
								<label for="actual">Current Password</label>
							  </div>
							<!-- New password -->
							<div class="md-form">
								<input type="password" id="password" name="password" required class="form-control">
								<label for="password">New password</label>
							  </div>
							<!-- Corfirm new password -->
							<div class="md-form">
								<input type="password" id="confirmar-password" name="confirmar-password"  required class="form-control">
								<label for="confirmar-password">Confirm new password</label>
							  </div>
							
							
							
							<!-- Sign in button -->
							<button class="btn btn-outline-logo btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Update password</button>
							
						</div> <!-- .card-body -->
					</div><!-- .card -->
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="hidden" name="user_id" value="{{Auth::id()}}">
					<input type="hidden" name="email" value="{{$user->email}}">
				</form>
			</div><!-- .col-lg-8 -->
		</div><!-- .row -->
	</div> <!-- .container -->
</section>
<div class="container">
	<header class="section-title">
           <h1>Contraseña</h1>  
	</header>
	<div class="col-md-12">
		<h3>Cambiar contraseña</h3>
	</div>
	@if (session('status-password')) <div class="alert alert-success"> {{ session('status-password') }} </div> @endif 
	<div class="row">
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
	</div>
	<div class="row">
	<form role="form" class="form-horizontal" name="form-security" method="post" action="{{ url('usuario/update_password') }}">
		<div class="form-group">
			<div class="col-md-4">
				<label for="actual">Contraseña actual</label>
				<input type="password" class="form-control" id="actual" name="actual" placeholder="Ingresa tu contraseña actual" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4">
				<label for="nueva">Nueva contraseña</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu nueva contraseña" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4">
				<label for="confirm">Confirma tu contraseña</label>
				<input type="password" class="form-control" id="confirmar-password" name="confirmar-password" placeholder="Reingresa tu nueva contraseña" required>
			</div>
		</div>
		<button type="submit" class="btn btn-default" style="margin-top:25px">Actualizar contraseña</button>
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="hidden" name="user_id" value="{{Auth::id()}}">
		<input type="hidden" name="email" value="{{$user->email}}">
	</form>
	</div>
</div>