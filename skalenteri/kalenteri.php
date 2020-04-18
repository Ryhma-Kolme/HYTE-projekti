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

    <script>
        function PickedDate(a) {
            console.log(a);
            return(a);
        }

        // document.getElementById("morjesta").innerHTML = PickedDate();
    </script> 


    <div class="päivän-tiedot">

        <div class="column">
            <div class="blue-title">
                <h3 style="font-size: 24px;"> Tänään <?= $date_title ?> </h3>
            </div>

            <div class="column-content">
                <h2 style="text-align: start; font-size: 20px;">Ravintotiedot</h2>
                <table style="margin-bottom: 20px;">
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
                
                <h2 style="text-align: start; font-size: 20px;">Unitiedot</h2>
                <p>Unen kesto</p>
                <p>Leposyke</p>
            </div>
        </div>
    </div>
</div>