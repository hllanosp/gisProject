<?php 
	include("config.inc.php");

	/* Este archivo recibe como parametro el usuario y la accion que realizo para ser ingresado a la bitacora */
	
	try{

        $usuario = $_POST['usuario'];
        $accion = $_POST['accion'];
		/* Hacemos el llamado a la consulta para ingresar a la tabla de bitacora */
		$sql = "CALL SP_REGISTRAR_BITACORA_USUARIO(?,?,@messajeError)";
		$query1 = $db->prepare($sql);
    	$query1->bindParam(1,$usuario,PDO::PARAM_STR);
    	$query1->bindParam(2,$accion,PDO::PARAM_STR);
    	$query1->execute();

    	$output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
        $mensaje = $output['@mensajeError'];

    	if(is_null(($mensaje))){
    		echo $mensaje;

    	}else{
    		echo $mensaje;
    	}	
    }catch(PDOExecption $e){

        echo $mensaje;
    }

 ?>