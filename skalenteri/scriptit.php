<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<script>
    function PickedDate(a) { // Luodaan funktio klikatulle päivälle a=$date > formaatti 2020-04-29
        var b = a; // Luetaan muuttuja javascript muuttujaksi, jolloin esim. b = 2020-04-29
        fetch('skalenteri/pvmValittu.php/?data=' + b) // Lisää pvmValittu-tiedoston data-muuttujaan b-muuttujan
            // .then((response) => {
            //     return response.json(); // Haun jälkeen funktio palauttaa kutsutun datan
            // })
            // .then((vastaus) => { 
            //     console.log(vastaus); // Tulostaa konsoliin klikatun datan
            // });
        location.reload(); // Päivittää sivun heti klikkauksen jälkeen, jolloin otsikkoon tulee näkyville klikattu päivä.

        // return $(document).on('click', 'td', function(){
        //     $(this).addClass('active-cell').siblings().removeClass('active-cell')
        // })
    }
</script> 


<!-- Korostetaan klikattu päivä -->

<!-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<script type="text/javascript">
    $(document).on('click', 'table tbody tr td', function(){
        $(this).addClass('active-cell').siblings().removeClass('active-cell')
    })
</script> -->