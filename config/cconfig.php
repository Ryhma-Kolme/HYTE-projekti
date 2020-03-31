<?php
$user = 'mirakil';		//Käytäjänimi 
$pass = '200197m';		//Salasana, ei OMAn vaan phpAdminin
$host = 'mysql.metropolia.fi';  //Tietokantapalvelin
$dbname = 'mirakil';		//Tietokanta
$added='#â‚¬%&&/';

// Muodostetaan yhteys tietokantaan
try {     //Avataan yhteys tietokantaan ($DBH on nyt  yhteysolio, nimi vapaasti valittavissa)
// $DBH yhteysolio on kahva tietokantaan data base handle
	$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
           // virheenkäsittely: virheet aiheuttavat poikkeuksen
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    // käytetään  merkistöä utf8
    ?>

    <?php

} catch(PDOException $e) {
           echo "Yhteysvirhe: " . $e->getMessage(); 
            //Kirjoitetaan mahdollinen virheviesti tiedostoon
	file_put_contents('config/DBErrors.txt', 'Connection: '.$e->getMessage()."\n", FILE_APPEND);
} 

?>