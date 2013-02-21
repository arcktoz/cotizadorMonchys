<html lang="es">
		<meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
		
	<head>
		<title>Nuevo Usuario</title>		
			
		<link rel="stylesheet" href="css/resetstylesheet.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/regStyles.css" type="text/css" media="all" />	
		<link rel="stylesheet" href="fonts/stylesheet.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/kalendar.css" type="text/css" media="all" />			
		
		<script type="text/javascript" src="js/libs/jquery-1.7.2.min.js"></script>		
		<script src="js/jquery.maskedinput.js" type="text/javascript"> </script>
		<script language="javascript" type="text/javascript" src="js/jquery.kalendar.min.js"></script>
		<script language="javascript" type="text/javascript">
			$(document).ready(function(){
				$(".calendar").kalendar();
			});			 
		</script>
		
		<script>
			jQuery(function($){								
				$("#telefono").mask("(999) 999-9999");				
			});
		</script>
		
		<script type="text/javascript">
			function validar(e) { // 1
				tecla = (document.all) ? e.keyCode : e.which; // 2
				if (tecla==8) return true; // 3
				patron =/[A-Za-z\s]/; // 4
				te = String.fromCharCode(tecla); // 5
				return patron.test(te); // 6
			} 
		</script>
		
		<script type="text/javascript">
			function conMayusculas(field) {
				field.value = field.value.toUpperCase()
			}
		</script>
						
	</head>

	<body>
<?php 

?>
	
		<section>
			<img id="logoMonchys" src="img/logos/monchys4c.png">			
		</section>
		
		<form id="login" action="registro.php" method="post">
			<h2>Registra tus datos</h2>
			<fieldset id="inputs">
				<input id="correo" type="email" name="correo" placeholder="tucorreo@ejemplo.com" autofocus="" required="">				
				<input id="password" type="password" name="password" placeholder="Password" required="">			
				<input onChange="conMayusculas(this)" onkeypress="return validar(event)" id="nombre" type="text" name="nombre" placeholder="Nombre(s)" required="">			
				<input onChange="conMayusculas(this)" onkeypress="return validar(event)" id="paterno" type="text" name="paterno" placeholder="Apellido Paterno" required="">			
				<input onChange="conMayusculas(this)" onkeypress="return validar(event)" id="materno" type="text" name="materno" placeholder="Apellido Materno" required="">			
				<input class="calendar" id="nacimiento" type="text" name="nacimiento" placeholder="Fecha de Nacimiento AAAA-MM-DD" required="">			
				<select id="sexo" name="sexo">
					<option selected="" disabled="disabled">Sexo</option>
					<option value="MASCULINO">MASCULINO</option>
					<option value="FEMENINO">FEMENINO</option>
				</select>
				<input id="telefono" type="text" name="telefono" placeholder="Tel&eacute;fono" required="">			
			</fieldset>
			
			<fieldset id="actions">
				<input type="submit" id="submit" value="Registrar">				
			</fieldset>
			<a href="http://www.monchys.com" id="back">By Monchys</a>			
		</form>		
	</body>
	
</html>