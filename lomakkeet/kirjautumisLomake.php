<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/lomakkeet.css">
  <title>Kirjautumislomake</title>
</head>
<body>
<form method="post">
<div class="container">
    <h1>Kirjaudu sisään</h1>
    <p>Anna sähköposti ja salasana kirjautuaksesi.</p>
    <hr>

    <label for="username"><b>Sähköposti</b></label>
    <input type="text" placeholder="Anna sähköpostisi" name="email" required>

    <label for="psw"><b>Salasana</b></label>
    <input type="password" placeholder="Anna salasana" name="psw" required>

    
    <hr>
   
    <input type="submit" class="loginbtn" name="submitUser" value="Kirjaudu sisään"/>
  </div>
  
  <div class="container signin">
    <p>Eikö sinulla ole vielä tiliä? <a href="luoTili2.php">Rekisteröidy</a>.</p>
  </div>
</form>
</body>
</html>