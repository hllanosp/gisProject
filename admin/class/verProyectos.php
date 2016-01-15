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


    switch($opcion){

        case 0: 
             $proyectoid = $_POST['proyectoId'];
            try{
                /* Obtiene el ultimo proyecto creado por una organizacion */
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
        case 1: 
            try{
                /* Obtiene los proyectos creados por la organizacion */
                $query = $db->prepare("CALL SP_OBTENER_PROYECTOS(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$organizacionid, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila['proyectoid'])),
                        "nombre" => htmlentities(utf8_encode($fila['nombre'])),
                        "codigoInterno" => htmlentities(utf8_encode($fila['codigo_interno']))
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
        case 2:
            $proyectoid = $_POST['proyectoid'];
            $empleado = $_POST['empleado'];
            try{
                /* Obtiene todos los empleados asiganados a una proyecto que pertenecen a una organizacion */
                $query = $db->prepare("CALL SP_OBTENER_EMPLEADO_DEL_EQUIPO(?,?,@errorMensaje,@bandera);");
                $query->bindParam(1,$proyectoid, PDO::PARAM_STR);
                $query->bindParam(2,$empleado, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                
                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigoEmpleado" => htmlentities(utf8_encode($fila['empleadoId'])),
                        "rol" => htmlentities(utf8_encode($fila['proyectoRolId']))
                    );
                    
                    $contadorIteracion++;
                }

                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtner el equipo",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;

        case 3: //Insertar Miembros Equipo

            // Asiganar el empleado de una organizacion a un proyecto
            $proyectoid = $_POST['proyectoid'];
            $empleadoModificado = $_POST['empleadoModificado'];
            $empleadoActual = $_POST['empleadoActual'];
            $cargoModificado = $_POST['cargoModificado'];
            $cargoActual = $_POST['cargoActual'];

            try{
                $sql = "CALL SP_MODIFICAR_EMPLEADO_EQUIPO(?,?,?,?,?,@mensajeError,@bandera)";
                $query1 = $db->prepare($sql);
                $query1->bindParam(1,$empleadoActual,PDO::PARAM_STR);
                $query1->bindParam(2,$empleadoModificado,PDO::PARAM_STR);
                $query1->bindParam(3,$cargoActual,PDO::PARAM_STR);
                $query1->bindParam(4,$cargoModificado,PDO::PARAM_STR);
                $query1->bindParam(5,$proyectoid,PDO::PARAM_STR);
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
        case 4:

            // Asiganar el empleado de una organizacion a un proyecto
            $proyectoid = $_POST['proyectoid'];
            $lineaPresupuesto = $_POST['lineaPresupuesto'];
            try{
                $sql = "CALL SP_MODIFICAR_LINEA(?,?,@mensajeError,@bandera)";
                $query1 = $db->prepare($sql);
                $query1->bindParam(1,$lineaPresupuesto,PDO::PARAM_STR);
                $query1->bindParam(2,$proyectoid,PDO::PARAM_STR);
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
        case 5:
            $proyectoid = $_POST['proyectoid'];
  
            try{
                /* 
                    Obtiene los cooperantes y la cantidad con la que estan apoyando en el proyecto 
                    los cuales conforman el total del proyecto
                 */
                $query = $db->prepare("SELECT linea_accion FROM tbl_proyecto WHERE proyectoid =".$proyectoid);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                
                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "linea" => htmlentities(utf8_encode($fila['linea_accion']))
                    );
                    
                    $contadorIteracion++;
                }

                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtner el presupuesto",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 6: //Modificar Componente
            $descripcion = $_POST['descripcion'];
            $componente = $_POST['componente'];
            $proyectoid = $_POST['proyectoid'];
            try{
                $sql = "CALL SP_MODIFICAR_COMPONENTE(?,?,?,@mensajeError,@bandera)";
                $query1 = $db->prepare($sql);
                $query1->bindParam(1,$descripcion,PDO::PARAM_STR);
                $query1->bindParam(2,$componente,PDO::PARAM_STR);
                $query1->bindParam(3,$proyectoid,PDO::PARAM_STR);
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
                    "mensajeError" => "Hubo un error al insertar Componente",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 7: //Modificar Producto
            $descripcion = $_POST['descripcion'];
            $producto = $_POST['producto'];
            $componente = $_POST['componente'];
            $proyectoid = $_POST['proyectoid'];
            try{
                $sql = "CALL SP_MODIFICAR_PRODUCTO(?,?,?,?,@mensajeError,@bandera)";
                $query1 = $db->prepare($sql);
                $query1->bindParam(1,$producto,PDO::PARAM_STR);
                $query1->bindParam(2,$descripcion,PDO::PARAM_STR);
                $query1->bindParam(3,$componente,PDO::PARAM_STR);
                $query1->bindParam(4,$proyectoid,PDO::PARAM_STR);
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
                    "mensajeError" => "Hubo un error al insertar Componente",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 8:
            $descripcion = $_POST['descripcion'];
            $producto = $_POST['producto'];
            $nombre = $_POST['nombre'];
            $proyectoid = $_POST['proyectoid'];
            $actividad = $_POST['actividad'];
            try{
                $sql = "CALL SP_MODIFICAR_ACTIVIDAD(?,?,?,?,@mensajeError,@bandera)";
                $query1 = $db->prepare($sql);
                $query1->bindParam(1,$producto,PDO::PARAM_STR);
                $query1->bindParam(2,$descripcion,PDO::PARAM_STR);
                $query1->bindParam(3,$nombre,PDO::PARAM_STR);
                $query1->bindParam(4,$actividad,PDO::PARAM_STR);
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
                    "mensajeError" => "Hubo un error al insertar Componente",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }

            break;
        case 9:
            // Cambia a favorito un proyecto o lo pone a no favorito.
            $actividad = $_POST['actividad'];
            
            try{
                $query = $db->prepare("CALL SP_OBTENER_PRESUPUESTO_ACTIVIDAD(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$actividad, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                $contadorIteracion = 0;

                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila["cooperanteId"])),
                        "cooperante" => htmlentities(utf8_encode($fila["cooperante"])),
                        "monto" => htmlentities(utf8_encode($fila["monto"]))
                    );
                    
                    $contadorIteracion++;
                }
                
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al traer los paises",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 10:
            $descripcion = $_POST['descripcion'];
            $responsable = $_POST['responsable'];
            $nombre = $_POST['nombre'];
            $fase = $_POST['fase'];
            try{
                $sql = "CALL SP_MODIFICAR_FASE(?,?,?,?,@mensajeError,@bandera)";
                $query1 = $db->prepare($sql);
                $query1->bindParam(1,$fase,PDO::PARAM_STR);
                $query1->bindParam(2,$nombre,PDO::PARAM_STR);
                $query1->bindParam(3,$descripcion,PDO::PARAM_STR);
                $query1->bindParam(4,$responsable,PDO::PARAM_STR);
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
                    "mensajeError" => "Hubo un error al insertar Componente",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }

            break;
        case 11:
            // Cambia a favorito un proyecto o lo pone a no favorito.
            $actividad = $_POST['actividad'];
            
            try{
                $query = $db->prepare("CALL SP_OBTENER_PRESUPUESTO_ACTIVIDAD(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$actividad, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                $contadorIteracion = 0;

                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigoFase" => htmlentities(utf8_encode($fila["codigoFas"])),
                        "codigoActividad" => htmlentities(utf8_encode($fila["codigoFas"])),
                        "nombreActividad" => htmlentities(utf8_encode($fila["codigoFas"]))
                    );
                    
                    $contadorIteracion++;
                }
                
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al traer los paises",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 12:
            $proyecto = $_POST['proyectoid']; 
            try{
                /* Obtiene el ultimo proyecto creado por una organizacion */
                $query = $db->prepare("CALL SP_OBTENER_FASES(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$proyecto, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila['codigo'])),
                        "nombre" => htmlentities(utf8_encode($fila['nombre'])),
                        "inicio" => htmlentities(utf8_encode($fila['fechaInicio'])),
                        "fin" => htmlentities(utf8_encode($fila['fechaFin'])),
                        "actividad" => htmlentities(utf8_encode($fila['actividadId'])),
                        "responsable" => htmlentities(utf8_encode($fila['responsable']))
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
        // case 13: 
        //     try{

        //         /* Obtiene los productos para un proyecto definido */
        //         $proyectoid = $_POST['proyectoid'];
        //         $query = $db->prepare("CALL SP_OBTENER_PRODUCTOS(?,@errorMensaje,@bandera)");
        //         $query->bindParam(1,$proyectoid, PDO::PARAM_STR);
        //         $query->execute();
        //         $result = $query->fetchAll();
        //         $json = array();

        //         $contadorIteracion = 0;
        //         foreach($result as $fila){ 
        //             $json[$contadorIteracion] = array(
        //                 "codigo" => htmlentities(utf8_encode($fila['productoId'])),
        //                 "nombre" => htmlentities(utf8_encode($fila['descripcion'])),
        //                 "componente" => htmlentities(utf8_encode($fila['componente']))
        //             );
                    
        //             $contadorIteracion++;
        //         }

        //         echo json_encode($json);
        //     }catch(PDOExecption $e){
        //         $json[0] = array(
        //             "mensajeError" => "Hubo un error al obtener los productos",
        //             "bandera" => $bandera
        //         );
                
        //         echo json_encode($json);
        //     }
        //     break;
        // case 14: 
        //     try{
        //         /* Obtiene los componentes de un proyecto */
        //         $proyectoid = $_POST['proyectoid'];
        //         $query = $db->prepare("CALL SP_OBTENER_COMPONENTES(?,@errorMensaje,@bandera)");
        //         $query->bindParam(1,$proyectoid, PDO::PARAM_STR);
        //         $query->execute();
        //         $result = $query->fetchAll();
        //         $json = array();

        //         $contadorIteracion = 0;
        //         foreach($result as $fila){ 
        //             $json[$contadorIteracion] = array(
        //                 "codigo" => htmlentities(utf8_encode($fila['componenteId'])),
        //                 "nombre" => htmlentities(utf8_encode($fila['descripcion']))
        //             );
                    
        //             $contadorIteracion++;
        //         }

        //         echo json_encode($json);
        //     }catch(PDOExecption $e){
        //         $json[0] = array(
        //             "mensajeError" => "Hubo un error al obtener los componentes",
        //             "bandera" => $bandera
        //         );
                
        //         echo json_encode($json);
        //     }
        //     break;
        // case 15:
        //     // Inserta un producto a un componente del proyecto determinado
        //     $descripcion = $_POST['descripcion'];
        //     $componente = $_POST['componente'];
        //     try{
        //         $sql = "CALL SP_INSERTAR_PRODUCTO(?,?,@mensajeError,@bandera)";
        //         $query1 = $db->prepare($sql);
        //         $query1->bindParam(1,$descripcion,PDO::PARAM_STR);
        //         $query1->bindParam(2,$componente,PDO::PARAM_STR);
        //         $query1->execute();

        //         $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
        //         $mensaje = $output['@mensajeError'];
                
        //         $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
        //         $bandera = $output['@bandera']; 

        //         $json[0] = array(
        //             "mensajeError" => $mensaje,
        //             "bandera" => $bandera
        //         );
                
        //         echo json_encode($json);

        //     }catch(PDOExecption $e){
        //         $json[0] = array(
        //             "mensajeError" => "Hubo un error al insertar el producto",
        //             "bandera" => $bandera
        //         );
                
        //         echo json_encode($json);
        //     }
        //     break;
        // case 16:
        //     // Inserta un componente del proyecto determinado
        //     $descripcion = $_POST['descripcion'];
        //     $proyectoid = $_POST['proyectoid'];
        //     try{
        //         $sql = "CALL SP_INSERTAR_COMPONENTE(?,?,@mensajeError,@bandera)";
        //         $query1 = $db->prepare($sql);
        //         $query1->bindParam(1,$descripcion,PDO::PARAM_STR);
        //         $query1->bindParam(2,$proyectoid,PDO::PARAM_STR);
        //         $query1->execute();

        //         $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
        //         $mensaje = $output['@mensajeError'];
                
        //         $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
        //         $bandera = $output['@bandera']; 

        //         $json[0] = array(
        //             "mensajeError" => $mensaje,
        //             "bandera" => $bandera
        //         );
                
        //         echo json_encode($json);

        //     }catch(PDOExecption $e){
        //         $json[0] = array(
        //             "mensajeError" => "Hubo un error al insertar el componente",
        //             "bandera" => $bandera
        //         );
                
        //         echo json_encode($json);
        //     }
        //     break;
        // case 17:
        //     // Inserta un componente del proyecto determinado
        //     $componente = $_POST['componentes'];
        //    try{

        //         $query = $db->prepare("CALL SP_OBTENER_PRODUCTOS_COMPONENTE(?,@errorMensaje,@bandera)");
        //         $query->bindParam(1,$componente, PDO::PARAM_STR);
        //         $query->execute();
        //         $result = $query->fetchAll();
        //         $json = array();

        //         $contadorIteracion = 0;
        //         foreach($result as $fila){ 
        //             $json[$contadorIteracion] = array(
        //                 "codigo" => htmlentities(utf8_encode($fila['productoId'])),
        //                 "nombre" => htmlentities(utf8_encode($fila['descripcion']))
        //             );
                    
        //             $contadorIteracion++;
        //         }

        //         echo json_encode($json);
        //     }catch(PDOExecption $e){
        //         $json[0] = array(
        //             "mensajeError" => "Hubo un error al obtener los productos",
        //             "bandera" => $bandera
        //         );
                
        //         echo json_encode($json);
        //     }
        //     break;
        // case 18:
        //     // Obtener el presupuesto global del proyecto
        //     $proyectoid = $_POST['proyectoid'];
        //    try{

        //         $query = $db->prepare("CALL SP_OBTENER_PRESUPUESTO_GLOBAL(?,@errorMensaje,@bandera)");
        //         $query->bindParam(1,$proyectoid, PDO::PARAM_STR);
        //         $query->execute();
        //         $result = $query->fetchAll();
        //         $json = array();

        //         $contadorIteracion = 0;
        //         foreach($result as $fila){ 
        //             $json[$contadorIteracion] = array(
        //                 "nombre" => htmlentities(utf8_encode($fila['descripcion'])),
        //                 "monto" => $fila['monto'],
                        
        //             );
                    
        //             $contadorIteracion++;
        //         }

        //         echo json_encode($json);
        //     }catch(PDOExecption $e){
        //         $json[0] = array(
        //             "mensajeError" => "Hubo un error al obtener los productos",
        //             "bandera" => $bandera
        //         );
                
        //         echo json_encode($json);
        //     }
        //     break;
        // case 19:
        //     try{
        //         $query = $db->prepare("CALL SP_OBTENER_(@errorMensaje,@bandera)");
        //         $query->execute();
        //         $result = $query->fetchAll();
        //         $json = array();

        //         $contadorIteracion = 0;
        //         foreach($result as $fila){
        //             if($contadorIteracion == 0){
        //                 $json[$contadorIteracion] = array(
        //                     "cooperante" => 0,
        //                     "nombre" => "Fondos Propios"
        //                 );
        //                 $contadorIteracion++;
        //             }
        //             $json[$contadorIteracion] = array(
        //                 "cooperante" => $fila['cooperanteid'],
        //                 "nombre" => htmlentities(utf8_encode($fila['nombre']))
        //             );

        //             $contadorIteracion++;
        //         }

        //         echo json_encode($json);
        //     }catch(PDOExecption $e){
        //         $json[0] = array(
        //             "mensajeError" => "Hubo un error al obtener el proyecto",
        //             "bandera" => $bandera
        //         );

        //         echo json_encode($json);
        //     }
        //     break;
        // case 20:
        //     $proyectoid = $_POST['proyectoid'];
        //     $cooperanteid = $_POST['cooperanteId'];
            
        //     try{
        //         $query = $db->prepare("CALL SP_OBTENER_COOPERANTES_ACTIVIDAD(?,?,@errorMensaje,@bandera)");
        //         $query->bindParam(1,$proyectoid, PDO::PARAM_STR);
        //         $query->bindParam(2,$cooperanteid, PDO::PARAM_STR);
        //         $query->execute();
        //         $result = $query->fetchAll();
        //         $json = array();

        //         $contadorIteracion = 0;
        //         foreach($result as $fila){
        //             $json[$contadorIteracion] = array(
        //                 "actividad" => $fila['actividadid'],
        //                 "descripcion" => htmlentities(utf8_encode($fila['descripcion'])),
        //                 "monto" => $fila['monto']
        //             );

        //             $contadorIteracion++;
        //         }

        //         echo json_encode($json);
        //     }catch(PDOExecption $e){
        //         $json[0] = array(
        //             "mensajeError" => "Hubo un error al obtener el proyecto",
        //             "bandera" => $bandera
        //         );

        //         echo json_encode($json);
        //     }
        //     break;
        // case 21:
        //     // obtine los cooperantes de una organizacion. 
        //     try{
        //         $tipo = filter_var($_POST['tipo'],FILTER_VALIDATE_BOOLEAN); 
        //         $query = $db->prepare("CALL SP_OBTENER_COOPERANTE(?,@mensajeError,@bandera)");
        //         $query->bindParam(1,$tipo,PDO::PARAM_BOOL);
        //         $query->execute();
        //         $result = $query->fetchAll();
        //         $json = array();
        //         $contadorIteracion = 0;

        //         foreach($result as $fila){ 
        //             $json[$contadorIteracion] = array(
        //                 "codigo" => htmlentities(utf8_encode($fila["cooperanteid"])),
        //                 "nombre" => htmlentities(utf8_encode($fila["nombre"]))
        //             );
                    
        //             $contadorIteracion++;
        //         }
                
        //         echo json_encode($json);
        //     }catch(PDOExecption $e){
        //         $json[0] = array(
        //             "mensajeError" => "Hubo un error al traer los paises",
        //             "bandera" => $bandera
        //         );
                
        //         echo json_encode($json);
        //     }

        //     break;

        default:
            break;
        }
?>