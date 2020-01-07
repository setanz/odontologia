<?php

	$fecha=$_POST['fecha'];
	$cedula=$_POST['cedula'];
    $descripcion= $_POST['descripcion'];

    require("connection_db.php");
    //ingresamos los datos a una cita nueva
        
    mysqli_query($mysqli,"INSERT INTO cita VALUES('','$fecha','$descripcion','$cedula')");
    //echo 'Se ha registrado con exito';
    
    echo "<script>location.href='../views/index.php'</script>";


	
?>
