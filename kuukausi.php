<!-- Sisältää kalenterin ja kuukauden yhteenvedon -->
<?php
    include("includes/head.php");
    include("navit/kuukausi.php");
?>
<main>
    <?php
        include("skalenteri/scriptit.php");
        include('skalenteri/toiminnallisuus.php');
        include("skalenteri/totalhaku.php");
        include("skalenteri/kalenteri.php");
        include("skalenteri/yhteenveto.php");
    ?>
</main>
<?php
    include("includes/footer.php");
?>