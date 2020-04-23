
<?php
//Käyttäjän tila

if($_SESSION['sloggedIn']=="yes"){
    include("navit/tili.php");
?>

<main>
    <div class="row">
        <div class="column">
            <div class="blue-title">
                <h3>Profiili</h3>
            </div>

            <div class="column-content">
                <b>Nimi:</b><p>
                <?php echo ucwords($_SESSION['sfirstName']." " .$_SESSION['slastName']."");?>
                </p>
                <hr>
                <b>Maa:</b><p>
                <?php echo ucwords($_SESSION['slocation']);?>
                </p>
                <hr>
                <b>Syntymäpäivä:</b><p>
                <?php // Syntymäpäivä muotoon dd-mm-Yy
                $originalDate = $_SESSION['spaiva'];
                $newDate = date("d-m-Y", strtotime($originalDate));
                echo($newDate);?>
                </p>
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
                <b>Sukupuoli:</b><p>
                <?php echo ucwords($_SESSION['ssukupuoli']);?>
                </p>
                <hr>
                <b>Pituus:</b><p>
                <?php echo($_SESSION['spituus']);?> cm
                </p>
                <hr>
                <form method="post">
                <b>Paino:</b><p>
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
</main>

<?php
}else{
    include("logInUser.php");
} ?>