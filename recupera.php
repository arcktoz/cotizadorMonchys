<html>

	<head>
		<title>Recupera Acceso</title>		
		<link rel="stylesheet" href="css/resetstylesheet.css" type="text/css" media="all"/>		
		<link rel="stylesheet" href="css/alerts.css" type="text/css" media="all"/>		
		
	</head>

	<body>
	
		<?php	
			include ("conexion.php");
			require("class.phpmailer.php");
			
			//print_r($_POST);
			$correo = $_POST["email"];
			
			$consulta = mysql_query("SELECT correo FROM usuarios WHERE correo='$correo'"); 
				if(mysql_num_rows($consulta) > 0)
				{   
					//Generamos el Hash
					$result = "";
					$charPool = "0123456789abcdefghijklmnopqrstuvwxyz";
					for($p = 0; $p<15; $p++)
						$result .= $charPool[mt_rand(0,strlen($charPool)-1)];
					$hash= sha1(md5(sha1($result)));
				
					$mail = new PHPMailer();
					$mail->IsSMTP(); // envio via SMTP
					$mail->Host = "mail.monchys.com"; // servidor SMTP
					$mail->SMTPAuth = true; // autenticacion SMTP activada
					$mail->Username = "servicios@monchys.com"; // usuario SMTP (va con arroba y nombre de dominio)
					//$mail->Password = ""; // password SMTP
					$mail->From = "servicios@monchys.com"; // correo remitente
					$mail->FromName = "Pasteleria Monchys"; // nombre del remitente para mostrar
					$mail->AddAddress("$correo","Usuario"); // correo y nombre del destinatario
					//$mail->AddReplyTo("remitente@su-dominio.com","Remitente"); // correo y nombre al que responderan su correo
					$mail->WordWrap = 50;
					$mail->IsHTML(true); // envio HTML activado
					$mail->Subject = "Envio de recuperación de contraseña";
					
					$body  = "<p>Recuperación de contraseña</p><br>";
					$body .= "<p>Utiliza el siguiente enlace para recuperar tu contraseña: </p><br>";					
					$body .= "<font>http://localhost/cotizador-monchys/recovery.php?cid=$hash</font><br>"; // URL donde CID es la variable GET que recibimos					
					$body .= "<p>Si el enlace no funciona, copia y pega el enlace en la barra de direcciones del navegador para continuar.</p><br>";
					
					$mail->Body = $body;
					$mail->Send();			
					//$mail->ErrorInfo;
						$inserta = "INSERT INTO recovery (correo, hash, estado)
						VALUES('$correo', '$hash', 'ACTIVO')
						";
						
						mysql_query($inserta);
						
						echo "					
							<script language='javascript'>
								alert('Te hemos enviamos un correo, con instrucciones para recuperar tu contraseña.');
								window.location.href='index.php';
							</script>
						";
				}
							
				else 
				{ 
					echo "
						<script language='javascript'>						
							alert('Lo sentimos el usuario ingresado no fue encontrado, verifica por favor para continuar.');
							window.location.href='index.php'
						</script>
					"; 
				}
		?>
		
	</body>
	
</html>