<?PHP
  include("includes/session_admin/aut_visualizar_error.php");
 // No almacenar en el cache del navegador esta página.

		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             		// Expira en fecha pasada
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");		// Siempre página modificada
		header("Cache-Control: no-cache, must-revalidate");           		// HTTP/1.1
		header("Pragma: no-cache");                                   		// HTTP/1.0

        if (isset($_GET['error_login']))
		{
              $error=$_GET['error_login'];
             $mensaje="<font face='Verdana, Arial, Helvetica, sans-serif' size='1' color='#FF0000'>Error: $error_login_ms[$error]</font>";
          }

		  
?>

<style type="text/css">
<!--
.Estilo22 {font-size: 24px; color: #CCCCCC; font-weight: bold; font-family: Georgia, "Times New Roman", Times, serif; font-style: italic; }
.contenidos {font-size: 17px; 
color: #000033; 
font-weight: 
bold; 
}
-->
</style>
<form action="principalUsuarios.php" method="post" name="login">
<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td colspan="2"></td>
    <td width="27%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="14%">Nombre de Usuario    </td>
    <td width="56%"><input name="nombre" type="text" id="nombre" size="15" maxlength="40" value="<?PHP echo $nombre;?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Password </td>
    <td><input name="pass" type="password" class="contenidos" id="pass" size="15" maxlength="40" value="<?PHP echo $pass; ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="Submit" value="entrar">
    </label></td>
    <td><input type="reset" name="cancelar" value="cancelar">
      <?PHP			
			$confirmacion2=@$_REQUEST['confir'];
			
			if(empty($confirmacion2))
			{
				$confir=0;
			}				
	?>
      <input name="confir" type="hidden" id="confir" size="40" maxlength="20" value="<?PHP echo $confir; ?>"></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

<script language=JavaScript>
 function confirmar()
 {
	if(document.login.nombre.value == "")
		alert('Ingrese el nombre de usuario');	
	else	
	if(document.login.pass.value == "")
		alert('Ingrese la contrasena');	
	else
	{		
		document.login.confir.value='1';
		hacerSubmit3();
	}
 }
 
 
 function hacerSubmit3()
 {	 	
		document.login.submit();	
 }
 
 </script>