<?php
$link = mysqli_connect("127.0.0.1","root","","ejemplo");
if(!$link )
{
  exit("No se pudo establecer la conexión");
  mysqli_error();
 }
/*
if(!mysqli_select_db("ejemplo",$link))
{
  	exit("No se pudo abrir la base de datos");
}
*/

?>
