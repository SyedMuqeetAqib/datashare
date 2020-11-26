<?php
   include "ipaddr.php";
$text_dir = createFolderIP()."/text/";


if(file_exists($text_dir)){
    echo "<br><br>text file hai aur path hai : ".$text_dir."<br><br>";    

}
else{
    echo "<br><br>text file nai hai aur path hai: ".$text_dir."<br><br>";    
}
function saveTextFile(){
    global $text_dir;
    $userText = $_POST['userText'];
    $userText = trim(htmlspecialchars($userText));
    $userText = stripslashes($userText);
    $userText = htmlentities($userText);
    echo $userText;
    if(!empty($userText)){
    
    $filewrite = fopen($text_dir."/text.txt","w+");
    fwrite($filewrite,$userText);
    fclose($filewrite);
    echo $text_dir;
    header("Location: index.php");
}
}
   if(isset($_POST['saveText'])){
       echo "bahir hai abhi";
      if(file_exists($text_dir)){
          echo "idher pohanch raha hai";
        saveTextFile();
      }
      else{

        echo "directory has been made";
        mkdir($text_dir,0777,true);
        saveTextFile();
      }
    }

?>
