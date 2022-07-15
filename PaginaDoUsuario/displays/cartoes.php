<!-- Cartoes -->
<section class="config-display" page='enderecos'>

<div class="user-data flex column center">
    <div class="user-icon"><i class="fa-regular fa-user"></i></div>

    <h2><?php echo $userData['nome'] ?></h2>
    <span><?php echo $userData['celular'] ?></span>
</div>

<?php
    $cardData = normalDbQuery("SELECT * FROM `usuarios-cards` WHERE id='".$_SESSION['dados']['id']."'");
    $cardData = $cardData[0];

    // print_r($endereco);
?>


<form action="" class="user-card-form local-form">

    <div class="flex column center wrap space-top">

    
        <div class="enter">
        <label for="num-card">numero do cartão: </label>
        <input type="text" name="num-card" id="num-card" style="width: 300px;" class="card" value="<?php echo @$cardData['num-card'] ?>">
        </div>

        <div class="enter">
        <label for="cvv">CVV: </label>
        <input type="text" name="cvv" id="cvv" style="width: 75px;" class="card"  value="<?php echo @$cardData['cvv'] ?>">
        </div>



        <div class="enter">
        <label for="validade">Validade(MM/AAAA): </label>
        <input type="text" name="validade" id="validade" style="width: 100px;" class="card"  value="<?php echo @$cardData['validade'] ?>">
        </div>




    <div>


    <div class="flex row center wrap space-top">
        <button style="width: 120px;">Salvar</button>
    </div>
</form>


</section>
<!-- Cartoes -->