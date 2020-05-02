<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<script>
    function PickedDate(a) { // Luodaan funktio klikatulle päivälle a=$date > formaatti 2020-04-29
        var b = a; // Luetaan muuttuja javascript muuttujaksi, jolloin esim. b = 2020-04-29
        fetch('skalenteri/pvmValittu.php/?data=' + b) // Lisää pvmValittu-tiedoston data-muuttujaan b-muuttujan
        location.reload(); // Päivittää sivun heti klikkauksen jälkeen, jolloin otsikkoon tulee näkyville klikattu päivä.
    }
</script> 