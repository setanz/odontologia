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

<div class="row-fluid">

<?php
    
    if($_POST){
        // $busqueda = trim($_POST['buscar']);
        $busqueda = $_POST['buscar'];
    }
    if (empty($busqueda)){
        echo "<h2>No hay resultados</h2>";
    }else{
    
        // Si hay información para buscar, abrimos la conexión
        require("../src/connection_db.php");
        //Contulta para la base de datos, se utiliza un comparador LIKE para acceder a todo lo que contenga la cadena a buscar
        $sql = ("SELECT * FROM cliente WHERE cedula LIKE '%$busqueda%' ORDER BY cedula");
        $sql2 = ("SELECT * FROM cliente WHERE nombre LIKE '%$busqueda%' ORDER BY nombre");
        $result= mysqli_query($mysqli,$sql);
        $result2= mysqli_query($mysqli,$sql2);
        $row2= mysqli_fetch_array($result2);
        $row = mysqli_fetch_array($result);
        if ($row){ 
            echo "<table border = '1'> \n"; 
            //Mostramos los nombres de las tablas 
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr class='table-primary'>";
            echo "<th scope='col'>Nombre</th>";
            echo "<th scope='col'>Cédula</th>";
            echo "<th scope='col'>Teléfono</th>";
            echo "</tr>";
            echo "</thead>";
            while ($field = mysqli_fetch_field($result)){ 
                echo "<tbody>" ;
            } 
                    echo "</tr> \n"; 
                do { 
                    echo "<tr class='table-light'> \n"; 
                    echo "<td><a href='info_client.php?cedula=$row[0]'>".strtoupper($row["nombre"])."</td> \n"; 
                    echo "<td>".$row["cedula"]."</td> \n"; 
                    echo "<td>".$row["telefono"]."</td> \n"; 

                    echo "</tr> \n"; 
                } while ($row = mysqli_fetch_array($result)); 
                    echo "</table> \n"; 
        } elseif($row2){
                echo "<table border = '1'> \n"; 
            //Mostramos los nombres de las tablas 
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr class='table-primary'>";
            echo "<th scope='col'>Nombre</th>";
            echo "<th scope='col'>Cédula</th>";
            echo "<th scope='col'>Teléfono</th>";
            echo "</tr>";
            echo "</thead>";
            while ($field = mysqli_fetch_field($result2)){ 
                echo "<tbody>" ;
            } 
                echo "</tr> \n"; 
                do { 
                    echo "<tr class='table-light'> \n"; 
                    echo "<td><a href='info_client.php?cedula=$row2[0]'>".strtoupper($row2["nombre"])."</td> \n"; 
                    echo "<td>".$row2["cedula"]."</td> \n"; 
                    echo "<td>".$row2["telefono"]."</td> \n"; 

                    echo "</tr> \n"; 
                } while ($row2 = mysqli_fetch_array($result2)); 
                    echo "</table> \n";

        }else { 
            echo "<h2>No hay resultados</h2>";
        }
    }   
          ?> 
 
	
</body>
</html>