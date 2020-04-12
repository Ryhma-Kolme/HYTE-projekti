<?php include("includes/iheader.php");?>

<div class="boxes-tallennetut">
    <!-- <div class="box-tallennetut">
        <h4>Tallennetut ateriat</h4>
    </div> -->

  
    <div class="box-tallennetut">
        <h4>Tallennetut ruoka-aineet</h4>
        
        <div class="ruoka-tallennus">
                <?php
                // Ruokien nimien haku kannasta
                $STH = $DBH->prepare("SELECT foodName FROM app_food ORDER BY foodName ASC");
                $STH->execute();
                $tulosOlio=$STH->fetchAll(PDO::FETCH_COLUMN);
                ?>
                <form method="post">
                    <select name="food">
                        <option selected="selected">Lisää ruoka</option>
                        <?php
                        
                        // käydään array läpi
                        foreach ($tulosOlio as $food){
                        ?>
                        <option value="<?php echo strtolower($food); ?>"><?php echo ($food); ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <input type="text" class="quantitybtn" id="määrä" name="määrä" value="Lisää määrä (g)" onclick="this.select()">
                    <input type="submit" class="tallennaruoka" name="foodbtn" value="Tallenna ruoka">
                </form>
            </div>
        </div>
    </div>
</div>

