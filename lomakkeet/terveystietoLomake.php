<form method="post">
  <div class="container">
    <h1>Fyysiset tiedot</h1>
    <p>Syötä tietosi saadaksesi harjoitustiedot, unitiedot ja kalorin kulutus soveltumaan tarkemmin itsellesi.</p>
    <hr>

    <p>Sukupuolesi:</p> 
    <input id="mies" type="radio" name="sukupuoli" value="mies">
    <label for="mies">Mies</label><br>
    <input id="nainen" type="radio" name="sukupuoli" value="nainen">
    <label for="nainen">Nainen</label><br>
    <hr> 

    <label for="syntymaaika">Syntymäaikasi:</label>
    <input id="syntymaaika" type="date" name="syntymaaika">
    <hr>

    <label for="paino">Paino (kg):</label>
    <input id="paino" type="text" name="paino">
    <hr>

    <label for="pituus">Pituus (cm):</label>
    <input id="pituus" type="text" name="pituus">
    <hr>

    <input type="submit" class="registerbtn" name="registerbtn" value="Rekisteröidy"/>
  </div>
  
  <div class="container signin">
    <p>Onko sinulla jo tili? <a href="index.php">Kirjaudu sisään</a>.</p>
  </div>
</form>


  
 