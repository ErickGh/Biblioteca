<!DOCTYPE html>
 <?php
header("Content-Type: text/html;charset=utf-8");
if (isset($_POST['search'])) 
{
	$nombreLibro = $_POST['titulo'];
	$autor = $_POST['autor'];
	$numPaginas = $_POST['numPaginas'];
	$edicion = $_POST['edicion'];
	$year = $_POST['year'];
	$query = "SELECT * FROM `libro` WHERE `Nombre` LIKE '%".$nombreLibro."%' AND `Autor` LIKE '%".$autor."%' AND `Edicion` LIKE '%".$edicion."%' AND `NumPaginas` LIKE '%".$numPaginas."%' AND `Year` LIKE '%".$year."%'";

 	mysql_query("SET NAMES 'utf8'");
	$resultado = filtrarTabla($query);

}
else
{
	$query = "SELECT * FROM `libro`";
	$resultado = filtrarTabla($query);
}

function filtrarTabla($query)
{
	$connect = mysqli_connect("localhost", "root", "", "escuela");
	$filtrarResultado = mysqli_query($connect, $query);
	return $filtrarResultado;		
}
?>

<html>
	<head>
		<title>Resultado de la búsqueda</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />		
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">

	</head>
	<body onload="cargar()">	
		<nav class="navbar navbar-expand-lg navbar-light bg-success">
		  <img src="logoItesi.png" id="logo" alt="">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Inicio <span class="sr-only"></span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Link</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Secciones
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Aeronaútica</a>
		          <a class="dropdown-item" href="#">Biología</a>	          
		          <a class="dropdown-item" href="#">Bioquímica</a>
		          <a class="dropdown-item" href="#">Gestión Empresarial</a>
		          <a class="dropdown-item" href="#">Mecatrónica</a>
		          <a class="dropdown-item" href="#">Sistemas Computacionales</a>	          
		        </div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Acerca de Biblioteca Itesi</a>
		      </li>
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
		    </form>
		  </div>
		</nav><br>		

		<form>						
			<div class="container">					
				<table class="table-responsive table table-bordered table-hover">
					<tr class="table-active">
						<th>Nombre</th>
						<th>Autor</th>
						<th>Edición</th>
						<th>Número de páginas</th>
						<th>Año</th>
						<th>ISBN</th>
						<th>Imagen</th>					
						<th>Copias disponibles</th>
					</tr>


					<?php
					$rows = mysqli_num_rows($resultado);						
					$items = 0;
					?>

					<h3 class = "bg-warning">Libros encontrados: <?php echo $rows ?></h3>
					<?php
					while ($row = mysqli_fetch_array($resultado)):$isbn = "isbn".$items;   $result = "result".$items;?>
						<tr>
							<td><?php echo $row['Nombre'];?></td>
							<td><?php echo $row['Autor'];?></td>
							<td><?php echo $row['Edicion'];?></td>
							<td><?php echo $row['NumPaginas'];?></td>
							<td><?php echo $row['Year'];?></td>
							<td id="<?php echo $isbn ?>"><?php echo $row['ISBN'];?></td>
							<td><img src="<?php echo $row['Imagen'];?>"><button id="<?php echo $result ?>" class="btn btn-outline-success"></button></td>
							<td><?php echo $row['Cantidad'];?></td>
						</tr>
							
					<?php

					$isbn = "isbn".$items;
					$items+=1;
					endwhile;?>
				</table>
			</div>
		</form>		

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>

			function cargar()
			{
				var num = "<?php echo $rows ?>";		
		
				var tdText = [];		
				for (var i = 0; i < num; i++) 
				{
      				tdText[i] = document.getElementById("isbn"+i).innerHTML;      		
  				}
  			
				var url = [];
				for (var i = 0; i < num; i++) 
				{						
					$.get("https://www.googleapis.com/books/v1/volumes?q=" + tdText[i], function(respuesta)
						{
							for (var j = 0; j < num; j++) 
	  						{	
								url[j] =$('<a href='+ respuesta.items[j].volumeInfo.infoLink + ' target="_blank">Leer más </a><br>');
								url[j].appendTo("#result"+j);
							}			

						});			

						
				}
				return false;
			}

		</script>
	</body>
</html>