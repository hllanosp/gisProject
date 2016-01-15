<?php
	
	session_start();
	$mensaje = []; 	
	$storeFolder = '../../doc_cargados/docs_'.$_SESSION['organizacionId']."/"; 
	if(is_dir($storeFolder)){
		
		if (!empty($_FILES)) {
		     
		    $tempFile = $_FILES['file']['tmp_name'];             
		     
		    $targetFile =  $storeFolder. basename($_FILES['file']['name']);  
		 	if(!move_uploaded_file($tempFile,$targetFile)){
		 		$mensaje =['error' => 'No se pudieron subir los archivos, intente nuevamente'];
		 	}
		      
		}else {

	        $mensaje =['error' => 'No se encontraron archivos'];
    	}
	}else{
		 $mensaje =['error' => 'Directorio no Existe'];
	}
    echo json_encode($mensaje);
?>  


