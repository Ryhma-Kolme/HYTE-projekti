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
      $STH = $DBH->prepare("SELECT foodName FROM app_food");
      $STH->execute();
      $tulosOlio=$STH->fetchAll(PDO::FETCH_COLUMN);
      $List = implode('<li> ', $tulosOlio); 
  
      // Display the comma separated list 
      echo utf8_encode($List); 
        ?>
               
             
            </ul>
            </div>
        </div>
    </div>
</div>

