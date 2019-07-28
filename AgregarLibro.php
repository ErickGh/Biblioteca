<!DOCTYPE html>

 <?php
	
	if (isset($_POST['guardar'])) 
	{
		$nombreLibro = $_POST['titulo'];
		$autor = $_POST['autor'];
		$edicion = $_POST['edicion'];
		$numpaginas = $_POST['numpaginas'];
		$year = $_POST['year'];
		$isbn = $_POST['isbn'];
		$imagen = $_POST['linkimagen'];
		$query = "INSERT INTO libro (Nombre, Autor, Edicion, NumPaginas, Year, ISBN, Imagen) VALUES ('$nombreLibro', '$autor', '$edicion','$numpaginas', '$year','$isbn', '$imagen')";


		$resultado = filtrarTabla($query);
	}
	

function filtrarTabla($query)
{
	$connect = mysqli_connect("localhost", "root", "", "escuela");
	$filtrarResultado = mysqli_query($connect, $query);
	return $filtrarResultado;		
}
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/agregar.css">
</head>
<body >

	<form style="text-align: center;" onsubmit="return cargar()">
		<h3>Busque un libro por ISBN</h3>
		<p style="color: red">Nota: Ingrese el ISBN de 13 dígitos. Éste puede ser un número de 10 o 13 dígitos.</p>
		ISBN: <input id="isbn1" type="text"><br>
		<input type="submit" value="Buscar libro">
	</form>

	<form method="post">
		<div style="text-align: center;" id="datos">
			<b>Título: </b><input id="titulo" name="titulo" type="text"><br>
			<b>Autor: </b><input id="autor" name="autor" type="text"><br>
			<b>Edición: </b><input id="edicion" name="edicion" type="text"><br>
			<b>Páginas: </b><input id="numpaginas" name="numpaginas" type="text"><br>
			<b>Año: </b><input id="year" name="year" type="text"><br>
			<b>ISBN: </b><input id="isbn" name="isbn" type="text"><br>
			<br>
			<img id="imagen" alt=""><br>
			<input onclick="mensaje()" type="submit" name="guardar" value="Guardar">
			<input hidden id="linkimagen" name="linkimagen" type="text"><br>
		</div>
	</form>

<script src="js/jquery.js"></script>
<script>
	function mensaje()
	{
		alert("Libro guardado con éxito");
	}

	function cargar()
			{
      			var tdText = document.getElementById("isbn1").value;      		
  				
  				$.get("https://www.googleapis.com/books/v1/volumes?q=" + tdText, function(respuesta)
						{	
							console.log(respuesta);

							var divDatos = document.getElementById("datos");
							divDatos.hidden = false;

							var txttitulo = document.getElementById("titulo");
							txttitulo.value = respuesta.items[0].volumeInfo.title;

							var txtautor = document.getElementById("autor");
							txtautor.value = respuesta.items[0].volumeInfo.authors;

							var txtedicion = document.getElementById("edicion");
							txtedicion.value = respuesta.items[0].volumeInfo.printType;

							var txtnumpaginas = document.getElementById("numpaginas");
							txtnumpaginas.value = respuesta.items[0].volumeInfo.pageCount;

							var txtfecha = document.getElementById("year");
							txtfecha.value = respuesta.items[0].volumeInfo.publishedDate;

							var txtisbn = document.getElementById("isbn");
							txtisbn.value = respuesta.items[0].volumeInfo.industryIdentifiers[1].identifier;

							var txtlinkimagen = document.getElementById("linkimagen");
							var txtimagen = document.getElementById("imagen");
							txtlinkimagen.value = respuesta.items[0].volumeInfo.imageLinks.thumbnail;
							txtimagen.src = respuesta.items[0].volumeInfo.imageLinks.thumbnail;
							
							
						});	
				return false;
			}

</script>
</body>
</html>