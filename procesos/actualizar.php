<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/reset.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
	<link rel="stylesheet" href="./css/main.css">
	<title></title>
</head>
<body>

</body>
</html>
<?php
	//Actualizar datos
	if(isset($_POST['nombre']) && isset($_POST['apellido'])){
		$id=$_POST['id'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$emailA=$_POST['emailA'];
		$emailN=$_POST['emailN'];
		$claveN1=md5($_POST['claveN1']);
		$claveN2=md5($_POST['claveN2']);

		if($emailA!=$emailN){
			$consulta1=$pdo->prepare("SELECT * FROM usuario WHERE Email=:email");
			$consulta1->bindParam(":email",$emailN);
			$consulta1->execute();
			if($consulta1->rowCount()>=1){
				echo "Error: el email ya esta registrado";
				exit();
			}else{
				$emailF=$emailN;
			}
		}else{
			$emailF=$emailA;
		}

		if($claveN1!="" && $claveN2!=""){
			if($claveN1!=$claveN2){
				echo "Error: las claves no coinciden";
				exit();
			}else{
				$consulta2=$pdo->prepare("UPDATE usuario SET Nombre=:nombre,Apellido=:apellido,Email=:email,Clave=:clave WHERE id=:id");
				$consulta2->bindParam(":nombre",$nombre);
				$consulta2->bindParam(":apellido",$apellido);
				$consulta2->bindParam(":email",$emailF);
				$consulta2->bindParam(":clave",$claveN2);
				$consulta2->bindParam(":id",$id);
			}
		}else{
			$consulta2=$pdo->prepare("UPDATE usuario SET Nombre=:nombre,Apellido=:apellido,Email=:email WHERE id=:id");
			$consulta2->bindParam(":nombre",$nombre);
			$consulta2->bindParam(":apellido",$apellido);
			$consulta2->bindParam(":email",$emailF);
			$consulta2->bindParam(":id",$id);
		}

		if($consulta2->execute()){
			echo "Datos actualizados";
		}else{
			echo "Error: no se pudo actualizar los datos";
		}


	}

	//Recuperar datos
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$consulta=$pdo->prepare("SELECT * FROM usuario WHERE id=:id");
		$consulta->bindParam(":id",$id);
		$consulta->execute();
		if($consulta->rowCount()>=1){
			$fila=$consulta->fetch();
			echo '<form action="" method="POST">
				<div class="container">
		          <div class="form__top">
				<input type="hidden" name="id" value="'.$fila['id'].'">
				<label>Nombre</label><input type="text" class="input" value="'.$fila['Nombre'].'" name="nombre" required=""><br><br>
				<label>Apellido</label><input type="text" class="input" value="'.$fila['Apellido'].'" name="apellido" required=""><br><br>
				<input type="hidden" name="emailA" value="'.$fila['Email'].'">
				<label>Email</label><input type="email" class="input" value="'.$fila['Email'].'" name="emailN" required=""><br><br>
				<p>Para actualizar la clave por favor ingrese la clave antigua y escriba la contraseña, a la vez repitala</p>
				<label>Clave antigua</label><input type="password" class="input" name="clavea"><br><br>
				<label>Clave nueva</label><input type="password"class="input" name="claveN1"><br><br>
				<label>Repita Clave nueva</label><input type="password" class="input" name="claveN2"><br><br>
				<input type="submit" class="btn__submit" value="Actualizar">
				<a href="listado.php" class="btn__submit"> <font size="4"> Volver </font> </a></li>
			</form>';
		}else{
			echo "Ocurrio un error";
		}
	}else{
		echo "Error no se pudo procesar la peticion";
	}