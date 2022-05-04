<?php

$file_name = $_FILES["file_to_upload"]["name"];
$file_temp_location = $_FILES["file_to_upload"]["tmp_name"];
$len = strlen($file_name);
$len = $len - 1;
$formato = "";
$token = uniqid();

//$token = substr($token,0,13);

for($i=0;$i<=$len;$i++){
    if($file_name[$i]== "."){
        for($i2 = $i; $i2 <= $len;$i2++){
            $formato .= $file_name[$i2];
        }
    }
}


$file_name = "$token$formato";


if (!$file_temp_location) {
    echo "ERROR: No file has been selected";
    exit();
}

if(move_uploaded_file($file_temp_location, "../../uploads/$file_name")){
    die(json_encode(["nome",$file_name]));
} else {
    echo "A server was unable to move the file";
}

?>