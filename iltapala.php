<?php
    include("includes/head.php");
    include("navit/ravinto.php");
?>

<main>
    <div class="row-buttons">
        <button onclick="document.location = 'aamiainen.php'">Aamiainen</button>
        <button onclick="document.location = 'lounas.php'">Lounas</button>
        <button onclick="document.location = 'välipala.php'">Välipala</button>
        <button onclick="document.location = 'päivällinen.php'">Päivällinen</button>
        <button class="current" onclick="document.location = 'iltapala.php'">Iltapala</button>
    </div>

    <div class="header-white">
        <div class="row-1">
            <p>Lisää iltapalasi valitsemalla tallennettu ruoka-aine tai lisää uusi.</p>
            <button class="uusiruoka" onclick="document.location = 'ruokaaine.php'">Lisää uusi ruoka-aine</button>
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
            <form method="post"><input type="submit"onclick="return confirm('Oletko varma, että haluat poistaa kaikki tämän päivän iltapalat?')" class="deletebtn" name="em_deletebtn" value="Poista kaikki"></form>
                <h3>Iltapala</h3>
            </div>

            <?php // userID lisäys 
                $currentUserID = $_SESSION['suserID'];
            ?>

            <?php // Poistaa kaikki tämän päivän iltapalat "Poista kaikki"-napista

                if(isset($_POST['em_deletebtn'])){

                    // Näytetään vain kirjautuneen käyttäjän ja tämän päivän lisätyt ruoka-aineet
                    $sql="DELETE FROM app_eveningmeal WHERE DATE(`timeOfEating`) = CURDATE() AND userID = '$currentUserID' ORDER BY timeOfEating ASC";
                    $kysely=$DBH->prepare($sql);				
                    $kysely->execute();
                                                }		
            ?>

            <?php // Lisätään valittu ruoka ateriataulukkoon "Lisää ruoka"-napista

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
            ?>

            <?php // Syötetään arvot taulukkoon

                // Näytetään vain kirjautuneen käyttäjän ja tämän päivän lisätyt ruoka-aineet
                $sql="SELECT * FROM app_eveningmeal WHERE DATE(`timeOfEating`) = CURDATE() AND userID = '$currentUserID' ORDER BY timeOfEating ASC";
                $kysely=$DBH->prepare($sql);				
                $kysely->execute();

                // taulukko, jossa syötetyt arvot 
                include("sravinto/foodTable.php"); 

                // Lasketaan tämän päivän lisättyjen ruoka-aineiden määärä SQL:stä ja kalorien jne summat
                $sql="SELECT COUNT(foodName), SUM(quantity), SUM(calories), SUM(fat), SUM(carbohydrates), SUM(proteins)
                FROM app_eveningmeal
                WHERE DATE(`timeOfEating`) = CURDATE() AND userID = '$currentUserID';";
                $kysely=$DBH->prepare($sql);				
                $kysely->execute();

                // taulukko, jossa syötetyt arvot 
                include("sravinto/sumFoodsTable.php"); 
            ?>   
        </div>
    </div>
</main>

<?php include("includes/footer.php"); ?>