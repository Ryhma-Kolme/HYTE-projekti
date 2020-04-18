<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

<div class="ruoka-tallennus">
    <?php
    // Ruokien nimien haku kannasta
    $STH = $DBH->prepare("SELECT foodName FROM app_food ORDER BY foodName ASC");
    $STH->execute();
    $tulosOlio=$STH->fetchAll(PDO::FETCH_COLUMN);
    ?>
   
    <form method="post">

            <select name="food" id="select-food">

                <option selected="selected" value="">Lisää ruoka</option>
                <?php     
                // käydään array läpi
                foreach ($tulosOlio as $food){
                ?>
                <option value="<?php echo strtolower($food); ?>"><?php echo ($food); ?></option>
                <?php
                }
                ?>

            </select>
            <script>
            $(document).ready(function () {
            $('select').selectize({
            sortField: 'text'
                });
            });
            </script>

        <input type="text" class="quantitybtn" id="määrä" name="määrä" value="Lisää määrä (g)" onclick="this.select()">
        <input type="submit" class="tallennaruoka" name="foodbtn" value="Tallenna ruoka">
    </form>
</div>