<div class="container">
	<header class="section-title">
           <h1>Mi foto</h1>  
	</header> 
	<div class="col-md-6">
	@if ($user->foto==NULL)
		<img src="{{ url('public/img/no-foto.png') }}" class="img-rounded">
	@else
		<img src="{{ url('storage/app/'.$user->foto) }}" class="img-thumbnail">
	@endif
	<form class="form-group" id="upload_form" name="upload_form" enctype="multipart/form-data" method="post" action="{{ url('usuario/upload') }}">
			<input type="file" name="archivo" required>
			<input type="submit" name="enviar" value="subir">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
		</form>
		    
		@if (session('status-foto')) <div class="alert alert-success"> {{ session('status-foto') }} </div> @endif 

	</div>
	
</div>
	