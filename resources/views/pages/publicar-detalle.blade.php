<?php 

if (Auth::check())	{
	$user_id = Auth::user()->id;
	$user_status = false; // no bloquear boton = false
	foreach($emisarios as $emisario)	{
		if ($user_id==$emisario->id)
			$user_status=true;
	}
	
	if ( $user_id == $comprador->id )
		$adjudicar = true;
}
?>
<script>
$(function() {
	<?php 
	if (Auth::check()) {
	?>
	var user_status = <?php echo $user_status;?>;
	if ( user_status )	{
		$('#registrar').attr("disabled", "disabled");
	}
	<?php } ?>
});
</script>
<section class="register-hero w-100">
	<img src="{{ URL::asset('public/images/fondo-userInfo.png') }}" alt="">
	<div id="contenido-interior-hero">
		<h2>Order details</h2>
	</div> <!-- #contenido-interior-hero -->
</section>
<section id="contenido-interior">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-12">
				
					<div class="table-responsive">						
						<!-- Datos del encargo -->
						<table class="table table-hover">
							<thead>
								<tr>
									<th colspan="8"><h3>Datos del encargo</h3></th>
								</tr>
								<tr>
									<th>Producto</th>
									<th>Descripción</th>
									<th>Ciudad</th>
									<th>País</th>
									<th>Tipo encargo</th>
									<th>Comisión</th>
									<th>Tiempo entrega</th>
									<th>Estado</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{$encargo->producto}}</td>
									<td>{{$encargo->descripcion}}</td>
									<td>{{$encargo->ciudad}}</td>
									<td>{{$encargo->pais}}</td>
									<td>{{$encargo->tipo_encargo}}</td>
									<td>{{$encargo->comision}}</td>
									<td>{{$encargo->tiempo_entrega}}</td>
									<td>{{$encargo->estado}}</td>
								</tr>
							</tbody>
						</table>
					</div> <!-- table-responsive -->
					
					<div class="table-responsive">
					<!-- Datos del comprador -->
						<table class="table table-hover">
							<thead>
								<tr>
									<th colspan="5"><h3>Datos del comprador</h3></th>
								</tr>
								<tr>
									<th>Nombre</th>
									<th>Fecha de nacimiento</th>
									<th>Sexo</th>
									<th>Ciudad</th>
									<th>País</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{$comprador->nombre}}</td>
									<td>{{$comprador->fecha_nacimiento}}</td>
									<td>{{$comprador->sexo}}</td>
									<td>{{$comprador->ciudad}}</td>
									<td>{{$comprador->pais}}</td>
								</tr>
							</tbody>
						</table>
					</div> <!-- table-responsive -->
					@if ($encargo->estado=="ADJUDICADO")
					<div class="table-responsive">
					<!-- Usuario que se adjudico el encargo -->
						<table class="table table-hover">
							<thead>
								<tr>
									<th colspan="5"><h3>Usuario que se adjudico el encargo</h3></th>
								</tr>
								<tr>
									<th>Nombre</th>
									<th>Fecha de nacimiento</th>
									<th>Sexo</th>
									<th>Ciudad</th>
									<th>País</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{$adjudicado->nombre}}</td>
									<td>{{$adjudicado->fecha_nacimiento}}</td>
									<td>{{$adjudicado->sexo}}</td>
									<td>{{$adjudicado->ciudad}}</td>
									<td>{{$adjudicado->pais}}</td>
								</tr>
							</tbody>
						</table>
					</div> <!-- table-responsive -->
					@if (isset($adjudicar) and ($adjudicar) )
							<div class="col-md-12 text-center" style="margin-top: 10px"> 
								<button type="button" class="btn btn-primary" name="adjudicacion" id="adjudicacion" onclick="javascript:location.href='https://www.woph.cl/encargo/eliminar_adjudicacion/{{$encargo->id}}'">Eliminar adjudicación</button>
							</div>
					@endif
					@endif
					@if ( $total_emisarios > 0 )
					<div class="table-responsive">
					<!-- Usuarios que han postulado al encargo -->
						<table class="table table-hover">
							<thead>
								<tr>
									<th colspan="4"><h3>Usuarios que han postulado al encargo</h3></th>
								</tr>
								<tr>
									<th>Emisario</th>
									<th>Ciudad</th>
									<th>País</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Emisario</td>
									<td>Ciudad</td>
									<td>País</td>
									<td><a href="#" class="btn btn-info waves-effect waves-light">Ver perfil</a></td>
								</tr>
							</tbody>
						</table>
						
					</div> <!-- table-responsive -->
					@else
						<h3 class="text-center">Usuarios que han postulado al encargo</h3>
						<div class="alert alert-secondary text-center" role="alert">
						 No existen postulaciones registradas
						</div>
					@endif

					

				</div><!-- col-12 -->
			</div><!-- .row -->
		</div> <!-- .container -->
	</section>

<div class="col-md-12 text-center" style="margin-top: 10px"> 
	<button type="button" class="btn btn-info waves-effect waves-light" name="registrar" id="registrar" onclick="javascript:location.href='https://www.worthcommunity.com/encargo/postular/{{$encargo->id}}'" <?php if ($encargo->estado=="ADJUDICADO") : ?> disabled <?php endif; ?>>Postular a encargo</button>
	<button type="button" class="btn btn-info waves-effect waves-light" name="volver" id="volver" onclick="javascript:history.back()">Volver</button>
</div>