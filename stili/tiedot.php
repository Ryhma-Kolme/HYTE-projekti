<?php include("includes/iheader.php");?>

<?php
//Käyttäjän tila

if($_SESSION['sloggedIn']=="yes"){
    include("includes/navigaatio.php");
?>
<main>
    
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
            <?php echo("<p> Sukupuoli " .$_SESSION['ssukupuoli']. "");?>
            <hr>
            <?php echo("<p> Pituus " .$_SESSION['spituus']. " cm");?>
            <hr>
            <form method="post">
            <p>Paino: 
            <input type="text" name="editPaino" onclick="this.select()" id="määrä"
            value="<?php echo(" " .$currentWeight. " ");?>" > kg   
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
       header("Location: tilitiedot.php");
                                   }
    ?>
               
        
    </div>
</div>
</main>
<?php
}else{
    include("includes/naviOut.php");
    include("logInUser.php");
    ?>
    <!-- <main>
        <div class="header-white">
            <p class="logo"> foodfx </p>
            <button><a href="logInUser.php">Kirjaudu</a></button>
            <button><a href="luoTili2.php">Rekisteröidy</a></button>
        </div>
    </main> -->
<?php } ?>