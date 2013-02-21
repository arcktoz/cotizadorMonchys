<html>

	<meta equiv="Content-Type" content="text/html; charset=UTF-8" />
	<head>
		<title>Monchys</title>
			
		<link rel="stylesheet" href="css/resetstylesheet.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/recoveryStyles.css" type="text/css" media="all" />
		<link rel="stylesheet" href="fonts/stylesheet.css" type="text/css" media="all"/>		
		
		<script type="text/javascript" src="jquery-1.7.2.js"></script>
		<script type="text/javascript">
			jQuery(function($){
				//variables
				var nuevopass = $('[name=nuevopass]');
				var confirmapass = $('[name=confirmapass]');
				var confirmacion = "Las contraseñas coinciden";
				var longitud = "La contraseña debe estar formada entre 6-10 carácteres";
				var negacion = "Las contraseñas no coinciden";
				var vacio = "La contraseña no puede quedar vacía";
				
				//creo el elemento span
				var span = $('<span></span>').insertAfter(confirmapass);
				//oculto por defecto el elemento span
				span.hide();
				
				//función que comprueba las dos contraseñas
				function coincidePassword(){
					var valor1 = nuevopass.val();
					var valor2 = confirmapass.val();
					//muestro el span
					span.show().removeClass();
					//condiciones dentro de la función
					if(valor1 != valor2){
						span.text(negacion).addClass('negacion');
					}
					if(valor1.length==0 || valor1==""){
						span.text(vacio).addClass('negacion');
					}
					if(valor1.length<6 || valor1.length>10){
						span.text(longitud).addClass('negacion');
					}
					if(valor1.length!=0 && valor1==valor2){
						span.text(confirmacion).addClass('confirmacion');
					}
				}
				
				//ejecuto la función al soltar la tecla
				confirmapass.keyup(function(){
					coincidePassword();
				});
			});
		</script>
	</head>

	<body>
<?php	
	
	include ("conexion.php");	
	//print_r($_GET);	
	
	$hash = $_GET["cid"];	
	$consulta = "SELECT correo, estado FROM recovery WHERE hash = ('$hash')";
	$resultado = mysql_query($consulta) or die(mysql_error());
	$total = mysql_num_rows($resultado);						
		if ($total> 0) {
			while ($columna = mysql_fetch_array($resultado)):
?>
		<!--ASIGNACIÓN DEL REGISTRO ENCONTRADO EN VARIABLES-->
		<?php
			//$id = $columna['id'];
			$correo = $columna['correo'];
			//$hash = $columna['hash'];
			$estado = $columna['estado'];			
		?>
		
		<?php
			endwhile;
		}
		?>
		
	<?php
		if($estado == "ACTIVO"){			
			$sql=mysql_query("UPDATE recovery SET estado = 'INACTIVO' WHERE hash='$hash' ");			
			echo "			
			<div>
				<img id='logoMonchys' src='img/logos/monchys4c.png'/>
			</div>
			<form id='login' action='nuevopass.php' method='post'>
				
				<h2>Recupera tu Password</h2>
				
				<fieldset id='inputs'>								
					<input id='password2' name='nuevopass' type='password' placeholder='Nuevo Password' required=''/>
					<input id='password2' name='confirmapass' type='password' placeholder='Confirma tu Password' required=''/>
					<input type='hidden' name='correo' value='$correo'/>
				</fieldset>
				
				<fielset id='actions'>	
					<input type='submit' value='Guardar' id='submit'/>
				</fieldset>
			</form>
			"; 
		}else{
			echo "					
				<script language='javascript'>
					alert('Este código ya fue utilizado, por favor utiliza el formulario de recuperación para proporcionarte uno diferente.');
						window.location.href='index.php';
				</script>
			";
		}
	?>
	
	
	</body>
</html>