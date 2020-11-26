 <?php

include "ipaddr.php";
$sample_dir = createFolderIP();
// echo "Your folder will be ".$sample_dir;
if(is_dir(createFolderIP())){
    $dir_path = createFolderIP()."/images/";
    // echo "Path is : ".$dir_path;


    if(is_dir($dir_path)){
        if(count(glob($dir_path."/*")) != 0){
            $files_in_dir = scandir($dir_path);
    
        for($i=2; $i<count($files_in_dir);$i++){
            if(count($files_in_dir)>2){
                if($files_in_dir[$i] != '.' || $files_in_dir[$i] != '..'){
                    // print_r($files_in_dir[$i]."<br>".$i);
                    // echo "Total files are: ".count($files_in_dir);
                    }
            }
        }
        // echo "files are uploaded";
        }
        else{
            $files_in_dir = 0 ;
        }
    }
    else{
        // echo "files not uploaded yet!";
        $files_in_dir = 0;
    }
}
else{
    $files_in_dir = 0;
}

// textarea fetch and save
$text_dir = createFolderIP()."/text/text.txt";

if(file_exists($text_dir)){
    // echo "<br><br>text file hai<br><br>";    

}
else{
    // echo "<br><br>text file nai hai<br><br>";    
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

<?php
    include 'nav and footer/nav.php';
?>

<ul class="nav nav-tab bg-light sticky-top border-accent shadow border-top-0-css d-flex justify-content-center" id="myTab" role="tablist">        
    <li class="nav-item">
        <a class="nav-link active text-dark" id="home-tab" data-toggle="tab" href="#images" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-image fa-lg"></i> Images</a>
    </li>
    <li class="nav-item">
        <a class="nav-link  text-dark" id="profile-tab" data-toggle="tab" href="#text" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-copy fa-lg"></i> Text</a>
    </li>           
</ul>
    
</span>
  
    <div class="tab-content " id="myTabContent">
        <div class="container tab-pane fade active show"  id="images" role="tabpanel" aria-labelledby="home-tab" >
            <div class="row mt-2 ">
                <div class="col-3">
                    
                </div>
                <div class="col-6">
                <center><h4>Recently Added</h4></center>
                </div>
                <div class="col-3">
                    <?php
                        if($files_in_dir){
                        echo '<span class="float-right font-weight-bold"><input class="text-white rounded-lg font-weight-bold" id="selectAll" type="button" value="Select All" onclick="selectAll()"></span>';
                        }
                    ?>
                </div>
            </div>
            <form action="download.php" method="post" enctype="multipart/form-data">
            <div class="row">

            <div class='col-4 col-sm-2 col-xs-3 '>
                <label>   
                    <div id='addNew' title="Click Here to Add a File" class='card crop mt-2 justify-content-center d-flex border-0'>
                        <center><img class='rounded-lg justify-content-center d-flex crop-new-image img-fluid img-responsive m-1' src='images/new-file.png'></center>
                        <span  class='justify-content-center d-flex font-weight-bold'>
                            Add New File
                        </span>
                    </div>
                    <div class='card-body m-0 p-0 pt-1'>
                      
                    </div>
                </label>
            </div>


            <!-- <div class="card-deck"> -->
                <?php
                $x = 0;
                if($files_in_dir){
                    foreach($files_in_dir as $file_name){
                        if($file_name == "." || $file_name ==".."){}
                        else{        
                    $file_name_length = strlen($file_name);
                    
                        echo "
                        <div class='col-4 col-sm-2 col-xs-3 '>
                            <label>   
                                <div id='".($x+1000)."' class='card crop mt-2'>";
                                if(substr($file_name,$file_name_length-4)===".mp3"){                   
                                   echo "
                                   <img class='rounded-lg crop-music-image img-fluid img-responsive m-1' src='images/music-logo.png' alt='Card image cap'>
                                   <p >".$file_name."</p>
                                   ";
                                }
                                else{
                                    echo "<img class='rounded-lg  img-fluid img-responsive m-1' src='".$dir_path."/".$file_name."' alt='Card image cap'>";
                                }
                                echo "</div>
                                <div class='card-body m-0 p-0 pt-1'>
                                    <input id='".$x."' type='checkbox' onclick='checkboxValid()' class='checkboxValidation d-none' name='selectedImages[]' value='".$file_name."'>
                                    <span  class='justify-content-center d-flex'>
                                        <a href='".$dir_path."/".$file_name."' download>
                                        <input  class='rounded-lg text-white font-weight-bold' type='button' value='Download'></a>
                            
                                    </span>
                                </div>
                            </label>
                        </div>
                        ";
                   }
                    $x++;
                        }
                    }
                    else{
                        echo "<div class='col-8 col-xs-9 col-sm-10 mt-5'>
                        <center><h2 > You don't have any file to share, click on add new file to share now!</h2></center>
                    </div>";
                    }

                ?>
               <!-- </div> end of card deck -->
               <div class="row mt-4">
                <div class="col-12">
                    <h6>
                        <ol class="p-5">
                            <li class='p-3'>Share your data by adding new file, you can access your data on your other device connected to same network.</li>
                            
                            <li class='p-3'>Don't worry your data will be just for this network connection!</li>
                            
                            <li class='p-3'>Your data will be removed after 30 minutes of adding.</li>
                        </ol>    
                    </h6>                    
                </div>
            </div>   
            </div>
            

        </div>

    <div class="container-fluid">
            <div class="row pt-2 pb-2 rounded shadow border-secondary w-100 uploadButtons">
                <div class=" mb-0">
                    
                    <center> 
                    <span id="selectionCount" class=" font-weight-bold"></span>
                    <input class="border shadow fa p-2 w-25 border-danger bg-light rounded" type='submit' value="&#xf2ed" name="deleteSelectedImages">
                    <input type='submit' class="fa p-2 w-25 mr-4 border-success shadow bg-light rounded" value="&#xf358" name="downloadSelectedImages">
                   </center>
                </div>
            </div>
        <div class="row pt-2 pb-2 rounded shadow border-secondary w-100 hiddenButtons" id="hiddenButtons">
                <div class=" mb-0">
                    
                    <center> 
                    <span id="selectionCount" class=" font-weight-bold"></span>
                    <input class="border shadow fa p-2 w-25 border-danger bg-light rounded" type='submit' value="&#xf2ed" name="deleteSelectedImages">
                    <input type='submit' class="fa p-2 w-25 mr-4 border-success shadow bg-light rounded" value="&#xf358" name="downloadSelectedImages">
                   </center>
                </div>
        </div>
        </form>
        <div id="bottomGap">
        
        </div>
    </div>
    <div class="container tab-pane fade mt-3" id="text" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row m-3">
            <div class="col-12">
            <center><h2>TEXT</h2></center>
            </div>
        </div>
        <div class="row">
           <dic class="col-12">
           <form action="savetext.php" method="post"  enctype="multipart/form-data"> 
               <textarea name="userText" id="userText" placeholder="Type something..." class="autoresize-text w-100 h4"  style="overflow: hidden; overflow-wrap: break-word; resize: none; height: auto;min-height:210px;"><?php
               if(file_exists($text_dir)){
                $myfile = fopen($text_dir, "r") or die("Unable to open file!");
                echo htmlspecialchars_decode(fread($myfile,filesize($text_dir)));
                fclose($myfile);
                }
                
               ?></textarea>
               <br><span class='text-light'>
                   <h4>
               <input type="submit" value="Save" name="saveText" id="saveText" onclick="" class='rounded-lg text-light text-lg'>
            </h4>
               </span>
            </form>
           </dic>
        </div>
    </div>


            </div>
<?php 
    include 'nav and footer/footer.php'; 
?>
</body>
<script src="js/app.js"></script>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script>
      $("div[id='addNew']").click(function() {
    $("input[id='filesToUpload']").click();
});
  </script>
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