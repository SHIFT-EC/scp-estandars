<?php 

require_once('procesos.php');

/*VALIDACION DE CAMPOS INGRESADOS*/
$error_inputs=0;
foreach ($_POST as $key => $value) {
	if($value['req']=='required' && empty($value['val'])){
		$error_inputs=1;
	}else{
		$campos[$key]=clean_input($value['val']);
	}
}


//Validar que los campos estén llenos
if($error_inputs==0){
	
	try{	
		
		require_once('../inc/db.class.php');
		
		//VERIFICAR QUE NO EXISTA PREVIAMENTE
		try{
			$slprevio = $db->prepare("SELECT COUNT(id_registro) FROM reg_formacion WHERE mail=?");
			$slprevio->bindParam(1, $campos['email'], PDO::PARAM_STR);
			$slprevio->execute();
		}catch(Exception $e){
			//SI EL SELECT A LA BASE NO SE HIZO CORRECTAMENTE
			echo 'no encontro repetido '.$e;
			//presentarError();
			exit;
		}		
		//OBTENGO EL NUMERO DE INSCRITOS CON ESE CORREO
		$previo = $slprevio->fetchColumn();
		
		//SI NO EXISTE PREVIAMENTE INGRESAR EN LA BASE DE DATOS
		if($previo==0){
				
			if($campos['info']!='Si'){$info='No';}else{$info="Si";}
			
			try{
					$fecha=date('d/m/Y');
					$insercliente = $db->prepare("
					INSERT INTO reg_formacion (nombre, apellido, mail, telefono, celular, ciudad, info, comentarios, fecha_ingreso) VALUES 
					(?,?,?,?,?,?,?,?,'".$fecha."')");
					
					$insercliente->bindParam(1, $campos['nombre'], PDO::PARAM_STR);
					$insercliente->bindParam(2, $campos['apellido'], PDO::PARAM_STR);
					$insercliente->bindParam(3, $campos['email'], PDO::PARAM_STR);
					$insercliente->bindParam(4, $campos['telefono'], PDO::PARAM_STR);
					$insercliente->bindParam(5, $campos['celular'], PDO::PARAM_STR);
					$insercliente->bindParam(6, $campos['ciudad'], PDO::PARAM_STR);
					$insercliente->bindParam(7, $campos['info'], PDO::PARAM_STR);
					$insercliente->bindParam(8, $campos['comentarios'], PDO::PARAM_STR);
					$insercliente->execute();
				}
			catch(Exception $e){
					//SI EL INGRESO A LA BASE NO SE HIZO CORRECTAMENTE
					echo 'ingreso a la base malo '.$e;
					//presentarError();
					exit;
			}
			
			//SI NO HUBO ERRORES EN EL INGRESO ENVIO CORREO Y MANDO AL TYP
			enviarCorreo($campos['email'],$campos['nombre'].' '.$campos['apellido']);
			enviarLead($_POST);
			presentarTYP();
			
		}else{
			//SI SE INSCRIBIO ANTERIORMENTE SOLO ENVIAR CORREO Y PRESENTAR TYP
			enviarCorreo($campos['email'],$campos['nombre'].' '.$campos['apellido']);
			presentarTYP();
			exit;
		}
				
	//SI HUBO ALGUN ERROR EN EL TRANSCURSO DEL PROCESO
	}catch(Exception $e){
		echo 'proceso general '.$e;
		//presentarError();
		exit;
	}

//SI HUBO ERROR EN EL INGRESO DE LOS CAMPOS
}else{
	echo 'inputs';
	//presentarError();
	exit;
}


?>