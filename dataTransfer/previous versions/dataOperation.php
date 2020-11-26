 <?php

include "ipaddr.php";
if(is_dir(createFolderIP())){
    $dir_path = createFolderIP()."/images/";
    echo "Path is : ".$dir_path;
    if(is_dir($dir_path)){
        $files_in_dir = scandir($dir_path);
    
        for($i=2; $i<count($files_in_dir);$i++){
            if($files_in_dir[$i] != '.' || $files_in_dir[$i] != '..'){
            print_r($files_in_dir[$i]."<br>".$i);
            }
        }
        
    }
    else{
        echo "You have not uploded a file yet!";
    }
}

// textarea fetch and save
$text_dir = createFolderIP()."/text/text.txt";

if(file_exists($text_dir)){
    echo "<br><br>text file hai<br><br>";    

}
else{
    echo "<br><br>text file nai hai<br><br>";    
}

?>
<!-- * show to file only one who have same network address
     * delete files if it does not recognize my ip address
     * delete files after 30 minutes of time out
     * a button to delete data when ever user wants
     * a button to extend time off (deletion time for 30 more minutes)
     * add a function to create account
     * 
 -->


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
  /* border: 3px solid #8AC007; */
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
    <div class="container">
    <div class="row">
        <div class="col-3">
            <form action="uploadImage2.php" method="post" enctype="multipart/form-data">
                
                <label>Select File to Upload: </label>
                <input type="file" name="insertFile[]" id="" multiple="" >
                
                <input class="mt-2 ml-3" type="submit" name="fileSubmit" value="Upload">
            </form>
        </div>
        <div class="col-6">
            <h1 class="text-center mt-4">Recently Uploaded</h1>
        </div>
        <div class="col-3">

        </div>
    </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-info border shadow">
  <a class="navbar-brand font-weight-bold" href="#">Data Transfer</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
     
    </ul>
    <form class="form-inline my-lg-0 text-dark font-weight-bold" action="uploadImage2.php" method="post" enctype="multipart/form-data">
                
                <label class="mr-2 ">Select File: </label>
                <input class="p-0 m-0 rounded " type="file" name="insertFile[]" id="" multiple="" >
                
                <input class="rounded" type="submit" name="fileSubmit" value="Upload">
            </form>
  </div>
</nav>

    <ul class="nav nav-tabs sticky-top bg-light border-dark shadow d-flex justify-content-center" id="myTab" role="tablist">
        
            <li class="nav-item">
                   <a class="nav-link active text-dark" id="home-tab" data-toggle="tab" href="#images" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-image fa-lg"></i> Images</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" id="profile-tab" data-toggle="tab" href="#text" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-copy fa-lg"></i> Text</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                </li>
        
    </ul>

  
    <div class="tab-content " id="myTabContent">
        <div class="container tab-pane fade active show"  id="images" role="tabpanel" aria-labelledby="home-tab" >
            <form action="download.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <?php
                if($files_in_dir){
                    foreach($files_in_dir as $file_name){
                        if($file_name == "." || $file_name ==".."){}
                        else{
                        echo "<div class='col-4 col-lg-3 col-sm-4 col-xs-3'>
                        <label > <img src='".$dir_path."/".$file_name."' class='img-fluid img-responsive imagesize mt-4 mb-2'><br>
                        <input type='checkbox' onclick='checkboxValid()' class='checkboxValidation d-flex-inline' name='selectedImages[]' value='".$file_name."'>
                        <a class='col-8 float-right' href='".$dir_path."/".$file_name."' download>
                        <input class='w-50 fas fa-trash-alt' type='button' value='&#xf0ab'></a></label>
                        </div>";
                        }
                    }
                }

                    // 
                ?>
               
            </div>
        </div>
      
        
    

    

    <div class="tab-pane fade container" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        hello

    </div>

    <div class="container-fluid">
    
        <div class="row pt-2 pb-2 bg-info rounded shadow border-secondary w-100 " id="hiddenButtons">
                <div class=" mb-0">
                    <center> <input class="border shadow fa p-2 w-25 border-danger bg-muted rounded" type='submit' value="&#xf2ed" name="deleteSelectedImages">
                    <input type='submit' class="fa p-2 w-25 mr-4 border-success shadow bg-muted rounded" value="&#xf358" name="downloadSelectedImages">
                   </center>
                </div>
        </div>
        </form>
        <div id="bottomGap">
        
        </div>
    </div>
    <div class="container tab-pane fade mt-3" id="text" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row">
            <h2>TEXT</h2>
        </div>
        <div class="row">
           <dic class="col-12">
           <form action="savetext.php" method="post"  enctype="multipart/form-data"> 
               <textarea name="userText" id="userText" placeholder="Type something..." class="autoresize-text w-100 h4"  style="overflow: hidden; overflow-wrap: break-word; resize: none; height: auto;min-height:210px;"><?php
               if(file_exists($text_dir)){
                $myfile = fopen($text_dir, "r") or die("Unable to open file!");
                echo fread($myfile,filesize($text_dir));
                fclose($myfile);
                }
                
               ?></textarea>
               <br>
               <input type="submit" value="Save" name="saveText" id="saveText" onclick="">
            </form>
           </dic>
        </div>
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


<!-- 
    * deletion in every 30 minutes
    * save text from textarea element
    * check if text.txt file is available
    * if not available then create after submition


    ****front end****
    * unselect all button to unselect all selected photos
    * select all button
    * add a row to make a grid in line
    * use cards instead of images to show files
    * Upload button on the bottom
    * crop images in div to make it sqaure
 -->