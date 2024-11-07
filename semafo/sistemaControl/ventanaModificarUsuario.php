<?php

include "conectar.php";

if(isset($_GET['codigo']))
{
	$codigo=$_GET['codigo'];
	$result2= @mysqli_query($link,"select * from usuario where id='$codigo' order by nombre");
	
	$fila=mysqli_fetch_array($result2);
	
	  $nombre=$fila['nombre'];	  
  	  $apellido=$fila['apellido'];
	  $cedula=$fila['cedula'];
      $email=$fila['email'];

}
?>

<html >
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
<div align="left">
  <p class="Estilo12">MODIFICAR  USUARIO </p>
  <form action="guardarRegistro.php" method="post" name="formularioCarga3" id="formularioCarga3">
    <div align="left"></div>
    <table width="558" height="131" border="0">
      <tr>
        <td width="10" height="30">&nbsp;</td>
        <td width="282"><span class="Estilo10">Nombres</span><span class="Estilo3 Estilo9 Estilo11">:</span></td>
        <td width="252"><span class="Estilo4"><span class="Estilo5">
          <input name="nombre" type="text" id="nombre" size="40" value="<?PHP echo $nombre; ?>"/>
        </span></span></td>
      </tr>
      <tr>
        <td height="27">&nbsp;</td>
        <td><span class="Estilo10">Apellidos:</span></td>
        <td><input name="apellido" type="text" id="apellido" size="40" value="<?PHP echo $apellido; ?>"/></td>
      </tr>
      <tr>
        <td height="29">&nbsp;</td>
        <td><span class="Estilo10">Cedula</span>:</td>
        <td><span class="Estilo3">
          <input name="cedula" type="text" id="cedula" size="40" value="<?PHP echo $cedula; ?>"/>
        </span></td>
      </tr>
      <tr>
        <td height="29">&nbsp;</td>
        <td><span class="Estilo10">Email:</span></td>
        <td><span class="Estilo3">
          <input name="email" type="text" id="email" size="40" value="<?PHP echo $email; ?>"/>
        </span></td>
      </tr>
    </table>
    <p>
      <input type="button" name="Submit" value="Guardar" onclick="javascript:hacerSubmit();"/>
      <input type="button" name="Submit2" value="Cancelar" onClick="window.close();"/>	  
      <input name="codigo" type="hidden" id="codigo" value="<?PHP echo $codigo; ?>"/>
    </p>
  </form>
</div>
</body>
</html>


<script language="javascript">
 function hacerSubmit()
 {
	// alert ("horror");
    if(document.getElementById('nombre').value == "")
		alert('Ingrese el nombre del usuario');
	else
	if(document.getElementById('apellido').value == "")
		alert('Ingrese el apellido del usuario');		
	else	
	if(document.getElementById('cedula').value == "")
		alert('Ingrese la cedula del usuario');	
	else
     if(document.getElementById('email').value == "")
		alert('Ingrese el email del usuario');	
	else			 
		document.formularioCarga3.submit();	
 }
</script>