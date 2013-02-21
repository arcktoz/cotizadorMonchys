<html>

	<head>
		<title>Monchys</title>		
		<link rel="stylesheet" href="css/resetstylesheet.css" type="text/css" media="all"/>		
		<link rel="stylesheet" href="css/alerts.css" type="text/css" media="all"/>		
		
	</head>

	<body>
	
		<?php 

			include ("conexion.php");	
			//print_r($_POST);
			
			$password = $_POST["nuevopass"];
			$correo = $_POST["correo"];
			
			$nuevopassword = md5(sha1($password));
			$sql=mysql_query("UPDATE usuarios SET password = '$nuevopassword' WHERE correo='$correo' ");
			
			echo "					
				<script language='javascript'>
					alert('Has actualizado tu contraseña, puedes ingresar ahora.');
						window.location.href='index.php';
				</script>
			";
		?>
		
	</body>
	
</html>