<?php
    include("includes/head.php");
    include("includes/naviravinto.php");
?>

<main>
    <div class="row-buttons">
        <button><a href="aamiainen.php">Aamiainen</a></button>
        <button><a href="lounas.php">Lounas</a></button>
        <button><a href="välipala.php">Välipala</a></button>
        <button><a class="current" href="päivällinen.php">Päivällinen</a></button>
        <button><a href="iltapala.php">Iltapala</a></button>
    </div>

    <div class="header-white">
        <div class="row-1">
            <p>Lisää päivällisesi valitsemalla tallentamasi ateria tai ruoka-aine tai lisää uusi.</p>
            <button class="uusiruoka">Lisää uusi ruoka-aine</button>
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
                <h3>Päivällinen</h3>
            </div>
            <p>Taulukko</p>
        </div>
    </div>
</main>