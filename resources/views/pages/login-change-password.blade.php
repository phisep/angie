<script>
$(function() {
	$('#enviar').click(function(e)	{
		
		var send = true;
		
		$('#modal-content').text('');
		
		if ( $('#password').val() == '' )	{
			send=false;
			$('#modal-content').text('Debes ingresar la contraseña');
			$('#myModal').modal(); 
			return false;
		}
		
		if ( $('#confirm-password').val() == '' )	{
			send=false;
			$('#modal-content').text('Debes confirmar la contraseña');
			$('#myModal').modal(); 
			return false;
		}
		
		
		if ( $('#password').val() != $('#confirm-password').val() )	{
			send=false;
			$('#modal-content').text('Las contraseñas no coinciden');
			$('#myModal').modal(); 
			return false;
		}
		
		console.log(send);
		
		if (send)	{
			$('#form').submit();
		}
		
	});
	
  
});
</script>
<div class="container">
	<section id="login-form">
		<!--<h1>Robotic <span>Lab</span></h1> -->
		<form role="form" method="post" action="{{ url('/login/update') }}" name="form" id="form">
			<div class="form-group">
				<label>Cambio de contraseña</label>
				<div class="input-group login-input">
					<span class="input-group-addon"><i class="icon-user"></i></span>
					<input type="password" name="password" id="password" class="form-control" placeholder="Nueva contraseña" required>
				</div>
				<div class="input-group login-input">
					<span class="input-group-addon"><i class="icon-user"></i></span>
					<input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Confirma tu contraseña" required>
				</div>
				<button id="enviar" type="button" class="btn btn-primary pull-right">Cambiar contraseña</button>
			</div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
			<input type="hidden" name="id" value="{{$user->id}}"> 
		</form>
	</section>
	<!-- The Modal -->
	<div class="modal fade" id="myModal">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title">Cambiar contraseña</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>
		  <!-- Modal body -->
		  <div class="modal-body" id="modal-content"></div>
		  <!-- Modal footer -->
		  <div class="modal-footer">
			
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
</div>