<?php
include("PDO.php");

$categoria = $_POST['categoria'];
$data = array();


$querys = "SELECT * FROM `variacoes` WHERE `categoria` = ?";
$valores = [$categoria];

function dbQuery($query,$valores){
    global $pdo;
    $sql = $pdo->prepare($query);

    try{
        $receive = $sql->execute($valores);
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

dbQuery($querys,$valores);
?>