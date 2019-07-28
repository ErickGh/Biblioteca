<?php

mysql_connect("localhost", "root", "");
mysql_select_db("escuela");

if(isset($_POST['usuario']))
{
	$usuario = $_POST['usuario'];
	$contra = $_POST['contra'];

	$sql_query = "SELECT * FROM login WHERE Usuario = '".$usuario."'AND Contrasena = '".$contra."' limit 1";

	$resultado = mysql_query($sql_query);

	if(mysql_num_rows($resultado)==1)
	{
		
	}
	else
	{
		echo "Nombre de usuario o contraseña incorrecto";
		exit();
	}

	function getDatosEstudiante($query)
	{
		$connect = mysqli_connect("localhost", "root", "", "escuela");
		$resultado = mysqli_query($connect, $query);
		return $resultado;
	}

	$query = "SELECT * FROM `alumno` WHERE NumControl = '".$usuario."'";
	$resultado = getDatosEstudiante($query);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="Inicio.css">
</head>
<body>

	<div class="datos">			
		<?php $row = mysqli_fetch_array($resultado)?>
		<img src="<?php echo $row['Foto'];?>">
		<p>Número de control: <?php echo $row['NumControl'];?></p>
		<p>Nombre: <?php echo $row['Nombre']." ".$row['ApellidoPaterno']." ".$row['ApellidoMaterno'];?></p>			
		<p>Carrera: <?php echo $row['Carrera']; ?></p>
		<p>Semestre: <?php echo $row['Semestre']; ?></p>

		<div>
			<button onclick="location.href='Buscador.php'" type="button"><img class="icon" src="Inicio/bibliotecaConsultar.png" alt="Consultar biblioteca"><br>Consultar biblioteca</button>

			<button><img class="icon" src="Inicio/iconoPrestamo.png" alt="Mis préstamos"><br>Mis préstamos</button>
		</div>
	</div>

	<!-- <div class="seccion">
		<h1>Contáctanos</h1>
	</div> -->
</body>
</html>