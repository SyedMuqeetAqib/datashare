<?php
include "ipaddr.php";

$dir_path = createFolderIP()."/images/";
echo "File will be save in ".$dir_path;
function uploadImage(){
   
    $files = $_FILES['insertFile'];
    $count = count($files['name']);
    echo "<br><br>Total number of images uploaded now: ".$count;
    
    for($i=0 ; $i<$count; $i++){
        if($files['error'][$i]){
            echo $files['error'][i];
        }
        else{
        $file_name = $files['name'][$i];
        $file_type = $files['type'][$i];
        $file_size = $files['size'][$i];
        $file_tem_loc = $files['tmp_name'][$i];
        $file_store = createFolderIP()."/images/".$file_name;

  
        move_uploaded_file($file_tem_loc, $file_store);
        
        }
    }
    header("Location:index.php");

}

if (isset($_FILES['insertFile'])){
    if(is_dir($dir_path)){
        echo "File is : ".$dir_path."";
        uploadImage();
    }
    else{ 
        mkdir($dir_path,0777,true);
        uploadImage();
    }
    
}
?>