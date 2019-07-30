<section class="register-hero w-100">
		<img src="{{ URL::asset('public/images/fondo-userInfo.png') }}" alt="">
		<div id="contenido-interior-hero">
			<h2>Orders</h2>
		</div> <!-- #contenido-interior-hero -->
</section> 
<br>
<div class="container">
	<div class="row alto" >
		<div class="col-md-12">
			<div class="col-md-6 alert alert-info div-center margen-top-msg">
				Te has posutlado al encargo código <strong>{{$codigo}}</strong>.<br/>
				Recuerda revisar tu perfil para ver el estado de tu postulación.<br/>
				Gracias por preferir World Opportunities Hunter.
			</div>
			<div class="col-md-12 text-center" style="margin-top: 10px"> 
				<button type="button" class="btn btn-primary" name="registrar" id="registrar" onclick="javascript:location.href='{{ url('/usuario/encargos/') }}'">Volver</button>
			</div>
		</div>
	</div>
</div>