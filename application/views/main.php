<h3>MENU PRINCIPAL</h3>
<html>
<head>
	<title></title>
</head>
<body>

	<!--<a href= "<?php echo base_url();?>index.php/controlVacas/IngresarVacas"> Registrar dueño</a><br/> <!-- base_url/contolador/funcion-->
	<!--<a href= "<?php echo base_url();?>index.php/controlCasas/setCasas"> Registrar viviendas</a><br/>
	<a href= "<?php echo base_url();?>index.php/controlCasas/listarViviendas">  Listar vivendas</a><br/>
	<a href= "<?php echo base_url();?>index.php/controlCasas/obtenerGranjero">  Dueños mayores</a><br/> -->
	<ul class="nav navbar-nav">
            <li class="active"><a href="<?=base_url()?>index.php/controlVacas/ingresarVacas" class="" contenteditable="false">Ingresar Vaca</a>
            </li>
			<li class="active"><a href="<?=base_url()?>index.php/controlVacas/listarVacas" class="" contenteditable="false">Listar Vacas</a>
            </li>
            <li class="divider-vertical"></li>
        </ul>

</body>
</html>