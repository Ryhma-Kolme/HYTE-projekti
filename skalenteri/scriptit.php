<script>
    function PickedDate(a) { // Luodaan funktio klikatulle päivälle
        var b = a; // Luetaan muuttuja  javascript muuttujaksi
        //document.getElementById("pvm").innerHTML = b; // Muuttaa b -muuttujan html elementiksi - tämän takia vvvv-mm-dd formaatti vilahtaa (!!)
        fetch('skalenteri/pvmValittu.php/?data=' + b) // Vie data-muuttujaan b-muuttujan arvon
            .then((response) => {
                return response.json();
            })
            .then((vastaus) => { 
                console.log(vastaus);
            });
        location.reload();
    }
</script> 


<!-- Korostetaan klikattu päivä -->

<!-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<script type="text/javascript">
    $(document).on('click', 'table tbody tr td', function(){
        $(this).addClass('active-cell').siblings().removeClass('active-cell')
    })
</script> -->