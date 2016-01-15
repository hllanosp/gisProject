

<?php
    if(!isset($_SESSION)){
        session_start(); 
    }else{
        echo $_SESSION['organizacionId'];
    }
    
    if($_SESSION['organizacionId']){
        $organizacionid = $_SESSION['organizacionId'];
    }

    require_once ("../../conexion/config.inc.php");

    $opcion = $_POST['opcion'];
    // $proyectoid = $_POST['proyectoId'];


    switch($opcion){
        // -------------------------------------------------------------------------------//
        case 6: 
            
            try{
                        // se obtinen todos los datos del perfil de la organizacion   SP_OBTENER_PERFIL
                        $query = $db->prepare("CALL SP_OBTENER_PERFIL(?,@errorMensaje,@bandera)");
                        $query->bindParam(1,$organizacionid, PDO::PARAM_STR);
                        
                        $query->execute();
                        $result = $query->fetchAll();
                        $json = array();

                        $contadorIteracion = 1;
                        foreach($result as $fila){ 
                            $json[$contadorIteracion] = array(
                                "organizacion_ID" => $organizacionid,
                                "nombre" => htmlentities(utf8_encode($fila['nombre'])),
                                "pais" => htmlentities(utf8_encode($fila['pais'])),
                                "departamento" => htmlentities(utf8_encode($fila['departamento'])),
                                "municipio" => htmlentities(utf8_encode($fila['municipio'])),
                                "actividad" => htmlentities(utf8_encode($fila['actividad'])),
                                "vision" => htmlentities(utf8_encode($fila['vision'])),
                                "mision" => htmlentities(utf8_encode($fila['mision'])),
                                
                                
                                "numero_registro" => htmlentities(utf8_encode($fila['numero_registro'])),
                                "fechaConstitucion" => htmlentities(utf8_encode($fila['fechaConstitucion'])),
                                "RTN" => htmlentities(utf8_encode($fila['RTN'])),
                                "presidente" => htmlentities(utf8_encode($fila['presidente'])),
                                "vicePresidente" => htmlentities(utf8_encode($fila['vicePresidente'])),
                                "secretario" => htmlentities(utf8_encode($fila['secretario'])),
                                "tesorero" => htmlentities(utf8_encode($fila['tesorero'])),
                                "fiscal" => htmlentities(utf8_encode($fila['fiscal'])),
                                "vocalI" => htmlentities(utf8_encode($fila['vocalI'])),
                                "vocalII" => htmlentities(utf8_encode($fila['vocalII'])),
                                "apoderadoLegal" => htmlentities(utf8_encode($fila['apoderadoLegal'])),
                                "directorEjecutivo" => htmlentities(utf8_encode($fila['directorEjecutivo'])),
                                "direccion" => htmlentities(utf8_encode($fila['direccion'])),
                                "telefono1" => htmlentities(utf8_encode($fila['telefono1'])),
                                "telefono2" => htmlentities(utf8_encode($fila['direccio2'])),
                                "celular" => htmlentities(utf8_encode($fila['celular'])),
                                "email" => htmlentities(utf8_encode($fila['email'])),
                                "web" => htmlentities(utf8_encode($fila['web'])),
                                "urlFacebook" => htmlentities(utf8_encode($fila['urlFacebook'])),
                                "urlTwitter" => htmlentities(utf8_encode($fila['urlTwitter'])),
                                "urlYoutube" => htmlentities(utf8_encode($fila['urlYoutube'])),
                                "urlLinkedin" => htmlentities(utf8_encode($fila['urlLinkedin'])),
                                "urlInstagram" => htmlentities(utf8_encode($fila['urlInstagram'])),
                                "urlFacebook" => htmlentities(utf8_encode($fila['urlFacebook'])),
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

         // -------------------------------------------------------------------------------//

      

        case 1 ://caso de prueba NO VALIDO
            try{
                echo "se modifico el perfil organizacionl";
            //     $directorProyecto = $_POST['directorProyecto'];
            //     $administradorProyecto = $_POST['administradorProyecto'];
            //     $proyectoid = $_POST['proyectoid'];
            //     $stmt = $db->prepare("CALL SP_INSERTAR_MIEMBROS_EQUIPO(?,?,?,@mensajeError,@bandera)");

            //     $stmt->bindParam(1, $directorProyecto, PDO::PARAM_STR); 
            //     $stmt->bindParam(2, $administradorProyecto, PDO::PARAM_STR); 
            //     $stmt->bindParam(3, $proyectoid, PDO::PARAM_STR);  
            //     $stmt->execute();
                
            //     $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
            //     $mensaje = $output['@mensajeError'];
                
            //     $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
            //     $bandera = $output['@bandera']; 
                
            //     $json[0] = array(
            //         "mensajeError" => $mensaje,
            //         "bandera" => $bandera
            //     );
                
            //     echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => $mensaje,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;

            
             // -------------------------------------------------------------------------------//
        case 0: //caso de prueba NOVALIDO
            $proyectoid = $_POST['proyectoId'];

            
            try{
                        // se obtinen todos los datos del perfil de la organizacion   SP_OBTENER_PERFIL
                        $query = $db->prepare("CALL SP_OBTENER_PROYECTO(?,?,@errorMensaje,@bandera)");
                        $query->bindParam(1,$organizacionid, PDO::PARAM_STR);
                        $query->bindParam(2,$proyectoid, PDO::PARAM_STR);
                        $query->execute();
                        $result = $query->fetchAll();
                        $json = array();

                        $contadorIteracion = 1;
                        foreach($result as $fila){ 
                            $json[$contadorIteracion] = array(
                                "nombre" => htmlentities(utf8_encode($fila['nombre'])),
                                "descripcion" => htmlentities(utf8_encode($fila['descripcion'])),
                                "zona" => htmlentities(utf8_encode($fila['zona'])),
                                "inicio" => htmlentities(utf8_encode($fila['inicio'])),
                                "fin" => htmlentities(utf8_encode($fila['fin'])),
                                "objetivo" => htmlentities(utf8_encode($fila['objetivo'])),
                                "beneficiarios" => htmlentities(utf8_encode($fila['beneficiarios'])),
                                "eje" => htmlentities(utf8_encode($fila['eje'])),
                                "area" => htmlentities(utf8_encode($fila['area'])),
                                "economico" => htmlentities(utf8_encode($fila['economico'])),
                                "institucional" => htmlentities(utf8_encode($fila['institucional'])),

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

        case 3: 
            try{
                // se modificaran todos los datos del perfil de la organizacion   SP_MODIFICAR_PERFIL
               
                   
                    $query = $db->prepare("CALL SP_MODIFICAR_PERFIL(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,@errorMensaje,@bandera)");

                    // $query->bindParam(1, $_POST['nombre'] , PDO::PARAM_STR);
                    // $query->bindParam(2, $_POST['pais'], PDO::PARAM_STR);
                    // $query->bindParam(3,$_POST['departamento'], PDO::PARAM_STR);
                    // $query->bindParam(4,$_POST['municipio'], PDO::PARAM_STR);
                    // $query->bindParam(5,$_POST['perfil_org_act'], PDO::PARAM_STR);
                    // $query->bindParam(6,$_POST['mision'], PDO::PARAM_STR);
                    // $query->bindParam(7,$_POST['vision'], PDO::PARAM_STR);
                   

                    // $query->bindParam(8,$_POST['registro'], PDO::PARAM_STR);
                    // $query->bindParam(9,$_POST['proyecto'], PDO::PARAM_STR);
                    // $query->bindParam(10,$_POST['RTN'], PDO::PARAM_STR);
                    // $query->bindParam(11,$_POST['presidente'], PDO::PARAM_STR);
                    // $query->bindParam(12,$_POST['vicePresidente'], PDO::PARAM_STR);
                    // $query->bindParam(13,$_POST['secretario'], PDO::PARAM_STR);
                    // $query->bindParam(14,$_POST['tesorero'], PDO::PARAM_STR);
                    // $query->bindParam(15,$_POST['fiscal'], PDO::PARAM_STR);
                    // $query->bindParam(16,$_POST['vocalI'], PDO::PARAM_STR);
                    // $query->bindParam(17,$_POST['vocalII'], PDO::PARAM_STR);
                    // $query->bindParam(18,$_POST['apoderado'], PDO::PARAM_STR);
                    // $query->bindParam(19,$_POST['rtnApoderado'], PDO::PARAM_STR);
                    // $query->bindParam(20,$_POST['director'], PDO::PARAM_STR);
                    

                    // $query->bindParam(21,$_POST['direccion'], PDO::PARAM_STR);                  
                    // $query->bindParam(22,$_POST['telefono1'];, PDO::PARAM_STR);
                    // $query->bindParam(23,$_POST['telefono2'];, PDO::PARAM_STR);
                    // $query->bindParam(24,$_POST['celular'];, PDO::PARAM_STR);
                    // $query->bindParam(25,$_POST['email'];, PDO::PARAM_STR);
                    // $query->bindParam(26,$_POST['txt_contacto_web'];, PDO::PARAM_STR);
                    // $query->bindParam(27,$_POST['contact_urlFacebook'];, PDO::PARAM_STR);
                    // $query->bindParam(28,$_POST['contact_urltwitter'];, PDO::PARAM_STR);
                    // $query->bindParam(29,$_POST['contact_urlyoutube'];, PDO::PARAM_STR);
                    // $query->bindParam(30,$_POST['contact_urllinkedin'];, PDO::PARAM_STR);
                    // $query->bindParam(31,$_POST['contact_urlIstagram'];, PDO::PARAM_STR);
                   
                    $query1->execute();

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
                    "mensajeError" => "Hubo un error al obtner el equipo",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;


        case 10: //Insertar Miembros Junta Directiva
           
            try{
            
                        // SE INSERTAN NUEVOS MIEMBROS Y CARGOS A LA JUNTA DIRECTIVA
                        // $query = $db->prepare("CALL SP_INSERTAR_MIEMBRO_JUNTA(?,?,@errorMensaje,@bandera)");
                        // $query->bindParam(1,$cargo, PDO::PARAM_STR);
                        // $query->bindParam(2,$nombre, PDO::PARAM_STR);
                        // $query->execute();
                        // $result = $query->fetchAll();
                         $json = array();

                        // $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
                        // $mensaje = $output['@mensajeError'];
                        
                        // $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                        // $bandera = $output['@bandera']; 

                        $mensaje = "todo bien";
                        $bandera = 0;


                            $json[1] = array(
                                "mensajeError" => $mensaje,
                                "bandera" => $bandera
                            );
                        echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtener el proyecto",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;

        default:
            break;

    }
   