<?php
    include("includes/head.php");
    include_once("navit/out.php");
?>

<main>
    <?php
        include_once("lomakkeet/terveystietoLomake.php");
    ?>
</main>

<?php
    include_once("includes/footer.php");
?>


<?php
 //kirjautuneen käyttäjän userID?
    $data1['email'] = $_SESSION['semail'];
    $sql1 = "SELECT userID FROM app_user where userEmail =  :email";
    $kysely1=$DBH->prepare($sql1);
    $kysely1->execute($data1);
    $tulos1=$kysely1->fetch();
    $currentUserID=$tulos1[0];
?>

<?php
if(isset($_POST['registerbtn'])){
  $paino = $_POST['paino'];
  //Tarkistetaan syötteet myös palvelimella
  if ($paino<0) {
    $_SESSION['swarningInput']="Paino väärin";
    ?>
    <span class="error">* <?php echo("Paino ei voi olla negatiivinen");?></span>
    <?php
  }else if(($_POST['pituus'])<0){
    $_SESSION['swarningInput']="Pituus väärin";
    ?>
    <span class="error">* <?php echo("Pituus ei voi olla negatiivinen");?></span>
    <?php 
  }else{
    unset($_SESSION['swarningInput']);
    //1. Tiedot sessioon
    $_SESSION['ssukupuoli']=$_POST['sukupuoli'];
    $_SESSION['spaino']=$_POST['paino'];
    $_SESSION['spituus']=$_POST['pituus'];
    $_SESSION['spaiva']=$_POST['syntymaaika'];


    //2. Tiedot kantaan
    $data['dbsukupuoli'] = $_POST['sukupuoli'];
    $data['dbpaino'] = $_POST['paino'];
    $data['dbpituus'] = $_POST['pituus'];
    $data['dbpaiva'] = $_POST['syntymaaika'];

    //kirjautuneen käyttäjän userID?
    $data1['email'] = $_SESSION['semail'];
    $sql1 = "SELECT userID FROM app_user where userEmail =  :email";
    $kysely1=$DBH->prepare($sql1);
    $kysely1->execute($data1);
    $tulos1=$kysely1->fetch();
    $currentUserID=$tulos1[0];

    $_SESSION['suserID'] = $currentUserID;

    try {
        // Tiedot päivitetään nykyisen käyttäjän tietoihin
        $STH = $DBH->prepare("UPDATE app_user
          SET healthBirthday = :dbpaiva, healthWeight = :dbpaino, healthHeight = :dbpituus, userGender = :dbsukupuoli
          WHERE userID = $currentUserID;");
        $STH->execute($data);
        
    } catch(PDOException $e) {
        file_put_contents('log/DBErrors.txt', 'terveystiedot.php: '.$e->getMessage()."\n", FILE_APPEND);
        $_SESSION['swarningInput'] = 'Database problem';
        
      }
      // Pääsivulle paluu
      echo "<SCRIPT> 
      window.location.replace('index.php');
      </SCRIPT>"; 
  }
}
?>

