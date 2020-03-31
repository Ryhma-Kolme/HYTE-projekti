<?php
    include("includes/head.php");
    include("includes/iheader.php");

    include_once("includes/navigaatio.php");
    include_once("lomakkeet/terveystietoLomake.php");
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
  //Tarkistetaan syötteet myös palvelimella
  if(strlen($_POST['paino'])<0){
    $_SESSION['swarningInput']="Paino väärin";
   

 



  }else{
  unset($_SESSION['swarningInput']);
  //1. Tiedot sessioon
  $_SESSION['ssukupuoli']=$_POST['sukupuoli'];

  $_SESSION['spaino']=$_POST['paino'];
  $_SESSION['spituus']=$_POST['pituus'];
  $_SESSION['spaiva']=$_POST['syntymaaika'];


  //2. Tiedot kantaan - kesken
  $data['dbsukupuoli'] = $_POST['sukupuoli'];
  $data['dbpaino'] = $_POST['paino'];
  $data['dbpituus'] = $_POST['pituus'];
  $data['dbpaiva'] = $_POST['syntymaaika'];



  try {
   
     $STH = $DBH->prepare("UPDATE app_user
      SET healthBirthday = :dbpaiva, healthWeight = :dbpaino, healthHeight = :dbpituus, userGender = :dbsukupuoli
       WHERE userID = $currentUserID;");
     $STH->execute($data);
     header("Location: index.php"); //Palataan pääsivulle kirjautuneena
   
  } catch(PDOException $e) {
    file_put_contents('config/DBErrors.txt', 'signInUser.php: '.$e->getMessage()."\n", FILE_APPEND);
    $_SESSION['swarningInput'] = 'Database problemmm';
    
  }
}

  //Testataan pääsivulle paluu

  //Palataan pääsivulle jos tallennus onnistui
    header("Location: index.php");
}
 echo("<h1>".$_SESSION['swarningInput']."</hi>");

?>

