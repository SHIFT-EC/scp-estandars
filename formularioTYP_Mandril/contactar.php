<?php


function presentarError(){
	header("Location: error.html");
}

function presentarTYP(){
	header("Location: gracias.html");
}

function enviarCorreo($correoCliente,$nombreCliente){
	
	require_once("inc/correo_mandrill.class.php");

	 	$from="zhumirecuador@gmail.com";
		//$to="nata_r10@hotmail.com";
		$empresa = "Zhumir Deco";
		$logo="http://zhumirplay.com/deco/img/deco.png";
		$tema="¡Ya estás participando por el kit Deco!";
		$mensaje="			
			<div style='width:600px; border:solid thin #00B085;'>					
				<table style='width:100%'>
					<tr>
						<td width='40%'>
							<img width='100%' src='".$logo."' />
						</td>
						<td width='60%'>
							<p style='padding:20px;'>
								Gracias por participar ".$_POST['nombre'].", sortearemos 5 kit Deco Margarita. Los ganadores ser&aacute;n anunciados v&iacute;a telef&oacute;nica 
								la segunda semana de febrero.
								<br><br>
								Equipo Zhumir Deco Margarita<br>
							</p>
						</td>
					</tr>
				</table>				
			</div>			
		";

		enviar($tema, $empresa, $mensaje, $from, $correoCliente, $nombreCliente, "sinadjunto", "ladingDeco/contactar.php");	
}

//Validar que los campos estén llenos

if(
(isset($_POST['nombre']) && !empty($_POST['nombre'])) && 
(isset($_POST['apellido']) && !empty($_POST['apellido'])) && 
(isset($_POST['email']) && !empty($_POST['email'])) && 
(isset($_POST['fecha']) && !empty($_POST['fecha']))
){
	
	try{	
		
		require_once('inc/db.class.php');
		
		//VERIFICAR QUE NO EXISTA PREVIAMENTE
		try{
			$slprevio = $db->prepare("SELECT COUNT(id) FROM tbl_deco_margarita WHERE pr_email=?");
			$slprevio->bindParam(1, $_POST['email'], PDO::PARAM_STR);
			$slprevio->execute();
		}catch(Exception $e){
			//SI EL SELECT A LA BASE NO SE HIZO CORRECTAMENTE
			presentarError();
			exit;
		}		
		//OBTENGO EL NUMERO DE INSCRITOS CON ESE CORREO
		$previo = $slprevio->fetchColumn();
		
		//SI NO EXISTE PREVIAMENTE INGRESAR EN LA BASE DE DATOS
		if($previo==0){
				
			if($_POST['info']!='Si'){$info='No';}else{$info="Si";}
			
			try{
					$fecha=date('d/m/Y');
					$insercliente = $db->prepare("
					INSERT INTO tbl_deco_margarita (pr_nombre, pr_apellido, pr_email, pr_fecha, pr_info, pr_fecha_ingreso) VALUES 
					(?,?,?,?,'".$fecha."',?)");
					
					$insercliente->bindParam(1, $_POST['nombre'], PDO::PARAM_STR);
					$insercliente->bindParam(2, $_POST['apellido'], PDO::PARAM_INT);
					$insercliente->bindParam(3, $_POST['email'], PDO::PARAM_STR);
					$insercliente->bindParam(4, $_POST['fecha'], PDO::PARAM_STR);
					$insercliente->bindParam(5, $info, PDO::PARAM_STR);
					$insercliente->execute();
				}
			catch(Exception $e){
					//SI EL INGRESO A LA BASE NO SE HIZO CORRECTAMENTE
					presentarError();
					exit;
			}
			
			//SI NO HUBO ERRORES EN EL INGRESO ENVIO CORREO Y MANDO AL TYP
			enviarCorreo($_POST['email'],$_POST['nombre'].' '.$_POST['apellido']);
			presentarTYP();
			
		}else{
			//SI SE INSCRIBIO ANTERIORMENTE SOLO ENVIAR CORREO Y PRESENTAR TYP
			enviarCorreo($_POST['email'],$_POST['nombre'].' '.$_POST['apellido']);
			presentarTYP();
			exit;
		}
				
	//SI HUBO ALGUN ERROR EN EL TRANSCURSO DEL PROCESO
	}catch(Exception $e){
		presentarError();
		exit;
	}

//SI HUBO ERROR EN EL INGRESO DE LOS CAMPOS
}else{
	presentarError();
	exit;
}


?>