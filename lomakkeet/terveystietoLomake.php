<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/lomakkeet.css">
        <title>Terveystietolomake</title>
</head>
<body>
        


<form method="post">
<div class="container">
    <h1>Fyysiset tiedot</h1>
    <p>Syötä tietosi saadaksesi harjoitustiedot, unitiedot ja kalorin kulutus soveltumaan tarkemmin itsellesi.</p>
    <hr>
  <p>Sukupuolesi:</p> 
  <input type="radio" id="mies" name="sukupuoli" value="mies">
  <label for="mies">Mies</label><br>
  <input type="radio" id="nainen" name="sukupuoli" value="nainen">
  <label for="nainen">Nainen</label><br>
  

  <hr> 
  <label for="syntymaaika">Syntymäaikasi:</label>
  <input type="date" id="syntymaaika" name="syntymaaika">

  <hr>
  <label for="paino">Paino (kg):</label>
  <input type="text" id="paino" name="paino">

  <hr>
  <label for="pituus">Pituus (cm):</label>
  <input type="text" id="pituus" name="pituus">

  <hr>
  <input type="submit" class="registerbtn" name="registerbtn" value="Rekisteröidy"/>
  </div>
  
  <div class="container signin">
    <p>Onko sinulla jo tili? <a href="kirjautuminen.php">Kirjaudu sisään</a>.</p>
  </div>
</form>

</body>
</html>

  
 