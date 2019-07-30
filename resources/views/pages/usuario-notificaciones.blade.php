<script>
$(function() {
	$('#passwd').focus();
	
	var formato={{$user->formato}};
	var noticias_anuncios={{$user->noticias_anuncios}}; 
	var noticias_anuncios_locales={{$user->noticias_anuncios_locales}};
	var comprador_adjudica_encargo={{$user->comprador_adjudica_encargo}}; 
	var publicar_encargo={{$user->publicar_encargo}}; 
	var marketing={{$user->marketing}}; 
	var boletin={{$user->boletin}}; 
	
	
	$("#formato option").each(function()		{
    	   var dato = $(this).attr('value');
    	   if ( dato == formato )	{
    			$(this).prop('selected', true);
    	   }
    });
	
		
	if( noticias_anuncios == 0 )	{
		$('#noticias_anuncios').prop('checked',false);
	}
	
	if( noticias_anuncios_locales == 0 )	{
		$('#noticias_anuncios_locales').prop('checked',false);
	}
	
	if( comprador_adjudica_encargo == 0 )	{
		$('#comprador_adjudica_encargo').prop('checked',false);
	}
	
	if( publicar_encargo == 0 )	{
		$('#publicar_encargo').prop('checked',false);
	}
	
	if( marketing == 0 )	{
		$('#marketing').prop('checked',false);
	}
	
	if( boletin == 0 )	{
		$('#boletin').prop('checked',false);
	}


	$('#send-email').click(function(e)	{
		if ( $('#correo').val() == '')	{
			$('#modal-content').text('Debes ingresar un correo electrónico');
			$('#myModal').modal();
		}
		if ( $('#passwd').val() == '')	{
			$('#modal-content').text('Debes ingresar la contraseña actual');
			$('#myModal').modal();
		}
		$.ajax({
		  method: "POST",
		  url: "{{ url('/usuario/update_email') }}",
		  data: $('#form-email').serialize()
		})
		.done(function( response ) {
			if (response==0)	{
				$('#correo_actual').val($('#correo').val());
				$('#modal-content').text('Contraseña incorrecta');
				$('#myModal').modal(); 
			}
			if (response==1)	{
				$('#correo_actual').val($('#correo').val());
				$('#modal-content').text('La dirección de correo electrónico fue actualizada');
				$('#myModal').modal(); 
			}
			if (response==3)	{
				$('#correo_actual').val($('#correo').val());
				$('#modal-content').text('El correo electronico que intentas actualizar ya se encuentra registrado');
				$('#myModal').modal(); 
			}
			
		});
	});
	
	$('#formato').change(function(e)	{
		send_config(); 
	});
	
	$("input:checkbox").click(function(e){
		send_config();
	});

	function send_config()	{
		
		$.ajax({ 
		  method: "POST",
		  url: "{{ url('/usuario/update_mailing') }}",
		  data: $('#form-mailing').serialize()
		})
		.done(function( response ) {
			console.log(response);			
		});
	}
});


</script>
<section class="register-hero w-100"> 
	<img src="{{ URL::asset('public/images/fondo-userInfo.png') }}" alt="">
	<div id="contenido-interior-hero">
		<h2>Notifications</h2>
	</div> <!-- #contenido-interior-hero -->
</section>
<section id="contenido-interior">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-lg-8">
				<form class="text-center border border-light" name="form-email" id="form-email">
					<div class="card">
							<h5 class="card-header logo-color white-text text-center py-4"><img src="{{ URL::asset('public/images/ico-Identificaiton.png') }}" alt="" class="img-form-register">  Notifications</h5>
						<div class="md-form card-body px-lg-5 pt-0">
							<!-- Email -->
							<div class="md-form">
								<input type="email" class="form-control" id="correo" name="correo" value="{{$user->email}}" >
								<label for="correo">E-mail</label>
							</div>
							<!-- password -->
							<div class="md-form">
								<input type="password" class="form-control" id="passwd" name="passwd">
								<label for="materialLoginFormpassword">Password</label>
							</div>
							<!-- Sign in button -->
							<button class="btn btn-outline-logo btn-rounded btn-block my-4 waves-effect z-depth-0" type="button" id="send-email">Update</button>
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<input type="hidden" name="correo_actual" id="correo_actual" value="{{$user->email}}">
							<input type="hidden" name="user_id" value="{{$user->id}}">
						</form><!-- .card -->
						<form class="text-center" name="form-mailing" id="form-mailing">
								<!-- Formato -->
								<div class="md-form">
									<select class="browser-default custom-select" id="formato" name="formato">
										<option value="1">HTML</option>
										<option value="0">TEXT</option>
									</select>
								</div>
								<!-- Notificaciones individuales -->
								<div class="custom-control custom-checkbox ml-4">
								  <input type="checkbox" class="custom-control-input" checked value="1" name="noticias_anuncios" id="noticias_anuncios">
								  <label class="custom-control-label" for="noticias_anuncios">Noticias y anuncios de woph.cl</label>
								</div>
								<div class="custom-control custom-checkbox ml-4">
								  <input type="checkbox" class="custom-control-input" checked value="1" name="noticias_anuncios_locales" id="noticias_anuncios_locales">
								  <label class="custom-control-label" for="noticias_anuncios_locales">Noticias y anuncios locales</label>
								</div>
								<div class="custom-control custom-checkbox ml-4">
								  <input type="checkbox" class="custom-control-input" checked value="1" name="comprador_adjudica_encargo" id="comprador_adjudica_encargo">
								  <label class="custom-control-label" for="comprador_adjudica_encargo">Un comprador te adjudica un encardo</label>
								</div>
								<div class="custom-control custom-checkbox ml-4">
								  <input type="checkbox" class="custom-control-input" checked value="1" name="publicar_encargo" id="publicar_encargo">
								  <label class="custom-control-label" for="publicar_encargo">Cuando publico un encargo</label>
								</div>
								<div class="custom-control custom-checkbox ml-4">
								  <input type="checkbox" class="custom-control-input" checked value="1" name="marketing" id="marketing">
								  <label class="custom-control-label" for="marketing">Emails de marketing</label>
								</div>
								<div class="custom-control custom-checkbox ml-4">
								  <input type="checkbox" class="custom-control-input" checked value="1" name="boletin" id="boletin">
								  <label class="custom-control-label" for="boletin">Boletín mensual</label>
								</div>
								<input type="hidden" name="_token" value="{{csrf_token()}}" />
								<input type="hidden" name="user_id" value="{{$user->id}}" />
						</form>
						</div> <!-- .card-body -->
					</div>

				
			</div><!-- .col-lg-8 -->
		</div><!-- .row -->
		<!-- The Modal -->
		<div class="modal fade" id="myModal">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <!-- Modal Header -->
			  <div class="modal-header">
				<h4 class="modal-title">E-MAIL</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  </div>
			  <!-- Modal body -->
			  <div class="modal-body" id="modal-content"></div>
			  <!-- Modal footer -->
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div> 
	</div> <!-- .container -->
</section>
