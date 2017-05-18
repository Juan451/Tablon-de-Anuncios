<?php
session_start();
  function parametro_plantilla($variable){
      if (isset($GLOBALS[$variable])){
	      echo $GLOBALS[$variable];
		  }else{
		      echo "Sin Dato cargado: " . $variable;
			  }
		}
function conecta_base_datos(){
$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("anunciosdwes");
return $conexion;
}

//funcion encargada
function estas_autenticado(){
if (isset($_SESSION["nombre_usuario"]) && isset($_SESSION["apellidos_usuario"]) && isset($_SESSION["email_usuario"])) {
  return true;
  }
  return false;
}
function muestra_usuario($texto_mostrar = "Bienvenido"){
   if (estas_autenticado()){
       global $raiz;
       echo '<div id="muestrausuario">';
	   echo '<img src= "images/user_check.png"  width=48 height=48>' . $texto_mostrar . ' <br>' . $_SESSION["nombre_usuario"] . '</br>';	   
	   echo '<div>';
		
		}
    }
   

?>

