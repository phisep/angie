<footer>
		<section id="footer-question" class="text-center">
			<div class="container">
				<div class="row">
					<h2 class="col-12">Got a question?</h2>
					<p class="col-12">We're here to help. Check out our FAQs, send us an email or call us at 1 (800) 555-5555</p>
				</div>
			</div>
		</section>
		
		<section id="footer-contenido">
			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col-lg-4">
						<h2>Site map</h2>
						<div class="container">
							<div class="row">
								<div class="col-lg-6">
									<a href="{{ url('/') }}">> Home</a> <br>
									<a href="{{ url('/faq') }}">> FAQ</a> <br>
									<a href="{{ url('/login') }}">> Sign in</a>
								</div>
								<div class="col-lg-6">
									<a href="{{ url('/encargo/compra') }}">> Shoppings</a> <br>
									<a href="{{ url('/registro') }}">> Register</a> <br>
									<a href="#">> About</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<h2>Forms</h2>
						<div class="seleccion-perfil-footer">
							<h3>Become a buyer</h3>
							<p>Register and start publishing your orders right now.</p>
							<button type="button" class="btn btn-outline-light" onclick="javascript:location.href='{{ url('/registro') }}'">Click here</button>
						</div>
						<div class="seleccion-perfil-footer mb-0">
							<h3>Place an order</h3>
							<p>Publish your order and forget about the procedures</p>
							<button type="button" class="btn btn-outline-light" onclick="javascript:location.href='{{ url('/encargo') }}'" >Click here</button>
						</div>
					</div>

					<div class="col-lg-4" id="contacto-footer">
						<div class="container">
							<div class="row justify-content-md-center">
								<div class="col-lg-12 text-center">
									<img src="{{ URL::asset('public/images/logo-portada.png') }}" alt="Logo en portada"> 
									<div class="container mt-3">
										<div class="row justify-content-md-center">
											<div class="col-3"><a href="#"><i class="fab fa-facebook fa-2x"></i></a></div>
											<div class="col-3"><a href="#"><i class="fab fa-twitter-square fa-2x"></i></a></div>
											<div class="col-3"><a href="#"><i class="fab fa-linkedin fa-2x"></i></a></div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 pl-5 pt-3">
									<p>Manuel Bulnes 351, 6th floor. <br>
										<span>Temuco. Chile</span> <br>
										<i class="fas fa-phone-square"></i> 45 2 217789	<br>
										<i class="fas fa-mobile-alt"></i> +56 9 74509823 <br>
										<i class="far fa-envelope"></i> ventas@woph.cl
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</footer>
		<!-- js de Bootstrap -->
	
	<script src="{{ URL::asset('public/js/moment.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<!-- MDB core JavaScript -->
	<script type="text/javascript" src="{{ URL::asset('public/js/mdb.min.js') }}"></script>
	<script src="{{ URL::asset('public/script.js') }}"></script>
	<script>
$( document ).ready(function() {


});
</script>
</body>
</html>