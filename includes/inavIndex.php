<?php
//Käyttäjän tila

if($_SESSION['sloggedIn']=="yes"){
    include("includes/navigaatio.php");
?>
<main>
    <div class="header-white">
        <?php echo("<p> Tervetuloa " .$_SESSION['suserName']. "!");?>
        <hr>
        <!-- <button><a href="logOutUser.php">Kirjaudu ulos</a></button> -->
    </div>
    
    <div class="row">
        <div class="column">
            <div class="blue-title">
                <h3>Tämän päivän ruoat</h3>
            </div>
            <p>Taulukko</p>
            <p>Aamiainen</p>
            <p>Lounas</p>
            <p>Välipala</p>
            <p>Päivällinen</p>
            <p>Iltapala</p>
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