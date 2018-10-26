<?php
	include "procesos/seguridad.php";
?>
<style type="text/css">
	.button.blue{
		background:#14B76E;
		box-shadow:0px 3px 0px #266792;
} 
		.enlaceboton {    font-family: verdana, arial, sans-serif; 
   font-size: 10pt; 
   font-weight: bold; 
   padding: 4px; 
   background-color: #FF33BE; 
   color: #333CFF; 
   text-decoration: none; 

		}
		.enlaceboton:link, 
.enlaceboton:visited { 
   border-top: 1px solid #cccccc; 
   border-bottom: 2px solid #666666; 
   border-left: 1px solid #cccccc; 
   border-right: 2px solid #666666; 
} 
.enlaceboton:hover { 
    border-bottom: 1px solid #cccccc; 
   border-top: 2px solid #666666; 
   border-right: 1px solid #cccccc; 
   border-left: 2px solid #666666; 
}
</style>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Leer o seleccionar datos de la base de datos</title>
</head>
<body>
	<div align="center"> <h3 style="color:red;"> <font size="10"> <p>Bienvenido <?php echo $_SESSION['Nombre']; ?></p></h3> </div></font>
	<?php
		require_once "php/connect.php";
		require_once "procesos/actualizar.php";
	?>
	<a href="cierre.php?tk=<?php echo $_SESSION['token']; ?>"class="enlaceboton">Cerrar sesion</a>
</body>
</html>