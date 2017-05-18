<!DOCTYPE>

<html lang="en">
<head>
   <title>
   <?php
   if (isset($titulo_pagina)){
       echo $titulo_pagina;
	}else{
	    echo"pagina sin titulo";
    }
	?></title>
	<link rel="STYLESHEET" type="text/css" href="estilo.css">
	</head>
	
	<body>
	<div id="contenedor">
	     <div id="portada"></div>
		 <div id ="navegador">
		     <div id ="navegadorederecha">
		      <?php 
			  if(estas_autenticado()){
			  
			  
			   echo '<a href="misanuncios.php">Mis anuncios</a> | '; 
			   echo '<a href="salir.php">Salir</a>';  
			      			  			   			 		         			    
	  }else{
			  
                 echo '<a href="login.php">Login</a>';
			 }
			  ?>
			  </div>	
			  <a href="<?php echo $raiz;?>" class="enlacenav">Portada</a>
		      <a href="<?php echo $raiz;?>enviar_anuncio.php" class="enlacenav">Enviar anuncio</a>
			  <a href="<?php echo $raiz;?>registrarse.php" class="enlacenav">Registrarse</a>
			  
		</div>
		<div id="cuerpo">
		   <h1><?php 
		   if (isset($titulo_pagina)){
		       echo $titulo_pagina;
			}else{  
			     echo "Pagina sin titulo";
			}
			?></h1>
	</body>
	
	</html>
	  