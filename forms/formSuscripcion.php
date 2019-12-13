<?php echo '<link rel="stylesheet" type="text/css" href="css/main.css">'; ?>

<!-- formulario para ampliar los meses de suscripcion, por ejemplo con radio buttons o select -->

<form class="borde" action="" name="inserta" method="POST" enctype="multipart/form-data">
   <div>
	    <strong>Ampliar suscripción<strong> <br><br>
        <input type="radio" name="nivel" value="1" checked>1 mes 
	    <input type="radio" name="nivel" value="2">2 meses 
    </div>
	<br>
    <div>
		<input type="submit" name="ampliar" value="AMPLIAR SUSCRIPCION">
	</div>
	<br>
	<div>
		<input type="submit" name="volver" value="VOLVER">
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