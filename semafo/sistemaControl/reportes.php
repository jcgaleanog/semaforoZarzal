<html>
<head>
<title>Reporte</title>
</head>

<body>
<p>&nbsp;</p>
<table width="694" border="0">
  <tr>
    <td width="14" height="44">&nbsp;</td>
    <td width="670">REPORTE</td>
  </tr>
  <tr>
    <td height="44">&nbsp;</td>
    <td><div align="center">
<?php   
require("conectar.php");

//******************************************************************************************************
// SECCION DE CODIGO DE REPORTES DE ADMINISTRADORAS
//
//		En esta seccion del codigo se visualiza la informacion de las areas
//
//******************************************************************************************************

$result= @mysql_query("SELECT count(*) FROM usuario",$link);
$numero=@mysql_num_rows($result);					//Verificacion del numero de registros en el sistema

$result2= @mysql_query("select * from usuario order by nombre",$link);

if(!$result)
  exit("No se pudo leer el archivo");

//******************************************************************************************************
// ENCABVEZADOS DE LAS TABLAS
//
//******************************************************************************************************

echo '<TABLE BORDER=1 CELLSPACING=1 CELLPADDING=1>      
<TR>
	<td width="104" align="center" valign="middle" bordercolor="#000033" bgcolor="#999900"><div align="center"><span >Nombre</span></div></td> 
 <td width="342" align="center" valign="middle" bordercolor="#000033" bgcolor="#999900"><div align="center"><span>Apellidos</span></div></td>
  <td width="342" align="center" valign="middle" bordercolor="#000033" bgcolor="#999900"><div align="center"><span >Cedula</span></div></td>
</TR>';
while($fila=mysql_fetch_array($result2))
{
	  $nombre=@$fila[nombre];	  
  	  $apellido=@$fila[apellido];
	  $cedula=@$fila[cedula];


   //******************************************************************************************************
	// SECCION DE DATOS O CUERPO DE LA TABLA
	//*****************************************************************************************************
	 
	 echo "<tr>"; 
	 echo "<td bgcolor='#CCCCCC'><div align='left'><span>$nombre</span></div></td>";
     echo "<td bgcolor='#CCCCCC'><div align='left'><span>$apellido</span></div></td>";
     echo "<td bgcolor='#CCCCCC'><div align='left'><span>$cedula</span></div></td>";
     echo "</tr>";  
}
	mysql_close($link); 			//Cierre de Coneccion
 ?>
    </div></td>
  </tr>
  <tr>
    
  </tr>
</table>
</body>
</html>
