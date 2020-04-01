<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/lomakkeet.css">
        <title>Tilin luonti</title>
</head>
<body>
        


<form method="post">
<div class="container">
    <h1>Rekisteröidy</h1>
    <p>Täytä tiedot rekisteröityäksesi.</p>
    <hr>
    
    <label for="etunimi"><b>Etunimi</b></label>
    <input type="text" placeholder="Syötä etunimesi" name="etunimi" required>

    <label for="sukunimi"><b>Sukunimi</b></label>
    <input type="text" placeholder="Syötä sukunimesi" name="sukunimi" required>

    <label for="kayttaja"><b>Käyttäjänimi</b></label>
    <input type="text" placeholder="Syötä käyttäjänimesi" name="kayttaja" required>

    <label for="sijainti"><b>Sijainti</b></label>
    <input type="text" placeholder="Maa" name="sijainti" required>

    <label for="email"><b>Sähköpostiosoite</b></label>
    <input type="text" placeholder="Syötä sähköpostiosoitteesi" name="email" required>

    <label for="psw"><b>Salasana</b></label>
    <input type="password" placeholder="Syötä salasana" name="psw" required>

    <label for="psw-repeat"><b>Vahvista salasana</b></label>
    <input type="password" placeholder="Syötä salasana uudelleen" name="psw-repeat" required>
    <hr>
   
    <input type="submit" class="continuebtn" name="continuebtn" value="Jatka"/>
    <input type="reset"  value="Reset"/>

  </div>
  
  <div class="container signin">
    <p>Onko sinulla jo tili? <a href="kirjautumisLomake.php">Kirjaudu sisään</a>.</p>
  </div>
</form>

</body>
</html>

  
 