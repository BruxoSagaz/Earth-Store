<?php
include("PDO.php");

$id = $_POST['id'];
$data = array();


$querys = "SELECT * FROM `produto` WHERE ID = $id";

function dbQuery($query){
    global $pdo;
    $sql = $pdo->prepare($query);

    try{
        $receive = $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $key => $value){

            foreach ($value as $key2 => $value2){
                // echo '<br>';
                // echo "key = $key2   ";
                // echo " value = $value2";
                // echo '<br>';

                $data[$key2] = $value2;
            }
        }

        die(json_encode($data));
    }catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
}

dbQuery($querys);
?>