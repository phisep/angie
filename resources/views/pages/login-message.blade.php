<div class="container">
	<div class="row alto" >
		<div class="col-md-12">
			<div class="col-md-6 alert alert-info div-center margen-top-msg">
				Te hemos enviado un mail a <strong>{{$email}}</strong> con las instrucciones para restaurar tu password.<br>
				Por favor, revisa tu bandeja de entrada o correo no deseado en tu casilla de correo.
				<p>Atte., Word Oportunitties Hunter.</p>
			</div>
			<div class="col-md-12 text-center" style="margin-top: 10px"> 
				<button type="button" class="btn btn-primary" name="registrar" id="registrar" onclick="javascript:location.href='{{url('/login')}}'">Volver</button>
			</div>
		</div>
	</div>
	
</div>