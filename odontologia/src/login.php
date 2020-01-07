<?php

	$nombre=$_POST['nombre'];
	$telefono=$_POST['telefono'];
    $cedula= $_POST['cedula'];

	require("connection_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$find_cedula=mysqli_query($mysqli,"SELECT * FROM cliente WHERE cedula='$cedula'");
	$check_cedula=mysqli_num_rows($find_cedula);
	if($check_cedula>0){
        echo ' <script language="javascript">alert("Atencion, el cliente ya está registrado");</script> ';
    }else{
        
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
        mysqli_query($mysqli,"INSERT INTO cliente VALUES('$cedula','$nombre','$telefono')");
        //echo 'Se ha registrado con exito';
        
        echo "<script>location.href='../views/info_client.php?cedula=$cedula'</script>";
    
        
    }
			
		

	
?>
