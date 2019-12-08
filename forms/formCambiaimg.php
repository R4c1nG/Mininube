<form class="borde" action="" method="POST" enctype="multipart/form-data">
	<p>	
        <input type="file" NAME="imagen">
	</p>
    <p>
        <input type="reset" name="cancelar" value="CANCELAR">
		<input type="submit" name="editar" value="CAMBIAR IMAGEN">
	</p> 
    <p>
		<input type="submit" name="volver" value="VOLVER">
	</p>
    <p>
		<input type="submit" name="cerrar" value="CERRAR SESIÓN">
	</p>
	</form>
	
    <?php 
    	if(isset($errores)){
            foreach($errores as $error){
                echo $error."<br>";
            }
        }
    ?>