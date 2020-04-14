<?php include("includes/iheader.php");?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
    <div class="ruoka-tallennus">
    

                <?php
                // Ruokien nimien haku kannasta
                $STH = $DBH->prepare("SELECT foodName FROM app_food ORDER BY foodName ASC");
                $STH->execute();
                $tulosOlio=$STH->fetchAll(PDO::FETCH_COLUMN);
                ?>
                <form method="post">
                    <select title="Lisää ruoka" data-live-search="true" data-live-search-style="contains" class="selectpicker" name="food">


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