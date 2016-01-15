
<?php 
    
    session_start();

    $organizacionid = $_SESSION['organizacionId'];
    require_once ("../../conexion/config.inc.php");

    $opcion = $_POST['opcion'];

    switch($opcion){

        case 0:
            try{
                $query = $db->prepare("SELECT zonaId,nombre FROM tbl_zona");
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                $contadorIteracion = 0;

                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => $fila["zonaId"],
                        "nombre" => $fila["nombre"]
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
        case 1: // Obtiene los ejes estrategicos
            try{
                $query = $db->prepare("CALL SP_OBTENER_EJES_ESTRATEGICOS(?,@mensajeError,@bandera)");
                $query->bindParam(1,$organizacionid, PDO::PARAM_STR); 
                $query->execute();
                
                $result = $query->fetchAll();
                $json = array();
                $contadorIteracion = 0;

                
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => $fila["ejeEstrategicoId"],
                        "nombre" => $fila["nombre_eje"]
                    );
                    
                    $contadorIteracion++;
                }
                
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al traer los ejes estrategicos",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 2: //obtiene los sectores economicos
            try{
                $query = $db->prepare("CALL SP_OBTENER_SECTOR_ECONOMICO(?,@mensajeError,@bandera)");
                $query->bindParam(1,$organizacionid, PDO::PARAM_STR); 
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                $contadorIteracion = 0;

                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => $fila["codigo"],
                        "nombre" => $fila["nombre"]
                    );
                    
                    $contadorIteracion++;
                }
                
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al traer los sectores economicos",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 3: //obtiene los sectores institucionales
            try{
                $query = $db->prepare("CALL SP_OBTENER_SECTOR_INSTITUCIONAL(?,@mensajeError,@bandera)");
                $query->bindParam(1,$organizacionid, PDO::PARAM_STR); 
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                $contadorIteracion = 0;

                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => $fila["codigo"],
                        "nombre" => $fila["nombre"]
                    );
                    
                    $contadorIteracion++;
                }
                
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al traer los sectores institucionales",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 4: //obtiene los empleados 

            $organizacionID = $_POST['organizacionID'];

            try{
                $query = $db->prepare("SELECT CONCAT(p_nombre,s_nombre,p_apellido,s_apellido) as nombre, empleadoid FROM tbl_empleado WHERE organizacionid =".$organizacionID);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                $contadorIteracion = 0;

                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => $fila["empleadoid"],
                        "nombre" => $fila["nombre"]
                    );
                    
                    $contadorIteracion++;
                }
                
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al traer los sectores institucionales",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 5: //obtiene los cargos

            try{
                $query = $db->prepare("SELECT proyectoRolId,nombre_rol FROM tbl_proyectoRol");
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                $contadorIteracion = 0;

                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => $fila["proyectoRolId"],
                        "nombre" => $fila["nombre_rol"]
                    );
                    
                    $contadorIteracion++;
                }
                
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al traer los sectores institucionales",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
    case 6: //Insertar el proyecto

            try{
                $numeroProyecto = $_POST['numeroProyecto'];
                $nombreProyecto = $_POST['nombreProyecto'];
                $descripcion = $_POST['descripcion'];
                $zona = $_POST['zona'];
                $fechaInicio = $_POST['fechaInicio'];
                $fechaFin = $_POST['fechaFin'];
                $objetivo = $_POST['objetivo'];
                $beneficiario = $_POST['beneficiarios'];
                $sectorEconomico= $_POST['sectorEconomico'];
                $sectorInstitucional= $_POST['sectorInstitucional'];
                $ejeEstrategico = $_POST['ejeEstrategico'];
                $areasFocalizacion = $_POST['areasFocalizacion'];
                $stmt = $db->prepare("CALL SP_INSERTAR_PROYECTO(?,?,?,?,?,?,?,?,?,?,?,?,?,@idProyecto,@mensajeError,@bandera)");

                $stmt->bindParam(1, $numeroProyecto, PDO::PARAM_STR); 
                $stmt->bindParam(2, $nombreProyecto, PDO::PARAM_STR); 
                $stmt->bindParam(3, $zona, PDO::PARAM_STR);
                $stmt->bindParam(4, $fechaInicio, PDO::PARAM_STR); 
                $stmt->bindParam(5, $fechaFin, PDO::PARAM_STR);
                $stmt->bindParam(6, $objetivo, PDO::PARAM_STR); 
                $stmt->bindParam(7, $descripcion, PDO::PARAM_STR);
                $stmt->bindParam(8, $sectorEconomico, PDO::PARAM_STR);
                $stmt->bindParam(9, $sectorInstitucional, PDO::PARAM_STR); 
                $stmt->bindParam(10, $ejeEstrategico, PDO::PARAM_STR);
                $stmt->bindParam(11, $areasFocalizacion, PDO::PARAM_STR);
                $stmt->bindParam(12, $beneficiario, PDO::PARAM_STR);
                $stmt->bindParam(13, $organizacionid, PDO::PARAM_STR); 
                $stmt->execute();
                
                $output = $db->query("select @mensajeError")->fetch(PDO::FETCH_ASSOC);
                $mensaje = $output['@mensajeError'];
                
                $output = $db->query("select @idProyecto")->fetch(PDO::FETCH_ASSOC);
                $proyecto = $output['@idProyecto'];

                $output = $db->query("select @bandera")->fetch(PDO::FETCH_ASSOC);
                $bandera = $output['@bandera']; 
                
                $json[0] = array(
                    "mensajeError" => $mensaje,
                    "proyectoid" => $proyecto,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => $mensaje,
                    "proyectoid" => $proyecto,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
            case 7: // Obtiene las areas de focalizacion
                try{
                      
                    $query = $db->prepare("CALL SP_OBTENER_AREAS_FOCALIZACION(?,@mensajeError,@bandera)");
                    $query->bindParam(1,$organizacionid, PDO::PARAM_STR); 
                    $query->execute();
                    
                    $result = $query->fetchAll();
                    $json = array();
                    $contadorIteracion = 0;

                    
                    foreach($result as $fila){ 
                        $json[$contadorIteracion] = array(
                            "codigo" => $fila["areaFocalizacionId"],
                            "nombre" => $fila["nombre_area"]
                        );
                        
                        $contadorIteracion++;
                    }
                    
                    echo json_encode($json);
                }catch(PDOExecption $e){
                    $json[0] = array(
                        "mensajeError" => "Hubo un error al traer los ejes estrategicos",
                        "bandera" => $bandera
                    );
                    
                    echo json_encode($json);
                }
                break;

        case 8: //Insertar Miembros Equipo

            try{
                $directorProyecto = $_POST['directorProyecto'];
                $administradorProyecto = $_POST['administradorProyecto'];
                $proyectoid = $_POST['proyectoid'];
                $stmt = $db->prepare("CALL SP_INSERTAR_MIEMBROS_EQUIPO(?,?,?,@mensajeError,@bandera)");

                $stmt->bindParam(1, $directorProyecto, PDO::PARAM_STR); 
                $stmt->bindParam(2, $administradorProyecto, PDO::PARAM_STR); 
                $stmt->bindParam(3, $proyectoid, PDO::PARAM_STR);  
                $stmt->execute();
                
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
                    "mensajeError" => $mensaje,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 9:
            try{
                /* Obtiene todos los empleados de una organizacion especifica */
                $query = $db->prepare("CALL SP_OBTENER_EMPLEADO(?,@errorMensaje,@bandera);");
                $query->bindParam(1,$organizacionid, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                
                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila['empleadoid'])),
                        "nombre"=> htmlentities(utf8_encode($fila['nombre'])),
                        "apellido" => htmlentities(utf8_encode($fila['apellido'])),
                        "edad" => htmlentities(utf8_encode($fila['edad']))
                    );
                    
                    $contadorIteracion++;
                }

                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtener los empleados",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 10: //Insertar Miembros Equipo

            // Asiganar el empleado de una organizacion a un proyecto
            $proyectoid = $_POST['proyectoid'];
            $empleado = $_POST['empleadoid'];
            $cargo = $_POST['cargo'];
            try{
                $sql = "CALL SP_INSERTAR_EMPLEADO_EQUIPO(?,?,?,@mensajeError,@bandera)";
                $query1 = $db->prepare($sql);
                $query1->bindParam(1,$empleado,PDO::PARAM_STR);
                $query1->bindParam(2,$cargo,PDO::PARAM_STR);
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
                    "mensajeError" => "Hubo un error al obtner el equipo",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 11: //Insertar Linea del presupuesto

            // Asiganar el empleado de una organizacion a un proyecto
            $linea = $_POST['lineaPresupuesto'];
            $proyectoid =$_POST['proyectoid'];
            try{
                $sql = "CALL SP_INSERTAR_LINEA(?,?,@mensajeError,@bandera)";
                $query1 = $db->prepare($sql);
                $query1->bindParam(1,$linea,PDO::PARAM_STR);
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
        case 12:
            $proyectoid = $_POST['proyectoid'];
  
            try{
                /* 
                    Obtiene los cooperantes y la cantidad con la que estan apoyando en el proyecto 
                    los cuales conforman el total del proyecto
                 */
                $query = $db->prepare("CALL SP_OBTENER_PRESUPUESTO_PROYECTO(?,@errorMensaje,@bandera);");
                $query->bindParam(1,$proyectoid, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                
                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "fondoid" => htmlentities(utf8_encode($fila['fondoid'])),
                        "destino" => htmlentities(utf8_encode($fila['destino'])),
                        "moneda" => htmlentities(utf8_encode($fila['moneda'])),
                        "monto" =>  htmlentities(utf8_encode($fila['monto']))
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
        case 13: //Edita el proyecto

            try{
                $numeroProyecto = $_POST['numeroProyecto'];
                $nombreProyecto = $_POST['nombreProyecto'];
                $descripcion = $_POST['descripcion'];
                $zona = $_POST['zona'];
                $fechaInicio = $_POST['fechaInicio'];
                $fechaFin = $_POST['fechaFin'];
                $objetivo = $_POST['objetivo'];
                $beneficiario = $_POST['beneficiarios'];
                $sectorEconomico= $_POST['sectorEconomico'];
                $sectorInstitucional= $_POST['sectorInstitucional'];
                $ejeEstrategico = $_POST['ejeEstrategico'];
                $areasFocalizacion = $_POST['areasFocalizacion'];
                $proyectoid = $_POST['proyectoid'];
                $stmt = $db->prepare("CALL SP_MODIFICAR_PROYECTO(?,?,?,?,?,?,?,?,?,?,?,?,?,?,@mensajeError,@bandera)");

                $stmt->bindParam(1, $numeroProyecto, PDO::PARAM_STR); 
                $stmt->bindParam(2, $nombreProyecto, PDO::PARAM_STR); 
                $stmt->bindParam(3, $zona, PDO::PARAM_STR);
                $stmt->bindParam(4, $fechaInicio, PDO::PARAM_STR); 
                $stmt->bindParam(5, $fechaFin, PDO::PARAM_STR);
                $stmt->bindParam(6, $objetivo, PDO::PARAM_STR); 
                $stmt->bindParam(7, $descripcion, PDO::PARAM_STR);
                $stmt->bindParam(8, $sectorEconomico, PDO::PARAM_STR);
                $stmt->bindParam(9, $sectorInstitucional, PDO::PARAM_STR); 
                $stmt->bindParam(10, $ejeEstrategico, PDO::PARAM_STR);
                $stmt->bindParam(11, $areasFocalizacion, PDO::PARAM_STR);
                $stmt->bindParam(12, $beneficiario, PDO::PARAM_STR);
                $stmt->bindParam(13, $proyectoid, PDO::PARAM_STR);
                $stmt->bindParam(14, $organizacionid, PDO::PARAM_STR);  
                $stmt->execute();
                
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
                    "mensajeError" => $mensaje,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 14: //Modifica Miembros Equipo

            try{
                $directorProyecto = $_POST['directorProyecto'];
                $administradorProyecto = $_POST['administradorProyecto'];
                $proyectoid = $_POST['proyectoid'];
                $stmt = $db->prepare("CALL SP_MODIFICAR_MIEMBROS_EQUIPO(?,?,?,@mensajeError,@bandera)");

                $stmt->bindParam(1, $directorProyecto, PDO::PARAM_STR); 
                $stmt->bindParam(2, $administradorProyecto, PDO::PARAM_STR); 
                $stmt->bindParam(3, $proyectoid, PDO::PARAM_STR);  
                $stmt->execute();
                
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
                    "mensajeError" => $mensaje,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 15: //Modificar Linea del presupuesto

            // Asiganar el empleado de una organizacion a un proyecto
            $linea = $_POST['lineaPresupuesto'];
            $proyectoid =$_POST['proyectoid'];
            try{
                $sql = "CALL SP_MODIFICAR_LINEA(?,?,@mensajeError,@bandera)";
                $query1 = $db->prepare($sql);
                $query1->bindParam(1,$linea,PDO::PARAM_STR);
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
        case 16: //Registrar presupuesto

            try{
                $tipoFondo = $_POST['tipoFondo'];
                $cooperanteNacional = $_POST['cooperanteNacional'];
                $cooperante = $_POST['cooperante'];
                $moneda = $_POST['moneda'];
                $monedaNacional = $_POST['monedaNacional'];
                $monedaCooperante = $_POST['monedaCooperante'];
                $monto = $_POST['monto'];
                $montoCooperante = $_POST['montoCooperante'];
                $montoNacional = $_POST['montoNacional'];
                $proyectoid = $_POST['proyectoid'];
                $stmt = $db->prepare("CALL SP_INSERTAR_PRESUPUESTO(?,?,?,?,?,?,?,?,?,?,@mensajeError,@bandera)");

                $stmt->bindParam(1, $tipoFondo, PDO::PARAM_STR);
                $stmt->bindParam(2, $cooperanteNacional, PDO::PARAM_STR); 
                $stmt->bindParam(3, $cooperante, PDO::PARAM_STR); 
                $stmt->bindParam(4, $moneda, PDO::PARAM_STR); 
                $stmt->bindParam(5, $monedaNacional, PDO::PARAM_STR);
                $stmt->bindParam(6, $monedaCooperante, PDO::PARAM_STR);
                $stmt->bindParam(7, $monto, PDO::PARAM_STR);
                $stmt->bindParam(8, $montoCooperante, PDO::PARAM_STR);
                $stmt->bindParam(9, $montoNacional, PDO::PARAM_STR);
                $stmt->bindParam(10, $proyectoid, PDO::PARAM_STR); 
                $stmt->execute();
                
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
                    "mensajeError" => $mensaje,
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 17: //Insertar Componente
            $descripcion = $_POST['descripcion'];
            $proyectoid = $_POST['proyectoid'];
            try{
                $sql = "CALL SP_INSERTAR_COMPONENTE(?,?,@mensajeError,@bandera)";
                $query1 = $db->prepare($sql);
                $query1->bindParam(1,$descripcion,PDO::PARAM_STR);
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
                    "mensajeError" => "Hubo un error al insertar Componente",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 18: //Obtener componentes

            $proyectoid = $_POST['proyectoid'];
            try{
                /* 
                    Obtiene los componentes de un proyecto 
                 */
                $query = $db->prepare("CALL SP_OBTENER_COMPONENTES(?,@errorMensaje,@bandera);");
                $query->bindParam(1,$proyectoid, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                
                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila['componenteId'])),
                        "descripcion" => htmlentities(utf8_encode($fila['descripcion']))
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
        case 19: //Obtener Monedas
            try{
                /* 
                    Obtiene las monedas
                 */
                $query = $db->prepare("SELECT monedaId,moneda FROM tbl_moneda");
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                
                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila['monedaId'])),
                        "nombre" => htmlentities(utf8_encode($fila['moneda']))
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
        case 20:
            /*Obtner los tipos de fondo para la seccion de asignar presupuestos*/
            try{
                $query = $db->prepare("SELECT fondoOrigenId,origen FROM tbl_fondoOrigen");
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                $contadorIteracion = 0;

                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila["fondoOrigenId"])),
                        "nombre" => htmlentities(utf8_encode($fila["origen"]))
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
        case 21:
            // obtine los cooperantes de una organizacion. 
            try{
                $tipo = $_POST['tipo']; 
                $query = $db->prepare("CALL SP_OBTENER_COOPERANTE(?,@mensajeError,@bandera)");
                $query->bindParam(1,$tipo,PDO::PARAM_BOOL);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                $contadorIteracion = 0;

                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila["cooperanteid"])),
                        "nombre" => htmlentities(utf8_encode($fila["nombre"]))
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
        case 22:
            // Inserta un producto a un componente del proyecto determinado
            $descripcion = $_POST['descripcion'];
            $componente = $_POST['componente'];
            try{
                $sql = "CALL SP_INSERTAR_PRODUCTO(?,?,@mensajeError,@bandera)";
                $query1 = $db->prepare($sql);
                $query1->bindParam(1,$descripcion,PDO::PARAM_STR);
                $query1->bindParam(2,$componente,PDO::PARAM_STR);
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
                    "mensajeError" => "Hubo un error al insertar el producto",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 23:
            // obtine los productos de una organizacion. 
            try{
                $proyectoid = $_POST['proyectoid'];
                $query = $db->prepare("CALL SP_OBTENER_PRODUCTOS(?,@mensajeError,@bandera)");
                $query->bindParam(1,$proyectoid,PDO::PARAM_BOOL);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                $contadorIteracion = 0;

                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "descripcion" => htmlentities(utf8_encode($fila["descripcion"])),
                        "componente" => htmlentities(utf8_encode($fila["componente"])),
                        "componenteId" => htmlentities(utf8_encode($fila["componenteId"])),
                        "codigo" => htmlentities(utf8_encode($fila["productoId"]))
                    );
                    
                    $contadorIteracion++;
                }
                
                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al traer los productos",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }

            break;
        case 24:
            $proyectoid = $_POST['proyectoid'];
            try{
                /* Obtiene todos los empleados asiganados a una proyecto que pertenecen a una organizacion */
                $query = $db->prepare("CALL SP_OBTENER_EMPLEADO_EQUIPO(?,@errorMensaje,@bandera);");
                $query->bindParam(1,$proyectoid, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();
                
                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo"=> htmlentities(utf8_encode($fila['codigo'])),
                        "nombre" => htmlentities(utf8_encode($fila['nombre'])),
                        "rolId" => htmlentities(utf8_encode($fila['rolId'])),
                        "rol" => htmlentities(utf8_encode($fila['rol']))
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
        case 25: 

            try{
                /* Obtiene todas las actividades referentes a un proyecto */

                $proyecto = $_POST['proyectoid'];
                $query = $db->prepare("CALL SP_OBTENER_ACTIVIDADES(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$proyecto, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "componente" => $fila['componente'],
                        "producto" => $fila['producto'],
                        "descripcion" => $fila['descripcion'],
                        "codigo" => $fila['codigo'],
                        "nombre" => $fila['nombre'],
                        "componenteId" => $fila['componenteId'],
                        "presupuesto" => $fila['presupuesto'],
                        "productoId" => $fila['productoId'] 
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
        case 26: 
            try{
                /* Inserta una actividad */
                $proyectoid = $_POST['proyectoid'];
                $numeroActividad = $_POST['codigo'];
                $descripcionActividad = $_POST['descripcion'];
                $nombre = $_POST['nombre'];
                $producto= $_POST['producto'];
                $query = $db->prepare("CALL SP_INSERTAR_ACTIVIDAD(?,?,?,?,?,@errorMensaje,@bandera)");
                $query->bindParam(1,$proyectoid, PDO::PARAM_STR);
                $query->bindParam(2,$descripcionActividad, PDO::PARAM_STR);
                $query->bindParam(3,$numeroActividad, PDO::PARAM_STR);
                $query->bindParam(4,$nombre, PDO::PARAM_STR);
                $query->bindParam(5,$producto, PDO::PARAM_STR);
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
        case 27:
            // Inserta un componente del proyecto determinado
            $componente = $_POST['componente'];
           try{

                $query = $db->prepare("CALL SP_OBTENER_PRODUCTOS_COMPONENTE(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$componente, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila['productoId'])),
                        "nombre" => htmlentities(utf8_encode($fila['descripcion']))
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
        case 28:
            // Obtiene las fases de una determinada actividad
            $actividad = $_POST['actividad'];
           try{

                $query = $db->prepare("CALL SP_OBTENER_FASES_ACTIVIDAD(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$actividad, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "codigo" => htmlentities(utf8_encode($fila['codigo'])),
                        "nombre" => htmlentities(utf8_encode($fila['nombre'])),
                        "fechaInicio" => $fila['fechaInicio'],
                        "fechaFin" => $fila['fechaFin'],
                        "responsable" => $fila['responsable'],
                        "responsableId" => $fila['responsableId'],
                        "descripcion" => htmlentities(utf8_encode($fila['descripcion']))
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
        case 29: 
            try{
                /* Inserta una fase */
                $descripcionActividad = $_POST['descripcion'];
                $actividad = $_POST['actividad'];
                $nombre = $_POST['nombre'];
                $query = $db->prepare("CALL SP_INSERTAR_FASE_ACTIVIDAD(?,?,?,@errorMensaje,@bandera)");
                $query->bindParam(1,$actividad, PDO::PARAM_STR);
                $query->bindParam(2,$nombre, PDO::PARAM_STR);
                $query->bindParam(3,$descripcionActividad, PDO::PARAM_STR);
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
                    "mensajeError" => "Hubo un error al insertar la fase",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 30: 
            try{
                /* Inserta una fase */
                $inicio = $_POST['inicio'];
                $fase = $_POST['fase'];
                $fin = $_POST['fin'];
                $query = $db->prepare("CALL SP_INSERTAR_FASE_PROGRAMACION_ACTIVIDAD(?,?,?,@errorMensaje,@bandera)");
                $query->bindParam(1,$fase, PDO::PARAM_STR);
                $query->bindParam(2,$inicio, PDO::PARAM_STR);
                $query->bindParam(3,$fin, PDO::PARAM_STR);
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
                    "mensajeError" => "Hubo un error al insertar Programacion de la fase",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        default:
            break;
    }


?>

