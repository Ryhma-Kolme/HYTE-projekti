<!-- Sisältää kalenterin ja kuukauden yhteenvedon -->
<?php
    include("includes/head.php");
    include_once("navit/kuukausi.php");
?>
<main>
    <?php
        include('skalenteri/toiminnallisuus.php');
        include("skalenteri/totalhaku.php");
        include_once("skalenteri/kalenteri.php");
        include_once("skalenteri/yhteenveto.php");
    ?>
</main>
<?php
    include_once("includes/footer.php");
?>