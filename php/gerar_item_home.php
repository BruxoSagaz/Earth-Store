<?php

function gerarAleatorio(){
    global $pdo;
    $query = "SELECT * FROM `produto` ORDER BY RAND() LIMIT 10";


    $sql = $pdo->prepare($query);
    $sql->execute();

    if($sql->rowCount() > 0 ){
        foreach($sql->fetchAll() as $value){
            construirItem($value);
        }
    }
}

function gerarMaisVendidos(){
    global $pdo;
    $query = "SELECT * FROM `produto` ORDER BY `vendas` DESC LIMIT 10";


    $sql = $pdo->prepare($query);
    $sql->execute();

    if($sql->rowCount() > 0 ){
        foreach($sql->fetchAll() as $value){
            construirItem($value);
        }
    }
}



function construirItem($item){
    $imagens = explode(" ",$item['imagens']);
    $promFormatado = number_format($item['valor_em_promocao'],2,",",".");
    // Formatando dinheiro
    $valFormatado = number_format($item['preco'],2,",",".");
    $parcelas = intval($item['parcelas']);

    

    echo '<div class="item promotion">';
    echo '<div class="product">';
    echo '<div class="product-allign">';
    echo '<div class="product-image">';
    echo '<a href="individual&id='.$item['id'].'">';
    
    // Calcular valor de procentagem
    if($item['promocao'] != 0){
        echo '<div class="discount">';
        $valorPercent =  calcularPorcentagem($item['valor_em_promocao'],$item['preco']);
       echo $valorPercent;
       echo '</div>';
    }
    
    // echo '<div class="prom-value">';
    // if($item['promocao'] != 0){
    //     echo "R$ ".$item['valor_em_promocao'];
    // }
    // echo '</div>';

    echo '<div class="img-field">';
    echo "<img src='./uploads/$imagens[0]' alt='Terço' class='img'>";
    if(count($imagens) > 1){
    echo "<img src='./uploads/$imagens[1]' alt='Terço' class='sec_img'>";
    }
    echo '</div>';
    echo '</a>';
    echo '</div>';



    echo '<div class="product-name">'.$item['nome'].'</div>';
    echo '</div>';


    echo '<div class="under-area">';
    echo '<div class="price-cart-allign">';

    echo '<div class="price-box">';
    echo '<div class="price-item">';
    // area de preço
    if($item['promocao'] != 0){
    echo '<div class="price-before">R$ '.$valFormatado.'</div>';
    echo '<div class="price-off" valor="'.$item['preco'].'"> R$ '.$promFormatado.'</div>';
    // adicionando as divisoes
    $divisoes = floatval($item['valor_em_promocao']) / $parcelas;
    }else{
        echo '<div class="price-off" valor="'.$item['preco'].'"> R$ '.$valFormatado.'</div>';
        $divisoes = floatval($item['preco']) / $parcelas;
        
    }
    // area de preço
    echo '</div>';

    // Tratamento das divisoes
    $divisoes = strval($divisoes);
    
    // $divisoes = str_replace(".",",",$divisoes);
    if(strpos($divisoes,".")){
        $divisoes = str_replace(".",",",$divisoes);
        $divisoes = explode(",",$divisoes);
        
        $tam = strlen($divisoes[1]);

        if( $tam < 2){
            for($i=$tam;$i<2;$i++){
                $divisoes[1] = $divisoes[1]."0";
            }
        }

        $divisoes = implode(",",$divisoes);
    }else{
        $divisoes = $divisoes.",00";
    }
    $divisoes = str_replace(",",".",$divisoes);
    echo '<div  class="divisions">';
        echo '<span> Ou até '.$parcelas.'x de R$ '.number_format($divisoes,2,',','').'</span>';
        echo '<span>+ Frete</span>';
    echo '</div>';

    echo '</div>';

    echo '<div class="add-to-cart">';
    echo '<input type="number" value="1" max="'.$item['estoque'].'">';
    echo '<button class="button-add-cart">Adicionar ao Carrinho</button>';
    echo '<div class="item-id" style="display:none;">'.$item['id'].'</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '</div>';
    echo '</div>';



}

function calcularPorcentagem($prom,$preco){
    $final = ($prom * 100) / $preco;
    $final = round($final);
    $final = strval($final);
    $final = $final."%"; 
    return $final;
}


?>