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
            
      $STH = $DBH->prepare("SELECT foodName FROM app_food ORDER BY foodName ASC");
      $STH->execute();
      $tulosOlio=$STH->fetchAll(PDO::FETCH_COLUMN);

      // Array listaksi

      $List = implode('<li>', $tulosOlio)."</li>"; 
  
      // Listan tulostus
      echo utf8_encode($List); 
        ?>
               
             
            </ul>
            </div>
        </div>
    </div>
</div>

