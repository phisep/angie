<?php 
//var_dump($tipo);
$tipo=strtoupper($tipo);
$titulo = NULL;
if ($tipo == NULL)
	$titulo = 'compra o trámite';
if ($tipo == 'TRAMITE')
	$titulo = 'trámite';
if ($tipo == 'COMPRA')
	$titulo ='compra';
?>
<script>
$(function() {
	$("#tipo_encargo option").each(function()	{
    	   var dato = $(this).attr('value');
    	   if ( dato == '<?php echo $tipo;?>' )	{
    			$(this).prop('selected', true);
    	   }
    });
});
</script>
<div class="container">
	<header class="section-title">
           <h1>Publicar encargo de {{$titulo}}</h1> 
	</header>
	<div class="row">
            <div class="col-md-12">
                <div class="register-form">
                    <form role="form" method="post" action="{{ url('/encargo/crear') }}" name="form"> 
                        <div class="form-group">
                            <label for="producto">Producto/Servicio<sup>*</sup></label>
                            <input type="text" class="form-control" id="producto" name="producto" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción<sup>*</sup></label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>
                        <div class="form-group">
                            <label for="ciudad">Ciudad<sup>*</sup></label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                        </div>
						<div class="form-group">
                            <label for="pais">País<sup>*</sup></label>
                            <!--<input type="text" class="form-control" id="pais" name="pais" required>-->
							<select class="form-control" id="pais" name="pais" required>
								<option value="CHILE">CHILE</option>
								<option value="ARGENTINA">ARGENTINA</option>
								<option value="BOLIVIA">BOLIVIA</option>
								<option value="BRASIL">BRASIL</option>
								<option value="COLOMBIA">COLOMBIA</option>
								<option value="COSTA RICA">COSTA RICA</option>
								<option value="CUBA">CUBA</option>
								<option value="ECUADOR">ECUADOR</option>
								<option value="EL SALVADOR">EL SALVADOR</option>
								<option value="GUAYANA FRANCESA">GUAYANA FRANCESA</option>
								<option value="GRANADA ">GRANADA</option>
								<option value="GUATEMALA ">GUATEMALA</option>
								<option value="GUAYANA ">GUAYANA</option>
								<option value="HAITÍ ">HAITÍ</option>
								<option value="HONDURAS ">HONDURAS</option>
								<option value="JAMAICA ">JAMAICA</option>
								<option value="MÉXICO ">MÉXICO</option>
								<option value="NICARAGUA ">NICARAGUA</option>
								<option value="PARAGUAY ">PARAGUAY</option>
								<option value="PANAMÁ ">PANAMÁ</option>
								<option value="PERU ">PERU</option>
								<option value="PUERTO RICO ">PUERTO RICO</option>
								<option value="REPÚBLICA DOMINICANA ">REPÚBLICA DOMINICANA</option>
								<option value="SURINAM ">SURINAM</option>
								<option value="URUGUAY">URUGUAY</option>
								<option value="VENEZUELA">VENEZUELA</option>
							</select>
                        </div>
						<div class="form-group">
                            <label for="tipo_encargo">Tipo de encargo<sup>*</sup></label>
							<input type="text" class="form-control" id="tipo_encargo" name="tipo_encargo" value="{{$tipo}}"readonly>
							<!--
							<select class="form-control" id="tipo_encargo" name="tipo_encargo" required readonly>
							  <option value="">SELECCIONAR</option>
							  <option value="COMPRA">COMPRA</option>
							  <option value="TRAMITE">TRAMITE</option>
							</select>
							-->
                        </div>
						<div class="form-group">
                            <label for="comision">Comisión<sup>*</sup></label>
                            <input type="number" class="form-control" id="comision" name="comision" required>
                        </div>
						<div class="form-group">
                            <label for="tiempo_entrega">Tiempo de entrega<sup>*</sup></label>
                           <!-- <input type="text" class="form-control" id="tiempo_entrega" name="tiempo_entrega" required> -->
							<select class="form-control" id="tiempo_entrega" name="tiempo_entrega" required>
							  <option value="">SELECCIONAR</option>
							  <option value="1 DÍA">1 DÍA</option>
							  <option value="2 DÍAS">2 DÍAS</option>
							  <option value="3 DÍAS">3 DÍAS</option>
							  <option value="4 DÍAS">4 DÍAS</option>
							  <option value="5 DÍAS">5 DÍAS</option>
							  <option value="6 DÍAS">6 DÍAS</option>
							  <option value="7 DÍAS">7 DÍAS</option>
							  <option value="1 SEMANA">1 SEMANA</option>
							  <option value="2 SEMANAS">2 SEMANAS</option>
							  <option value="3 SEMANAS">3 SEMANAS</option>
							  <option value="4 SEMANAS">4 SEMANAS</option>
							  <option value="1 MES">1 MES</option>
							  <option value="2 MESES">2 MESES</option>
							  <option value="3 MES">3 MESES</option>
							</select>
                        </div>
						<button type="submit" class="btn btn-primary pull-right">Publicar</button>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
			        </form>
                </div>
            </div> <!-- col-md-6 -->
	</div>
</div>