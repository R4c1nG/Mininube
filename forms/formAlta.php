<form class="borde" action="" name="inserta" method="POST" enctype="multipart/form-data">
	<p>
		Nombre y apellidos (sólo letras 100 caracteres. Requerido): 		<br>
		<input name="nombre" type="text">
	</p>
	<p>
		Usuario (letras y números entre 7 y 15 caracteres sin ñ ni tildes. Requerido): 		<br>
		<input NAME="usuario" type="text">
	</p>

	<p>
		Password (Entre 8 y 15 caracteres. Carácteres permitidos letras, números y _*\/$&#. No se permiten ñ ni tildes. Requerido): 		<br>
		<input NAME="pass" type="password">
	</p>
	<p>
		Fecha Nacimiento (formato dd-mm-aaaa. No requerido): 		<br>
		<input NAME="fecha" type="text">
	</p>
	<p>
		<label>Foto de perfil (jpg y gif Requerido)Tamaño el que marque el servidor:</label> <br>
		<input type="file" size="44" name="imagen">
	<p>
    Tipo de suscripción (Requerido)<br>
    1 mes <input type="radio" name="nivel" value="1">
    dos meses <input type="radio" name="nivel" value="2">
    <p>
		<input type="submit" name="insertar" value="Insertar">
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
	



