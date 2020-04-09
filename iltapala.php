<?php
    include("includes/head.php");
    include("includes/naviravinto.php");
?>

<main>
    <div class="row-buttons">
        <button><a href="aamiainen.php">Aamiainen</a></button>
        <button><a href="lounas.php">Lounas</a></button>
        <button><a href="välipala.php">Välipala</a></button>
        <button><a href="päivällinen.php">Päivällinen</a></button>
        <button style="border: 1px solid white"><a class="current" href="iltapala.php">Iltapala</a></button>
    </div>

    <div class="header-white">
        <div class="row-1">
            <p>Lisää iltapalasi valitsemalla tallentamasi ateria tai ruoka-aine tai lisää uusi.</p>
            <button class="uusiruoka" href="ruokaaine.php">Lisää uusi ruoka-aine</button>
        </div>
        <?php include("sravinto/boxes-tallennetut.php"); ?>
    </div>

    <div class="row">
        <div class="column">
            <div class="blue-title">
                <h3>Päivän tavoite</h3>
            </div>
            <img style="height:200px; padding:10px" src="images/värit.png" alt="Rinkula">
        </div>

        <div class="column">
            <div class="blue-title">
                <h3>Iltapala</h3>
            </div>
            <?php

// userID lisäys 
$currentUserID = $_SESSION['suserID'];

if(isset($_POST['foodbtn'])){
              $selected_val = $_POST['food'];  // Valittu ruoka lisätään muuttujaan

              $quantity = $_POST['määrä'];     // Syötetty määrä lisätään muuttujaan

                // Etsitään tietokannassa oleva alkuperäinen määrä
                $sql="SELECT app_user.userID, app_food.quantity 
                FROM app_user, app_food 
                WHERE app_food.foodName = '$selected_val' AND app_user.userID = '$currentUserID';";
                $kysely=$DBH->prepare($sql);				
                $kysely->execute();
                $row=$kysely->fetch();
                
                // Lisätään alkuperäinen määrä muuttujaan
                $prequantity = $row["quantity"];                
                
                //Lasketaan annettu määrä jaettuna tietokannassa olevana määränä ja luodaan niistä muuttujakerroin
                $total = ($quantity / $prequantity);

                // Otetaan valitun ruuan arvot ja userID ja lisätään ne aamiainen-tableen
                $STH = $DBH->prepare("INSERT INTO app_eveningmeal 
                (userID, foodID, foodName, quantity, calories, fat, carbohydrates, proteins) 
                SELECT app_user.userID, app_food.foodID, app_food.foodName, app_food.quantity * $total, app_food.calories * $total, app_food.fat * $total, app_food.carbohydrates * $total, app_food.proteins * $total
                FROM app_user, app_food
                WHERE app_food.foodName = '$selected_val' AND app_user.userID = '$currentUserID';");
                $STH->execute();
}


// Näytetään vain kirjautuneen käyttäjän ja tämän päivän lisätyt ruoka-aineet
$sql="SELECT * FROM app_eveningmeal WHERE DATE(`timeOfEating`) = CURDATE() AND userID = '$currentUserID' ORDER BY timeOfEating ASC";
$kysely=$DBH->prepare($sql);				
$kysely->execute();


// Luodaan taulukko johon syötetään arvot 
echo("<table>
	        <tr>
               <th>Ruoka-aine</th>
               <th>Määrä</th>
			   <th>Kalorit</th>
               <th>Rasva</th>
               <th>Hiilihydraatit</th>
               <th>Proteiinit</th>
               <th>Lisätty</th>
		    </tr>");
	while	($row=$kysely->fetch()){	
     echo("<tr><td>".$row["foodName"]."</td>
               <td>".$row["quantity"]."g</td>
			   <td>".$row["calories"]."kcal</td>
               <td>".$row["fat"]."g</td>
               <td>".$row["carbohydrates"]."g</td>
               <td>".$row["proteins"]."g</td>
               <td>".$row["timeOfEating"]."</td>");
		}
    echo("</table>");

    // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
    $sql="SELECT COUNT(foodName), SUM(quantity), SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
    FROM app_eveningmeal
    WHERE DATE(`timeOfEating`) = CURDATE() AND userID = '$currentUserID';";
    $kysely=$DBH->prepare($sql);				
    $kysely->execute();

    // Luodaan taulukko johon syötetään arvot 
    echo("<table>
       <tr>
              <th>Ruoka-aineet yht.</th>
              <th>Määrä yht.</th>
              <th>Kalorit yht.</th>
              <th>Rasvat yht.</th>
              <th>Hiilihydraatit yht.</th>
              <th>Proteiinit yht.</th>
       </tr>");
    while	($row=$kysely->fetch()){	
    echo("<tr><td>".$row['COUNT(foodName)']."kpl</td>
              <td>".$row['SUM(quantity)']."g</td>
              <td>".$row['SUM(calories)']."kcal</td>
              <td>".$row['SUM(fat)']."g</td>
              <td>".$row['SUM(carbohydrates)']."g</td>
              <td>".$row['SUM(proteins)']."g</td>");
                                   }
    echo("</table>");

  

   
    ?>        </div>
    </div>
</main>

<?php include("includes/footer.php"); ?>