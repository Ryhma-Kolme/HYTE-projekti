<!-- Sisältää käyttäjän aktiivisuustiedot -->
<?php
    include("includes/head.php");
    include("includes/naviaktiivisuus.php");
?>

<main>
    <?php
        include("saktiivisuus/syketiedot.php");
        include("saktiivisuus/laatikot.php");
    ?>
</main>

<?php
    include("includes/footer.php");
?>