<?php 
$raiz = "";
include_once("librerias/variables-comunes.php");

//elimino la sesion

$_SESSION["nombre_usuario"] = "";
$_SESSION["apellidos_usuario"] = "";
$_SESSION["email_usuario"] = "";
session_destroy();

$_SESSION = array();


header("location: index.php");

?>
