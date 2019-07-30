<div class="container">
	<header class="section-title">
            <h1>Lista de encargos registrados</h1>
	</header>
	<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<td style="background-color: #4da0d1; color:#fff;">CODIGO</td>
				<td style="background-color: #4da0d1; color:#fff;">PRODUCTO</td>
				<td style="background-color: #4da0d1; color:#fff;">DESCRIPCION</td>
				<td style="background-color: #4da0d1; color:#fff;">CIUDAD</td>
				<td style="background-color: #4da0d1; color:#fff;">PAIS</td>
				<td style="background-color: #4da0d1; color:#fff;">TIPO ENCARGO</td>
				<td style="background-color: #4da0d1; color:#fff;">COMISION</td>
				<td style="background-color: #4da0d1; color:#fff;">TIEMPO ENTREGA</td>
				<td style="background-color: #4da0d1; color:#fff;">OPCIONES</td>
			</tr>
		</thead>
		<tbody>
		@foreach($encargos as $encargo)
			<tr>
				<td>{{ $encargo->id }}</td>
				<td>{{ $encargo->producto }}</td>
				<td>{{ $encargo->descripcion }}</td>
				<td>{{ $encargo->ciudad }}</td>
				<td>{{ $encargo->pais }}</td>
				<td>{{ $encargo->tipo_encargo }}</td>
				<td>{{ $encargo->comision }}</td>
				<td>{{ $encargo->tiempo_entrega }}</td>
				<td><button type="button" class="btn btn-danger">GESTIONAR</button></td>  
			</tr>
		@endforeach	
		</tbody>
	</table>
	</div>
 
</div>

