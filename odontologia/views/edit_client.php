<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
		<link rel="stylesheet" href="../css/bootstrap.min.css" media="screen">
		<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">		 -->
		<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
		<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Odontología</title>
</head>

<header>
<!-- navbar -->
<?php
	include("navbar.php");
?>
	
</header>

<body background="../images/index3.jpg" style="background-attachment: fixed;  background-size: cover; padding-top: 80px;" >
<main role="main" class="container mt-5" >
<!--Fin navbar  -->
<br>


<!-- Extración de la info de la bd -->
 <?php
		extract($_GET);
		require("../src/connection_db.php");
		
		$sql="SELECT * FROM cliente WHERE cedula=$cedula";
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
		$ressql=mysqli_query($mysqli,$sql);
		while ($row=mysqli_fetch_row ($ressql)){
				$cedula=$row[0];
		    	$nombre=$row[1];
		    	$telefono=$row[2];
		    }



		?> 

<form action="../src/guardar_cambios.php" method="POST">
		<fieldset>
			<div class="form-row">
				
				<div class="form-group col-md-6">
                    <h5>Nombre</h5>
					<input type="text" class="form-control" name= "nombre"  value="<?php echo strtoupper($nombre)?>"required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="text" class="form-control" value="<?php echo $cedula?>" name= "cedulaNueva" required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
                    <h5>Teléfono</h5>
					<input type="number" class="form-control"  name= "telefono" value="<?php echo $telefono?>" required>	
				</div>
			</div>
            <input type="hidden" class="form-control" value="<?php echo $cedula?>" name= "cedula" required>
			<input  class="btn btn-primary" type="submit" name="submit" value="Guardar"/>
		</fieldset>	
		</form>

<br>

 
</body>
</html>