<?php 
$currentUserID = $_SESSION['suserID']; // userID lisäys 
$startDate = $ym . '-' . 01; // Kuukauden ensimmäinen päivä muuttujaan

// AAMIAINEN TOTAL ARVOJEN LASKU       
    // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
    $sql="SELECT SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
    FROM app_breakfast
    WHERE DATE(`timeOfEating`) BETWEEN '$startDate' AND '$date' AND userID = '$currentUserID';";
    $kysely=$DBH->prepare($sql);				
    $kysely->execute();
    $row=$kysely->fetch();
        
    // Lisätään alkuperäinen määrä muuttujaan
    $bremTotalC = $row["SUM(calories)"]; 
    $bremTotalF = $row["SUM(fat)"]; 
    $bremTotalCh = $row["SUM(carbohydrates)"]; 
    $bremTotalP = $row["SUM(proteins)"]; 

    //Suoritetaan kysely uudestaan
    $kysely=$DBH->prepare($sql);
    $kysely->execute();

// LOUNAS TOTAL ARVOJEN LASKU    
    // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
    $sql="SELECT SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
    FROM app_lunch
    WHERE DATE(`timeOfEating`) BETWEEN '$startDate' AND '$date' AND userID = '$currentUserID';";
    $kysely=$DBH->prepare($sql);
    $kysely->execute();
    $row=$kysely->fetch();

    // Lisätään alkuperäinen määrä muuttujaan
    $lunchMtotalC = $row["SUM(calories)"]; 
    $lunchMtotalF = $row["SUM(fat)"]; 
    $lunchMtotalCh = $row["SUM(carbohydrates)"]; 
    $lunchMtotalP = $row["SUM(proteins)"]; 
    // Suoritetaan kysely uudelleen
    $kysely=$DBH->prepare($sql);
    $kysely->execute();

// VÄLIPALA TOTAL ARVOJEN LASKU   
    // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
    $sql="SELECT SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
    FROM app_snacks
    WHERE DATE(`timeOfEating`) BETWEEN '$startDate' AND '$date' AND userID = '$currentUserID';";
    $kysely=$DBH->prepare($sql);
    $kysely->execute();
    $row=$kysely->fetch();
        
    // Lisätään alkuperäinen määrä muuttujaan
    $snMtotalC = $row["SUM(calories)"]; 
    $snMtotalF = $row["SUM(fat)"]; 
    $snMtotalCh = $row["SUM(carbohydrates)"]; 
    $snMtotalP = $row["SUM(proteins)"]; 

    // Suoritetaan kysely uudelleen
    $kysely=$DBH->prepare($sql);
    $kysely->execute();

// PÄIVÄLLINEN TOTAL ARVOJEN LASKU   
    // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
    $sql="SELECT SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
    FROM app_dinner
    WHERE DATE(`timeOfEating`) BETWEEN '$startDate' AND '$date' AND userID = '$currentUserID';";
    $kysely=$DBH->prepare($sql);
    $kysely->execute();
    $row=$kysely->fetch();
        
    // Lisätään alkuperäinen määrä muuttujaan
    $dinMtotalC = $row["SUM(calories)"]; 
    $dinMtotalF = $row["SUM(fat)"]; 
    $dinMtotalCh = $row["SUM(carbohydrates)"]; 
    $dinMtotalP = $row["SUM(proteins)"]; 

    // Suoritetaan kysely uudelleen
    $kysely=$DBH->prepare($sql);
    $kysely->execute();

// ILTAPALA TOTAL ARVOJEN LASKU   
    // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
    $sql="SELECT SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
    FROM app_eveningmeal
    WHERE DATE(`timeOfEating`) BETWEEN '$startDate' AND '$date' AND userID = '$currentUserID';";
    $kysely=$DBH->prepare($sql);
    $kysely->execute();
    $row=$kysely->fetch();
        
    // Lisätään alkuperäinen määrä muuttujaan
    $emMtotalC = $row["SUM(calories)"]; 
    $emMtotalF = $row["SUM(fat)"]; 
    $emMtotalCh = $row["SUM(carbohydrates)"]; 
    $emMtotalP = $row["SUM(proteins)"]; 

    // Suoritetaan kysely uudelleen
    $kysely=$DBH->prepare($sql);
    $kysely->execute();

// Yhteenveto 
    // Luodaan muuttujat joissa lasketaan yhteen kaikki

    // Kaloreita kuukaudessa yhteensä
    $caloriesMtotal = $bremTotalC + $lunchMtotalC + $dinMtotalC + $snMtotalC + $emMtotalC;
    // Rasvaa kk. yhteensä
    $fatsMtotal = $bremTotalF + $lunchMtotalF + $dinMtotalF + $snMtotalF + $emMtotalF;
    // Hiilihydraatteja kk. yhteensä
    $chMtotal = $bremTotalCh + $lunchMtotalCh + $dinMtotalCh + $snMtotalCh + $emMtotalCh;
    // Proteiinia kk. yhteensä
    $proteinsMtotal = $bremTotalP + $lunchMtotalP + $dinMtotalP + $snMtotalP + $emMtotalP;
    // Tässä kuussa päiviä
    $todayDay = date("d");
    // Tämän hetkisen kuukauden nimi ja vuosi formaatissa toukokuu, 2020
    $month_name = strftime('%B, %Y', strtotime($today));

    // Jos valittu kuu on tämä kuukausi lasketaan keskiarvo vain jo kuussa kuluneiden päivien kesken
    if ($title == $month_name) {
        $monthCalAvg = ($caloriesMtotal / $todayDay);
    $monthFatAvg = ($fatsMtotal / $todayDay);
    $monthChAvg = ($chMtotal / $todayDay);
    $monthProAvg = ($proteinsMtotal / $todayDay);
    } else {
    // Keskiarvojen lasku (Jaetaan kuukauden kaikki ravinnot yhteen ja jaetaan ne kuukauden päivien määrällä)
    $monthCalAvg = ($caloriesMtotal / $day_count);
    $monthFatAvg = ($fatsMtotal / $day_count);
    $monthChAvg = ($chMtotal / $day_count);
    $monthProAvg = ($proteinsMtotal / $day_count);
    }
    
    $clickedDay = date('d.m.Y', strtotime($_SESSION['valittu']));

?>