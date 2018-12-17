<br />
<head>
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
error_reporting(0);	
$link =  mysqli_connect("localhost","root", "", "animales");

if($codigo_vaca == NULL || $codigo_vaca == "" || $codigo_vaca == 0){
	$result = mysqli_query($link, "	SELECT * FROM vacas");
}else{
$result = mysqli_query($link, "	 SELECT * 
                                 FROM vacas 
                                 WHERE codigo_vaca = '$codigo_vaca' 
                                 ORDER BY codigo_registro DESC"
						);
					}
$conteo = mysqli_num_rows($result);
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
	  <center><h1>HISTÓRICO DE DATOS</h1></center>
      <br />
      <br />
	  <form class="form-horizontal" role="form" id="form" name="form" action="listarVacas" method="post">
	  	<div class="row">
		  <div class = "col-md-4">
	  		<center><h4>Código de la vaca</h4></center>
			<div class="form-group">				
				<input class="form-control" placeholder="" type="number" name="codigo_vaca" id="codigo_vaca" required/><br/>
				<center><button onclick="mostrarFiltro(<?php htmlspecialchars($conteo);?>)" href="<?=base_url()?>index.php/controlVacas/listarVacas" class="btn btn-success">Consultar</button></center>
			</div>
			</div>
			<div class="col-md-4">
				<center><img class="text-center mx-auto mb-4 " src="http://localhost:8000/vacas/img/ganaderia_leche.jpg" alt="" width="100" height="120	"></center>
			</div>
			<div class="col-md-4">
				<label style="color:white;">.</label><br />
				<label style="color:white;">.</label>
				<div class="col-md-10"><h5>Cantidad de registros</h5></div>
				<center><div class="col-md-4"><input class="form-control" id="cantidadRegistros" type="text" name="cantidadRegistros" value="<?php error_reporting(0); echo htmlspecialchars($conteo); ?>" readonly /></div></center> 
			</div>
		</div>
		</form>
	</div>
	</div>
<div>
<br />

<?php 
header('Content-Type: text/html;charset=utf-8');
error_reporting(0);

$link =  mysqli_connect("localhost","root", "", "animales");
$codigo_vaca = $_POST['codigo_vaca'];

echo "<br>";

if($codigo_vaca == NULL || $codigo_vaca == "" || $codigo_vaca == 0){
	$result = mysqli_query($link, "	SELECT * FROM vacas");
}else{
$result = mysqli_query($link, "	 SELECT * 
                                 FROM vacas 
                                 WHERE codigo_vaca LIKE '$codigo_vaca' 
                                 ORDER BY codigo_registro DESC"
						);
					}
$conteo = mysqli_num_rows($result);

echo "<table align='center' class='table table-striped'>"; 
echo "</thead>"; 
echo "<tr>";  
echo "<th><h5>Código vaca</h5></th>";  
echo "<th><h5>Peso vivo (Kg)</h5></th>";
echo "<th><h5>Leche producida (L/día)</h5></th>";
echo "<th><h5>Horas de trabajo por día (Horas)</h5></th>";
echo "<th><h5>Vaca en estado de preñez</h5></th>";
echo "<th><h5>Porcentaje de digestibilidad (%)</h5></th>";    
echo "<th><h5>Consumo de materia seca total</h5></th>";
echo "<th><h5>Detalles energía</h5></th>";
echo "</tr>";  
echo "</thead>";
while ($row = mysqli_fetch_row($result)){ 
    echo "<tr>";  
	echo "<td width='150'>".utf8_encode($row[1])."</td>";
	echo "<td width='150'>".utf8_encode($row[2])."</td>";  
	echo "<td width='150'>".utf8_encode($row[3])."</td>";  
	echo "<td width='150'>".utf8_encode($row[4])."</td>";  
	echo "<td width='150'>".utf8_encode($row[6])."</td>";    
    echo "<td width='150'>".utf8_encode($row[7])."</td>";  
	echo "<td width='150'>".utf8_encode($row[13])."</td>";
	echo "<td width='150'><button type='button' class='btn btn-info' onclick = 'mostrarEnergias(".$row[8].", ".$row[9].", ".$row[10].", ".$row[11].", ".$row[12].")'
	data-toggle='modal' id =".utf8_decode($row[0])." data-target='#exampleModal' >Ver detalles</button></td>";
	
	echo"	<!-- Modal -->
	<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	  <div class='modal-dialog' role='document'>
		<div class='modal-content'>
		  <div class='modal-header'>
			<h5 class='modal-title' id='exampleModalLabel'>Resultado cálculo de energías</h5>
			<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
			  <span aria-hidden='true'>&times;</span>
			</button>
		  </div>
		  <div class='modal-body'>
		  	<div class='logo'><p>Energía neta de mantenimiento: &nbsp;</p></p><p id='energia_mantenimiento'></p></div>
			<div class='logo'><p>Energía neta actividad: &nbsp;</p></p><p id='energia_actividad'></p></div>
			<div class='logo'><p>Energía neta lactancia: &nbsp;</p></p><p id='energia_lactancia'></p></div>
			<div class='logo'><p>Energía neta trabajo: &nbsp;</p></p><p id='energia_trabajo'></p></div>
			<div class='logo'><p>Energía neta preñez: &nbsp;</p></p><p id='energia_preñez'></p></div>
		   </div>
		</div>
	  </div>
	</div>";
	
  } 
	echo "</tr>";
echo "</table>"; 

?>
	<br />
	<br />
	<div class="col-md-6"><button class="btn btn-danger" onclick="location.href='<?=base_url()?>index.php/controlVacas/ingresarVacas'">Ingresar Vaca</button></div>
	<br />