<?php
    session_start();
    // header("Access-Control-Allow-Origin: *"); TURHA
    // header("Content-Type: application/json; charset=UTF-8"); TURHA

    // PickedDate-funktion b-muuttujan arvo tuodaan dataksi ja sen arvo siirretään sessiomuuttujaan
    $_SESSION['valittu'] = $_GET['data'];
    
    // Palautetaan valittu data merkkijonon muodossa (Kutsutaan scriptit.php -tiedostossa)
    // echo(json_encode($_SESSION['valittu']));
?>