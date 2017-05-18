<?php 
$raiz = "./";

include_once($raiz . "librerias/variables-comunes.php");

$titulo_pagina = "Registro de usuario";
include($raiz . "plantillas/cabecera.php");

//miro si estoy recibiendo datos de formulario

if (!$_POST){
    
	include("formulario-registro.php");

}else{
   
   if($_POST["nombre"]=="" ||  $_POST["apellidos"]=="" ||  $_POST["apellidos"]=="" ||  $_POST["email"]=="" ||  $_POST["contrasena"]=="") {
   
   echo "<p class='formerror'>Se encontraron errores en el formulario por favor verifica que todos los campos estan rellenados correctamente.";
   
   include("formulario-registro.php");
   
   }else{
         $conexion = conecta_base_datos();
		 $ssql = "insert into usuario (nombre ,apellidos, email, contrasena) values ('" . $_POST["nombre"] . "','" . $_POST["apellidos"] . "', '" . $_POST["email"] . "','" . md5($_POST["contrasena"]) . "')";
         
		 
		 if (mysql_query($ssql)){
		     echo "Usuario creado con exito";
			 //echo $ssql;
			 }else{ 
			      echo "Hubo un problema al crear al usuario, intentelo mas tarde";
				  echo "<p>" . mysql_error(). "</p>";
				  echo "<p>$ssql</p>";
	  }
   }
 }

include($raiz . "plantillas/pie.php");
?>
