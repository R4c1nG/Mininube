<?php echo '<link rel="stylesheet" type="text/css" href="css/main.css">'; ?>

<form class="borde" action="" name="inicio" method="POST">
	<div>
	<strong>Usuario</strong> <p class="sub">	(letras y números entre 7 y 15 caracteres sin ñ ni tildes. Requerido): 		<br></p>
		<input NAME="usuario" type="text">
	</div>
	<div>
	<strong>Password</strong><p class="sub">
		 (Entre 8 y 15 caracteres. Carácteres permitidos letras, números y _*\/$&#. No se permiten ñ ni tildes. Requerido): 		<br>	</p>
		<input NAME="pass" type="password">
</div>
<div>
    <p class="sub">
		<input type="submit" name="acceder" value="INICIAR SESIÓN">	

</p>
</div>
<div>
		<input type="submit" name="registro" value="REGISTRARSE">
	</p>
</div>
	</form>
	<?php
	//Añado este código para que el formulario enseñe errores al cargar la página en caso de que los haya
	if(isset($errores)){
		foreach($errores as $error){
			echo $error."<br>";
		}
	}
	
	?>
	
