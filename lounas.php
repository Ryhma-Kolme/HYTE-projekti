<?php
    include("includes/head.php");
    include("includes/naviravinto.php");
?>

<main>
    <div class="row-buttons">
        <button><a href="aamiainen.php">Aamiainen</a></button>
        <button style="border: 1px solid white"><a class="current" href="lounas.php">Lounas</a></button>
        <button><a href="välipala.php">Välipala</a></button>
        <button><a href="päivällinen.php">Päivällinen</a></button>
        <button><a href="iltapala.php">Iltapala</a></button>
    </div>

    <div class="header-white">
        <div class="row-1">
            <p>Lisää lounaasi valitsemalla tallentamasi ateria tai ruoka-aine tai lisää uusi.</p>
            <button class="uusiruoka"><a href="ruokaaine.php">Lisää uusi ruoka-aine</a></button>
        </div>
        <div class="boxes-tallennetut">
            <!-- <div class="box-tallennetut">
                <h4>Tallennetut ateriat</h4>
            </div> -->

            <div class="box-tallennetut">
                <h4>Tallennetut ruoka-aineet</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="column">
            <div class="blue-title">
                <h3>Päivän tavoite</h3>
            </div>
            <p>rinkula</p>
        </div>

        <div class="column">
            <div class="blue-title">
                <h3>Lounas</h3>
            </div>
            <p>Taulukko</p>
        </div>
    </div>
</main>

<?php include("includes/footer.php"); ?>