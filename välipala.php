<?php
    include("includes/head.php");
    include("includes/naviravinto.php");
?>

<main>
    <div class="row-buttons">
        <button><a href="aamiainen.php">Aamiainen</a></button>
        <button><a href="lounas.php">Lounas</a></button>
        <button style="border: 1px solid white"><a class="current" href="välipala.php">Välipala</a></button>
        <button><a href="päivällinen.php">Päivällinen</a></button>
        <button><a href="iltapala.php">Iltapala</a></button>
    </div>

    <div class="header-white">
        <div class="row-1">
            <p>Lisää välipalasi valitsemalla tallentamasi ateria tai ruoka-aine tai lisää uusi.</p>
            <button class="uusiruoka"><a href="ruokaaine.php">Lisää uusi ruoka-aine</a></button>
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
                <h3>Välipala</h3>
            </div>
            <?php

// userID lisäys 
$currentUserID = $_SESSION['suserID'];

if(isset($_POST['foodbtn'])){
              $selected_val = $_POST['food'];  // Valittu ruoka lisätään muuttujaan

              // Otetaan valitun ruuan arvot ja userID ja lisätään ne aamiainen-tableen
          $STH = $DBH->prepare("INSERT INTO app_snacks 
          (userID, foodID, foodName, quantity, calories, fat, carbohydrates, proteins) 
          SELECT app_user.userID, app_food.foodID, app_food.foodName, app_food.quantity, app_food.calories, app_food.fat, app_food.carbohydrates, app_food.proteins
          FROM app_user, app_food
          WHERE app_food.foodName = '$selected_val' AND app_user.userID = '$currentUserID';");
    $STH->execute();
}


// Näytetään vain kirjautuneen käyttäjän ja tämän päivän lisätyt ruoka-aineet
$sql="SELECT * FROM app_snacks WHERE DATE(`timeOfEating`) = CURDATE() AND userID = '$currentUserID' ORDER BY timeOfEating ASC";
$kysely=$DBH->prepare($sql);				
$kysely->execute();


// Luodaan taulukko johon syötetään arvot 
  echo("<table>
  <tr>
          <th>Ruoka-aine</th>
          <th>Kalorit</th>
             <th>Rasva</th>
             <th>Hiilihydraatit</th>
             <th>Proteiinit</th>
             <th>Lisätty</th>
      </tr>");
  while	($row=$kysely->fetch()){	
          echo("<tr><td>".$row["foodName"]."</td>
             <td>".$row["calories"]."</td>
             <td>".$row["fat"]."</td>
             <td>".$row["carbohydrates"]."</td>
             <td>".$row["proteins"]."</td>
             <td>".$row["timeOfEating"]."</td>");
      }
  echo("</table>");

// Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
  $sql="SELECT COUNT(foodName), SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
  FROM app_snacks
  WHERE DATE(`timeOfEating`) = CURDATE() AND userID = '$currentUserID';";
     $kysely=$DBH->prepare($sql);				
     $kysely->execute();

     // Luodaan taulukko johon syötetään arvot 

     echo("<table>
     <tr>
         <th>Ruoka-aineet yht.</th>
         <th>Kalorit yht.</th>
            <th>Rasvat yht.</th>
            <th>Hiilihydraatit yht.</th>
            <th>Proteiinit yht.</th>
     </tr>");
 while	($row=$kysely->fetch()){	
         echo("<tr>              <td>".$row['COUNT(foodName)']."</td>

            <td>".$row['SUM(calories)']."</td>
            <td>".$row['SUM(fat)']."</td>
            <td>".$row['SUM(carbohydrates)']."</td>
            <td>".$row['SUM(proteins)']."</td>
           ");
     }
 echo("</table>");

  

   
    ?>        </div>
    </div>
</main>

<?php include("includes/footer.php"); ?>