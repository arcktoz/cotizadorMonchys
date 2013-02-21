<html>

	<head>
		<title>Nuevo Usuario</title>		
		<link rel="stylesheet" href="css/resetstylesheet.css" type="text/css" media="all"/>		
		<link rel="stylesheet" href="css/alerts.css" type="text/css" media="all"/>		
		
	</head>

	<body>
	
		<?php 
			include ('conexion.php');
					
					$correo=$_POST['correo'];
					$password=$_POST['password'];
					$nombre=$_POST['nombre'];
					$paterno=$_POST['paterno'];
					$materno=$_POST['materno'];
					$nacimiento=$_POST['nacimiento'];
					$sexo=$_POST['sexo'];
					$telefono=$_POST['telefono'];
			 
					// comprobamos que el usuario ingresado no haya sido registrado antes 
					$sql = mysql_query("SELECT correo FROM usuarios WHERE correo='".$correo."'"); 
					if(mysql_num_rows($sql) > 0) { 
						echo "
						<script language='javascript'>
							alert('El usuario ya ha sido registrado anteriormente ingresa tus datos para iniciar la sesion');
							window.location.href='index.php';
						</script>
						"; 
					}else { 
						$password = md5(sha1($password)); // encriptamos la contraseña ingresada  
						// ingresamos los datos a la BD 
						$inserta="
							INSERT INTO usuarios
							(correo, password, nombre, paterno, materno, nacimiento, sexo, telefono)
							VALUES
							('$correo', '$password', '$nombre', '$paterno', '$materno', '$nacimiento', '$sexo', '$telefono')
						";
					}   			
					//mysql_query($inserta) or die(mysql_error());
					
						if(mysql_query($inserta)){

							echo '<script language="javascript">
							alert("Usuario agregado correctamente, inicia sesión para continuar.");
							window.location.href="index.php";
							</script>
							';
						}
						
						else{
							echo '<script language="javascript">
							alert("Ha ocurrido un error, regresa para intentarlo nuevamente.");
							window.location.href="index.php";
							</script>
							';
						}
		?>
		
	</body>
	
</html>