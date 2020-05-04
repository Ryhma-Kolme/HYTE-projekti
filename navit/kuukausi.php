<?php include('skalenteri/toiminnallisuus.php'); ?>

<nav class="nav-web">
    <ul class="left">
        <li><a class="logo">foodfx</a></li>
        <li><a class="active" href="kuukausi.php">Kalenteri</a></li>
        <li><a href="ravinto.php">Ravinto</a></li>
        <li><a href="unisivu.php">Uni</a></li>
    </ul>
    <ul class="right">
        <li>
            <a class="pvm">
                <?php
                    // Jos sessiomuuttujassa ei ole valittua päivää, näytetään tämän hetkinen päivä
                    if(!isset($_SESSION['valittu'])){
                        $_SESSION['valittu'] = $today;
                    }
                    echo(strftime('%a %e.%m.%Y', strtotime($_SESSION['valittu'])));
                ?>
            </a>
        </li>
        <li><a href="tilitiedot.php"><?php echo($_SESSION['suserName']); ?></a></li>
        <li><a href="logOutUser.php"><span class="material-icons">exit_to_app</span></a></li>
    </ul>
</nav>


<nav class="nav-mob">
    <a class="logo">foodfx</a>
    <a class="active" href="kuukausi.php"><span class="material-icons">event_note</span></a>
    <a href="ravinto.php"><span class="material-icons">fastfood</span></a>
    <a href="unisivu.php"><span class="material-icons">brightness_3</span></a>
    <a href="tilitiedot.php"><span class="material-icons">face</span></a>
    <a href="logOutUser.php"><span class="material-icons">exit_to_app</span></a>
    <a class="pvm">
        <?php
            // Jos sessiomuuttujassa ei ole valittua päivää, näytetään tämän hetkinen päivä
            if(!isset($_SESSION['valittu'])){
                $_SESSION['valittu'] = $today;
            }
            echo(strftime('%a %e.%m.%Y', strtotime($_SESSION['valittu'])));
        ?>
    </a>
</nav>