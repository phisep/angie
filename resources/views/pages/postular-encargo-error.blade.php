<section class="register-hero w-100">
		<img src="{{ URL::asset('public/images/fondo-userInfo.png') }}" alt="">
		<div id="contenido-interior-hero">
			<h2>My orders</h2>
		</div> <!-- #contenido-interior-hero -->
</section>
<br>
<div class="container">
	<div class="row alto" >
		<div class="col-md-12">
			<div class="col-md-6 alert alert-info div-center margen-top-msg">
				Lo sentimos.<br/>
				{{$msg}}
			</div>
			<div class="col-md-12 text-center" style="margin-top: 10px"> 
				<button type="button" class="btn btn-primary" name="registrar" id="registrar" onclick="javascript:location.href='https://www.worthcommunity.com/login'">Iniciar sesión</button>
				<button type="button" class="btn btn-primary" name="registrar" id="registrar" onclick="javascript:history.back()">Volver</button>
				
			</div>
		</div>
	</div>
	
</div>