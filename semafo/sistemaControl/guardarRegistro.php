<input name="modi" type="hidden" id="modi" value="1"/>
<?PHP
include "conectar.php";

$codigo = $_POST['codigo'];

if(!empty($codigo))
{  
	modificar($link);
  
}

function modificar($link)
{   
	$apellido = $_POST['apellido'];
	$nombre = $_POST['nombre'];
	$cedula = $_POST['cedula'];
	$codigo = $_POST['codigo'];
    $email = $_POST['email'];
				
	$_sql ="update usuario set cedula='$cedula',nombre='$nombre',apellido='$apellido', email='$email'  where id='$codigo'";
 
	if(! @mysqli_query( $link,$_sql) )
		echo '<br><br><b><div align="center">No se pudo actualizar los datos</div></b>';
				  
	@mysqli_close($link);
		echo "<script>alert('La informacion del Usuario se actualizo correctamente')</script>";
		
	print '<script language="JavaScript">window.opener.location.href = "inicio.php?modi=1"	 	
        window.close();
	 	</script>';	
				
}
?>
