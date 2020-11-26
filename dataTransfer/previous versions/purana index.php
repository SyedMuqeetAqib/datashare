<?php
$dir_path = 'images/';
$images_extension = array('jpg','png','jpeg');

if(is_dir($dir_path)){
    $files_in_dir = scandir($dir_path);

    for($i=2; $i<count($files_in_dir);$i++){
        if($files_in_dir[$i] != '.' || $files_in_dir[$i] != '..'){
        print_r($files_in_dir[$i]."<br>".$i);
        }
    }
}


function getClientIP(){       
    if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)){
           return  $_SERVER["HTTP_X_FORWARDED_FOR"];  
    }else if (array_key_exists('REMOTE_ADDR', $_SERVER)) { 
           return $_SERVER["REMOTE_ADDR"]; 
    }else if (array_key_exists('HTTP_CLIENT_IP', $_SERVER)) {
           return $_SERVER["HTTP_CLIENT_IP"]; 
    } 

    return '';
}
$ip = getClientIP();
echo "Your IP address is: ".$ip."<br><br>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
 
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

     
    <title>Data Transfer</title>
</head>
<link rel="stylesheet" type="css" href="/css/style.css" media="screen" />
<style>
#hiddenButtons{
    position: fixed;
  width: 100%;
  bottom: 10px;
  border: 3px solid #8AC007;
  display:none;
}



@media only screen and (max-width: 500px) {
   .imagesize{
       /* width:140px !important;
       height:150px !important; */
   }
  }
</style>
<body class="pb-4 mb-4">
    <form action="uploadImage.php" method="post" enctype="multipart/form-data">
        
        <pre><label>Select File to Upload: </label>   </pre> 
        <input type="file" name="insertFile[]" id="" multiple="">
        

        <br><br>
        <input type="submit" name="fileSubmit" value="Upload">
    </form>
    <h2 class="text-center">Recently Uploaded</h2>
    <div class="container">
        <form action="download2.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <?php
                foreach($files_in_dir as $file_name){
                    if($file_name == "." || $file_name ==".."){}
                    else{
                    echo "<div class='col-4 col-lg-3 col-sm-4 col-xs-3'>
                    <label> <img src='".$dir_path."/".$file_name."' class='img-fluid img-responsive imagesize mt-4 mb-2'><br><input type='checkbox' onclick='checkboxValid()' class='checkboxValidation' name='selectedImages[]' value='".$file_name."'>
                   <center> <a href='".$dir_path."/".$file_name."' download><input class='mr-1 fas fa-trash-alt' type='button' value='&#xf0ab'></a>
                   <input  class='ml-1 fas fa-trash-alt' value='&#xf2ed' name='deleteImage' type='button'></center></label>
                    </div>";
                    }
                }

                // 
            ?>
            <div class="col-lg-3 col-3 ">
                dfdf
            </div>
            <div class="col-lg-3 col-3">
            sdfsdf
            </div>
            <div class="col-lg-3 col-3">
            sdfsdf
            </div>
            <div class="col-lg-3 col-3">
            sdfsdf
            </div>
            <div class="col-lg-3 col-3">
            sdsfd
            </div>
            <div class="col-lg-3 col-3">
            ghghh
            </div>
        </div>
        
       
    </div>
    <div class="container-fluid">
    
    <div class="row pt-2 pb-2 bg-success w-100 " id="hiddenButtons">
            <div class="col-12">
                <center> <input type='submit' value="Delete Selected Images" name="deleteSelectedImages">
                <input type='submit' class="mr-4" value="Download Selected Images" name="downloadSelectedImages">
               </center>
            </div>
    </div>
    </form>
    <div id="bottomGap">
    
    </div>
    </div>
   
    <?php
    
    // echo '<img src="images/">';
    ?>
</body>
<script>

function buttonHide(){
    let downloadAndDeleteButton = document.getElementById("hiddenButtons");
    downloadAndDeleteButton.style.display="none";
}

function buttonShow(){
    let downloadAndDeleteButton = document.getElementById("hiddenButtons");
    downloadAndDeleteButton.style.display="block";
}

function checkboxValid(){
    var edit = document.getElementsByClassName('checkboxValidation');
    let count = 0;
    for (let i = 0 ; i < edit.length ; i++){
        if(edit[i].checked){
            count++;
        }
    }
    if(count > 0){
        buttonShow();
    }
    else{
        buttonHide();
    }
}





</script>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
</html>
