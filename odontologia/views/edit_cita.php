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
<?php
	include("navbar.php");
?>
	
</header>

<body background="../images/index3.jpg" style="background-attachment: fixed;  background-size: cover; padding-top: 80px;" >
<main role="main" class="container mt-5" >
<br>

<!-- formulario registro -->
<h1>Cita</h1>
<?php
    extract($_GET);
    require("../src/connection_db.php");
		
    $sql="SELECT * FROM cita WHERE id=$id";
//la variable  $mysqli viene de connect_db que lo traigo con el require("connection_db.php");
    $ressql=mysqli_query($mysqli,$sql);
    while ($row=mysqli_fetch_row ($ressql)){
            $descripcion=$row[2];
            
        }
?>
<br>

<form action="" method="POST">
<fieldset>
	<div class="form-row">
		
		<div class="form-group col-md-8">
		<textarea class="form-control" id="descripcion" name="descripcion" rows="8" ><?php echo $descripcion ?></textarea>
		</div>
			
	</div>
		
	<input  class="btn btn-primary" type="submit" name="submit" value="Enviar"/>
</fieldset>	
</form>

<?php
	
	if(isset($_POST['submit'])){
		require("../src/guardar_cambios_cita.php");
		
	}
?>


<!--Fin formulario registro -->

		

	
</body>
</html>