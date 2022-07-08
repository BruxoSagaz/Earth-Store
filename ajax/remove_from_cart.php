<?php
session_start();
$data = array();
$data['sucesso'] = "false";

$id = trim($_POST['id']);

if(isset($_SESSION['cart'])){

    foreach ($_SESSION['cart'] as $key => $value) {
      
        // print_r($value);
        // echo $id;
        if(isset($value['id'])){
            if($value['id']==$id){
                unset($_SESSION['cart'][$key]);
                $data['sucesso'] = "true";
            }
        }

    }
}


die(json_encode($data));
?>