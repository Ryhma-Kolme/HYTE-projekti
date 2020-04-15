<div class="cal-row-1"> 

    <div class="calendar">
        <div class="column">
            <div class="blue-title">
                <ul class="calendar-month">
                    <li><a href="?ym=<?= $prev; ?>">&lt; Edellinen kuukausi</a></li>
                    <li><span class="title"><?= $title; ?></span></li>
                    <li><a href="?ym=<?= $next; ?>">Seuraava kuukausi &gt;</a></li>
                </ul>
            </div>
            
            <table class="calendar-table">
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
                <h3>Päivän ravintotiedot</h3>
            </div>

            <?php
            // include("skalenteri/totalhaku.php");
            echo("
                <table>
                    <tr>
                        <th>Kalorit</th>
                        <th>Rasvat</th>
                        <th>Hiilihydraatit</th>
                        <th>Proteiinit</th>
                    </tr>
                    <tr>
                        <td>".$caloriestotal."kcal</td>
                        <td>".$fatstotal."g</td>
                        <td>".$chtotal."g</td>
                        <td>".$proteinstotal."g</td>
                    </tr>
                </table>
            ");
            ?>
        </div>

        <div class="column">
            <div class="blue-title">
                <h3>Unitiedot</h3>
            </div>
            <p>Unen kesto</p>
            <p>Leposyke</p>
        </div>
    </div>
</div>