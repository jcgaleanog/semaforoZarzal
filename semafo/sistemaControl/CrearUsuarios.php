<?php
require_once("conectar.php"); 
//require_once("includes/session_admin/secure.php");

          header('Content-Type: text/html; charset="utf-8"');
         // No almacenar en el cache del navegador esta página.

		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             		// Expira en fecha pasada
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");		// Siempre página modificada
		header("Cache-Control: no-cache, must-revalidate");           		// HTTP/1.1
		header("Pragma: no-cache"); 

$fecha =date("m/d/Y");


?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo10 {font-size: 20px; font-family: "Bodoni MT Black"; }
.Estilo11 {font-size: 20px}
.Estilo3 {font-size: 24px;
	font-family: "Bodoni MT Black";
}
.Estilo4 {font-size: 24px}
.Estilo5 {font-family: "Bodoni MT Black"}
.Estilo12 {font-size: 24px; font-family: "Bodoni MT Black"; color: #990000; }
-->
</style>
</head>

<body>
<div align="center">
  <p class="Estilo12">INGRESO DE USUARIOS Bien</p>
  <form action="inicio.php" method="post" name="formularioCarga3" id="formularioCarga3">
    <table width="558" height="131" border="0">
      <tr>
        <td width="10" height="30">&nbsp;</td>
        <td width="282"><span class="Estilo10">Nombres</span><span class="Estilo3 Estilo9 Estilo11">:</span></td>
        <td width="252"><span class="Estilo4"><span class="Estilo5">
          <input name="nombre" type="text" id="nombre" size="40" />
        </span></span></td>
      </tr>
      <tr>
        <td height="27">&nbsp;</td>
        <td><span class="Estilo10">Apellidos:</span></td>
        <td><input name="apellido" type="text" id="apellido" size="40" /></td>
      </tr>
      <tr>
        <td height="29">&nbsp;</td>
        <td><span class="Estilo10">Cedula:</span></td>
        <td><span class="Estilo3">
          <input name="cedula" type="text" id="cedula" size="40" />
        </span></td>
      </tr>
      <tr>
        <td height="29">&nbsp;</td>
        <td><span class="Estilo10">Email:</span></td>
        <td><span class="Estilo3">
          <input name="email" type="text" id="email" size="40" />
        </span></td>
      </tr>
    </table>
    <p>
      <input type="button" name="Submit" value="Aceptar" onclick="javascript:hacerSubmitCrear();"/>
      <input type="reset" name="Submit2" value="Cancelar"/></p>
  </form>
</div>
</body>
</html>

