<section class="register-hero w-100">
		<img src="{{ URL::asset('public/images/fondo-compras-tramites.gif') }}" alt="">
		<div id="contenido-interior-hero">
			<h2>Purchase</h2>
		</div> <!-- #contenido-interior-hero -->
</section>
<section id="contenido-interior">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-lg-12">
					<section id="ultimas-compras-disponibles" class="container">
						<div class="row">
							<div class="col-12 pt-4 pb-4">
									<h2>Purchase orders available</h2>
									<a href="{{ url('/encargo/publicar/compra') }}" class="btn btn-info ml-0 waves-effect waves-light">Publish purchase order</a>
							</div>
							@if (count($registros) > 0 )
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th></th>
												<th>Product</th>
												<th>Description</th>
												<th>City</th>
												<th>Country</th>
												<th>Type</th>
												<th>Commision</th>
												<th>Delivery time</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
										@foreach($registros as $encargo)
											<tr><!-- disponible -->
												<td class="text-center">
													<!-- Al estar disponible ocupa el icono ubicado en "images/table-open-bid.png"-->
													<img src="{{ URL::asset('public/images/table-open-bid.png') }}" class="img-tabla-disponible" alt="disponible">
												</td>
												<!-- Detalle -->
												<td>{{ucwords (strtolower($encargo->producto))}}</td>
												<td>{{strtolower($encargo->descripcion)}}</td>
												<td><i class="fas fa-map-marker-alt"></i> {{ucwords (strtolower($encargo->ciudad))}}</td>
												<td><i class="fas fa-map-marker-alt"></i> {{ucwords (strtolower($encargo->pais))}}</td>
												<td>{{ucwords (strtolower($encargo->tipo_encargo))}}</td>
												<td><span  class="pull-right"><strong>CLP ${{number_format( $encargo->comision,0,'.','.')}}</strong></span></td>
												<td>{{strtolower($encargo->tiempo_entrega)}}</td>
												<td>{{$encargo->estado}}</td>
												<!-- Cierre de detalle -->
												<td>
													<div class="container p-0">
														<div class="row no-gutters">
															<!-- dirige a procedure.html -->
															<a href="{{url('/encargo/detalle/'.$encargo->id) }}" data-type="detalle" title="View details"><i class="fas fa-clipboard-list text-primary"></i></a>
															@if ($encargo->estado!="ADJUDICADO")
															<a href="{{url('/encargo/postular/'.$encargo->id) }}" data-type="postular" title="Apply to order"><i class="fas fa-tags text-secondary pull-right" style="margin-left: 5px"></i></a>
															@endif
															
															
														</div>
													</div>
													<?php if ($encargo->estado=="ADJUDICADO") : ?> disabled <?php endif; ?> 
												</td>
											</tr> <!-- disponible -->
										@endforeach		
										</tbody>
									</table>
								</div>
								@else
								<div class="row alto" >
									<div class="col-md-12">
										<div class="col-md-6 alert alert-info div-center margen-top-msg">
											Lo sentimos, por el momento no existen encargos disponibles.
										</div>
										
									</div>
								</div>
								@endif
						</div> <!-- row -->
					</section> <!-- .container #ultimas-compras-disponibles -->
				</div><!-- .col-lg-12 -->
			</div><!-- .row -->
		</div> <!-- .container -->
	</section>
