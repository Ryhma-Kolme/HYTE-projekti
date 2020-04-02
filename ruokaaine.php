<?php
  include("includes/head.php");
  include("includes/iheader.php");
  include_once("includes/naviravinto.php");
?>
<main>
  <?php
    include_once("lomakkeet/lisääRuokaaine.php");
  ?>
</main>
<?php
  include_once("includes/footer.php");
?>

<?php
if(isset($_POST['addbtn'])){
  //Tarkistetaan syötteet myös palvelimella
  if(strlen($_POST['ruoka'])<0){
    $_SESSION['swarningInput']="Syötä ruoka-aine uudelleen";

  

  }else{
  unset($_SESSION['swarningInput']);
  //1. Tiedot sessioon
  $_SESSION['sruoka']=$_POST['ruoka'];
  $_SESSION['skalorit']=$_POST['kalorit'];
  $_SESSION['shiilihydraatit']=$_POST['hiilihydraatit'];
  $_SESSION['srasva']=$_POST['rasva'];
  $_SESSION['sproteiini']= $_POST['proteiini'];
  //2. Tiedot kantaan 
  $data['dbruoka'] = $_POST['ruoka'];
  $data['dbkalorit'] = $_POST['kalorit'];
  $data['dbhiilihydraatit'] = $_POST['hiilihydraatit'];
  $data['dbrasva'] = $_POST['rasva'];
  $data['dbproteiini'] = $_POST['proteiini'];
  
  try {
   //***Email ei saa olla käytetty aiemmin
   $sql = "SELECT COUNT(*) FROM app_addedFoods where foodStuff  =  " . "'".$_POST['ruoka']."'"  ;
   $kysely=$DBH->prepare($sql);
   $kysely->execute();				
   $tulos=$kysely->fetch();
   if($tulos[0] == 0){ //email ei ole käytössä
     $STH = $DBH->prepare("INSERT INTO app_addedFoods (foodStuff, calories, carbs, fat, protein)
      VALUES (:dbruoka, :dbkalorit, :dbhiilihydraatit, :dbrasva, :dbproteiini);");
     $STH->execute($data);
     header("Location: index.php"); //Palataan pääsivulle kirjautuneena
    }else{
        $_SESSION['swarningInput']="Ruoka-aine on jo lisätty";
      }
  } catch(PDOException $e) {
    file_put_contents('config/DBErrors.txt', 'signInUser.php: '.$e->getMessage()."\n", FILE_APPEND);
    $_SESSION['swarningInput'] = 'Database problem';
    
  }
}

  //Testataan pääsivulle paluu

  //Palataan pääsivulle jos tallennus onnistui
    header("Location: index.php");
}
 echo("<h1>".$_SESSION['swarningInput']."</hi>");

?>

