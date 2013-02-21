<html>

	<head>
		<title>Especiales Monchys</title>
		
		<link rel="stylesheet" href="css/resetstylesheet.css" type="text/css" media="all"/>		
		<link rel="stylesheet" href="css/alerts.css" type="text/css" media="all"/>		
		
	</head>

	<body>
	
		<?php 
			include ('conexion.php');
			
					$correo=$_POST['correo'];
					$password=$_POST['password'];
					
					$password = md5(sha1($password)); //Encriptamos la contraseña recibida para comparar con la base de datos
					
					//Realizamos la consulta
					$consulta= "SELECT * FROM usuarios WHERE correo='$correo' AND password='$password'";
					$resultado= mysql_query($consulta);
					
					//USO DEL RESULTADO DE LA CONSULTA
					$total= mysql_num_rows($resultado);
					$datos= mysql_fetch_array($resultado);
					
					
					if($total==1){
							session_start();
							$_SESSION['id_cliente'] = $datos['id_cliente'];
							$_SESSION['nombre'] = $datos['nombre'];					
							$_SESSION['password'] = $datos['password'];					
							
							header('Location: cotizador.php');
					}
					else{
						echo '<script language="javascript">
							alert("El Usuario y/o la Contraseña no son correctos. Intenta de Nuevo");
							window.location.href="index.php";
							</script>
						';			 
					}
		?>
	</body>
</html>