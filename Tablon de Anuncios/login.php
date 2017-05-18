<?php 
$raiz = "./"; 
include_once("librerias/variables-comunes.php");

$titulo_pagina = "Autentifiquese por favor";
include("plantillas/cabecera.php");

//muestro formulario para login
if(isset($_GET["errorlogin"])){
   echo "<p class='formerror'><b>Error de acceso</b><br>";
   
   if($_GET["errorlogin"]=="1"){
       echo "No he recibido datos de autentificacion";
	   
   
   }elseif ($_GET["errorlogin"]=="2"){
        echo "El email o contraseña no pueden estar vacios";
  
   }elseif ($_GET["errorlogin"]=="3"){
        echo "Hubo un error en la base de datos";
		
   }elseif ($_GET["errorlogin"]=="4"){
        echo "El email o contraseña no pueden estar vacios";
		
   }elseif ($_GET["errorlogin"]=="5"){
        echo "La contraseña no corresponde con el usuario";
		
	 }else{
        echo "Error desconocido contacte con el administrador";
		
  
  }
  
   echo"</p>";
  
}
?>
<p>
  Escriba el email y la indicados durante el registro
</p>
<form action="dologin.php" method="post">

    <div class="campoformulario">
	   <span>Email:</span>
	   <input type="text" name="email" size="20">
		</div>
    <div class="campoformulario">
	   <span>Contraseña:</span>
	   <input type="password" name="contrasena" size="20">
		</div>
    
	<div class="campoformulario">
	  <input type="submit" value="Entrar">
	</div>
  
</form>

