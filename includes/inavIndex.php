<?php
//Käyttäjän tila

if($_SESSION['sloggedIn']=="yes"){
    include("includes/navigaatio.php");
?>
<main>
    <div class="header-white">
        <?php echo("<p> Tervetuloa " .$_SESSION['suserName']. "!");?>
        <hr>
        <button><a href="logOutUser.php">Kirjaudu ulos</a></button>
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