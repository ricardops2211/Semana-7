<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/style.css">
	<title>Inicio de sesión</title>
</head>
<body>
	<div class="container-form">
        <div class="header">
            <div class="logo-title">
                
                <h2>Ricardo S.A.C</h2>
             </div>
            <div class="menu">
                <a href="index.php"><li class="module-login active">Login</li></a>
               
            </div>
        </div>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
		 <div class="welcome-form"><h1>Bienvenido</h1><h2>Ricardo S.A.C</h2></div>
            <div class="user line-input">
		<label class="lnr lnr-user">Email</label>
		<input type="email" name="email" required="">
		  </div>
		  <div class="password line-input">
		<label class="lnr lnr-user">Clave</label>
		<input type="password" name="clave" required="">
		      </div>
		      <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
		<button input type="submit" value="Ingresar">Entrar<label class="lnr lnr-chevron-right"></label></button>
	</form>
	<?php
		if(isset($_POST['email'])&&isset($_POST['clave'])){
			require_once "php/connect.php";
			require_once "procesos/login.php";
		}
	?>
</body>
</html>