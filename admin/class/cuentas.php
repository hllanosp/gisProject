<?php 
	session_start(); 

    $organizacionid = $_SESSION['organizacionId'];
    require_once ("config.inc.php");

    $opcion = $_POST['opcion'];

    switch($opcion){

        case 0: 

            try{
                /* Obtiene las cuentas asociadas a una organizacion */
                $query = $db->prepare("CALL SP_OBTENER_CUENTAS_ORGANIZACION(?,@errorMensaje,@bandera)");
                $query->bindParam(1,$organizacionid, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "nombre" => $fila['nombre'],
                        "descripcion" => $fila['descripcion'],
                        "codigo" => $fila['codigo']
                    );
                    
                    $contadorIteracion++;
                }

                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtener las cuentas",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 1: 

            try{
                /* Obtiene las cuentas de todo el proyecto */
                $query = $db->prepare("CALL SP_OBTENER_CUENTAS(@errorMensaje,@bandera)");
                $query->execute();
                $result = $query->fetchAll();
                $json = array();

                $contadorIteracion = 0;
                foreach($result as $fila){ 
                    $json[$contadorIteracion] = array(
                        "nombre" => $fila['nombre'],
                        "descripcion" => $fila['descripcion'],
                        "codigo" => $fila['codigo']
                    );
                    
                    $contadorIteracion++;
                }

                echo json_encode($json);
            }catch(PDOExecption $e){
                $json[0] = array(
                    "mensajeError" => "Hubo un error al obtener las cuentas",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        case 2: 

            try{
                /* Inserta una cuenta a una organizacion */

                $cuenta = $_POST['codigoCuenta'];
                $query = $db->prepare("CALL SP_INSERTAR_CUENTA_ORGANIZACION(?,?,@errorMensaje,@bandera)");
                $query->bindParam(1,$proyecto, PDO::PARAM_STR);
                $query->bindParam(2,$organizacionid, PDO::PARAM_STR);
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
                    "mensajeError" => "Hubo un error al insertar la cuenta",
                    "bandera" => $bandera
                );
                
                echo json_encode($json);
            }
            break;
        
        default:
            break;
        }


 ?>