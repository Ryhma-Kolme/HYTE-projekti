<div class="cal-row-1"> 

    <div class="calendar">
        <div class="column">
            <div class="blue-title">
                <ul class="calendar-month">
                    <li><a href="?ym=<?= $prev; ?>"><span class="material-icons">arrow_back_ios</span></a></li>
                    <li><span class="title"><?= $title; ?></span></li>
                    <li><a href="?ym=<?= $next; ?>"><span class="material-icons">arrow_forward_ios</span></a></li>
                </ul>
            </div>
            
            <table class="calendar-table" style="height:87%">
                <thead>
                    <tr>
                        <th class="cal-cell-th">ma</th>
                        <th class="cal-cell-th">ti</th>
                        <th class="cal-cell-th">ke</th>
                        <th class="cal-cell-th">to</th>
                        <th class="cal-cell-th">pe</th>
                        <th class="cal-cell-th">la</th>
                        <th class="cal-cell-th">su</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include("skalenteri/toiminnallisuus.php");
                        // Toiminnallisuus-tiedostossa on luotu lista viikoista ja sen sisältämistä päivistä. Foreachin avulla ne tuodaan näkyville.
                        foreach ($weeks as $week) {
                            echo $week;
                        }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <div class="päivän-tiedot">

        <div class="column">
            <div class="blue-title">
                <h3 id="pvm" style="font-size: 24px;">
                    <?php
                        // Jos sessiomuuttujassa ei ole valittua päivää, näytetään tämän hetkinen päivä
                        if(!isset($_SESSION['valittu'])){
                            $_SESSION['valittu'] = $today;
                        }
                        echo(strftime('%A %e.%m.%Y', strtotime($_SESSION['valittu'])));
                    ?>
                </h3>
            </div>

            <div class="column-content">
                <h2 style="text-align: start; font-size: 20px;">Ravintotiedot</h2>
                <table style="border:0; margin-bottom: 20px;">
                    <tr>
                        <th>Kalorit</th>
                        <th>Proteiinit</th>
                        <th>Hiilihydraatit</th>
                        <th>Rasvat</th>
                    </tr>
                    <tr>
                        <td> <?= $caloriestotal ?> kcal </td>
                        <td> <?= $proteinstotal ?> g </td>
                        <td> <?= $chtotal ?> g </td>
                        <td> <?= $fatstotal ?> g </td>
                    </tr>
                </table>

                <hr>

<?php // Unien keston tuonti csv tiedostosta

        $sleepTimes = array(); // Luodaan array

        // Tuodaan tiedot
        if(($handle = fopen("graafit/kkUni.csv", "r")) !== FALSE)
        {
            while(($dataTimes = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                $sleepTimes[] = $dataTimes;

            }
        }

        fclose($handle);
        $rowsleep = (strftime('%e.%m', strtotime($_SESSION['valittu']))); // Valittu päivä on sama kuin rivi csv tiedostossa
        $columnsleep = 2; // Miltä sarakkeelta tiedot tuodaan csv:stä
?>

<?php // Unien leposykkeiden tuonti csv tiedostosta

        $sleepBpm = array(); // Luodaan array

        // Tuodaan tiedot
        if(($handle = fopen("graafit/kkLeposyke.csv", "r")) !== FALSE)
        {
            while(($dataBpm = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                $sleepBpm[] = $dataBpm;

            }
        }

        fclose($handle);
        $rowbpm = (strftime('%e', strtotime($_SESSION['valittu']))); // Valittu päivä on sama kuin rivi csv tiedostossa
        $columnbpm = 1; // Miltä sarakkeelta tiedot tuodaan csv:stä
?>   

<h2 style="text-align: start; font-size: 20px;">Unitiedot</h2>
                <table style="border:0;">
                    <tr>
                        <th>Kesto</th>
                        <th>Leposyke</th>
                    </tr>
                    <tr>
                        <td><?php echo $sleepTimes[intval($rowsleep)][$columnsleep]; ?></td>
                        <td><?php echo $sleepBpm[intval($rowbpm)][$columnbpm]; ?> bpm</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>