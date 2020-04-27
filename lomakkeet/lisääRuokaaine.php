<form method="post">
  <div class="container">
    <h1>Lisää ruoka</h1>
    <p>Lisää oma ruoka-aine sekä tuotetiedot.</p>
    <hr>

    <label for="ruoka"><b>Ruoka:</b></label>
    <input id="ruoka" type="text" placeholder="Syötä ruoka-aine" name="ruoka" required>
    <hr>

    <label for="ruokagrammat"><b>Ruoan määrä (g):</b></label>
    <input id="ruokagrammat" type="text" placeholder="Syötä määrä" value="100" onclick="this.select()" name="ruokagrammat" required>
    <hr>

    <label for="kalorit"><b>Kalorit:</b></label>
    <input id="kalorit" type="text" placeholder="Kaloreja" name="kalorit" required>
    <hr>

    <label for="hiilihydraatit"><b>Hiilihydraatit (g):</b></label>
    <input id="hiilihydraatit" type="text" placeholder="Hiilihydraatteja" name="hiilihydraatit" required>
    <hr>

    <label for="rasva"><b>Rasva (g):</b></label>
    <input id="rasva" type="text" placeholder="Rasvaa" name="rasva" required>
    <hr>

    <label for="proteiini"><b>Proteiini (g):</b></label>
    <input id="proteiini" type="text" placeholder="Proteiinia" name="proteiini" required>
    <hr>
    
    <input type="submit" class="addbtn" name="addbtn" value="Lisää ruoka-aine"/>
  </div> 
</form>

