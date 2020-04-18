<?php 
// userID lisäys 
$currentUserID = $_SESSION['suserID'];

// AAMIAINEN TOTAL ARVOJEN LASKU       
    // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
    $sql="SELECT SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
    FROM app_breakfast
    WHERE DATE(`timeOfEating`) = CURDATE() AND userID = '$currentUserID';";
    $kysely=$DBH->prepare($sql);				
    $kysely->execute();
    $row=$kysely->fetch();
        
    // Lisätään alkuperäinen määrä muuttujaan
    $bretotalC = $row["SUM(calories)"]; 
    $bretotalF = $row["SUM(fat)"]; 
    $bretotalCh = $row["SUM(carbohydrates)"]; 
    $bretotalP = $row["SUM(proteins)"]; 

    //Suoritetaan kysely uudestaan
    $kysely=$DBH->prepare($sql);
    $kysely->execute();

// LOUNAS TOTAL ARVOJEN LASKU    
    // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
    $sql="SELECT SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
    FROM app_lunch
    WHERE DATE(`timeOfEating`) = CURDATE() AND userID = '$currentUserID';";
    $kysely=$DBH->prepare($sql);
    $kysely->execute();
    $row=$kysely->fetch();

    // Lisätään alkuperäinen määrä muuttujaan
    $lunchtotalC = $row["SUM(calories)"]; 
    $lunchtotalF = $row["SUM(fat)"]; 
    $lunchtotalCh = $row["SUM(carbohydrates)"]; 
    $lunchtotalP = $row["SUM(proteins)"]; 
    // Suoritetaan kysely uudelleen
    $kysely=$DBH->prepare($sql);
    $kysely->execute();

// VÄLIPALA TOTAL ARVOJEN LASKU   
    // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
    $sql="SELECT SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
    FROM app_snacks
    WHERE DATE(`timeOfEating`) = CURDATE() AND userID = '$currentUserID';";
    $kysely=$DBH->prepare($sql);
    $kysely->execute();
    $row=$kysely->fetch();
        
    // Lisätään alkuperäinen määrä muuttujaan
    $sntotalC = $row["SUM(calories)"]; 
    $sntotalF = $row["SUM(fat)"]; 
    $sntotalCh = $row["SUM(carbohydrates)"]; 
    $sntotalP = $row["SUM(proteins)"]; 

    // Suoritetaan kysely uudelleen
    $kysely=$DBH->prepare($sql);
    $kysely->execute();

// PÄIVÄLLINEN TOTAL ARVOJEN LASKU   
    // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
    $sql="SELECT SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
    FROM app_dinner
    WHERE DATE(`timeOfEating`) = CURDATE() AND userID = '$currentUserID';";
    $kysely=$DBH->prepare($sql);
    $kysely->execute();
    $row=$kysely->fetch();
        
    // Lisätään alkuperäinen määrä muuttujaan
    $dintotalC = $row["SUM(calories)"]; 
    $dintotalF = $row["SUM(fat)"]; 
    $dintotalCh = $row["SUM(carbohydrates)"]; 
    $dintotalP = $row["SUM(proteins)"]; 


    // Suoritetaan kysely uudelleen
    $kysely=$DBH->prepare($sql);
    $kysely->execute();

// ILTAPALA TOTAL ARVOJEN LASKU   
    // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
    $sql="SELECT SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
    FROM app_eveningmeal
    WHERE DATE(`timeOfEating`) = CURDATE() AND userID = '$currentUserID';";
    $kysely=$DBH->prepare($sql);
    $kysely->execute();
    $row=$kysely->fetch();
        
    // Lisätään alkuperäinen määrä muuttujaan
    $emtotalC = $row["SUM(calories)"]; 
    $emtotalF = $row["SUM(fat)"]; 
    $emtotalCh = $row["SUM(carbohydrates)"]; 
    $emtotalP = $row["SUM(proteins)"]; 

    // Suoritetaan kysely uudelleen
    $kysely=$DBH->prepare($sql);
    $kysely->execute();

// Yhteenveto
    // Luodaan muuttujat joissa lasketaan yhteen kaikki
    // Kaloreita yhteensä
    $caloriestotal = $bretotalC + $lunchtotalC + $dintotalC + $sntotalC + $emtotalC;
    // Rasvaa yhteensä
    $fatstotal = $bretotalF + $lunchtotalF + $dintotalF + $sntotalF + $emtotalF;
    // Hiilihydraatteja yhteensä
    $chtotal = $bretotalCh + $lunchtotalCh + $dintotalCh + $sntotalCh + $emtotalCh;
    // Proteiinia yhteensä
    $proteinstotal = $bretotalP + $lunchtotalP + $dintotalP + $sntotalP + $emtotalP;
?>