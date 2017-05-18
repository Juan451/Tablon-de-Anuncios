<?php
$raiz = "./"; 
include_once("librerias/variables-comunes.php");




if(!isset($_POST["email"]) || !isset($_POST["contrasena"])) {
 
         header ("location: login.php?errorlogin=1"); 
	}elseif($_POST["email"]=="" || $_POST["contrasena"]=="" ) {
	     header ("location: login.php?errorlogin=2");
	   
	}else{
	

	
	    //email y contraseña existen y no estan vacios
		//busco si existe el usuario en la dba_close
		
		$ssql = "select * from usuario where email='" . $_POST["email"] . "'";
        //conecto con la db 
         
		 
		
		$conexion = conecta_base_datos();
		
		if(!$record_usuario = mysql_query($ssql)) {
		
		    header("location: login.php?errorlogin=3");
			
		}else{
		
		      if(mysql_num_rows($record_usuario)!=1) {
			  header("location: login.php?errorlogin=4");
			  }else{
			  
			  $usuario_encontrado = mysql_fetch_array($record_usuario);
			  if ($usuario_encontrado["contrasena"] != md5($_POST["contrasena"])) {
			     
				   header("location: login.php?errorlogin=5");
				   }else{
				      
					  
					
					  $_SESSION["email_usuario"] = $_POST["email"];
					  $_SESSION["nombre_usuario"] = $usuario_encontrado["nombre"];
					  $_SESSION["apellidos_usuario"] = $usuario_encontrado["apellidos"];
					  $_SESSION["id_usuario"] = $usuario_encontrado["id_usuario"];
					  
					  header("location: index.php");
					  
				   }
			  }
			
		}
        		
	
         
		 
}


?>