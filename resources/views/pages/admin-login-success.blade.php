<div class="container">
	<header class="section-title">
            <h1>Lista de usuarios registrados</h1>
	</header>
	<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<td style="background-color: #4da0d1; color:#fff;">RUT/DNI</td>
				<td style="background-color: #4da0d1; color:#fff;">NOMBRE</td>
				<td style="background-color: #4da0d1; color:#fff;">FECHA DE NACIMIENTO</td>
				<td style="background-color: #4da0d1; color:#fff;">SEXO</td>
				<td style="background-color: #4da0d1; color:#fff;">CIUDAD</td>
				<td style="background-color: #4da0d1; color:#fff;">PAÍS</td>
				<td style="background-color: #4da0d1; color:#fff;">EMAIL</td>
				<td style="background-color: #4da0d1; color:#fff;">PASSWORD</td>
				<td style="background-color: #4da0d1; color:#fff;">ESTADO</td>
				<td style="background-color: #4da0d1; color:#fff;">OPCIONES</td>
			</tr>
		</thead>
		<tbody>
		@foreach($usuarios as $user)
			<tr>
				<td>{{ $user->rut }}</td>
				<td>{{ $user->nombre }}</td>
				<td>{{ $user->fecha_nacimiento }}</td>
				<td>{{ $user->sexo }}</td>
				<td>{{ $user->ciudad }}</td>
				<td>{{ $user->pais }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->password }}</td>
				<td>{{ $user->estado }}</td>
				<td><button type="button" class="btn btn-danger">VER PERFIL</button></td>  
			</tr>
		@endforeach	
		</tbody>
	</table>
	</div>
 
</div>

