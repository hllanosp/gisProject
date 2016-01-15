<?php 


	if(!isset($_SESSION)){
        session_start(); 
    }else{
        echo $_SESSION['organizacionId'];
    }
    
    if($_SESSION['organizacionId']){
        $organizacionid = $_SESSION['organizacionId'];
    }

    $organizacionid = $_SESSION['organizacionId'];
    

    require_once ("../../conexion/config.inc.php");

    $opcion = $_POST['opcion'];
	switch ($opcion) {
        case 0: 
            try{
                /* Cooperantes en general */
                $query = $db->prepare("CALL SP_OBTENER_COOPERANTES(@errorMensaje,@bandera)");
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila['cooperanteid'])),
                        "nombre" => htmlentities(utf8_encode($fila['nombre']))
                    );
                    
                    $contadorIteracion++;
                }

                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtener los cooperantes",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 1: 
            try{
                /* Cooperantes en una organizacion */
                $query = $db->prepare("CALL SP_OBTENER_COOPERANTES_ORGANIZACION(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$organizacionid, PDO::PARAM_STR); 
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila['cooperanteId'])),
                        "nombre" => htmlentities(utf8_encode($fila['nombre'])),
                        "tipo" => htmlentities(utf8_encode($fila['tipo'])),
                        "estado" => htmlentities(utf8_encode($fila['estado']))
                    );
                    
                    $contadorIteracion++;
                }

                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtener los cooperantes",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 2: 
            try{

                /* vincula Cooperantes en una organizacion */
                $cooperante = $_POST['cooperanteid'];
                $query = $db->prepare("CALL SP_INSERTAR_COOPERANTE_ORGANIZACION(?,?,@errorMensaje,@bandera)");
                $query->bindParam(1,$organizacionid, PDO::PARAM_STR);
                $query->bindParam(2,$cooperante, PDO::PARAM_STR);  
                $query->execute();
                $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
                $mensaje = $output['@mensajeError'];
                
                $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                $bandera = $output['@bandera']; 

                $json[0] = array(
                    "mensajeError" => $mensaje,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error en la vinculación",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 3: 
            $nombreCooperante = $_POST['nombre'];
            $nombreContacto = $_POST['nombreContacto'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            try{
                /* Insertar un nuevo cooperante Global */
                $query = $db->prepare("CALL SP_INSERTAR_COOPERANTE(?,?,?,?,@errorMensaje,@bandera)");
                $query->bindParam(1,$nombreCooperante, PDO::PARAM_STR);
                $query->bindParam(2,$nombreContacto, PDO::PARAM_STR);
                $query->bindParam(3,$email, PDO::PARAM_STR);  
                $query->bindParam(4,$telefono, PDO::PARAM_STR); 
                $query->execute();
                $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
                $mensaje = $output['@mensajeError'];
                
                $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                $bandera = $output['@bandera']; 

                $json[0] = array(
                    "mensajeError" => $mensaje,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error en la vinculación",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 4: 
            try{
                /* Cooperantes en una organizacion */
                $query = $db->prepare("CALL SP_OBTENER_TIPO_COOPERANTE(@errorMensaje,@bandera)");
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "nombre" => htmlentities(utf8_encode($fila['nombre'])),
                        "codigo" => htmlentities(utf8_encode($fila['codigo']))
                    );
                    
                    $contadorIteracion++;
                }

                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtener los cooperantes",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 5: 
            try{

                /* vincula Cooperantes en una organizacion */

                $nombre= $_POST["nombre"];
                $fechaConstitucion= $_POST["fechaConstitucion"];
                $RTN= $_POST["RTN"];
                $tipo= $_POST["tipoCombo"];
                $mision= $_POST["mision"];
                $areas= $_POST["areas"];
                $vision= $_POST["vision"];
                $query = $db->prepare("CALL SP_INSERTAR_COOPERANTE(?,?,?,?,?,?,?,@errorMensaje,@bandera)");
                $query->bindParam(1,$nombre, PDO::PARAM_STR);
                $query->bindParam(2,$fechaConstitucion, PDO::PARAM_STR); 
                $query->bindParam(3,$RTN, PDO::PARAM_STR);  
                $query->bindParam(4,$tipo, PDO::PARAM_STR);
                $query->bindParam(5,$mision, PDO::PARAM_STR);  
                $query->bindParam(6,$vision, PDO::PARAM_STR); 
                $query->bindParam(7,$areas, PDO::PARAM_STR);      
                $query->execute();
                $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
                $mensaje = $output['@mensajeError'];
                
                $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                $bandera = $output['@bandera']; 

                $json[0] = array(
                    "mensajeError" => $mensaje,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error en la vinculación",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 6: 
            try{

                /* vincula Cooperantes en una organizacion */
                $nombre= $_POST["nombre"];
                $query = $db->prepare("CALL SP_INSERTAR_TIPO_COOPERANTE(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$nombre, PDO::PARAM_STR);     
                $query->execute();
                $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
                $mensaje = $output['@mensajeError'];
                
                $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                $bandera = $output['@bandera']; 

                $json[0] = array(
                    "mensajeError" => $mensaje,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error en la vinculación",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 7: 
            try{
                /* vincula Cooperantes en una organizacion */
                $nombre= $_POST["nombre"];
                $apellido= $_POST["apellido"];
                $cargo= $_POST["cargo"];
                $email= $_POST["email"];
                $query = $db->prepare("CALL SP_INSERTAR_CONTACTO_COOPERANTE(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$nombre, PDO::PARAM_STR);  
                $query->bindParam(2,$apellido, PDO::PARAM_STR);  
                $query->bindParam(3,$cargo, PDO::PARAM_STR);  
                $query->bindParam(4,$email, PDO::PARAM_STR);     
                $query->execute();
                $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
                $mensaje = $output['@mensajeError'];
                
                $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                $bandera = $output['@bandera']; 

                $json[0] = array(
                    "mensajeError" => $mensaje,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error en la vinculación",
                    "bandera" => $bandera
                );
                echo json_encode($json);
            }
            break;
		default:
			break;
	}

 ?>