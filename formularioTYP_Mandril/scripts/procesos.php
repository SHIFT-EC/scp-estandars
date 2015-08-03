<?php

require_once "../inc/config.php";
require_once("../inc/correo_mandrill.class.php");
	
function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = utf8_decode($data);
  $data = htmlspecialchars($data);
  return $data;
}

function presentarError(){
	header("Location: ../error.php");
}

function presentarTYP(){
	header("Location: ../gracias.php");
}

function enviarCorreo($correoCliente,$nombreCliente){
	

		$mensaje="			
			<div style='width:600px; border:solid thin #00B085;'>					
				<table style='width:100%'>
					<tr>
						<td width='40%'>
							<img width='100%' src='".LOGO_DESDE."' />
						</td>
						<td width='60%'>
							<p style='padding:20px;'>
								Gracias por participar ".$nombreCliente.", sortearemos 5 kit Deco Margarita. Los ganadores ser&aacute;n anunciados v&iacute;a telef&oacute;nica 
								la segunda semana de febrero.
								<br><br>
								".NOMBRE_DESDE."<br>
							</p>
						</td>
					</tr>
				</table>				
			</div>			
		";

		enviar(SUBJECT, NOMBRE_DESDE, $mensaje, CORREO_DESDE, $correoCliente, $nombreCliente, "sinadjunto", ORIGEN);
}


function enviarLead($post){

		$mensaje="			
			<div style='width:600px; border:solid thin #00B085;'>					
				<table style='width:100%'>
					<tr>
						<td width='40%'>
							<img width='100%' src='".LOGO_DESDE."' />
						</td>
						<td width='60%'>
							<p style='padding:20px;'>
								Se ha recibido un nuevo registro, los datos son los siguientes.<br><br>";
		//IMPRIMIR LOS CAMPOS DEL LEAD
		foreach ($post as $key => $value) {
			$mensaje.=strtoupper($key).': '.$value['val'].'<br>';
		}
		
		$mensaje.="
								<br><br>
								".NOMBRE_DESDE."<br>
							</p>
						</td>
					</tr>
				</table>				
			</div>			
		";
		
		enviar(SUBJECT_LEAD, NOMBRE_DESDE, $mensaje, CORREO_DESDE, CORREO_LEAD, NOMBRE_DESDE, "sinadjunto", ORIGEN);
}


?>