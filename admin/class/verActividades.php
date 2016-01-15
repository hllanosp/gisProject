<?php
    
    session_start(); 

    $organizacionid = $_SESSION['organizacionId'];
    require_once ("config.inc.php");

    $opcion = $_POST['opcion'];

    switch($opcion){

        case 0: 

            try{
                /* Obtiene todas las actividades referentes a un proyecto */

                $proyecto = $_POST['proyecto'];
                $query = $db->prepare("CALL SP_OBTENER_ACTIVIDADES(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$proyecto, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "nombre" => $fila['nombre'],
                        "descripcion" => $fila['descripcion'],
                        "codigo" => $fila['codigo'],
                        "responsable" => $fila['responsable'] 
                    );
                    
                    $contadorIteracion++;
                }

                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtener el proyecto",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 1: 

            try{
                /* Inserta el presupuesto a una actividad */

                $proyecto = $_POST['proyectoid'];
                $actividad = $_POST['actividadid'];
                $monto = $_POST['monto'];
                $fondo = $_POST['fondoid'];
                $query = $db->prepare("CALL SP_INSERTAR_ACTIVIDAD_FONDOPROYECTO(?,?,?,?,@errorMensaje,@bandera)");
                $query->bindParam(1,$proyecto, PDO::PARAM_STR);
                $query->bindParam(2,$actividad, PDO::PARAM_STR);
                $query->bindParam(3,$monto, PDO::PARAM_STR);
                $query->bindParam(4,$fondo, PDO::PARAM_STR);
                $query->execute();

                $output = $db->query("select @errorMensaje")->fetch(PDO::FETCH_ASSOC);
                $mensaje = $output['@errorMensaje'];
                
                $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                $bandera = $output['@bandera']; 

                $json[0] = array(
                    "mensajeError" => $mensaje,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);

            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtner el equipo",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 2: 

            try{
                /* Obtiene todas las actividades referentes a un proyecto */
                $actividad = $_POST['actividad'];
                $query = $db->prepare("CALL SP_OBTENER_PRESUPUESTO_ACTIVIDAD(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$actividad, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "origen" => $fila['origen'],
                        "monto" => $fila['monto'] 
                    );
                    $contadorIteracion++;
                }

                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtener el presupuesto",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 3: 

            try{
                /* Obtiene todas las actividades referentes a un proyecto */
                $actividad = $_POST['actividad'];
                $query = $db->prepare("CALL SP_OBTENER_FASES_ACTIVIDAD(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$actividad, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => $fila['codigo'],
                        "nombre" => $fila['nombre'],
                        "descripcion" => $fila['descripcion'],
                        "fechaInicio" => $fila['fechaInicio'],
                        "fechaFin" => $fila['fechaFin']    
                    );
                    $contadorIteracion++;
                }

                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtener el presupuesto",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;

        case 4: 
            try{
                /* Inserta el presupuesto a una actividad */

                $actividad = $_POST['actividadid'];
                $fechaInicio = $_POST['fechaInicio'];
                $fechaFin = $_POST['fechaFin'];
                $descripcion = $_POST['descripcion'];
                $nombre = $_POST['nombre'];
                $query = $db->prepare("CALL SP_INSERTAR_FASE_ACTIVIDAD(?,?,?,?,?,@errorMensaje,@bandera)");
                $query->bindParam(1,$actividad, PDO::PARAM_STR);
                $query->bindParam(2,$fechaInicio, PDO::PARAM_STR);
                $query->bindParam(3,$fechaFin, PDO::PARAM_STR);
                $query->bindParam(4,$nombre, PDO::PARAM_STR);
                $query->bindParam(5,$descripcion, PDO::PARAM_STR);
                $query->execute();

                $output = $db->query("select @errorMensaje")->fetch(PDO::FETCH_ASSOC);
                $mensaje = $output['@errorMensaje'];
                
                $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                $bandera = $output['@bandera']; 

                $json[0] = array(
                    "mensajeError" => $mensaje,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);

            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtner el equipo",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 5: 
            try{
                /* Inserta el responsable de un actividad */

                $empleado = $_POST['empleado'];
                $actividad = $_POST['actividad'];
                $proyecto = $_POST['proyecto'];
                $query = $db->prepare("CALL SP_INSERTAR_RESPONSABLE_ACTIVIDAD(?,?,?,@errorMensaje,@bandera)");
                $query->bindParam(1,$empleado, PDO::PARAM_STR);
                $query->bindParam(2,$actividad, PDO::PARAM_STR);
                $query->bindParam(3,$proyecto, PDO::PARAM_STR);
                $query->execute();

                $output = $db->query("select @errorMensaje")->fetch(PDO::FETCH_ASSOC);
                $mensaje = $output['@errorMensaje'];
                
                $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                $bandera = $output['@bandera']; 

                $json[0] = array(
                    "mensajeError" => $mensaje,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);

            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtner el equipo",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 6: 
            try{
                /* Inserta una actividad */
                $proyectoid = $_POST['proyectoid'];
                $monto = $_POST['monto'];
                $cuenta = $_POST['cuenta'];
                $numeroActividad = $_POST['numeroActividad'];
                $descripcionActividad = $_POST['descripcionActividad'];
                $nombre = $_POST['nombre'];
                $producto= $_POST['producto'];
                $query = $db->prepare("CALL SP_INSERTAR_ACTIVIDAD(?,?,?,?,?,?,?,?,@errorMensaje,@bandera)");
                $query->bindParam(1,$organizacionid, PDO::PARAM_STR);
                $query->bindParam(2,$cuenta, PDO::PARAM_STR);
                $query->bindParam(3,$proyectoid, PDO::PARAM_STR);
                $query->bindParam(4,$monto, PDO::PARAM_STR);
                $query->bindParam(5,$descripcionActividad, PDO::PARAM_STR);
                $query->bindParam(6,$numeroActividad, PDO::PARAM_STR);
                $query->bindParam(7,$nombre, PDO::PARAM_STR);
                $query->bindParam(8,$producto, PDO::PARAM_STR);
                $query->execute();

                $output = $db->query("select @errorMensaje")->fetch(PDO::FETCH_ASSOC);
                $mensaje = $output['@errorMensaje'];
                
                $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                $bandera = $output['@bandera']; 

                $json[0] = array(
                    "mensajeError" => $mensaje,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);

            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtner el equipo",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 7: 
            try{
                /* Inserta una actividad */
                $actividad = $_POST['actividad'];
                $subActividad = $_POST['subActividad'];
                $fechaElaboracion = $_POST['fechaElaboracion'];
                $fechaRealizacion = $_POST['fechaRealizacion'];
                $introduccion = $_POST['introduccion'];
                $objetivoActividad = $_POST['objetivoActividad'];
                $resultados= $_POST['resultados'];
                $concluciones = $_POST['concluciones'];
                $principalesResultados = $_POST['principalesResultados'];
                $medicionResultados = $_POST['medicionResultados'];
                $query = $db->prepare("CALL SP_INSERTAR_RESULTADO(?,?,?,?,?,?,?,?,?,?,@errorMensaje,@bandera)");
                $query->bindParam(1,$actividad, PDO::PARAM_STR);
                $query->bindParam(2,$subActividad, PDO::PARAM_STR);
                $query->bindParam(3,$fechaElaboracion, PDO::PARAM_STR);
                $query->bindParam(4,$fechaRealizacion, PDO::PARAM_STR);
                $query->bindParam(5,$introduccion, PDO::PARAM_STR);
                $query->bindParam(6,$objetivoActividad, PDO::PARAM_STR);
                $query->bindParam(7,$resultados, PDO::PARAM_STR);
                $query->bindParam(8,$concluciones, PDO::PARAM_STR);
                $query->bindParam(9,$principalesResultados, PDO::PARAM_STR);
                $query->bindParam(10,$medicionResultados, PDO::PARAM_STR);
                $query->execute();

                $output = $db->query("select @errorMensaje")->fetch(PDO::FETCH_ASSOC);
                $mensaje = $output['@errorMensaje'];
                
                $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                $bandera = $output['@bandera']; 

                $json[0] = array(
                    "mensajeError" => $mensaje,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);

            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al insertar los resultados",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        default:
            break;
        }

?>