<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../estilos/registro.css"/>
		<img class="nombre" src="../nombre.png" alt="imagen-nombre" width="550px" height="100px">
		<img class="logo" src="../logo_1.png" alt="imagen-logo" width="200px" height="150px">
		


	</head>
	
	<body>
		<form action="#" method="post">
			<center><p>Nombre: <input class="redondo" type="text" name="nom"><br></p>
			<p>Apellidos: <input class="redondo" type="text" name="ape"><br></p>
			<p>DNI o NIF: <input class="redondo" type="text" name="dni"><br></p>
			<p>Fecha de Nacimiento: <input class="redondo" type="date" name="fecha"><br></p>
			<p>Contraseña: <input class="redondo"type="password" name="con"><br></p>
			<p>Email: <input class="redondo" type="text" name="email"><br></p>
			<p><input class="bo" type="submit" name="registrar" value="Registrar"></p></center>
		</form>
		<h3><a href='../index.php'>Volver a inicio</a></h3>



<h2>Regístrate gratis en MontesAuto y disfruta de todas las ventajas de ser Cliente</h2>
<img class="des" src="../img/dest.png">
<img class="co" src="../img/coche.png">



<?php


if(isset($_REQUEST['registrar'])){

              $email = $_POST["email"];
              $nombre = $_POST["nom"];
			  $apellidos = $_POST["ape"];
			  $dni = $_POST["dni"];
              $hash =  password_hash($_POST["con"], PASSWORD_DEFAULT);
              $validez=true;
			  $fecha=$_POST['fecha'];
              require('erroresvalidaciones.php');
            
              if($validez ==true){
                $conexion = mysqli_connect('localhost', 'root', '', 'taller')or die('No se pudo conectar: ' . mysqli_error());
                mysqli_set_charset($conexion, 'utf8');
                $insercion = "insert into usuarios (nombre, apellidos, dni, fecha_nacimiento,hashpassword,email) values
				('$nombre','$apellidos','$dni','$fecha','$hash', '$email');";
                $resultado= mysqli_query($conexion, $insercion) or die('Inserción fallida: '. mysqli_error($conexion));             
                $consulta = "select nombre from usuarios where dni='$dni'";
                $res = mysqli_query($conexion, $consulta) or die ('Consulta fallida');
                            $cantidad = mysqli_num_rows($res);
                            while ($fila = mysqli_fetch_row($res)){ 
                              foreach ($fila as $valor){
                                $con= $valor;
                              }
                            }
                mysqli_close($conexion);
                
                $_SESSION['email']=$email;
                $_SESSION['contrasena']=$hash;
                $_SESSION['id']=$con;
                $_SESSION['nombre']=$nombre;
                $_SESSION['dni'] = $dni;
				 $_SESSION['fecha'] = $fecha;
               
                echo "<center><b><p class='bien'>Su registro es aceptado </p></b></center>";
              
            }
}

?>
</body>

</html>