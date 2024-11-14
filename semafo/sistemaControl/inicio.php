<html>
<head>
<meta charset="utf-8">
<title>Archivo Nuevo</title>

<script type="text/javascript">
var slideimages=new Array()
var slidelinks=new Array(
)
function slideshowimages()
{
	for (i=0;i<slideshowimages.arguments.length;i++)
	{
		slideimages[i]=new Image()
		slideimages[i].src=slideshowimages.arguments[i]
	}
}

function slideshowlinks()
{
	for (i=0;i<slideshowlinks.arguments.length;i++)
		slidelinks[i]=slideshowlinks.arguments[i]
}

function gotoshow()
{
	if (!window.winslide||winslide.closed)
		winslide=window.open(slidelinks[whichlink])
	else
		winslide.location=slidelinks[whichlink]
	winslide.focus()
}


function pagina1(valor,item)
{  	
    let urlPaginas=["CrearUsuarios.php", "ModificarUsuarios.php","EliminarUsuarios.php"];
    
    //urlPaginas[0]="CrearUsuarios.php";
    
  //  alert ("Valor URL" + urlPaginas[0])
//    alert ("Valor Item" + item)
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
		 alert ("Browser does not support HTTP Request")
		 return
	 }	 

	 
	document.getElementById("contenido").innerHTML="-------------  CARGANDO INFORMACION  -------------------"
	 
	var url=urlPaginas[item-1]
	url=url+"?id="+valor	
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}


function stateChanged() 
{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 	{ 
 		document.getElementById("contenido").innerHTML=xmlHttp.responseText 
 	} 
}


function GetXmlHttpObject()
{

 var xmlhttp; 
 if (window.XMLHttpRequest) 
  { 
  // código para IE7 +, Firefox, Chrome, Opera, Safari 
  xmlhttp = new XMLHttpRequest (); 
  } 
	else if (window.ActiveXObject) 
  { 
  // Código para IE6, IE5 
  xmlhttp = new ActiveXObject ("Microsoft.XMLHTTP"); 
  } 
	else 
  { 
  alert ("Su navegador no soporta XMLHTTP"); 
  }
	return xmlhttp;
}

function hacerSubmit(item)
 {		

     valor=" Ustedes que no creian";
     pagina1(valor,item);	
/*
     
	if(item==1)
	{
		valor=" Ustedes que no creian";
		pagina1(valor,item);	

	}
	
	if(item==2)
	{
		valor=" Ustedes que no creian";
		pagina2(valor);		
		
	}	
     
     if(item==3)
	{
		valor=" Ustedes que no creian";
		pagina3(valor);		
		
	}*/	
		
 } 
    
    
function hacerSubmitCrear()
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
    
function Modificar2(url,ancho,alto)
{
	var palabra
	palabra=confirm("Esta seguro de Modificar el registro")
	if(palabra)
	{
		var opciones="toolbar=0,location=0,directories=0,status=1,menubar=0,scrollbars=0,resizable=0,width="+ancho+",height="+alto;
		var Nueva_ventana;
		var nombre="Modificar";
		Nueva_ventana = window.open(url,nombre,opciones); 
		Nueva_ventana.moveTo(0,0); 
	}    

	
}
    
function eliminar2(valor)
{
   // alert("Bien");
	var palabra
	palabra=confirm("Esta seguro de eliminar los registros")
	if(palabra)
	{
        document.getElementById('confir2').value=1
		//document.listado.confir2.value=1
        document.getElementById('codigo').value=valor
		//document.listado.codigo.value=valor
		alert(valor)
		document.listado.submit()
	}
}


</script>

    
</head>

<body>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td colspan="6"><img src="imagenes/logounivalle.jpg" width="348" height="54" alt=""/></td>
    </tr>
    <tr>
      <td width="13">&nbsp;</td>
      <td width="298" align="center"><input name="button" type="button" id="button" value="Crear" onClick="javascript:hacerSubmit(1)"></td>
      <td width="189" align="center"><input name="button2" type="button" id="button2" value="Modificar" onClick="javascript:hacerSubmit(2)"></td>
      <td width="267" align="center"><input name="button3" type="button" id="button3" value="Eliminar" onClick="javascript:hacerSubmit(3)"></td>
      <td width="178">&nbsp;</td>
      <td width="14">&nbsp;</td>
    </tr>
  </tbody>
</table>

<div align="center" id="contenido">
  <p>&nbsp;</p>
  <p><b>------- Ejemplo bueno Cambio por git 2025 semaforo Electronica------</b></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="14">&nbsp;</td>
      <td width="907" colspan="4" align="center" bgcolor="#F80604"><p><font face="arial" size="+3" color="#F8F8F8"  >Universidad del Valle</font>          
        <p><font color="#F8F8F8" size="+2" face="raro, courier">Seccional Zarzal</font></td>
      <td width="9">&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php

include "conectar.php";

if(isset($_POST['nombre']))
{
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$cedula = $_POST['cedula'];
    $email = $_POST['email'];


if(!empty($nombre) && !empty($apellido) && !empty($cedula) && !empty($email))
{
	$apellido = $_POST['apellido'];
	$nombre = $_POST['nombre'];
	$cedula = $_POST['cedula'];
    $email = $_POST['email'];
	
	$sql="insert into usuario (nombre,apellido,cedula, email) values ('$nombre','$apellido','$cedula','$email')";
	if(!@mysqli_query($link, $sql ) )
		echo "<script>alert('No se pudo almacenar la informacion')</script>";
	  
	@mysqli_close($link);
	echo '<script>alert("La informacion del usuario se ingreso correctamente");
    //window.opener.location.href = "inicio.php";
    hacerSubmit(1);
    </script>';
}
else
{
   echo "<script>alert('Faltan Datos para ingresar')</script>";
}
}

if(isset($_GET['modi']))
{
	$modi=$_GET['modi'];
    if ($modi=="1")
    {   
        echo "<script>hacerSubmit(2)</script>";
    }
}

if(isset($_GET['elim']))
{
	$elim=$_GET['elim'];
    if ($elim=="1")
    {   
        echo "<script>hacerSubmit(3)</script>";
    }
}


require_once("conectar.php"); 
//require_once("includes/session_admin/secure.php");
if(isset($_POST['confir2']))
{
$confirmacion2 = $_POST['confir2'];
echo "<script>alert('Entro')</script>";

if($confirmacion2==1)
{
echo "<script>alert('Entro 2')</script>";
		$codigo = $_POST['codigo'];
		if(!empty($codigo))
		{
			$_sql = "delete from usuario where id='$codigo'";
			
			if(! @mysqli_query($link,$_sql ))
			{
				echo '<br><br><b><div align="center">No se pudo actualizar los datos</div></b>';
			}			
		}
}
}

?>