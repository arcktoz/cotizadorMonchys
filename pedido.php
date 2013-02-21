<html>

	<head>
		<title>Monchys</title>		
		<link rel="stylesheet" href="css/resetstylesheet.css" type="text/css" media="all"/>		
		<link rel="stylesheet" href="css/alerts.css" type="text/css" media="all"/>		
		
	</head>

	<body>
	
		<?php
		//Declara la Zona horaria especificada
		date_default_timezone_set('America/Mexico_City');
		?>

		<?php 
		/*
		CAMPOS DE LA TABLA PEDIDOS
		id				//AUTOMATICO AL INSERTAR
		fecha_pedido	//$fecha_pedido = strftime( "%Y-%m-%d %H-%M-%S", time() );
		id_estatus		//$id_estatus = "000001";
		id_cliente		//OK cliente
		id_pastel		//OK pastel
		precio_cotizado	//precio
		fotografia
		id_figura
		dom_entrega		//dom_entrega
		id_domentrega
		fecha_entrega	//fecha_entrega
		observaciones	//observaciones
		id_tienda		//OK	tienda
		*/
			include ("conexion.php");
			include ("imagenes.php");
			require("class.phpmailer.php");
			
			//print_r($_POST);

			//Variables Recibidas
			$correo = $_POST['correo'];
			$cliente = $_POST['cliente'];
			$pastel = $_POST['pastel'];
			$tienda = $_POST['tienda'];
			$precio_cotizado = $_POST['precio'];
			$domicilio = ( isset( $_POST['dom_entrega']))? $_POST['dom_entrega']:'';
			$fecha_entrega = $_POST['fecha_entrega'];
			$observaciones = $_POST['observaciones'];
			$foto= ( isset ($_POST['fotografia2'])  )?upload_image('img/imgclientes','fotografia'):'';
			$figura = ( isset( $_POST['idFigura']))? $_POST['idFigura']:'';
			//Variables generadas automaticamente
			$id_estatus = "000001";		
			//Obtener fecha y hora de servidor
			$fecha = datetime();
			function datetime(){
				$fecha = date("Y") ."-". date("m") ."-". date("d");
				$fecha.= " ";
				$fecha.= date("H") .":". date("i") .":". date("s");
					return($fecha);
			}
			
			
			if($_POST['tipo_domicilio']=='maps'){
			
			 $arrMaps = explode(",", $domicilio);
			 $domicilio='';
			 
			 	$inserta="
					INSERT INTO pedidos
					(fecha_pedido, id_estatus, id_cliente, id_pastel, precio_cotizado, fotografia, id_figura, dom_entrega, fecha_entrega, observaciones, id_tienda, latitud,longitud)
					
					VALUES
					('$fecha', '$id_estatus', '$cliente', '$pastel', '$precio_cotizado', '$foto', '$figura', '$domicilio', '$fecha_entrega', '$observaciones', '$tienda', {$arrMaps[0]},{$arrMaps[1]})
					";
			
			}else{
			
				$inserta="
					INSERT INTO pedidos
					(fecha_pedido, id_estatus, id_cliente, id_pastel, precio_cotizado, fotografia, id_figura, dom_entrega, fecha_entrega, observaciones, id_tienda)
					
					VALUES
					('$fecha', '$id_estatus', '$cliente', '$pastel', '$precio_cotizado', '$foto', '$figura', '$domicilio', '$fecha_entrega', '$observaciones', '$tienda')
					";		
			
			}
			
					
					//mysql_query($inserta) or die(mysql_error());
					
						if(mysql_query($inserta)){
							$id=mysql_insert_id();
							$pedido = str_pad($id, 6 , '0', STR_PAD_LEFT);//RELLENA CON "0" A LA IZQUIERDA
							//echo  $idPedido;
							
							//PARA ENVIAR EL NUMERO DEL PEDIDO POR CORREO
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
							$mail->WordWrap = 500;
							$mail->IsHTML(true); // envio HTML activado
							$mail->Subject = "Envio pedido";
									
							$body  = "Este es el n&uacute;mero de tu pedido <strong>MON$pedido</strong><br><br>
							<p>Presenta este c&oacute;digo para realizar el pago de tu pedido.</p><br>
							<p>Tu pedido esta ahora en estado, <strong>PENDIENTE</strong>, es importante que realices el pago del mismo
							de esta manera su estatus ser&aacute; cambiado a <strong>PAGADO</strong>, solo en este momento 
							quedara registrado para producirlo.
							</p>";					
							
							$mail->Body = $body;
							$mail->Send();
							//
							
							echo '<script language="javascript">
							alert("Te hemos enviado un correo con los datos de tu pedido");
							window.location.href="cotizador.php";
							</script>';
						}
						
						else{
							echo '<script language="javascript">
							alert("Ha ocurrido un error al intentar agregar tu pedido, por favor inténtalo nuevamente.");
							window.location.href="cotizador.php";
							</script>';
						}				
		?>
		
	</body>
	
</html>