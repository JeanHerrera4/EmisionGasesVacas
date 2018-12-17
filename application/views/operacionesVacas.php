<?php
$numId = $_POST["identificacion"];

$result = mysqli_query($link, "	SELECT energia_neta_mantenimiento,
											energia_neta_actividad,
											energia_neta_lactancia,
											energia_neta_trabajo,
											energia_neta_preñez
									FROM vacas
									WHERE codigo_vaca = '$numId' ");

	$row = mysqli_fetch_row($result);

    echo ("identificacion: ".$row);
    ?>

