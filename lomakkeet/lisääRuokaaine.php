<!-- <!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/lomakkeet.css">
        <title>Lisää oma ruoka-aine</title>
</head>
<body>
        

 -->
<main>
  <form method="post">
  <div class="container">
      <h1>Lisää ruoka</h1>
      <p>Lisää oma ruoka-aine sekä tuotetiedot.</p>
      <hr>

      <label for="ruoka"><b>Ruoka:</b></label>
      <input type="text" placeholder="Syötä ruoka-aine" name="ruoka" required>

      <label for="kalorit"><b>Kalorit:</b></label>
      <input type="text" placeholder="Kaloreja" name="kalorit" required>

      <label for="hiilihydraatit"><b>Hiilihydraatit (g):</b></label>
      <input type="text" placeholder="Hiilihydraatteja" name="hiilihydraatit" required>

      <label for="rasva"><b>Rasva (g):</b></label>
      <input type="text" placeholder="Rasvaa" name="rasva" required>

      <label for="proteiini"><b>Proteiini (g):</b></label>
      <input type="text" placeholder="Proteiinia" name="proteiini" required>

      <hr>
    
      <input type="submit" class="addbtn" name="addbtn" value="Lisää ruoka-aine"/>
    </div> 
  </form>
</main>
<!-- </body>
</html> -->