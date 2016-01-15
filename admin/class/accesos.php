<?php 

	include("config.inc.php");

		/* Recibe como parametro el privilegio asosciodo a un usuario, y la pantalla la cual se queire
           verificar si tiene o no acceso a controles */

        $usuario = $_POST('suario');
        $pantalla = $_POST('pantalla');
        /* Hacemos el llamado a la consulta par obtener los permisos del determinado usuario */
			$sql = "CALL SP_OBTENER_PERMISOS(?,?,@messajeError,@tienePermiso)";
			$query1 = $db->prepare($sql);
    		$query1->bindParam(1,$usuario,PDO::PARAM_STR);
    		$query1->bindParam(2,$pantalla,PDO::PARAM_STR);
    		$query1->execute();
    		$output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
        	$mensaje = $output['@mensajeError'];

        	$output1 = $db->query("select @tienePerimos")->fetch(PDO::FETCH_ASSOC);
        	$tienePermiso = $output1['@tienePermiso'];

        	$json = array(
	    				"tienePermiso" => $tienePermiso,
	    				"mensajeError" => $mensaje
	    			);
	    	echo json_encode($json);     		
?>
