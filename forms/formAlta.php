<?php echo '<link rel="stylesheet" type="text/css" href="css/main.css">'; ?>

<form class="borde" action="" name="inserta" method="POST" enctype="multipart/form-data">
	<div>
		<strong>Nombre y apellidos<strong> <br>
		<p class="sub"> (sólo letras 100 caracteres. Requerido): </p>		
		<input name="nombre" type="text" class="nombre">
	</div>
	<div>
	<strong>Usuario<strong> <br>
	<p class="sub">(letras y números entre 7 y 15 caracteres sin ñ ni tildes. Requerido): 		</p>
		<input NAME="usuario" type="text">
	</div>

	<div>
	<strong>Contraseña<strong> <br> 
	<p class="sub">(Entre 8 y 15 caracteres. Carácteres permitidos letras, números y _*\/$&#. No se permiten ñ ni tildes. Requerido): </p>		
		<input NAME="pass" type="password">
	</div>
	<div>
	<strong>Fecha Nacimiento<strong> <br>
	<p class="sub">(formato dd-mm-aaaa. No requerido):<p> 		
		<input NAME="fecha" type="text">
	</div>
	<div>
		<label><strong>Foto De Perfil<strong> <br>
		<p class="sub">(jpg y gif Requerido)Tamaño el que marque el servidor:</p>

		</label> 
		<input type="file" size="44" name="imagen">
</div>
   <div>
	<strong>Tipo de suscripción<strong> <br><br>
    <input type="radio" name="nivel" value="1">1 mes 
	<input type="radio" name="nivel" value="2">2 meses 
	</div>
	<br>
    <div>
		<input type="submit" name="insertar" value="REGISTRARSE">
	</div>
	<br>
	<div>
		<input type="submit" name="login" value="LOGIN">
	</div>
	<div id="errores">
	<?php
	//Añado este código para que el formulario enseñe errores al cargar la página en caso de que los haya
	if(isset($errores)){
		foreach($errores as $error){
			echo $error."<br>";
		}
	}
	?>
	</div>
	</form>
	



