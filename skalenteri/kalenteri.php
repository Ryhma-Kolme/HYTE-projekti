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

                        foreach ($weeks as $week) {
                            echo $week;
                        }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <script>
        function PickedDate(a) { // Luodaan funktio klikatulle päivälle
            var b = a; // Luetaan muuttuja  javascript muuttujaksi
            document.getElementById("pvm").innerHTML = b; // Muuttaa b -muuttujan html elementiksi
            fetch('skalenteri/pvmValittu.php/?data=' + b) // Vie data-muuttujaan -muuttujan arvon
                .then((response) => {
                    return response.json();
                })
                .then((vastaus) => { 
                    console.log(vastaus);
                });
            location.reload();
        }
        
    </script> 

    <!-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <script type="text/javascript">
        $(document).on('click', 'table tbody tr td', function(){
            $(this).addClass('active-cell').siblings().removeClass('active-cell')
        })
    </script> -->

    <div class="päivän-tiedot">

        <div class="column">
            <div class="blue-title">
                <h3 id="pvm" style="font-size: 24px;"> <?= strftime('%A %e.%m.%Y', strtotime($_SESSION['valittu']));?> </h3>
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
                
                <h2 style="text-align: start; font-size: 20px;">Unitiedot</h2>
                <table style="border:0;">
                    <tr>
                        <th>Kesto</th>
                        <th>Leposyke</th>
                    </tr>
                    <tr>
                        <td>08:20 h</td>
                        <td>55 bpm</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>