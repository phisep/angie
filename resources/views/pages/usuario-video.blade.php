<div class="container">
	<header class="section-title">
           <h1>Mi video</h1>  
	</header> 
	<div class="col-md-6">
		@if ($user->video==NULL)
			<div>No has subido ningun video aún.</div>
		@else
		 <video id="video1" controls >
			<source src="{{ url('storage/app/'.$user->video) }}" type="video/mp4">
			<source src="{{ url('storage/app/'.$user->video) }}" type="video/ogg">
			Your browser does not support HTML5 video.
		  </video>
		@endif
	<form class="form-group" id="upload_form" name="upload_form" enctype="multipart/form-data" method="post" action="{{ url('usuario/upload_video') }}">
			<input type="file" name="archivo" required>
			<input type="submit" name="enviar" value="subir">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
		</form>
		    
		@if (session('status-foto')) <div class="alert alert-success"> {{ session('status-foto') }} </div> @endif 

	</div>
	
</div>
	