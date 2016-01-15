<?php 
	session_start(); 

    $organizacionid = $_SESSION['organizacionId'];
    require_once ("../../conexion/config.inc.php");

    $opcion = $_POST['opcion'];

    switch($opcion){

        case 0: 
            $proyecto = $_POST['proyectoid']; 
            try{
                /* Obtiene el ultimo proyecto creado por una organizacion */
                $query = $db->prepare("CALL SP_OBTENER_FASES_SEGUIMIENTO(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$proyecto, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila['codigo'])),
                        "nombre" => htmlentities(utf8_encode($fila['nombre'])),
                        "estado" => htmlentities(utf8_encode($fila['estado'])),
                        "informe" => htmlentities(utf8_encode($fila['informe'])),
                        "informeId" => htmlentities(utf8_encode($fila['informeId'])),
                        "estadoId" => htmlentities(utf8_encode($fila['estadoId'])),
                        "accion" => htmlentities(utf8_encode($fila['accion'])),
                        "actividad" => htmlentities(utf8_encode($fila['actividadId']))
                    );
                    
                    $contadorIteracion++;
                }

                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtener las fases",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 1: 
            $fase = $_POST['fase']; 
            try{
                /* Obtiene el ultimo proyecto creado por una organizacion */
                $query = $db->prepare("CALL SP_OBTENER_FASE_RESULTADO(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$fase, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila['codigo'])),
                        "nombre" => htmlentities(utf8_encode($fila['nombre'])),
                        "codigoActividad" => htmlentities(utf8_encode($fila['codigoActividad'])),
                        "nombreActvidad" => htmlentities(utf8_encode($fila['nombreActvidad'])),
                        "programacionInicial" => htmlentities(utf8_encode($fila['programacionInicial'])),
                        "fechaRealizacion" => htmlentities(utf8_encode($fila['fechaRealizacion']))
                    );
                    
                    $contadorIteracion++;
                }

                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtener las fases",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 2: 
            $fase = $_POST['fase']; 
            try{
                /* Obtiene el ultimo proyecto creado por una organizacion */
                $query = $db->prepare("CALL SP_OBTENER_FASE_SEGUIMIENTO(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$fase, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila['codigo'])),
                        "nombre" => htmlentities(utf8_encode($fila['nombre'])),
                        "estado" => htmlentities(utf8_encode($fila['estado'])),
                        "codigoActividad" => htmlentities(utf8_encode($fila['codigoActividad'])),
                        "nombreActividad" => htmlentities(utf8_encode($fila['nombreActividad'])),
                        "descripcion" => htmlentities(utf8_encode($fila['descripcion'])),
                        "programacionInicial" => htmlentities(utf8_encode($fila['programacionInicial'])),
                        "programacionReal" => htmlentities(utf8_encode($fila['programacionReal'])),
                        "fechaRealizacion" => htmlentities(utf8_encode($fila['fechaRealizacion']))
                    );
                    
                    $contadorIteracion++;
                }

                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtener las fases",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 3: 
            $tipo = $_POST['tipoCambiado']; 
            $fecha = $_POST['fecha'];
            $fase = $_POST['fase'];  
            try{
                /* Obtiene el ultimo proyecto creado por una organizacion */
                $query = $db->prepare("CALL SP_MODIFICAR_ESTADO_FASES(?,?,?,@errorMensaje,@bandera)");
                $query->bindParam(1,$fase, PDO::PARAM_STR);
                $query->bindParam(2,$tipo, PDO::PARAM_STR);
                $query->bindParam(3,$fecha, PDO::PARAM_STR);
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
                    "mensajeError" => "Hubo un error al obtener las fases",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 4: 
            $fase = $_POST['fase']; 
            try{
                /* Obtiene el ultimo proyecto creado por una organizacion */
                $query = $db->prepare("CALL SP_OBTENER_PRODUCTOS_SEGUIMIENTO(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$fase, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila['codigo'])),
                        "descripcion" => htmlentities(utf8_encode($fila['descripcion']))
                    );
                    
                    $contadorIteracion++;
                }

                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtener las fases",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 5:
            // Obtiene las fases de una determinada actividad
            $actividad = $_POST['proyectoid'];
           try{

                $query = $db->prepare("CALL SP_OBTENER_FASES_ACTIVIDAD_SEGUIMIENTO(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$proyectoid, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila['codigo'])),
                        "nombre" => htmlentities(utf8_encode($fila['nombre'])),
                        "fechaInicio" => $fila['fechaInicio'],
                        "fechaInicioReal" => $fila['fechaInicioReal']
                    );
                    
                    $contadorIteracion++;
                }

                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtener los productos por componente",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 6:
            
            $resultados = $_POST['resultados'];
            $concluciones = $_POST['concluciones'];
            $objetivos = $_POST['objetivos'];
            $introduccion = $_POST['introduccion'];
            $fase = $_POST['fase'];
            $actividad = $_POST['actividad'];

           try{

                $query = $db->prepare("CALL SP_INSERTAR_INFORME_SEGUIMIENTO(?,?,?,?,?,?,@errorMensaje,@bandera)");
                $query->bindParam(1,$fase, PDO::PARAM_STR);
                $query->bindParam(2,$actividad, PDO::PARAM_STR);
                $query->bindParam(3,$introduccion, PDO::PARAM_STR);
                $query->bindParam(4,$objetivos, PDO::PARAM_STR);
                $query->bindParam(5,$resultados, PDO::PARAM_STR);
                $query->bindParam(6,$concluciones, PDO::PARAM_STR);
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
                    "mensajeError" => "Hubo un error al obtener los productos por componente",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        default:
            break;
        }


 ?>