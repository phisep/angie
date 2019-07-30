<script>
$(function() {
	
	$('#divisa').change(function()	{
		$.ajax({
		  method: "POST",
		  url: "{{ url('/usuario/update_divisa') }}",
		  data: $('#form-usuario-divisa').serialize()
		})
		.done(function( response ) {
			console.log(response);
		});
	});
	
	var divisa = "{{$user->divisa}}";
	console.log(divisa);
	$("#divisa option").each(function()		{
    	   var dato = $(this).attr('value');
    	   if ( dato == divisa )	{
    			$(this).prop('selected', true);
    	   }
    });
	
});
</script>
<div class="container">
	<header class="section-title">
           <h1>Divisas</h1>  
	</header>
	
	<form role="form" class="form-horizontal" name="form-usuario-divisa" id="form-usuario-divisa" >
		<div class="col-md-12">
			<h3>Configuración de divisa</h3>
			<div class="form-group">
				<div class="col-md-4">
					<label for="sexo">Tipo de divisa</label>
					<select class="form-control" id="divisa" name="divisa">
						<option value="PESO CHILENO">PESO CHILENO</option>
						<option value="PESO BOLIVIANO">PESO BOLIVIANO</option>
						<option value="PESO COLOMBIANO">PESO COLOMBIANO</option>
						<option value="REAL BRASILEÑO">REAL BRASILEÑO</option>
						<option value="PESO ARGENTINO">PESO ARGENTINO</option>  
						<option value="SOL PERUANO">SOL PERUANO</option>
						<option value="DOLAR ESTADOUNIDENSE">DOLAR ESTADOUNIDENSE</option>
						<option value="EURO">EURO</option>
					</select>
				</div>
			</div> 
			
		</div>
		<input type="hidden" name="_token" value="{{csrf_token()}}">
	</form>
	<header class="section-title">
           <h1>Pagos y finazas</h1>  
	</header>
	<div class="col-md-12">
		<h3>Pagos y transferencias</h3>
		<div class="table-responsive">
			<table class="table table-bordered">  
				<thead>
					<tr>
						<td style="background-color: #4da0d1; color:#fff;">Fecha</td>
						<td style="background-color: #4da0d1; color:#fff;">Nª Operación</td>
						<td style="background-color: #4da0d1; color:#fff;">Código encargo</td>
						<td style="background-color: #4da0d1; color:#fff;">Tipo operación</td>
						<td style="background-color: #4da0d1; color:#fff;">Monto</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>06-04-2018</td>
						<td>546564646546456456</td>
						<td>1050</td>
						<td>ABONO</td>
						<td>5.000.000</td>
					</tr>
					<tr>
						<td>06-04-2018</td>
						<td>546564646546456456</td>
						<td>2285</td>
						<td>GIRO</td>
						<td>2.596.652</td>
					</tr>
				</tbody>
			</table>
		</div>
		<h1>Saldo</h1>
		<br>
		<br>

		<h1>$2.403.348</h1>
	</div>

</div>