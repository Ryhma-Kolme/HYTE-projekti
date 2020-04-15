
<?php
//Käyttäjän tila

if($_SESSION['sloggedIn']=="yes"){
    include("navit/tili.php");
?>
    
<div class="row">
    <div class="column">
        <div class="blue-title">
            <h3>Profiili</h3>
        </div>

        <div class="column-content">
            <?php echo("<p> Nimi " .$_SESSION['sfirstName']." " .$_SESSION['slastName']."");?>
            <hr>
            <?php echo("<p> Maa " .$_SESSION['slocation']. "");?>
            <hr>
            <?php echo("<p> Syntymäpäivä " .$_SESSION['spaiva']. "");?>
        </div>
    </div>
   
    <?php 

    // Käyttäjän userID
    $currentUserID = $_SESSION['suserID'];

    // Etsitään tietokannassa oleva alkuperäinen paino
    $sql="SELECT healthWeight 
    FROM app_user
    WHERE app_user.userID = '$currentUserID';";
    $kysely=$DBH->prepare($sql);				
    $kysely->execute();
    $row=$kysely->fetch();
    
    // Lisätään alkuperäinen paino muuttujaan
    $currentWeight = $row["healthWeight"];                

    ?>

    <div class="column">
        <div class="blue-title">
            <h3>Fyysiset tiedot</h3>
        </div>
        <div class="column-content">
            <?php echo("<p> Sukupuoli " .$_SESSION['ssukupuoli']. "</p>");?>
            <hr>
            <?php echo("<p> Pituus " .$_SESSION['spituus']. " cm</p>");?>
            <hr>
            <form method="post">
            <p>Paino:
            <input type="text" name="editPaino" onclick="this.select()" id="määrä"
            value="<?php echo(" " .$currentWeight. " ");?>"> kg   
            <input type="submit" class="savebtn" name="savePaino" value="Tallenna">
            </p>
            </form>
        </div>

     <?php // "Tallenna" nappia painettaessa uusi paino tallentuu tietokantaan
     
     if(isset($_POST['savePaino'])){ 

       $newWeight = $_POST['editPaino']; // Uusi paino muuttujaan

       $sql = "UPDATE app_user SET healthWeight='$newWeight' WHERE userID = '$currentUserID'"; // Tietokantaan
       $STH = $DBH->prepare($sql);
       $STH->execute();
     
     // Sivun päivitys, jotta uusi paino tulee näkyviin
       echo "<meta http-equiv='refresh' content='0'>";

     }


    ?>
               
        
    </div>
</div>
<?php
}else{
    include("logInUser.php");
    ?>
<?php } ?>