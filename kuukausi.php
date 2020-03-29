<!-- Sisältää kalenterin ja kuukauden yhteenvedon -->
<?php
    include("includes/head.php");
    include_once("includes/navigaatio.php");
?>
<main>
    <?php
        include_once("skalenteri/kalenteri.php");
        include_once("skalenteri/yhteenveto.php");
    ?>
</main>
<?php
    include_once("includes/footer.php");
?>