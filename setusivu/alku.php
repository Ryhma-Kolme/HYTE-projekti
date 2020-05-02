<?php
//Käyttäjän tila

if($_SESSION['sloggedIn']=="yes"){
    include("navit/kuukausi.php");
 //kirjautuneen käyttäjän userID?
    $data1['email'] = $_SESSION['semail'];
    $sql1 = "SELECT userID FROM app_user where userEmail =  :email";
    $kysely1=$DBH->prepare($sql1);
    $kysely1->execute($data1);
    $tulos1=$kysely1->fetch();
    $currentUserID=$tulos1[0];
?>

<main>
    <?php
        include("skalenteri/scriptit.php");
        include('skalenteri/toiminnallisuus.php');
        include("skalenteri/totalhaku.php");
        include("skalenteri/kalenteri.php");
        include("skalenteri/yhteenveto.php");
    ?>
</main>

<?php
}else{
    include("logInUser.php");
} 
?>