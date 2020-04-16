<form method="post">
  <div class="container">
    <h1>Kirjaudu sisään</h1>
    <p>Anna sähköposti ja salasana kirjautuaksesi.</p>
    <hr>
    <label for="email"><b>Sähköposti</b></label>
    <input id="email" type="text" placeholder="Anna sähköpostisi" name="email" required>
    <hr>
    <label for="psw"><b>Salasana</b></label>
    <input id="psw" type="password" placeholder="Anna salasana" name="psw" required>
    <hr>
    <input type="submit" class="loginbtn" name="submitUser" value="Kirjaudu sisään"/>
  </div>

  <div class="container signin">
   <p>Eikö sinulla ole vielä tiliä? <a href="luoTili2.php">Rekisteröidy</a>.</p>
  </div>
</form>
