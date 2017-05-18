<?php 
$raiz = "./";

include_once($raiz . "librerias/variables-comunes.php");

$titulo_pagina = "Edite su anuncio";
include($raiz . "plantillas/cabecera.php");

if(estas_autenticado()){
      //es un usuario 
	  muestra_usuario("Mostrando los anuncios del usuario:");
	  
	  //selecciono los anuncios del usuario 
	  
	  $ssql = "select * from anuncio where id_usuario=" . $_SESSION["id_usuario"];
	  $conexion = conecta_base_datos();
	  $rs = mysql_query($ssql);
	
	  
  if (mysql_num_rows($rs)){
	     
		   echo '<ul class="listaanuncios">';
		 while ($fila = mysql_fetch_object($rs)){
		      
		   echo "<li>";    
		   echo '<a href="editar_anuncio.php?id_anuncio=' . $fila->id_anuncio . '" class="enlaceaccion">[ Editar ]</a>';
		   echo " <b>" . $fila->titulo_anuncio . "</b>";
		   echo "</li>";  
		 }
	       echo "</ul>";
	  }
	  
}else{
            //no esta autenticado
			echo "Para ver tus anuncios debes de estar autenticado.";
     
}


include("plantillas/pie.php");
?>



