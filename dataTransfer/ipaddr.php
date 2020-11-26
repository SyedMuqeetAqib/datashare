<?php
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

function createFolderIP(){
    $ip = getClientIP();
// echo "Your IP address is: ".$ip."<br><br>";
$difference = 0;
for ($i = strlen($ip)-1 ; $i >= 0 ; $i--){
    // echo $ip[$i]."<br>";
    if($ip[$i] == "." || $ip[$i] == ":"){
        // echo $i;
        $difference = $i;
        
    break;
    }

}

return "users/".substr($ip,0,$difference);
}
?>