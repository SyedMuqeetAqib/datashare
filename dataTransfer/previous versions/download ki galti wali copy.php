<?php
include "ipaddr.php";
$ip = createFolderIP();
$error = ""; //error holder  
$file_folder = $ip."/images/"; // folder to load files 
 if(isset($_POST['downloadSelectedImages']))  
 {  
      $post = $_POST;   
      
      if(extension_loaded('zip'))  
      {   
           // Checking ZIP extension is available  
           if(isset($post['selectedImages']) and count($post['selectedImages']) > 0)  
           {   
                // Checking files are selected  
                $zip = new ZipArchive(); // Load zip library   
                $zip_name = time().".zip";           // Zip name  
                $files = $post['selectedImages'];
                $zip = new ZipArchive;
                $zip->open($zip_name, ZipArchive::CREATE);
                foreach ($files as $file) {
                    $new_filename = substr($file,strrpos($file,'/') + 1);
                    $zip->addFile($file_folder.$file,$new_filename);
                }
                $zip->close();
                // and to stream it:

                header('Content-Type: application/zip');
                header('Content-Disposition: attachment; filename='.$zip_name."");
                
                readfile($zip_name);
                unlink($zip_name);
                // if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)  
                // {   
                //      // Opening zip file to load files  
                //      $error .= "* Sorry ZIP creation failed at this time";  
                // }  
                // foreach($post['selectedImages'] as $file)  
                // {   
                //      $zip->addFile($file_folder.$file); // Adding files into zip  
                // }  
                // $zip->close();  
                // if(file_exists($zip_name))  
                // {  
                //      // push to download the zip  
                //      header('Content-type: application/zip');  
                //      header('Content-Disposition: attachment; filename="'.$zip_name.'"');  
                //      readfile($zip_name);  
                //      // remove zip file is exists in temp path  
                //      unlink($zip_name);  
                // }  
           }  
           else  
           {  
                $error .= "* Ple1ase select file to zip ";  
                echo $error;
           }  
      }  
      else  
      {  
           $error .= "* You dont have ZIP extension";  
      }  
 }  

 if(isset($_POST['deleteSelectedImages'])){
     $post = $_POST;
     if(isset($post['selectedImages']) and count($post['selectedImages']) > 0)  
      { 
          $files = $post['selectedImages'];
          foreach ($files as $file){
               unlink($ip."/images/".$file);
               header('Location: dataOperation.php');
          }
     
     // 
      }
     // if(isset($post['selectedImages']) and count($post['selectedImages']) > 0)  
     // {   header('Location: index.php');
     //      echo 'ho raha hai';
     // }
 }
?>