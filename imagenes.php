<?php 
	
    function upload_image($destination_dir,$name_media_field){
        $tmp_name = $_FILES[$name_media_field]['tmp_name'];
        //si hemos enviado un directorio que existe realmente y hemos subido el archivo    
        if ( is_dir($destination_dir) && is_uploaded_file($tmp_name))
        {
            $code = rand();
			$img_file  = $code.$_FILES[$name_media_field]['name'] ;
            $img_type  = $_FILES[$name_media_field]['type'];
			
            //¿es una imágen realmente?           
            if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type,"jpg")) || strpos($img_type,"png") )){
                //¿Tenemos permisos para subir la imágen?
                if(move_uploaded_file($tmp_name, $destination_dir.'/'.$img_file)){
                    return $img_file;
                }
            }
        }
        //si llegamos hasta aquí es que algo ha fallado
        return false;
    }//end function
	
?>