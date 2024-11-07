<?php
require_once("conectar.php"); 
require_once("includes/session_admin/secure.php");

function encrypt($string)
{
		 for($i=0;$i<128;$i++)
		 $string=md5($string);
		return $string;

}

function md5_and_reverse($string) 
{ 
	for($i=0;$i<128;$i++)
		$string=md5($string);
	$string=strrev(md5($string));
	return $string;
}

echo $texto="Prueba";
echo "<br>";
$valor=encrypt($texto);
echo $valor;
echo "<br>";
$texto=md5_and_reverse($valor);
echo $texto;
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo1 {	color: #000000;
	font-size: 24px;
	font-family: "Bodoni MT Black";
}
.Estilo3 {	font-size: 24px;
	font-family: "Bodoni MT Black";
}
.Estilo4 {font-size: 36px; font-family: "Bodoni MT Black"; color: #990000; }
-->
</style>
</head>

<body>
<p class="Estilo4">EJEMPLO DE CLASE CON PHP </p>
<p class="Estilo4">&nbsp;</p>
<div align="center"><a href="CrearUsuarios.php" class="Estilo3">CREAR USUARIOS</a> </div>
<p align="center" class="Estilo1"><a href="ModificarUsuarios.php">MODIFICAR USUARIOS</a></p>
<p align="center" class="Estilo1"><a href="EliminarUsuarios.php">ELIMINAR USUARIOS</a></p>
<p align="center" class="Estilo1"><a href="reportes.php">REPORTE DE USUARIOS</a></p>
<p align="center" class="Estilo1"></p>
</body>
</html>
