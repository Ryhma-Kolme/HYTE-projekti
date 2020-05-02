<?php
    session_start();
    // PickedDate-funktion b-muuttujan arvo tuodaan dataksi ja sen arvo siirretään sessiomuuttujaan
    $_SESSION['valittu'] = $_GET['data'];
?>