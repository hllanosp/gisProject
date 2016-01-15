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