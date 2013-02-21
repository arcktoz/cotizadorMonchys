<?php 

	include ('conexion.php');
	require("class.phpmailer.php");
	$mail = new PHPMailer();
	$email = $_POST['email'];
	
	//Se genera el ash
	$result = "";
	$charPool = '0123456789abcdefghijklmnopqrstuvwxyz';
	for($p = 0; $p<15; $p++)
		$result .= $charPool[mt_rand(0,strlen($charPool)-1)];
	$hash= sha1(md5(sha1($result)));
	
	
	
	// Se genera email
	$mail->Host = "localhost";
	$mail->From = "contacto@monchys.com";
	$mail->FromName = "Nombre del Remitente";
	$mail->Subject = "Subject del correo";
	$mail->AddAddress($email,"Usuario - Recuperacion");
	
	
	$body  = "Recuperacion de contraseña <br>";
	$body .= "<p>Utiliza el siguiente enlace para recuperar tu contraseña: </p><br>";
	$body .= "<font color='red'>http://localhost/cotizador-monchys/recovery.php?cid=$hash</font>"; // URL donde CID es la variable GET que recibimos
	$mail->Body = $body;
	
	$mail->Send();
	
	// Guardar el email - hash
	
	  $inserta="
					INSERT INTO recovery
					(correo, hash, activo)
					VALUES
					('$email', '$hash' , 1)
				";

	 mysql_query($inserta);

	header ("Location: index.php");	
?>