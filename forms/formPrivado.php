<?php echo '<link rel="stylesheet" type="text/css" href="css/main.css">'; ?>

<form class="borde" action="" method="POST" enctype="multipart/form-data">
<br><br>
	<div> <strong>Sube tus ficheros :</strong> <br> <p>
    Puedes eligir una carpeta o subirlo directamente aqui
       <input type="text" NAME="carpeta"><br><br><input type="file" name="privadoF"><br><br>
       <input type="submit" NAME="subir" value="SUBIR ARCHIVO"> 
        <input type="reset" name="cancelar" value="CANCELAR">
	</p></div>
  <br><br>

  <div> <strong>Borrar  fichero:</strong> <br>
   <p>Introduce el nombre del fichero a borrar si esta en una carpeta la estructura sería carpeta/archivo <br>  <input type="text" name="fichero"><br><br>
    <input type="submit" NAME="borrarF" value="BORRAR ARCHIVO"><br>
    <input type="reset" name="cancelar" value="CANCELAR">
    </p>
</div>
    <br><br>
  <div> <strong>Nombre de la Carpeta :</strong>  <p><input type="text" name="nomCarp"><br><br>
        <input type="submit" name="crear" value="CREAR CARPETA"> 
        <input type="submit" name="borrar" value="BORRAR CARPETA"> <br>
        <input type="reset" name="cancelar" value="CANCELAR">
  </p>
</div>
  <br><br>
  <p>
  <input type="submit" name="mostrar" value="Mostrar Ficheros">	</p>
    <p> <br><br><br>
		<input type="submit" name="volver" value="VOLVER">
	</p>
    <p>
		<input type="submit" name="cerrar" value="CERRAR SESIÓN">
	</p>

</form>
	