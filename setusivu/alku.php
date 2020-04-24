<?php
//Käyttäjän tila

if($_SESSION['sloggedIn']=="yes"){
    include("navit/in.php");
 //kirjautuneen käyttäjän userID?
    $data1['email'] = $_SESSION['semail'];
    $sql1 = "SELECT userID FROM app_user where userEmail =  :email";
    $kysely1=$DBH->prepare($sql1);
    $kysely1->execute($data1);
    $tulos1=$kysely1->fetch();
    $currentUserID=$tulos1[0];

   
    ?>

<main>
    <div class="header-white">
        <?php echo("<h2> Tervetuloa " .$_SESSION['suserName']. "!</h2>");?>
        <hr>
        <div class="row-buttons" style="flex-flow: column; align-items: center;">
            <button class="etusivu-button" onclick="document.location = 'kuukausi.php'">Tarkastele kalenteria ja yhteenvetoja</button>
            <button class="etusivu-button" onclick="document.location = 'ravinto.php'">Lisää ruokia</button>
            <button class="etusivu-button" onclick="document.location = 'unisivu.php'">Katso viimeisimmät unitietosi</button>
            <button class="etusivu-button" onclick="document.location = 'tilitiedot.php'">Päivitä tilitietojasi</button>
        </div>
    </div>
</main>
<?php
}else{
    include("logInUser.php");
    ?>
<?php 
} 
?>