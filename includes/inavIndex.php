<?php
//Käyttäjän tila

if($_SESSION['sloggedIn']=="yes"){
    echo("<p> Olet kirjautunut käyttäjänä: " .$_SESSION['suserName']);?>
    <hr>
    <button><a href="logOutUser.php">Kirjaudu ulos</a></button>
    <?php
}else{
    ?>
    <p>Terve, täällä voit katsella tietojasi!</p>

    <button><a href="logInUser.php">Kirjaudu</a></button>
    <button><a href="luoTili2.php">Rekisteröidy</a></button>
    <?php
}
?>
