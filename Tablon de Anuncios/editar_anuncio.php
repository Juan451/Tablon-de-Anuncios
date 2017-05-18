<?php 
$raiz = "./";

include_once($raiz . "librerias/variables-comunes.php");

$titulo_pagina = "Edite su anuncio";
include($raiz . "plantillas/cabecera.php");

//primero, debo asegurarme que un usuario esta atenticado


if(estas_autenticado()){
      //debo recuperar el indice
	  
	  if($_POST){
	      //si recibo, esque estoy recibiendo los datos del anuncio
	      //voy a generar las sentencias sql del update
		  
		  $ssql = "update anuncio set titulo_anuncio= '" . $_POST["titulo_anuncio"] . "', cuerpo_anuncio='" . $_POST["cuerpo_anuncio"] . "', id_pais=" . $_POST["id_pais"] . " where id_anuncio=" . $_POST["id_anuncio"] . " and id_usuario=" . $_SESSION["id_usuario"];
          $conexion = conecta_base_datos();	  
	      
		
		 if(mysql_query($ssql)){
		     echo "<p>Anuncio editado con exito</p>";
			 
		}else{
		     echo "<p>hubo un error al editar el anuncio</p>";
		}
		  
		echo '<p> Volver a <a href=".">Mis anuncios</a></p>'; 
	  }else{
	    //no recibo, nada 
	  	    	  	  
	  if (isset($_GET["id_anuncio"])){
	    //estoy recibiendo algo
	     $id_anuncio = $_GET["id_anuncio"];
	     //traigo los datos del anuncio
		 $conexion = conecta_base_datos();
		 $ssql = "select * from anuncio where id_anuncio = " . $id_anuncio . " and id_usuario = " . $_SESSION["id_usuario"];
	   
	 //muestro formulario de los datos
		 $rs_anuncio = mysql_query($ssql);
		 //voy a comprobar si hay anuncio
		 if(mysql_num_rows($rs_anuncio)!=1){
		     
			 echo "<p> No he encontrado el anuncio que quieres editar.";
			 
			 }else{
			 //es que encontre el anuncio
			 //recupero los datos de ese anuncio
			 
			 
			 
			$fila_anuncio = mysql_fetch_object($rs_anuncio);
		 
		 
		 
		 
	     ?>
		 
		 <form action="<?php echo $_SERVER["PHP_SELF"]?>" method ="post">
         <input type="hidden" name="id_anuncio" value="<?php echo $id_anuncio;?>">
<div class="campoform">
     Titulo del anuncio:
	 <br>
	 <input type="text" name="titulo_anuncio" size=35 maxlength="250" value="<?php echo $fila_anuncio->titulo_anuncio;?>">
</div>

<div class="campoform">
     Contenido del anuncio:
	 <br>
	 <textarea cols=30 rows=30 name="cuerpo_anuncio"><?php echo $fila_anuncio->cuerpo_anuncio;?>"</textarea>
</div>


<div class="campoform">
	  pais el que va dirigido:
	 <br>
	 <select name="id_pais">
		<?php
	       $ssql ="SELECT * FROM pais order by nombre_pais";
		   $rs = mysql_query($ssql);
		   while ($fila = mysql_fetch_array($rs)) {
		       //recorrido de registros
			   echo "<option";
			   if($fila_anuncio->id_pais == $fila["id_pais"]) {
			   
			   
			    echo " selected ";
			   
			   
			   }
			   
			   echo " value=" . $fila["id_pais"] . ">" . $fila["nombre_pais"] . "</option>";
			}
		mysql_free_result($rs);
		//liberar memoria 		   
	?>  
	 </select>
</div> 


<div class="campoform">
	   <input type="submit" value="Enviar">
</div> 
</form>
		 
   <?php
}		  
		  
	  }else{
	  
	  echo "<p>No se que anuncio estas intentado editar";
	  
	  }
	}
	  
	  
	  
}else{
            //no esta autenticado
			echo "Para editar tus anuncios debes de estar autenticado.";
     
}


include("plantillas/pie.php");
?>


