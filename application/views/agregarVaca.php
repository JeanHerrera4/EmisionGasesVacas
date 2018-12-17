<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">      
</head>

    <?php echo validation_errors();?>
	<?php echo form_open('controlVacas/ingresarVacas'); // tomar los datos del fomulario y enviarlos al controlador  controlador/funcion ?>
	
<body>
	<div class = "container">
	    <div class="text-center row">
            <div class="text-center col-md-4">
                <img class="text-center mx-auto mb-4 " src="http://localhost:8000/vacas/img/ganaderia_leche.jpg" alt="" width="82" height="102">
            </div>
        <div class="col-md-5">  
            <div class="col-md-8"><h4>Código de la vaca</h4></div>
            <div class="col-md-8"><input class="form-control" placeholder="" type="number" name="codigo_vaca" id="codigo_vaca" required/><br/></div>
        </div>
        <div class="col-md-3">
            <div class="col-md-6"><button class="btn btn-info" onclick="location.href='<?=base_url()?>index.php/controlVacas/listarVacas'">Histórico de vacas</button></div>
        </div>
	  </div>

	    <div class="card-header">
            <h4 center="true" class="my-0 font-weight-normal">Información del bobino lechero</h4>
        </div>
        <div class="card-body">
            <div class="seccion">
            <br>
            <div class="custom-control custom-checkbox">
                <input type="hidden" name="estado_preñez" value = "No">
                <input type="checkbox" class="custom-control-input" name="estado_preñez" value = "Si" id="same-address">
                <label class="custom-control-label" for="same-address">Vaca en estado de preñez</label><br/>
			</div>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="firstName">Peso vivo (PV):</label>
                    <input type="number" class="form-control" step="any" name="peso_vivo" id="peso_vivo" placeholder="" required><br/>
                </div>
                <div class="col-md-5">
                    <label for="firstName">Cantidad horas de trabajo por día (PL): </label>
                    <input type="number" class="form-control" step="any" id="horas_trabajo_dia" name="horas_trabajo_dia" placeholder=""><br/>
                </div>
                <div class="col-md-4">

                </div>
                
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="firstName">Cantidad de leche producida (PL): </label>
                    <input type="number" class="form-control" step="any" id="leche_producida" name="leche_producida" placeholder="(L/día)" value="" required>
                </div>
                <div class="col-md-5">
                    <label for="firstName">Producción de leche corregida al 4% de grasa:</label>
                    <input type="text" class="form-control" step="any" name="contenido_graso" id="contenido_graso" placeholder="(L/día)" value="" required>
                </div>
                <div class="col-md-8">
                    
                </div>
            </div> 
           </div>
	    </div>


	    <div class="card-header">
            <h4 class="my-0 font-weight-normal">Párametros del modelo y calculos energéticos</h4>
        </div>
        <div class="card-body">
            <div class="seccion">
                <div class="row">
                    <div class="col-md-4">
                        <label for="firstName">Coeficiente para el mantenimiento CF:</label>
                        <input type="number" step="any" class="form-control"  name="coeficiente_mantenimiento" id="coeficiente_mantenimiento" placeholder="" value="0.386" required readonly><br />
                    </div>
                    <div class="col-md-4">
                        <label for="firstName">Coeficiente para la actividad CA:</label>
                        <input type="number" step="any" class="form-control" name="coeficiente_actividad" id="coeficiente_actividad" placeholder="" value="0.17" required readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="firstName">Coeficiente para la preñez:</label>
                        <input type="number" step="any" class="form-control" id="coeficiente_preñez" name="coeficiente_preñez" placeholder="" value="0.10" required readonly>
                    </div>   
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="firstName">Digestibilidad de alimentos (DE%): </label>
                        <input type="number" step="any" class="form-control" name="porcentaje_digestibilidad" id="porcentaje_digestibilidad" placeholder="%" required>
                    </div>
                    <div class="col-md-8">
                        <label style="color:white;">.</label>
                        <div class="col-md-5">
                            <button id="calcular" type="button" onclick="calcularEnergia()" class="btn btn-danger">Calcular energías</button>
                        </div>
                    </div>
                    <div class="col-md-1">      
                    </div>
                </div>
				<hr class="mb-4">				 
				 <!-- Aquí puede ir un botón bin vacilao' pa' calcular -->
                <div class="row">
                   <div class="col-md-4">
                        <label for="firstName">Energía neta para el mantenimiento: </label>
                        <input type="number" step="any" class="form-control" name="energia_neta_mantenimiento" id="energia_neta_mantenimiento" placeholder=""  required readonly><br/>
                    </div>
                    <div class="col-md-4">
                        <label for="firstName">Energía neta para la actividad animal: </label>
                        <input type="number" step="any" class="form-control" name="energia_neta_actividad" id="energia_neta_actividad" required readonly><br/>
                    </div>
                    <div class="col-md-4">
                        <label for="firstName">Energía neta Para la lactancia: </label>
                        <input type="number" step="any" class="form-control" name="energia_neta_lactancia" id="energia_neta_lactancia" required readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="firstName">Energía neta para el trabajo: </label>
                        <input type="number" step="any" class="form-control" name="energia_neta_trabajo" id="energia_neta_trabajo" required readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="firstName">Energía neta requerida para la preñez: </label>
                        <input type="number" step="any" class="form-control" name="energia_neta_preñez" id="energia_neta_preñez" required readonly>
                    </div>
                    <div class="col-md-4"> 

                    </div>             
                </div>     
           </div>
      </div>

	<hr class="mb-4">
 	<h4 class="mb-3">Consumo de materia seca total</h4>
  	<div class="osc-col-md-12 order-md-1">
        <label for="firstName">CMST:</label>
        <input type="number" class="form-control" step="any" name="cmst" id="cmst" required readonly>
    </div>
    <br />
    <button type="submit" class="btn btn-success"> Enviar </button> <!-- agregar un boton que obtiene todo lo del form -->
</div>
</body>
</html>
