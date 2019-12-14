<?php
	//ES UNA CONTINUACION DEL CODIGO SIN MAS DE DONDE HACEMOS LA LLAMADA CON REQUIRE
	if(empty($_POST["email"]) || empty($_POST["nom"]) || empty($_POST["ape"]) || empty($_POST["dni"]) || empty($_POST["con"]) || empty($_POST["fecha"]) ){
					echo "<center><b><p class ='error' style='color: red'>TODOS LOS CAMPOS DEBEN ESTAR RELLENOS</p></b></center>";
					$validez = false;
	}
		  if(strlen ($nombre) < 3){	
				echo "<p style='color: red'>Nombre incorrecto </p>";


		 }		
		
				if(strlen ($_POST["con"]) < 8){	
				echo "<p style='color: red'>La contraseña tiene que tener 8 caracteres. </p>";


		 }		
		
		
			if(strlen($dni)<9) {
		echo "DNI demasiado corto.<br>";
	}
	
	$dni = strtoupper($dni);
 
	$letra = substr($dni, -1, 1);
	$numero = substr($dni, 0, 8);
		
	// Si es un NIE hay que cambiar la primera letra por 0, 1 ó 2 dependiendo de si es X, Y o Z.
	$numero = str_replace(array('X', 'Y', 'Z'), array(0, 1, 2), $numero);	
 
	$modulo = $numero % 23;
	$letras_validas = "TRWAGMYFPDXBNJZSQVHLCKE";
	$letra_correcta = substr($letras_validas, $modulo, 1);
	
	if($letra_correcta!=$letra) {
		echo "Letra incorrecta, la letra deber&iacute;a ser la $letra_correcta.<br>";
	}
	else {
		
	}
						
?>
