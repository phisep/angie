<script>
$(function() {
	
	$("#sexo option").each(function()		{
    	   var dato = $(this).attr('value');
    	   if ( dato == '{{$user->sexo}}' )	{
    			$(this).prop('selected', true);
    	   }
    });
	
});
</script>
<section class="register-hero w-100">
	<img src="{{ URL::asset('public/images/fondo-userInfo.png') }}" alt="">
	<div id="contenido-interior-hero">
		<h2>User data</h2>
	</div> <!-- #contenido-interior-hero -->
</section>
<section id="contenido-interior">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-lg-8">
					<form class="text-center border border-light" name="form-usuario-editar" id="form-usuario-editar" method="post" action="{{ url('usuario/update') }}">
						@if (session('status-update-usuario')) <div class="alert alert-success"> {{ session('status-update-usuario') }} </div> @endif 
					    <div class="card">
					    	<h5 class="card-header logo-color white-text text-center py-4"><img src="{{ URL::asset('public/images/ico-Identificaiton.png') }}" alt="" class="img-form-register">  Datos de perfil</h5>
					    	
					    	<div class="md-form card-body px-lg-5 pt-0">
					    		<h3>Datos personales</h3>
					    		<!-- RUT / DNI -->
					    		<div class="md-form">
									<input type="text" class="form-control" id="rut" name="rut" value="{{$user->rut}}">
									<label for="rut">RUT / DNI</label>
								</div> <!-- RUT / DNI -->
			            
					    		<!-- Nombre completo -->
					    		<div class="md-form">
									<input type="text" class="form-control" id="nombre" name="nombre" value="{{$user->nombre}}">
									<label for="nombre">Nombre completo</label>
								</div> <!-- Nombre completo -->

					    		<!-- Descripción -->
					    		<div class="md-form">
									    <textarea type="text" id="descripcion" name="descripcion" class="md-textarea form-control" rows="3">{{$user->descripcion}}</textarea>
									    <label for="descripcion">Descripción</label>
									</div> <!-- Descripción -->
					    		
					    		<!-- Fecha de nacimiento -->
					    		<div class="md-form">
									<input type="date" id="fecha-nacimiento" name="fecha_nacimiento" value="{{$user->fecha_nacimiento}}" class="form-control" title="Fecha de nacimiento">
									<label for="fecha-nacimiento" id="label-fecha-nacimiento">Fecha de nacimiento</label>
								</div> 
								<!-- Fecha de nacimiento -->

								<!-- Género -->
					    		<div class="md-form">
									<select class="browser-default custom-select" id="sexo" name="sexo">
									  <option selected="">Género</option>
									  <option value="MALE">MALE</option>
									  <option value="FEMALE">FEMALE</option>
									</select>
								</div> <!-- Género -->
					    		
					    		<h3>Datos de despacho</h3>
					    		<!-- Calle -->
					    		<div class="md-form">
									<input type="text" class="form-control" id="calle" name="calle" value="{{$user->calle}}">
									<label for="calle">Calle</label>
								</div> <!-- Calle -->

					    		<!-- Número -->
					    		<div class="md-form">
									<input type="text" class="form-control" id="numero" name="numero" value="{{$user->numero}}">
									<label for="numero">Número</label>
								</div> <!-- Número -->

					    		<!-- Block / dpto -->
					    		<div class="md-form">
									<input type="text" class="form-control" id="block" name="block" value="{{$user->block}}">
									<label for="block-dpto">Block / dpto</label>
								</div> <!-- Block / dpto -->

					    		<!-- Comuna -->
					    		<div class="md-form">
									<input type="text" class="form-control" id="comuna" name="comuna" value="{{$user->comuna}}">
									<label for="comuna">Comuna</label>
								</div> <!-- Comuna -->

					    		<!-- País -->
					    		<div class="md-form">
									<input type="text" class="form-control" id="pais" name="pais" value="{{$user->pais}}">
									<label for="pais">País</label>
								</div> <!-- País -->

					    		<!-- Código postal -->
					    		<div class="md-form">
									<input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="{{$user->codigo_postal}}">
									<label for="codigo-postal">Código postal</label>
								</div> <!-- Código postal -->

					    		<h3>Datos de contacto</h3>
					    		<!-- Teléfono -->
					    		<div class="md-form">
									<input type="text" class="form-control" id="telefono" name="telefono" value="{{$user->telefono}}">
									<label for="telefono">Teléfono</label>
								</div> <!-- Teléfono -->

					    		<!-- Sign in button -->
					    		<button class="btn btn-outline-logo btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Update data</button>
					    		
					    	</div> <!-- .card-body -->
					    </div><!-- .card -->
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							<input type="hidden" name="user_id" value="{{$user->id}}" />
					</form>
				</div><!-- .col-lg-8 -->
			</div><!-- .row -->
		</div> <!-- .container -->
	</section>
