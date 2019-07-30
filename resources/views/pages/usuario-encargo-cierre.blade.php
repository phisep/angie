<div class="container">
	<h1 class="">Cierre de {{$encargo->tipo_encargo}}</h1>
	<h3 class="section-title">Datos del encargo</h3>
	<form class="form-horizontal" role="form">
  <div class="form-group">
    <label class="col-lg-2 control-label">Producto</label>
    <div class="col-lg-10">
      <p class="form-control-static">{{$encargo->producto}}</p>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-lg-2 control-label">Descripción</label>
    <div class="col-lg-10">
	<p class="form-control-static">{{$encargo->descripcion}}</p>
      <!--<input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">-->
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label">Ciudad</label>
    <div class="col-lg-10">
      <p class="form-control-static">{{$encargo->ciudad}}</p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label">País</label>
    <div class="col-lg-10">
      <p class="form-control-static">{{$encargo->pais}}</p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label">Tipo encargo</label>
    <div class="col-lg-10">
      <p class="form-control-static">{{$encargo->tipo_encargo}}</p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label">Comisión</label>
    <div class="col-lg-10">
      <p class="form-control-static">{{$encargo->comision}}</p>
    </div>
  </div>
   <div class="form-group">
    <label class="col-lg-2 control-label">Tiempo entrega</label>
    <div class="col-lg-10">
      <p class="form-control-static">{{$encargo->tiempo_entrega}}</p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label">Estado</label>
    <div class="col-lg-10">
      <p class="form-control-static">{{$encargo->estado}}</p>
    </div>
  </div>

<h3 class="section-title">Datos del comprador</h3>
 <div class="form-group">
    <label class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-10">
      <p class="form-control-static">{{$comprador->nombre}}</p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label">Fecha de nacimiento</label>
    <div class="col-lg-10">
      <p class="form-control-static">{{$comprador->fecha_nacimiento}}</p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label">Sexo</label>
    <div class="col-lg-10">
      <p class="form-control-static">{{$comprador->sexo}}</p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label">Ciudad</label>
    <div class="col-lg-10">
      <p class="form-control-static">{{$comprador->ciudad}}</p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label">País</label>
    <div class="col-lg-10">
      <p class="form-control-static">{{$comprador->pais}}</p>
    </div>
  </div>
  <!-- si se adjudica el encargo -->
  @if ($encargo->estado == 'ADJUDICADO') 
  	<h3 class="section-title">Usuario que se adjudico el encargo</h3>
		<div class="form-group">
			<label class="col-lg-2 control-label">Nombre</label>
			<div class="col-lg-10">
			  <p class="form-control-static">{{$adjudicado->nombre}}</p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">Fecha de nacimiento</label>
			<div class="col-lg-10">
			  <p class="form-control-static">{{$adjudicado->fecha_nacimiento}}</p>
			</div>
		</div>
		  <div class="form-group">
			<label class="col-lg-2 control-label">Sexo</label>
			<div class="col-lg-10">
			  <p class="form-control-static">{{$adjudicado->sexo}}</p>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-lg-2 control-label">Ciudad</label>
			<div class="col-lg-10">
			  <p class="form-control-static">{{$adjudicado->ciudad}}</p>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-lg-2 control-label">País</label>
			<div class="col-lg-10">
			  <p class="form-control-static">{{$adjudicado->pais}}</p>
			</div>
		  </div>
			@if (isset($adjudicar) and ($adjudicar) )
				<div class="col-md-12 text-center" style="margin-top: 10px"> 
					<button type="button" class="btn btn-primary" name="adjudicacion" id="adjudicacion" onclick="javascript:location.href='https://www.woph.cl/encargo/eliminar_adjudicacion/{{$encargo->id}}'">Eliminar adjudicación</button>
				</div>
			@endif
		  @endif
		  <!-- adjudica encargo -->      
  


	</form>
</div>
<div class="col-md-12 text-center" style="margin-top: 10px"> 
			<button type="button" class="btn btn-primary" name="registrar" id="registrar" onclick="javascript:location.href='https://www.woph.cl/encargo/postular/{{$encargo->id}}'" <?php if ($encargo->estado=="ADJUDICADO") : ?> disabled <?php endif; ?>>Postular a encargo</button>
			<button type="button" class="btn btn-primary" name="volver" id="volver" onclick="javascript:history.back()">Volver</button>
</div>