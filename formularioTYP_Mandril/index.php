
  <?php include_once('inc/sections/header.php'); ?>

  <!-- COLOCAR AQUI CODIGOS EXTRA SI LOS HAY -->  
	
  </head>
  <body>
  	
  	<div class="row">
      <div class="large-12 columns centrado">
        <h1>TITULO PAGINA</h1>
      </div>
    </div>
    
    <div class="row">    
      
      <div class="large-6 columns formulario centrado">
		<h2>INGRESA TUS DATOS</h2>
		
		<form action="<?php echo htmlspecialchars(ACCION);?>" id="contacto" name="contacto" method="post" enctype="multipart/form-data">
			  <div class="row">
			    <div class="large-5 columns">
			      <label for="nombre">*Nombre:</label>
			    </div>
			    <div class="large-7 columns">
			      <input class="required" id="nombre" name="nombre[val]" type="text" maxlength="100" minlength="2" />			      
			      <input name="nombre[req]" type="hidden" value="required" />
			    </div>
			  </div>
			  <div class="row">
			    <div class="large-5 columns">
			      <label for="apellido">*Apellido:</label>
			    </div>
			    <div class="large-7 columns">
			      <input class="required" id="apellido" name="apellido[val]" type="text" maxlength="100" minlength="2" />			      
			      <input name="apellido[req]" type="hidden" value="required" />
			    </div>
			  </div>
			  <div class="row">
			    <div class="large-5 columns">
			      <label for="telefono">*Tel&eacute;fono:</label>
			    </div>
			    <div class="large-7 columns">
			      <input class="required" id="telefono" name="telefono[val]" type="text" maxlength="20" minlength="7" />			      
			      <input name="telefono[req]" type="hidden" value="required" />
			    </div>
			  </div>
			  <div class="row">
			    <div class="large-5 columns">
			      <label for="celular">*Celular:</label>
			    </div>
			    <div class="large-7 columns">
			      <input class="required" id="celular" name="celular[val]" type="text" maxlength="40" minlength="10" />			      
			      <input name="celular[req]" type="hidden" value="required" />
			    </div>
			  </div>	
			  <div class="row">
			    <div class="large-5 columns">
			      <label for="email">*Email:</label>
			    </div>
			    <div class="large-7 columns">
			      <input class="required email" id="email" name="email[val]" type="email" maxlength="150" minlength="8" />			      
			      <input name="email[req]" type="hidden" value="required" />
			    </div>
			  </div>	
			  <div class="row">
			    <div class="large-5 columns">
			      <label for="ciudad">*Ciudad:</label>
			    </div>
			    <div class="large-7 columns">
			      <input class="required" id="ciudad" name="ciudad[val]" type="text" maxlength="150" minlength="2" />			      
			      <input name="ciudad[req]" type="hidden" value="required" />
			    </div>
			  </div>	
			  <div class="row">
			    <div class="large-5 columns">
			      <label for="comentarios">*Comentarios:</label>
			    </div>
			    <div class="large-7 columns">
			      <textarea class="required" id="comentarios" name="comentarios[val]" maxlength="300" minlength="5" ></textarea>			      
			      <input name="comentarios[req]" type="hidden" value="required" />
			    </div>
			  </div>	
			  <div class="row">
			    <div class="large-12 columns" style="text-align: right;">
			      <input type="checkbox" name="info[val]" id="info" value="Si" />	      
			      <input name="info[req]" type="hidden" value="notrequired" />
			      <label for="info">Deseo recibir informaci&oacute;n.</label>
			    </div>
			  </div>	
			  <div class="row">			   
			    <div class="large-12 columns" id="boton">
			      <input type="submit" class="medium button" value="ENVIAR" />			      
			    </div>
			  </div>			  
		</form>			
		
      </div>
      
      <div class="large-6 columns hide-for-small-only centrado">
      	<img src="img/deco.png" />
      </div>
      
    </div>    
    
    
  <?php include_once('inc/sections/footer.php'); ?>
  
  <!-- COLOCAR AQUI CODIGOS DE CONVERSION SI LOS HAY -->
  
  </body>
</html>