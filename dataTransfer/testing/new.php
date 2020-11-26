<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <style>
    img{
        width:300px;
        height:300px;
    }
    </style>
</head>
<body>
    <h1>Uploading and deleting testing</h1>
    <br>
    <br>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="fileUpload">Select File to Upload: </label><input type="file" id="fileUpload" name="fileUpload">
        <br><br>
        <input type="submit" value="Upload" name="upload"  id="upload">

    <div>
        <?php
         $files_in_dir = scandir("img/");
    
         for($i=2; $i<count($files_in_dir);$i++){
             if($files_in_dir[$i] != '.' || $files_in_dir[$i] != '..'){
             print_r($files_in_dir[$i]."<br>".$i);
             echo "<img src='img/".$files_in_dir[$i]."'><br>
             <input type='submit' value = '".$files_in_dir[$i]."' id='delete' name='delete' value='".$files_in_dir[$i]."'>
             <br><br>";
            }
        }
        ?>
    </div>
    </form>

</body>
</html>

<?php

if(isset($_POST['upload'])){
    $files = $_FILES['fileUpload']; 
       if ($files['error']){
           echo $files['error'];
       }
       else {
       $file_name = $files['name'];
       $file_type = $files['type'];
       $file_size = $files['size'];
       $file_tem_loc = $files['tmp_name'];
       $file_store = "img/".$file_name;
       move_uploaded_file($file_tem_loc, $file_store);
       header("Location: new.php");  
       }
   }
   

if(isset($_POST['delete'])){
  $file_name = $_POST['delete']  ;
  unlink("img/".$file_name);
  header("Location:new.php");
}
?>