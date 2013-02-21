<?php
	session_start();
	$defecto = "webmaster.gif";
	$Ok = isset($_FILES["fotografia"]);
	$url = ($Ok) ? $_FILES["fotografia"]["tmp_name"] : $defecto;
	list($anchura, $altura, $tipoImagen, $atributos) = getimagesize($url);
	$error = (isset($atributos)) ? 0 : 1;
	$los_tipos = array("gif", "jpg", "png");
	$tipo = ($Ok) ? "image/".$los_tipos[$tipoImagen - 1] : "image/gif";
	$fichero = ($Ok && ($error == 0)) ? $_FILES["fotografia"]["name"] : $defecto;
	$tam = filesize($url);
	$OkTam = isset($_POST["maxpeso"]);
	$OkAncho = isset($_POST["maxancho"]);
	$OkAlto = isset($_POST["maxalto"]);
	$maxTam = ($OkTam) ? (int) $_POST["maxpeso"]: 1048576;
	$maxAncho = ($OkAncho) ? (int) $_POST["maxancho"]: 1200;
	$maxAlto = ($OkAlto) ? (int) $_POST["maxalto"]: 1200;
	$error += ($tam <= $maxTam) ? 0 : 2;
	$ancho = ($error == 1) ? 0 : $anchura;
	$alto = ($error == 1) ? 0 : $altura;
	$error += ($ancho <= $maxAncho) ? 0 : 4;
	$error += ($alto <= $maxAlto) ? 0 : 8;
	$datos = ($error == 0) ? $url : $defecto;
	$onload = ($Ok) ? "onload='parent.datosImagen($tam, $ancho, $alto, $error)'": '';
	$datos_imagen = fread(fopen($datos, "rb"), filesize($datos));
	$_SESSION["cont"] = $datos_imagen;
	$_SESSION["tipo"] = ($error == 0) ? $tipo : "image/gif";
?>
<html >
<head>
<style type="text/css" >
html	{
	height: 100%;
}
body	{
	height: 100%;
	overflow: hidden;
	background-color: #eeeeee;
	background-image: url(previendo.php?dato=<?=$fichero;?>);
	background-repeat: no-repeat;
	background-position: center center;
}
</style>
</head>
<body <?=$onload;?>>

</body>
</html>