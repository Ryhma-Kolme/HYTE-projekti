<?php
    include("includes/head.php");
    include_once("navit/out.php");
?>
<main>
  <?php
    include_once("lomakkeet/luoTili.php");
  ?>
</main>
<?php
    include_once("includes/footer.php");
?>

<?php
if(isset($_POST['continuebtn'])){
  //Tarkistetaan syötteet myös palvelimella
  if(strlen($_POST['kayttaja'])<4){
  $_SESSION['swarningInput']="Liian lyhyt käyttäjänimi (min 4)";
  ?>
  <span class="error">* <?php echo("Liian lyhyt käyttäjänimi");?></span>

  <?php
  }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
  $_SESSION['swarningInput']="Illegal email";
  ?>
  <span class="error">* <?php echo("Sähköposti ei ole oikeassa muodossa");?></span>

  <?php
  }else if(strlen($_POST['psw'])<8){
  $_SESSION['swarningInput']="Illegal password (min 8 chars)";
  ?>
  <span class="error">* <?php echo("Salasanan täytyy olla vähintään 8 merkkiä");?></span>

  <?php 
  }else if($_POST['psw'] !== $_POST['psw-repeat']){
  $_SESSION['swarningInput']="Given password and verified not same";
  ?>
  <span class="error">* <?php echo("Salasanat eivät täsmää");?></span>
  
  <?php
  }else{
  unset($_SESSION['swarningInput']);
  //1. Tiedot sessioon
  $_SESSION['suserName']=$_POST['kayttaja'];
  $_SESSION['sfirstName']=$_POST['etunimi'];
  $_SESSION['slastName']=$_POST['sukunimi'];
  $_SESSION['slocation']=$_POST['sijainti'];
  $_SESSION['sloggedIn']="yes";
  $_SESSION['semail']= $_POST['email'];
  //2. Tiedot kantaan 
  $data['name'] = $_POST['kayttaja'];
  $data['firstName'] = $_POST['etunimi'];
  $data['lastName'] = $_POST['sukunimi'];
  $data['location'] = $_POST['sijainti'];
  $data['email'] = $_POST['email'];
  $added='#â‚¬%&&/'; //suolataan annettu salasana
  $data['pwd'] = password_hash($_POST['psw'].$added, PASSWORD_BCRYPT);
  try {
    // Email ei saa olla käytetty aiemmin
    $sql = "SELECT COUNT(*) FROM app_user where userEmail  =  " . "'".$_POST['email']."'"  ;
    $kysely=$DBH->prepare($sql);
    $kysely->execute();				
    $tulos=$kysely->fetch();

    if($tulos[0] == 0){ //email ei ole käytössä
    $STH = $DBH->prepare("INSERT INTO app_user (userName, userEmail, userPwd, firstname, surname, userLocation)
    VALUES (:name, :email, :pwd, :firstName, :lastName, :location);");
    $STH->execute($data);
    // Siirtymien terveystiedot sivulle jos tallenus onnistui
    echo "<SCRIPT> 
    window.location.replace('terveystiedot.php');
    </SCRIPT>";  
    }else{
    $_SESSION['swarningInput']="Email is reserved";        
    $message = 'Sähköposti on jo käytössä';
    // Alkuperäisellä sivulla pysyminen ja alert ilmoitus jos sähköposti käytössä
    echo "<SCRIPT>
    alert('$message')
    window.location.replace('luoTili2.php');
    </SCRIPT>";?>
    <span class="error">* <?php echo("Sähköposti on jo käytössä");?></span>
    <?php
          }
  } catch(PDOException $e) {
    file_put_contents('config/DBErrors.txt', 'luoTili2.php: '.$e->getMessage()."\n", FILE_APPEND);
    $_SESSION['swarningInput'] = 'Database problem';
        
    }
  }
}
?>

