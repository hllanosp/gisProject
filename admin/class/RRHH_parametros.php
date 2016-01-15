<?php 

    
    session_start();

    
    require_once ("../../conexion/config.inc.php");

    $opcion = $_POST['opcion'];

    switch($opcion){
        case 1: //Insertar CARGOS

            $nivel = $_POST['puesto_nivel'];
            $puesto_cod = $_POST['puesto_cod'];
             $cargo = $_POST['puesto_nombre'];
           
            try{
                // se insertan un nuevo cargo
                // $query = $db->prepare("CALL SP_INSERTAR_CARGO(?,?,?,@errorMensaje,@bandera)");
                // $query->bindParam(1,$puesto_cod, PDO::PARAM_STR);
                // $query->bindParam(2,$nivel, PDO::PARAM_STR);
                // $query->bindParam(2,$cargo, PDO::PARAM_STR);
                // $query->execute();
                // $result = $query->fetchAll();
                 $json = array();

                // $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
                // $mensaje = $output['@mensajeError'];
                
                // $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                // $bandera = $output['@bandera']; 

                 // codigo de prueba
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


        case 2: 
            // SE CARGAN LOS CARGOS SEGUN EL NIVEL (1:NIVEL_DIRECTIVO, 2: NIVEL EJECUTIVO, 
                                                //   3:NIVEL TECNICO )

            $nivel = $_POST['puesto_nivel'];
            $organizacionid = 1;
            $proyectoid = 1;
           
            try{
                /* Obtiene los cargos segun nivel */
                // $query = $db->prepare("CALL SP_OBTENER_CARGOS(?,@errorMensaje,@bandera)");
                // $query->bindParam(1,$nivel, PDO::PARAM_INT);
                // $query->execute();
                // $result = $query->fetchAll();
                // $json = array();
                // $contadorIteracion = 0;
                // foreach($result as $fila){ 
                //     $json[$contadorIteracion] = array(
                //         "codigo_cargo" => htmlentities(utf8_encode($fila['codigo_cargo'])),
                //         "nombre_cargo" => htmlentities(utf8_encode($fila['nombre_cargo']))
                //     );
                    
                //     $contadorIteracion++;
                // }

                // echo json_encode($json);



                // codigo de prueba
                $query = $db->prepare("CALL SP_OBTENER_PROYECTO(?,?,@errorMensaje,@bandera)");
                $query->bindParam(1,$organizacionid, PDO::PARAM_STR);
                $query->bindParam(2,$proyectoid, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "nombre" => htmlentities(utf8_encode($fila['nombre'])),
                        "descripcion" => htmlentities(utf8_encode($fila['descripcion']))
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
            // se agregan nuevos tipos de contratos

            $tipoContrato = $_POST['tipoContrato'];
           
            try{
                // se insertan un nuevo cargo
                // $query = $db->prepare("CALL SP_INSERTAR_TIPO_CONTRATO(?,@errorMensaje,@bandera)");
                // $query->bindParam(1,$tipoContrato, PDO::PARAM_STR);
                // $result = $query->fetchAll();
                 $json = array();

                // $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
                // $mensaje = $output['@mensajeError'];
                
                // $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                // $bandera = $output['@bandera']; 


                 // codigo de prueba
                $mensaje = "La transaccion se realizo correctamente...";
                $bandera = 0;


                    $json[1] = array(
                        "mensajeError" => $mensaje,
                        "bandera" => $bandera
                    );
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un al realizar la transaccion",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;

        case 4: 
            // SE  OBTIENEN LOS TIPOS DE CONTRATOSS

            
            $organizacionid = 1;
            $proyectoid = 1;
           
            try{
                /* Obtiene los cargos segun nivel */
                // $query = $db->prepare("CALL SP_OBTENER_TIPO_CONTRATOS(@errorMensaje,@bandera)");
                
                // $query->execute();
                // $result = $query->fetchAll();
                // $json = array();
                //  $contadorIteracion = 0;
                // foreach($result as $fila){ 
                //     $json[$contadorIteracion] = array(
                //         "contrato" => htmlentities(utf8_encode($fila['contrato']))
                //     );
                    
                //     $contadorIteracion++;
                // }

                // echo json_encode($json);


                // codigo de prueba
                $query = $db->prepare("CALL SP_OBTENER_PROYECTO(?,?,@errorMensaje,@bandera)");
                $query->bindParam(1,$organizacionid, PDO::PARAM_STR);
                $query->bindParam(2,$proyectoid, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "nombre" => htmlentities(utf8_encode($fila['nombre'])),
                        "descripcion" => htmlentities(utf8_encode($fila['descripcion']))
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



        case 5: 
            // se modifican las jornadas

            $diurnaHoras = $_POST['diurnaHoras'];
            $recargoDiurno = $_POST['recargoDiurno'];
            $Mixtohoras = $_POST['Mixtohoras'];
            $recargoMixto = $_POST['recargoMixto'];
            $nocturnohoras = $_POST['nocturnohoras'];
            $recargoNocturno = $_POST['recargoNocturno'];
            // $puesto_cod = $_POST['puesto_cod'];
            // $cargo = $_POST['puesto_nombre'];
           
            try{
                // se insertan un nuevo cargo
                // $query = $db->prepare("CALL SP_MODIFICAR_PARAMETROS_JORNADA(?,@errorMensaje,@bandera)");
                // $query->bindParam(1,$diurnaHoras, PDO::PARAM_STR);
                // $query->bindParam(2,$recargoDiurno, PDO::PARAM_STR);
                // $query->bindParam(3,$Mixtohoras, PDO::PARAM_STR);
                // $query->bindParam(4,$recargoMixto, PDO::PARAM_STR);
                // $query->bindParam(5,$nocturnohoras, PDO::PARAM_STR);
                // $query->bindParam(6,$recargoNocturno, PDO::PARAM_STR);
                // $result = $query->fetchAll();
                 $json = array();

                // $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
                // $mensaje = $output['@mensajeError'];
                
                // $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                // $bandera = $output['@bandera']; 


                 // codigo de prueba
                $mensaje = "La transaccion se realizo correctamente...";
                $bandera = 0;


                    $json[1] = array(
                        "mensajeError" => $mensaje,
                        "bandera" => $bandera
                    );
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un al realizar la transaccion",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;

        case 6: 
            //valores de prueba
            $organizacionid = 1 ;
            $proyectoid = 1;
            
            try{
                        // se obtendran todos los paramentros referentes a la jornada de trabajo y porcentaje de recargo 
                        // $query = $db->prepare("CALL SP_OBTENER_JORNADA_TRABAJO(@errorMensaje,@bandera)");
                        // $query->execute();
                        // $result = $query->fetchAll();
                        // $json = array();

                        // $contadorIteracion = 1;
                        // foreach($result as $fila){ 
                        //     $json[$contadorIteracion] = array(
                        //         "diurnaHoras" => htmlentities(utf8_encode($fila['diurnaHoras'])),
                        //         "recargoDiurno" => htmlentities(utf8_encode($fila['recargoDiurno'])),
                        //         "Mixtohoras" => htmlentities(utf8_encode($fila['Mixtohoras'])),
                        //         "recargoMixto" => htmlentities(utf8_encode($fila['recargoMixto'])),
                        //         "nocturnohoras" => htmlentities(utf8_encode($fila['nocturnohoras'])),
                        //         "recargoNocturno" => htmlentities(utf8_encode($fila['recargoNocturno'])),
                        //     );
                            
                        //     $contadorIteracion++;

                        // codigo de prueba
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


        case 7: 
            // se modifican los parametros referentes a las vacaciones

            $vacaciones_unAnio = $_POST['vacaciones_unAnio'];
            $recargoDiurno = $_POST['vaca_1a2'];
            $Mixtohoras = $_POST['vaca2a3'];
            $recargoMixto = $_POST['vaca4'];
            $nocturnohoras = $_POST['tiempoMaxi'];
          
            try{
                // se modifica la BD
                // $query = $db->prepare("CALL SP_MODIFICAR_PARAMETROS_VACACIONES(?,@errorMensaje,@bandera)");
                // $query->bindParam(1,$vacaciones_unAnio, PDO::PARAM_STR);
                // $query->bindParam(2,$recargoDiurno, PDO::PARAM_STR);
                // $query->bindParam(3,$Mixtohoras, PDO::PARAM_STR);
                // $query->bindParam(4,$recargoMixto, PDO::PARAM_STR);
                // $query->bindParam(5,$nocturnohoras, PDO::PARAM_STR);
                // $query->bindParam(6,$recargoNocturno, PDO::PARAM_STR);
                // $result = $query->fetchAll();
                 $json = array();

                // $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
                // $mensaje = $output['@mensajeError'];
                
                // $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                // $bandera = $output['@bandera']; 

                 // codigo de prueba
                $mensaje = "La transaccion se realizo correctamente...";
                $bandera = 0;


                    $json[1] = array(
                        "mensajeError" => $mensaje,
                        "bandera" => $bandera
                    );
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un al realizar la transaccion",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;


        case 8: 
            //valores de prueba
            $organizacionid = 1 ;
            $proyectoid = 1;
            
            try{
                        // se obtendran todos los paramentros referentes A VACACIONES
                        // $query = $db->prepare("CALL SP_OBTENER_PARAM_VACACIONES(@errorMensaje,@bandera)");
                        // $query->execute();
                        // $result = $query->fetchAll();
                        // $json = array();

                        // $contadorIteracion = 1;
                        // foreach($result as $fila){ 
                        //     $json[$contadorIteracion] = array(
                        //         "vacaciones_unAnio" => htmlentities(utf8_encode($fila['vacaciones_unAnio'])),
                        //         "vaca_1a2" => htmlentities(utf8_encode($fila['vaca_1a2'])),
                        //         "vaca2a3" => htmlentities(utf8_encode($fila['vaca2a3'])),
                        //         "vaca4" => htmlentities(utf8_encode($fila['vaca4'])),
                        //         "tiempoMaxi" => htmlentities(utf8_encode($fila['tiempoMaxi'])),
                        //     );
                            
                        //     $contadorIteracion++;

                        // codigo de prueba
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

        case 9: 
            // se modifican los parametros referentes al IHSS

            $salarioMinimo = $_POST['salarioMinimo'];
            $numeroEmpleados = $_POST['numeroEmpleados'];
            $porcentajeEmpleado = $_POST['porcentajeEmpleado'];
            $porcentajePatrono = $_POST['porcentajePatrono'];
          
            try{
                // se modifica la BD
                // $query = $db->prepare("CALL SP_MODIFICAR_PARAMETROS_IHSS(?,@errorMensaje,@bandera)");
                // $query->bindParam(1,$salarioMinimo, PDO::PARAM_STR);
                // $query->bindParam(2,$numeroEmpleados, PDO::PARAM_STR);
                // $query->bindParam(3,$porcentajeEmpleado, PDO::PARAM_STR);
                // $query->bindParam(4,$porcentajePatrono, PDO::PARAM_STR);
                // $result = $query->fetchAll();
                 $json = array();

                // $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
                // $mensaje = $output['@mensajeError'];
                
                // $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                // $bandera = $output['@bandera']; 

                $mensaje = "La transaccion se realizo correctamente...";
                $bandera = 0;


                    $json[1] = array(
                        "mensajeError" => $mensaje,
                        "bandera" => $bandera
                    );
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un al realizar la transaccion",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;

        case 10: 
            //valores de prueba
            $organizacionid = 1 ;
            $proyectoid = 1;
            
            try{
                        // se obtendran todos los paramentros referentes A IHSS
                        // $query = $db->prepare("CALL SP_OBTENER_PARAM_IHSS(@errorMensaje,@bandera)");
                        // $query->execute();
                        // $result = $query->fetchAll();
                        // $json = array();

                        // $contadorIteracion = 1;
                        // foreach($result as $fila){ 
                        //     $json[$contadorIteracion] = array(
                        //         "salarioMinimo" => htmlentities(utf8_encode($fila['salarioMinimo'])),
                        //         "numeroEmpleados" => htmlentities(utf8_encode($fila['numeroEmpleados'])),
                        //         "porcentajeEmpleado" => htmlentities(utf8_encode($fila['numeroEmpleados'])),
                        //         "porcentajePatrono" => htmlentities(utf8_encode($fila['vaca4']))
                        //     );
                            
                        //     $contadorIteracion++;

                        // codigo de prueba
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

        case 11: 
            // se modifican los parametros referentes al INFOP

            $porcenValorPlanilla = $_POST['porcenValorPlanilla'];
           
            try{
                // se modifica la BD
                // $query = $db->prepare("CALL SP_MODIFICAR_PARAMETROS_INFOP(?,@errorMensaje,@bandera)");
                // $query->bindParam(1,$porcenValorPlanilla, PDO::PARAM_STR);
               
                // $result = $query->fetchAll();
                 $json = array();

                // $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
                // $mensaje = $output['@mensajeError'];
                
                // $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                // $bandera = $output['@bandera']; 

                $mensaje = "La transaccion se realizo correctamente...";
                $bandera = 0;


                    $json[1] = array(
                        "mensajeError" => $mensaje,
                        "bandera" => $bandera
                    );
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un al realizar la transaccion",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;

        case 12: 
            //valores de prueba
            $organizacionid = 1 ;
            $proyectoid = 1;
            
            try{
                        // se obtendran todos los paramentros referentes A INFOP
                        // $query = $db->prepare("CALL SP_OBTENER_PARAM_INFOP(@errorMensaje,@bandera)");
                        // $query->execute();
                        // $result = $query->fetchAll();
                        // $json = array();

                        // $contadorIteracion = 1;
                        // foreach($result as $fila){ 
                        //     $json[$contadorIteracion] = array(
                        //         "porcenValorPlanilla" => htmlentities(utf8_encode($fila['porcenValorPlanilla']))
                        //     );
                            
                        //     $contadorIteracion++;

                        // codigo de prueba
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

        case 13: 
            // se modifican los parametros referentes ISV sobre honorarios profesionales

            $isv_tasaNacional = $_POST['isv_tasaNacional'];
            $isv_tasaExtranjeros = $_POST['isv_tasaExtranjeros'];
            try{
                // se modifica la BD
                // $query = $db->prepare("CALL SP_MODIFICAR_PARAMETROS_ISV_HONORARIOS(?,@errorMensaje,@bandera)");
                // $query->bindParam(1,$isv_tasaNacional, PDO::PARAM_STR);
                // $query->bindParam(2,$isv_tasaExtranjeros, PDO::PARAM_STR);
               
                // $result = $query->fetchAll();
                 $json = array();

                // $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
                // $mensaje = $output['@mensajeError'];
                
                // $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                // $bandera = $output['@bandera']; 

                $mensaje = "La transaccion se realizo correctamente...";
                $bandera = 0;


                    $json[1] = array(
                        "mensajeError" => $mensaje,
                        "bandera" => $bandera
                    );
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un al realizar la transaccion",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;

        case 14: 
            //valores de prueba
            $organizacionid = 1 ;
            $proyectoid = 1;
            
            try{
                        // se obtendran todos los paramentros referentes A INFOP
                        // $query = $db->prepare("CALL SP_OBTENER_PARAM_ISV_HONORARIOS(@errorMensaje,@bandera)");
                        // $query->execute();
                        // $result = $query->fetchAll();
                        // $json = array();

                        // $contadorIteracion = 1;
                        // foreach($result as $fila){ 
                        //     $json[$contadorIteracion] = array(
                        //         "isv_tasaNacional" => htmlentities(utf8_encode($fila['isv_tasaNacional']))
                        //         "isv_tasaExtranjeros" => htmlentities(utf8_encode($fila['isv_tasaExtranjeros']))
                        //     );
                            
                        //     $contadorIteracion++;

                        // codigo de prueba
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



        case 15: 
        
            //valores de prueba
            $organizacionid = 1 ;
            $proyectoid = 1;
            
            try{
                        // se obtendran todos los paramentros a la tarifa de impuesto sobre la renta para personas naturales
                        // $query = $db->prepare("CALL SP_OBTENER_PARAM_TARIFA_PERSONA_NATURAL(@errorMensaje,@bandera)");
                        // $query->execute();
                        // $result = $query->fetchAll();
                        // $json = array();

                        // $contadorIteracion = 1;
                        // foreach($result as $fila){ 
                        //     $json[$contadorIteracion] = array(
                        //         "no_tarifa" => htmlentities(utf8_encode($fila['no_tarifa']))
                        //         "tarifa_desde" => htmlentities(utf8_encode($fila['tarifa_desde'])),
                        //         "tarifa_hasta" => htmlentities(utf8_encode($fila['tarifa_hasta'])),
                        //         "tarifa_gastosMedicos" => htmlentities(utf8_encode($fila['tarifa_gastosMedicos'])),
                        //         "tarifa_totalExento" => htmlentities(utf8_encode($fila['tarifa_totalExento'])),
                        //         "tarifa_tasa" => htmlentities(utf8_encode($fila['tarifa_tasa'])),
                        //     );
                            
                        //     $contadorIteracion++;

                        // codigo de prueba
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
                    "mensajeError" => "Hubo un error al realizar la transaccion",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;





  


    }
 ?>