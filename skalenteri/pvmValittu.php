<?php
    session_start();
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    // Get-muuttujasta siirretään data session-muuttujaan valittu
    $_SESSION['valittu'] = $_GET['data'];
    
    echo(json_encode($_SESSION['valittu']));
?>