<?php
  session_start();
  
  if(isset($_SESSION['id']) || isset($_SESSION['usuario']) ){
  
  }
?>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../estilos/login.css"/>
<img class="nombre" src="../nombre.png" alt="imagen-nombre" >
<img class="logo" src="../logo_1.png" alt="imagen-logo" >
</head>
<body>
 

<img class="ll" src="../img/ll.png">
<img class="i" src="../img/2.png">

<a href="../index.php">Volver a Inicio</a>

<form action="#" method="post">
<p>DNI o NIF: <input class="redondo" type="text" name="dni"><br></p>
<p>Contraseña: <input class="redondo"type="password" name="con"><br></p>
<p><input class="bo" type="submit" name="acceder" value="Acceder"></p>
</form>
<img class="co" src="../img/coche.png">
<a class='registro' href="../php/registro.php">Quiero registrarme</a>
<img class="des" src="../img/dest.png">

<h2>Regístrate gratis en MontesAuto y disfruta de todas las ventajas de ser Cliente</h2>





<?php
                if(isset($_SESSION["usuario"])){
                    $nombre=$_SESSION["usuario"];
                    echo "<a id='nombre'>$nombre</a>";
                }
            ?>

<?php

		  
if (isset($_REQUEST['acceder'])){
	//if(isset($_POST["usu"]) && isset($_POST["con"])){
$dni=$_REQUEST['dni'];
$hash=$_REQUEST['con'];
if(empty($_POST["dni"]) || empty($_POST["con"])){
                    echo "<p style='color: red'>El correo y la contraseña no pueden estar vacíos</p>";
                  }  else{
                      $email = filter_var($dni, FILTER_SANITIZE_EMAIL);
				  }
$conexion = mysqli_connect('localhost', 'root', '', 'taller')or die('No se pudo conectar: ' . mysqli_error());
mysqli_set_charset($conexion, "utf8");	


$consulta = "select hashpassword from usuarios where dni='$dni'";
$_SESSION['email']=$dni;
$res = mysqli_query($conexion, $consulta) or die ('Consulta fallida');
$cantidad = mysqli_num_rows($res);


                     
                        if ($cantidad==0){
                          echo "<p style='color: red'>La contraseña o el alias no coincide con nuestra bbdd</p>";
						  echo "<h1><a href='./index.php'>pulsa aqui para volver</a></h1>";
						echo "<br><br><p class='gif2'><img src='./Imagenes/mano.gif'></p>";
						  echo "<br><br><p class='gif1'><img src='./Imagenes/triste.gif'></p>";
						   
						  
                        }
                        else{

while ($fila = mysqli_fetch_row($res)){ 
                            foreach ($fila as $valor){
                              $con = $valor;
                            }
                          }
						  if (password_verify ($hash, $con)){
                            $_SESSION['con']=$con;
                            
                            $consulta = "select * from usuarios where dni='$dni'";
                            $res = mysqli_query($conexion, $consulta) or die ('Consulta fallida');
                            $cantidad = mysqli_num_rows($res);
                            $fila = mysqli_fetch_row($res);
                            $_SESSION['id']= $fila[0];
							$_SESSION['dni'] = $fila[2];
                            $_SESSION['usuario'] = $fila[1]; 
							$_SESSION['nivel'] = $fila[7]; 
					
                            mysqli_close($conexion);
                            
                            header("Location:../index.php");
                          }
                          else{
                            echo "<p style='color: red'>La contraseña o el usuario no coincide con nuestra bbdd</p>";
							echo "<h1><a href='./index.php'>pulsa aqui para volver</a></h1>";
						
                          }
mysqli_close($conexion);


}
					  }
				  


?>
</body>

</html>