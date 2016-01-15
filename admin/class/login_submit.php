<?php 
	
    if(!isset($_SESSION)){
        session_start(); 
    }
	
	require_once("../../conexion/config.inc.php");    

	try{

        $LoginUsuario = $_POST['usuario'];
        $LoginPassword = $_POST['contrasena'];
        $stmt = $db->prepare("CALL SP_LOGIN(?,?,@mensajeError,@bandera)");
        $stmt->bindParam(1, $LoginUsuario, PDO::PARAM_STR); 
    	$stmt->bindParam(2, $LoginPassword, PDO::PARAM_STR);
    	$stmt->execute();

    	$output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
        $mensaje = $output['@mensajeError'];

        $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
    	$bandera = $output['@bandera'];	

        if($bandera){
    		$stmt = $db->prepare("SELECT organizacionId,empleadoId,p_nombre,p_apellido FROM tbl_empleado WHERE correo_electronico ='".$LoginUsuario."'");
            $stmt -> execute();
    		$result = $stmt->fetchAll();
    		foreach($result as $fila){

    			$_SESSION['organizacionId'] = $fila['organizacionId']; 
    			$_SESSION['empleadoId'] = $fila['empleadoId'];
    			$_SESSION['nombre'] = $fila['p_nombre']." ".$fila['p_apellido'];
    		}
            $stmt = $db->prepare(" CALL SP_OBTENER_ORGANIZACION_LOGEADA(?,@mensajeError,@bandera)");
            $stmt->bindParam(1, $LoginUsuario, PDO::PARAM_STR); 
            $stmt -> execute();
            $result = $stmt->fetchAll();
            foreach($result as $fila){

                $_SESSION['correo'] = $fila['correo']; 
                $_SESSION['web'] = $fila['direccionWeb'];
                $_SESSION['telefono'] = $fila['telefono'];
                $_SESSION['nombre'] = $fila['nombre']." ".$fila['apellido'];
            }
        }

    $json[0] = array(
		"mensajeError" => $mensaje,
		"bandera" => $bandera
	);

	echo json_encode($json);

	}catch(PDOExecption $e){
		$json[0] = array(
			"mensajeError" => "La conexión con el sevidor no fue exitosa, por favor trate de ingresar dentro de unos segundos",
			"badnera" => $bandera
	);

        echo json_encode($json);
	}
?>