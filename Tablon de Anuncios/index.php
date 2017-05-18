<?php 
$raiz = "./";
include_once("librerias/variables-comunes.php");

$titulo_pagina = "Tablon de anuncios";
include("plantillas/cabecera.php");

?>

<p>
   Ultimos anuncios recibidos en la web
</p>
<?php


$ssql = "select * from anuncio, pais where anuncio.id_pais = pais.id_pais order by id_anuncio desc limit 5";


$conexion = conecta_base_datos();

$rs = mysql_query($ssql);
while ($fila = mysql_fetch_array($rs)){
 
      echo "<div class='lineaanunciooo'>";
	  
	  echo "<b>" . $fila["titulo_anuncio"] . "</b>";
	  echo "<br>";
	  echo $fila["cuerpo_anuncio"];
	  echo " <br>";
	  echo "Localizado en: " . $fila["nombre_pais"];
	  echo "</div>";

}


include("plantillas/pie.php");
?>





