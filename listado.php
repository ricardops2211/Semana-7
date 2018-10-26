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
	<link rel="stylesheet" href="css/tabla.css">
</head>
<body>
	<div align="center"> <h1 style="color:yellow;">Bienvenido <?php echo $_SESSION['Nombre']; ?></h1> </div>
	<?php
		require_once "php/connect.php";
		if(isset($_GET['id'])){
			require_once "procesos/eliminar.php";
		}
	?>
	<div align="center"><a href="registro.php" class="enlaceboton" > <font size="4"> Registre a un nuevo usuario </font> </a></li> </div>
	<table>
		<div id="main-container">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>Actualizar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<?php
				require_once "procesos/seleccionar.php";
			?>		
		</tbody>
		</div>
	</table>
	<div align="center" ><h2> <a href="cierre.php?tk=<?php echo $_SESSION['token']; ?>  " class="enlaceboton">Cerrar sesion</a> </h2> </div>
	
</body>
</html>