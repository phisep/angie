<form id="upload_form" name="upload_form" enctype="multipart/form-data" method="post" action="{{ url('/test/upload') }}">
	<input type="file" name="archivo" required>
	<input type="submit" name="enviar" value="subir">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
</form>
@if (session('status')) <div class="alert alert-success"> {{ session('status') }} </div> @endif 