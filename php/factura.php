
<html>
	<head>
	
		
		
		<link rel="stylesheet" type="text/css" media="screen" href="../estilos/factura.css"/> 
		<meta charset="UTF-8">
		<img class="nombre" src="../nombre.png" alt="imagen-nombre" width="550px" height="100px">
		<img class="logo" src="../logo_1.png" alt="imagen-logo" width="200px" height="150px" >
		<?php
	
	session_start();
	$nombre=$_SESSION["usuario"];
					$dniusu=$_SESSION['dni'];	
if(isset($_GET["salir"])){
            session_destroy();
            header("Location: shop.php");
		}
	
	
		 if(isset($_SESSION["usuario"])){
			  echo "<p class ='usu2'><a><b> Bienvenid@: $nombre</b></a><br><a href='?salir=salir'>Cerrar session</a></p>";
			  ?>
		<form>
		 <input class='imp' type="submit" value="IMPRIMIR" onclick="PrintDiv();" /><img class='imp1' src='../img/impresora.png' width=50em></img>
		 
		 </form>
		 
	</head>

	<body>
	
	<div id="divToPrint">
<center><li><a href="../index.php">inicio</a>
	<h1 >FACTURAS:</h1><center>

	
	
	

	
	<?php
			      $conexion = mysqli_connect('localhost', 'root', '', 'taller')or die('No se pudo conectar: ' . mysqli_error());
					mysqli_set_charset($conexion, "utf8");
              
					 $con2="select distinct codigo_factura from pedidos";     
					 $resultado6= mysqli_query($conexion, $con2) or die('consulta fallida: '. mysqli_error($conexion));
		
			while($fi6 = mysqli_fetch_row($resultado6)){
				$loc=$fi6[0];
				
			
			
		
			
			
		
				 if(isset($loc)){ 
			
		echo '<h1>LOCALIZADOR:'.$loc.'</h1>';
	$con3="select a.nombre,a.foto,a.precio 
		from articulos a,pedidos p 
		where p.codigo_articulo=a.cod_articulos 
		and p.codigo_factura='$loc'";     
					 $resultado8= mysqli_query($conexion, $con3) or die('consulta fallida: '. mysqli_error($conexion));
					 
					 
					 
					 $consulta1 = "select SUM(a.precio) from articulos a ,pedidos p 
					 where p.codigo_articulo=a.cod_articulos  
					 and p.codigo_factura='$loc'"; 
                $resultado1= mysqli_query($conexion, $consulta1) or die('Inserción fallida: '. mysqli_error($conexion));
					$fila1 = mysqli_fetch_array($resultado1) ;
					$total=$fila1[0];
					$tot=intval($total*100);
					$tot=$tot/100;
					number_format($tot, 2, ",", ".");
					 echo '<table>';
		echo '<th>NOMBRE</th><th>FOTO</th><th>PRECIO</th><tr>';
					while($fi7 = mysqli_fetch_row($resultado8)){
							
						$nombre1=$fi7[0];
						$foto=$fi7[1];
						$precio=$fi7[2];
						
						
						
			echo '<td>'.$nombre1.'</td>';
			echo '<td><img src="'.$foto.'" width=80em></td>';
			echo '<td>'.$precio.'€</td><tr>';
			
		
		
		
	
		
					}
					echo "<td></td><td>TOTAL:</td><td>$tot €</td>";
	echo '</table>';					
					}
		
                 
			}
		
		 }
		
	?>
	</div>
	<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
	
 
</div>

	</body>
	
	
	</html>