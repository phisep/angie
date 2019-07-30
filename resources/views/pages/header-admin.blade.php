
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>WORLD OPPORTUNITIES HUNTER</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
    <!-- Bootstrap -->
	
    <link href="{{ URL::asset('public/css/bootstrap.min.css') }}" rel="stylesheet" media="screen"> 
    <link rel="stylesheet" href="{{ URL::asset('public/css/font-awesome.min.css') }}">

    <link href="{{ URL::asset('public/css/animations.css') }}" rel="stylesheet" media="screen"> 
    <link href="{{ URL::asset('public/css/style.css') }}" media="all" rel="stylesheet" type="text/css" /> 
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/component.css') }}" /> 
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/js/jquery-ui/jquery-ui.css') }}" />	

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->
	<script src="{{ URL::asset('public/js/jquery-1.10.2.min.js') }}"></script>
	<script src="{{ URL::asset('public/js/jquery-ui/jquery-ui.min.js') }}"></script>
</head>

<body>
    <!-- navbar navbar-robotic -->
    <nav class="navbar navbar-robotic navbar-static-top">
        <div class="container">
            <header class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">WORLD OPPORTUNITIES  <span>HUNTER</span></a>
            </header> <!-- navbar-header -->

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-nav-robotic navbar-right">
                
                    <li class="dropdown"><a href="{{ url('/admin/usuarios') }}">Usuarios </a></li>
                    <li class="dropdown"><a href="{{ url('/admin/encargos') }}">Encargos </a></li>
                    <li class="dropdown login-box">Bienvenido, {{$user}}</li> 
					<li class="dropdown">
						<button type="button" class="btn btn-primary login-button" onclick="javascript:location.href='https://www.woph.cl/admin/logout'">Cerrar sesión</button>
					</li>
				</ul> <!-- navbar-nav -->
            </div><!--navbar-collapse -->
        </div> <!--container -->
    </nav> <!-- navbar-robotic -->

   

    
 

