<?php

// UPDATE `cliente` SET `cedula` = '1152', `nombre` = 'DANIELA hola' WHERE `cliente`.`cedula` = 435

extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
	require("../src/connection_db.php");
	$sentencia="UPDATE cliente set cedula='$cedulaNueva', nombre='$nombre', telefono='$telefono' WHERE cliente.cedula = '$cedula' ";
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentencia);
	if ($resent==null) {
		echo "Error de procesamieno no se han actuaizado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		echo "<script>location.href='../views/index.php'</script>";
		
		echo "<script>location.href='admin.php'</script>";
	}else {
		echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';
		
		echo "<script>location.href='../views/index.php'</script>";

		
	}
?>