<form method="post">
  <div class="container">
    <h1>Rekisteröidy</h1>
    <p>Täytä tiedot rekisteröityäksesi.</p>
    <hr>
    
    <label for="etunimi"><b>Etunimi</b></label>
    <input id="etunimi" type="text" placeholder="Syötä etunimesi" name="etunimi" required>
    <hr>

    <label for="sukunimi"><b>Sukunimi</b></label>
    <input id="sukunimi" type="text" placeholder="Syötä sukunimesi" name="sukunimi" required>
    <hr>

    <label for="kayttaja"><b>Käyttäjänimi</b></label>
    <input id="kayttaja" type="text" placeholder="Syötä käyttäjänimesi" name="kayttaja" required>
    <hr>

    
    <?php include("lomakkeet/countryList.php");?>

    <hr>

    <label for="email"><b>Sähköpostiosoite</b></label>
    <input id="email" type="text" placeholder="Syötä sähköpostiosoitteesi" name="email" required>
    <hr>

    <label for="psw"><b>Salasana</b></label>
    <input id="psw" type="password" placeholder="Syötä salasana" name="psw" required>
    <hr>
    
    <label for="psw-repeat"><b>Vahvista salasana</b></label>
    <input id="psw-repeat" type="password" placeholder="Syötä salasana uudelleen" name="psw-repeat" required>
    <hr>
   
    <input type="submit" class="continuebtn" name="continuebtn" value="Jatka"/>
    <input type="reset"  value="Tyhjennä lomake"/>
  </div>
  
  <div class="container signin">
    <p>Onko sinulla jo tili? <a href="index.php">Kirjaudu sisään</a>.</p>
  </div>
</form>

  
 