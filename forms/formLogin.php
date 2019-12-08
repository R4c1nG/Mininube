<form class="borde" action="" name="inicio" method="POST">
	<p>
		Usuario (letras y números entre 7 y 15 caracteres sin ñ ni tildes. Requerido): 		<br>
		<input NAME="usuario" type="text">
	</p>
	<p>
		Password (Entre 8 y 15 caracteres. Carácteres permitidos letras, números y _*\/$&#. No se permiten ñ ni tildes. Requerido): 		<br>
		<input NAME="pass" type="password">
	</p>
    <p>
		<input type="submit" name="acceder" value="INICIAR SESIÓN">
	</p>
    <p>
		<input type="submit" name="registro" value="REGISTRARSE">
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
	
