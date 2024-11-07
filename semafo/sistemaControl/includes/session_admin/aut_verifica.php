<?PHP


//  Autentificator

// Motor autentificación usuarios.

// Cargar datos conexion y otras variables.
require ("aut_config.php");

$host  = $_SERVER['HTTP_HOST'];

// chequear página que lo llama para devolver errores a dicha página.

$url = explode("?",$_SERVER['HTTP_REFERER']);
$pag_referida=$url[0];
$redir=$pag_referida;
// chequear si se llama directo al script.
if ($_SERVER['HTTP_REFERER'] == ""){
header("Location: http://$host/horarios/sessiones/login2.php"); 	
die ("Acceso Denegado!");
exit;
}

// Chequeamos si se está autentificandose un usuario por medio del formulario
if (isset($_POST['nombre']) && isset($_POST['pass'])) 
{
	
// Conexión base de datos.
// si no se puede conectar a la BD salimos del scrip con error 0 y
// redireccionamos a la pagina de error.

$db_conexion= $link or die(header ("Location: $redir?error_login=0"));


// realizamos la consulta a la BD para chequear datos del Usuario.

 $usuario_consulta =  mysqli_query($db_conexion,"SELECT nombre , email FROM $sql_tabla WHERE email='".$_POST['nombre']."'") or die(header ("Location:  $redir?error_login=1"));
 // miramos el total de resultado de la consulta (si es distinto de 0 es que existe el usuario)
 if (mysqli_num_rows($usuario_consulta) != 0) {
	
    // eliminamos barras invertidas y dobles en sencillas
    $login = stripslashes($_POST['nombre']);
    // encriptamos el password en formato md5 irreversible.
    $password = $_POST['pass'];
	$valor= $_POST['pass'];
//	$valor=md5_and_reverse($valor);
    // almacenamos datos del Usuario en un array para empezar a chequear.
 	$usuario_datos = mysqli_fetch_array($usuario_consulta);
  
    // liberamos la memoria usada por la consulta, ya que tenemos estos datos en el Array.
    mysqli_free_result($usuario_consulta);
    // cerramos la Base de dtos.
    mysqli_close($db_conexion);
    
    // chequeamos el nombre del usuario otra vez contrastandolo con la BD
    // esta vez sin barras invertidas, etc ...
    // si no es correcto, salimos del script con error 4 y redireccionamos a la
    // página de error.
    if ($login != $usuario_datos['nombre']) {
       	header("Location: $redir?error_login=4");
		exit;}

    // si el password no es correcto ..
    // salimos del script con error 3 y redireccinamos hacia la página de error	
    if ($password != $usuario_datos['email']) {
	       header("Location: $redir?error_login=3&$valor");
       // Header ("Location: $redir?error_login=3&password=$password");
	    exit;}

    // Paranoia: destruimos las variables login y password usadas
    unset($login);
    unset ($password);

    // En este punto, el usuario ya esta validado.
    // Grabamos los datos del usuario en una sesion.
    
     // le damos un mobre a la sesion.
    session_name($usuarios_sesion);
     // incia sessiones
    session_start();

    // Paranoia: decimos al navegador que no "cachee" esta página.
    session_cache_limiter('nocache,private');
    
    // Asignamos variables de sesión con datos del Usuario para el uso en el
    // resto de páginas autentificadas.

    // definimos usuarios_id como IDentificador del usuario en nuestra BD de usuarios
//    $_SESSION['usuario_id']=$usuario_datos['adm_codigo'];
    
   
    
    //definimos usuario login
    $_SESSION['usuario_login']=$usuario_datos['nombre'];

    //definimos usuario_password con el password del usuario de la sesión actual (formato md5 encriptado)
    $_SESSION['usuario_password']=$usuario_datos['email'];


    // Hacemos una llamada a si mismo (scritp) para que queden disponibles
    // las variables de session en el array asociado $HTTP_...
    $pag=$_SERVER['PHP_SELF'];
    header("Location: $pag?");
    exit;
    
   } else {
      // si no esta el nombre de usuario en la BD o el password ..
      // se devuelve a pagina q lo llamo con error
      header("Location: $redir?error_login=2");
      exit;}
} else {

// -------- Chequear sesión existe -------

// usamos la sesion de nombre definido.
session_name($usuarios_sesion);
// Iniciamos el uso de sesiones
session_start();

// Chequeamos si estan creadas las variables de sesión de identificación del usuario,
// El caso mas comun es el de una vez "matado" la sesion se intenta volver hacia atras
// con el navegador.

	if (!isset($_SESSION['usuario_login']) && !isset($_SESSION['usuario_password']))
	{
		// Borramos la sesion creada por el inicio de session anterior
		session_destroy();		
		//header("Location: http://$host/sessiones/login2.php"); 
		die ("Acceso Denegado!");			
		exit;
	}
}
/*
//encripta una cadena md5 128 veces
function encrypt($string)
{
		 for($i=0;$i<128;$i++)
		 $string=md5($string);
		return $string;

}

function md5_and_reverse($string) { 
    return strrev(md5($string)); 
}
*/
?>
