<!DOCTYPE html>
<html>
<head>	
	<title>Biblioteca ITESI</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.css">	
</head>

<body>		
	<h1>Prueba del uso de Git</h1>
	<nav class="navbar navbar-expand-lg navbar-light bg-success">
	  
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
	        <a class="nav-link" href="AcercaDe.html" tabindex="-1" aria-disabled="true">Acerca de Biblioteca Itesi</a>
	      </li>
	    </ul>
	    <div class="form-group">
	    	<form class="form-inline my-2 my-lg-0">
	    	  <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
	    	  <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Buscar</button>
	    	</form>
	    </div>
	  </div>
	</nav><br>


	<form action="Resultados.php" method="post" autocomplete="off">
		<div class="container">
			<fieldset>
				<b for="titulo" class="col-lg-3 col-form-label mr-2">Título</b>
				<div class="col-lg-3">
					<input type="search" class="form-control" name="titulo">
				</div>
		
				<b for="autor" class="col-lg-3 col-form-label mr-2">Autor(es)</b>
				<div class="col-lg-3">
					<input id="autor" type="text" class="form-control" id="autor" name="autor">
				</div>

				<b for="numPaginas" class="col-lg-3 col-form-label mr-2">N° Páginas</b>
				<div class="col-lg-3">
					<input type="search" class="form-control" name="numPaginas">
				</div>
		
		
				<b for="edicion" class="col-lg-3 col-form-label mr-2">Edición</b>
				<div class="col-lg-3">
					<input id="autor" type="text" class="form-control" id="edicion" name="edicion">
				</div>

				<b for="year" class="col-lg-3 col-form-label mr-2">Año de publicación</b>
				<div class="col-xs-3 col-sm-3 col-md-3">
					<input type="search" class="form-control" name="year">
				</div>
				<br>
				<input class ="btn btn-warning" type="submit"  name="search" value="Buscar">

			</fieldset>
		</div>		
	</form>

	<footer id="pie">
		<div class="container">
			<img src="logoItesi.png" style="height: 80px; background-color: white; border-radius: 4px;" alt="">
			<img style="height: 80px;" src="Catalago/Logo SEP footer.png" alt="">
		</div>
	</footer>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	<script src="js/materialize.min.js"></script>
	<script src="myscript2.js"></script>	
</body>
</html>