<script>
$(function() {
	var url;
	
	$('a').click(function(e)	{
		
		e.preventDefault();
		var tipo;
		tipo = $(this).attr('data-type');
		url = $(this).attr('href');
		switch(tipo)	{
			case "encargo"		:	$('#modal-content-encargo').text('¿Confirma que desea eliminar el encargo?');
									$('#modal-encargo').modal(); 
									break;
			case "postulacion"	:	$('#modal-content-postulacion').text('¿Confirma que desea eliminar la postulación?');
									$('#modal-postulacion').modal(); 
									break;
			default				:	location.href=url;
			
		}

		
	});

	
	$('#eliminar-postulacion').click(function(e)	{
		location.href=url;
	});
	
	$('#eliminar-publicacion').click(function(e)	{
		location.href=url;
	});
	
	
	
});
</script>
<section class="register-hero w-100">
		<img src="{{ URL::asset('public/images/fondo-userInfo.png') }}" alt="">
		<div id="contenido-interior-hero">
			<h2>My orders</h2>
		</div> <!-- #contenido-interior-hero -->
</section>
<section id="contenido-interior">
	<div class="container">
		<div class="row justify-content-md-center">				
			<!-- Tabla de pagos y finanzas -->
			<div class="col-12">
			
				@if (session('status-publicacion')) <div class="alert alert-success"> {{ session('status-publicacion') }} </div> @endif 
				@if ( $total_mis_encargos > 0 ) 
				<!-- Encargos publicados -->
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr class="text-center">
								<th colspan="9">
									<h3>Encargos publicados</h3>
								</th>
							</tr>
							<tr>
								<th>Producto</th>
								<th>Descripción</th>
								<th>Ciudad</th>
								<th>País</th>
								<th>Tipo de encargo</th>
								<th>Comisión por trámite</th>
								<th>Tiempo de entrega</th>
								<th>Estado</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
						@foreach($mis_encargos as $encargo)
							<tr>
								<td>{{ucwords (strtolower($encargo->producto))}}</td>
								<td>{{strtolower($encargo->descripcion)}}</td>
								<td>{{ucwords (strtolower($encargo->ciudad))}}</td>
								<td>{{ucwords (strtolower($encargo->pais))}}</td>
								<td>{{ucwords (strtolower($encargo->tipo_encargo))}}</td>
								<td><strong>CLP ${{number_format( $encargo->comision,0,'.','.')}}</strong></td>
								<td>{{strtolower($encargo->tiempo_entrega)}}</td>
								<td>{{$encargo->estado}}</td>
								<td>
									<a href="{{url('/encargo/detalle/'.$encargo->id) }}" data-type="detalle"><i class="fas fa-clipboard-list text-primary"></i></a>
									<a id="link-eliminar-encargo" href="{{url('/encargo/eliminar/'.$encargo->id) }}" data-id-encargo="{{$encargo->id}}" data-type="encargo"><i class="fas fa-backspace text-danger"></i></a>
								</td>
							</tr>
						
						@endforeach
						</tbody>
					</table>
				</div> <!-- table-responsive Encargos publicados -->					
				@else
				<h3 class="text-center">Encargos publicados</h3>
				<div class="alert alert-secondary text-center" role="alert">
				  No haz publicado encargos<br>
				  <input type="button" class="btn btn-info" name="publicar" value="Publica un encargo ahora" onclick="javascript:location.href='{{url('/encargo/publicar/compra')}}'"/>
				</div>
			
				<br>
				@endif
				
				@if (session('status')) <div class="alert alert-success"> {{ session('status') }} </div> @endif 
				@if ( $total_mis_postulaciones > 0 ) 
				<!-- Encargos a los que te has postulado -->
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr class="text-center">
								<th colspan="9">
									<h3>Encargos a los que te has postulado</h3>
								</th>
							</tr>
							<tr>
								<th>Producto</th>
								<th>Descripción</th>
								<th>Ciudad</th>
								<th>País</th>
								<th>Tipo de encargo</th>
								<th>Comisión por trámite</th>
								<th>Tiempo de entrega</th>
								<th>Estado</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
						@foreach($mis_postulaciones as $encargo)
							<tr>
								<td>{{ucwords (strtolower($encargo->producto))}}</td>
								<td>{{strtolower($encargo->descripcion)}}</td>
								<td>{{ucwords (strtolower($encargo->ciudad))}}</td>
								<td>{{ucwords (strtolower($encargo->pais))}}</td>
								<td>{{ucwords (strtolower($encargo->tipo_encargo))}}</td>
								<td><strong>CLP ${{number_format( $encargo->comision,0,'.','.')}}</strong></td>
								<td>{{strtolower($encargo->tiempo_entrega)}}</td>
								<td>{{$encargo->estado}}</td>
								<td>
									<a href="{{url('/encargo/detalle/'.$encargo->id) }}" data-type="detalle"><i class="fas fa-clipboard-list text-primary"></i></a>
									<a id="link-eliminar-postulacion" href="{{url('/usuario/eliminar_postulacion/'.$encargo->id) }}" data-type="postulacion"><i class="fas fa-backspace text-danger"></i></a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div> <!-- table-responsive -->
				@else
				<h3 class="text-center">Encargos a los que te haz postulado</h3>
				<div class="alert alert-secondary text-center" role="alert">
				  No te haz postulado a encargos<br>
				  <input type="button" class="btn btn-info" name="publicar" value="Postular a un encargo ahora" onclick="javascript:location.href='{{url('/encargo/compra') }}'"/>
				</div>
				@endif
				@if ( $total_mis_adjudicaciones > 0 ) 
				<!-- Encargos que te haz adjudicado -->
				<div class="table-responsive"> 
					<table class="table table-hover">
						<thead>
							<tr class="text-center">
								<th colspan="9">
									<h3>Encargos que te haz adjudicado</h3>
								</th>
							</tr>
							<tr>
								<th>Producto</th>
								<th>Descripción</th>
								<th>Ciudad</th>
								<th>País</th>
								<th>Tipo de encargo</th>
								<th>Comisión por trámite</th>
								<th>Tiempo de entrega</th>
								<th>Estado</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($mis_adjudicaciones as $encargo)
							<tr>
								<td>{{ucwords (strtolower($encargo->producto))}}</td>
								<td>{{strtolower($encargo->descripcion)}}</td>
								<td>{{ucwords (strtolower($encargo->ciudad))}}</td>
								<td>{{ucwords (strtolower($encargo->pais))}}</td>
								<td>{{ucwords (strtolower($encargo->tipo_encargo))}}</td>
								<td><strong>CLP ${{number_format( $encargo->comision,0,'.','.')}}</strong></td>
								<td>{{strtolower($encargo->tiempo_entrega)}}</td>
								<td>{{$encargo->estado}}</td>
								<td>
									<a href="#"><i class="fas fa-clipboard-list text-primary"></i></a>
									<a href="#"><i class="fas fa-backspace text-danger"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div> <!-- table-responsive -->
				@else
				<!-- Mensaje aparece cuando no se han adjudicado encargos -->
				<h3 class="text-center">Encargos que te haz adjudicado</h3>
				<div class="alert alert-secondary text-center" role="alert">
				  No te han adjudicado encargos
				</div>

				@endif


			</div> <!-- col-12 -->

		</div><!-- .row -->
		<!-- The Modal -->
	<div class="modal fade" id="modal-postulacion">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title">Mis Encargos</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>
		  <!-- Modal body -->
		  <div class="modal-body" id="modal-content-postulacion"></div>
		  <!-- Modal footer -->
		  <div class="modal-footer">
			<button id="eliminar-postulacion" type="button" class="btn btn-default" data-dismiss="modal">Eliminar postulación</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<!-- The Modal -->
	<div class="modal fade" id="modal-encargo">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title">Mis Encargos</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>
		  <!-- Modal body -->
		  <div class="modal-body" id="modal-content-encargo"></div>
		  <!-- Modal footer -->
		  <div class="modal-footer">
			<button id="eliminar-publicacion" type="button" class="btn btn-default" data-dismiss="modal">Eliminar encargo</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
	
	</div> <!-- .container -->
</section>
