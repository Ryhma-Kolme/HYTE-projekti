<?php include("includes/iheader.php");?>

<div class="boxes-tallennetut">
    <!-- <div class="box-tallennetut">
        <h4>Tallennetut ateriat</h4>
    </div> -->

  
    <div class="box-tallennetut">
        <h4>Tallennetut ruoka-aineet</h4>
        
        <div class="ruokalista">
            <ul>
            <?php
            // Ruokien nimien haku kannasta
            
      $STH = $DBH->prepare("SELECT foodName FROM app_food");
      $STH->execute();
      $tulosOlio=$STH->fetchAll(PDO::FETCH_COLUMN);

     
      ?>
      
      <select>
          <option selected="selected">Lisää ruoka</option>
          <?php
          
          // käydään array läpi
          foreach ($tulosOlio as $food){
          ?>
          <option value="<?php echo strtolower($food); ?>"><?php echo utf8_encode($food); ?></option>
          <?php
          }
          ?>
      </select>
      <input type="submit" class="tallennaruoka" name="foodbtn" value="Tallenna ruoka">
  
             
            </ul>
            </div>
        </div>
    </div>
</div>

