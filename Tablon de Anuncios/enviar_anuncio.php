<?php 

$raiz = "./";

include_once("librerias/variables-comunes.php");

$titulo_pagina = "Enviar un anuncio al tablon";
include("plantillas/cabecera.php");

$conexion = conecta_base_datos();



if(estas_autenticado()){
 //entonces le permito enviar anuncio



 if($_POST){

    //entonces le permito enviar anuncio
 
if($_POST["titulo_anuncio"]=="") {
     echo"No he recibido nada del anuncio...";
}elseif($_POST["cuerpo_anuncio"]=="") {
	    echo "no he recibido el cuerpo del anuncio...";
}else{
  
  echo "he recibido datos y procedo a insertarlos";
  $ssql = "insert into anuncio (titulo_anuncio, cuerpo_anuncio, id_pais, id_usuario) values ('" . $_POST["titulo_anuncio"] . "', '" . $_POST["cuerpo_anuncio"] . "', '" . $_POST["id_pais"] . "', " . $_SESSION["id_usuario"] . ")";
 
  $conexion = conecta_base_datos();
  if (mysql_query($ssql)){
     echo "<p>Anuncio insertado correctamente!!!</p>";
	 }else{
	      echo "<p>Hubo un error al insertar el anuncio</p>";
		  
		  }
	}
	
    }else{
     //muestro el formulario

?>
<?php
muestra_usuario("usuario que esta insertando el anuncio:");
?>
<p>
        Desde esta pagina puedes enviar un anuncio al tablon.
</p>



<form action="<?php echo $_SERVER["PHP_SELF"]?>" method ="post">

<div class="campoform">
     Titulo del anuncio:
	 <br>
	 <input type="text" name="titulo_anuncio" size=35 maxlength="250">
</div>

<div class="campoform">
     Contenido del anuncio:
	 <br>
	 <textarea cols=30 rows=30 name="cuerpo_anuncio"></textarea>
</div>


<div class="campoform">
	  pais el que va dirigido:
	 <br>
	 <select name="id_pais">
		<?php
	       $ssql ="SELECT * FROM pais";
		   $rs = mysql_query($ssql);
		   while ($fila = mysql_fetch_array($rs)) {
		       //recorrido de registros
			   echo "<option value=" . $fila["id_pais"] . ">" . $fila["nombre_pais"] . "</option>";
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
   
     echo "<p>Para poder enviar anuncios tienes que ser usuario registrado.<p>";
     echo '<a href="registrarse.php"> Registrarse</a> | <a href="login.php">login</a>';
   
 
 }


//cerrar conexion con la base de datos 

mysql_close($conexion);

include("plantillas/pie.php");

?>