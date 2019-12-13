<?php echo '<link rel="stylesheet" type="text/css" href="css/main.css">'; ?>

<form class="borde" action="" method="POST" enctype="multipart/form-data">
	<br><br>
	<div> <strong>Sube tus ficheros :</strong> <br> <p>
    Puedes eligir una carpeta o subirlo directamente aqui
	<input type="text" name="carpeta"><br><br>
		<!-- Hacer un select que dentro de la opcion haga un foreach (una opcion por nombre de carpeta) -->
        <input type="file" NAME="publico">
        <input type="submit" NAME="subir" value="SUBIR ARCHIVO">
	</p>
	<br><br>
	</div>

	<div> <strong>Nombre de la carpeta:</strong> <br> <p>
	<input type="text" name="nomCarp"><br><br>
        <input type="submit" name="crear" value="CREAR CARPETA"> 
        <input type="reset" name="cancelar" value="CANCELAR">
	</p>
	<br><br>
	</div>
    <p>
		<input type="submit" name="volver" value="VOLVER">
	</p>
    <p>
		<input type="submit" name="cerrar" value="CERRAR SESIÓN">
	</p>

</form>
<?php
	//Añado este código para que el formulario enseñe errores al cargar la página en caso de que los haya
	if(isset($errores)){
		foreach($errores as $error){
			echo $error."<br>";
		}
	}
	
	?>