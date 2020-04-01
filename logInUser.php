<?php include("includes/iheader.php");?>


<?php include("lomakkeet/kirjautumisLomake.php"); ?>
<?php
//Lomakkeen submit painettu?
if(isset($_POST['submitUser'])){
  //***Tarkistetaan email myös palvelimella
  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
   $_SESSION['swarningInput']="Illegal email";
  }else{
    unset($_SESSION['swarningInput']);  
     try {
      //Tiedot kannasta, hakuehto
      $data['email'] = $_POST['email'];
      $STH = $DBH->prepare("SELECT userName, userEmail, userPwd FROM app_user WHERE userEmail = :email;");
      $STH->execute($data);
      $STH->setFetchMode(PDO::FETCH_OBJ);
      $tulosOlio=$STH->fetch();
      //lomakkeelle annettu salasana + suola
      $givenPasswordAdded = $_POST['psw'].$added; //$added löytyy cconfig.php
 
       //Löytyikö email kannasta?   
       if($tulosOlio!=NULL){
          //email löytyi
         // var_dump($tulosOlio);
          if(password_verify($givenPasswordAdded,$tulosOlio->userPwd)){
              $_SESSION['sloggedIn']=true;
              $_SESSION['suserName']=$tulosOlio->userName;
              $_SESSION['suserEmail']=$tulosOlio->userEmail;
              header("Location: index.php"); //Palataan pääsivulle kirjautuneena
          }else{
            $_SESSION['swarningInput']="Wrong password";
          }
      }else{
        $_SESSION['swarningInput']="Wrong email";
      }
     } catch(PDOException $e) {
        file_put_contents('log/DBErrors.txt', 'signInUser.php: '.$e->getMessage()."\n", FILE_APPEND);
        $_SESSION['swarningInput'] = 'Database problem';
    }
  }
}
?>


<?php include("includes/footer.php");?>

