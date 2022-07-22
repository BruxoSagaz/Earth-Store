<?php
include("PDO.php");

$id = $_POST['id'];
$data = array();


$querys = "DELETE FROM `produto` WHERE `id` = ?";
$valorys = [$id];

// $sql = $pdo->query("DELETE FROM `produto` WHERE `id` = $id");


function dbQuery($query,$valores){
    global $pdo;
    $sql = $pdo->prepare($query);

    try{
        $sql->execute($valores);
        $data['sucesso']='true';
        die(json_encode($data));
    }catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
}

function apagarIm($id){
    $queryInterna = "SELECT `imagens` FROM `produto` WHERE `id` = ?";
    $valores = [$id];
    global $pdo;
    $sql = $pdo->prepare($queryInterna);
    try{
        $sql->execute($valores);
        
        if($sql->rowCount() > 0 ){
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $key => $value){
                foreach ($value as $key2 => $value2){
                    $value2 = explode(" ",$value2);
                    foreach($value2 as $value3){
                        if(file_exists("../../uploads/$value3") && $value3 != ""){
                            // echo "Apagando $value3";
                            unlink("../../uploads/$value3");
                        }
                    }
                }
            }

            return True;
        }
    }catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
}

apagarIm($id);
dbQuery($querys,$valorys);
?>