<?php
//Käyttäjän tila

if($_SESSION['sloggedIn']=="yes"){
    include("includes/navigaatio.php");
?>
<main>
    
<div class="row">
    <div class="column">
        <div class="blue-title">
            <h3>Profiili</h3>
        </div>
        <?php echo("<p> Nimi " .$_SESSION['sfirstName']. "");?>
        <?php echo("<p> Maa " .$_SESSION['slastName']. "");?>
        <?php echo("<p> Syntymäpäivä " .$_SESSION['spaiva']. "");?>
    </div>
    <div class="column">
        <div class="blue-title">
            <h3>Fyysiset tiedot</h3>
        </div>
        <?php echo("<p> Sukupuoli " .$_SESSION['ssukupuoli']. "");?>
        <?php echo("<p> Pituus " .$_SESSION['spituus']. " cm");?>
        <?php echo("<p> Paino " .$_SESSION['spaino']. " kg");?>
    </div>
</div>
</main>
<?php
}else{
    include("includes/naviOut.php");
    ?>
    <main>
        <div class="header-white">
            <p class="logo"> foodfx </p>
            <button><a href="logInUser.php">Kirjaudu</a></button>
            <button><a href="luoTili2.php">Rekisteröidy</a></button>
        </div>
    </main>
<?php } ?>