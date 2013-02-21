<html lang="es">	

	<?php
		session_start(); //Inicializamos sesion		
		if(isset($_SESSION['nombre']))
		header ("Location: cotizador.php");
	?>		
	<meta equiv="Content-Type" content="text/html; charset=UTF-8" />
	<head>
		<title>Especiales Monchys</title>
			
		<link rel="stylesheet" href="css/resetstylesheet.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/logInStyles.css" type="text/css" media="all" />
		<link rel="stylesheet" href="fonts/stylesheet.css" type="text/css" media="all"/>		
		
	</head>

	<body>
	
		<div >
			<img id="logoMonchys" src="img/logos/monchys4c.png"/>
		</div>
		
		<form id="login" action="valida.php" method="post">
			
			<h2>Bienvenido</h2>
			
			<fieldset id="inputs">
				<input id="correo" type="email" name="correo" placeholder="tucorreo@ejemplo.com" autofocus="" required="">   
				<input id="password" type="password" name="password" placeholder="Password" required="">
			</fieldset>
			
			<fieldset id="actions">
				<input type="submit" id="submit" value="Ingresar">
				<a href="javascript:showLightbox();">¿Olvide mi contraseña?</a>
				<a href="nvoregistro.php">Me quiero registrar</a>
			</fieldset>
			
			<a href="http://www.monchys.com" id="back">By Monchys</a>
			
		</form>
<!--FUNCIONES PARA LIGHTBOX-->
<script>
function showLightbox() {
	document.getElementById('over').style.display='block';
	document.getElementById('fade').style.display='block';
}
		
function hideLightbox() {
	document.getElementById('over').style.display='none';
	document.getElementById('fade').style.display='none';
}		
</script>

<!--LIGHTBOX RECUPERAR CONTRASEÑA-->
<div id="over" class="overbox">
<!--CONTENIDO DEL LIGHTBOX-->	
	<form id="formulario" action="recupera.php" method="post">
		<p id="instrucciones">
		Ingresa tu correo registrado para recuperar la contraseña.
		</p>
		<fieldset id="contenedor">			
			<legend id="titulo">Ingresa tu correo:</legend>
			<input name="email" type="email" id="mailSend" placeholder="tucorreo@ejemplo.com">
			
		</fieldset>
	
	<!--<input type="submit" onClick="javascript:hideLightbox();" value="Enviar Contraseña" id="submit" style="width:170px; position:relative; left:60px"/>-->
	<input type="submit" value="Enviar Contraseña" id="submit" style="width:170px; position:relative; left:60px"/>
	</form>
</div>
<div id="fade" class="fadebox">&nbsp;</div>	
	</body>	
</html>