<div class="container">
	<div class="row alto" >
		<div class="col-md-12">
			<div class="col-md-6 alert alert-info div-center margen-top-msg">
				Le haz adjudicado el encargo al usuario <strong>{{$adjudicado->nombre}}</strong>.<br/>
				Puedes eliminar la adjudicación en el detalle de tu encargo en caso que lo desees.<br/>
			</div>
			<div class="col-md-12 text-center" style="margin-top: 10px"> 
				<button type="button" class="btn btn-primary" name="registrar" id="registrar" onclick="javascript:location.href='{{ url('/usuario/encargos/') }}'">Volver</button>
				
				
			</div>
		</div>
	</div>
	
</div>