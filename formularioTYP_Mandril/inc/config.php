<?php

    // valores de configuracion para todo el landing
	
	/*PARA ENVIO DE CORREOS*/
	define("MANDRILL_API_KEY","YSKOjCbeRLLZxo3pXJDxTw");
	define("CORREO_DESDE","empresa@hotmail.com"); //Correo de la empresa
	define("CORREO_LEAD","lead@hotmail.com"); //Correo a quien se le envia el lead
	define("NOMBRE_DESDE","Empresa");
	define("LOGO_DESDE","http://empresa.com/img/deco.png");
	define("SUBJECT","Gracias por contactarnos");
	define("SUBJECT_LEAD","Nuevo Registro");
	define("ORIGEN","landing-ubicacion");
	define("ACCION","scripts/contactar.php");
	
	
	/*PARA META TAGS*/	
	define("TITLE","Titulo pagina");
	define("DESCRIPCION","Descripcion de la pagina");
	define("AUTHOR","Marca");
	define("THUMBFB","http://empresa.com/img/thumbfacebook.jpg");
	
	/*CODIGOS DE CONVERSION Y SEGUIMIENTO*/	
	define("ANALYTICS","654123654");
	
	/*DB*/
	define("DB_HOST","localhost");
	define("DB_NAME","base");
	define("DB_USER","user");
	define("DB_PASS","clave");
	define("DB_PORT","3306");
	
	