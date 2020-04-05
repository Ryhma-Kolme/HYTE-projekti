<?php
    include("includes/head.php");
    include("includes/naviravinto.php");
?>

<main>
    <div class="row-buttons">
        <button style="border: 1px solid white"><a class="current" href="aamiainen.php">Aamiainen</a></button>
        <button><a href="lounas.php">Lounas</a></button>
        <button><a href="välipala.php">Välipala</a></button>
        <button><a href="päivällinen.php">Päivällinen</a></button>
        <button><a href="iltapala.php">Iltapala</a></button>
    </div>

    <div class="header-white">
        <div class="row-1">
            <p>Lisää aamiaisesi valitsemalla tallentamasi ateria tai ruoka-aine tai lisää uusi.</p>
            <button class="uusiruoka"><a href="ruokaaine.php">Lisää uusi ruoka-aine</a></button>
        </div>
        <?php include("sravinto/boxes-tallennetut.php"); ?>
    </div>

    <div class="row">
        <div class="column">
            <div class="blue-title">
                <h3>Päivän tavoite</h3>
            </div>
            <img style="height:200px; padding:10px" src="images/värit.png" alt="Rinkula">
        </div>

        <div class="column">
            <div class="blue-title">
                <h3>Aamiainen</h3>
            </div>
            <p>Taulukko</p>
        </div>
    </div>
</main>

<?php include("includes/footer.php"); ?>