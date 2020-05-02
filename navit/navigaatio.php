<nav>
    <ul> 
        <div class="left">
            <li><a class="logo">foodfx</a></li>
            <li><a href="kuukausi.php">Kalenteri</a></li>
            <li><a href="ravinto.php">Ravinto</a></li>
            <li><a href="unisivu.php">Uni</a></li>
        </div>
        <div class="right">
            <li><a href="tilitiedot.php"><?php echo($_SESSION['suserName']); ?></a></li>
            <li><a href="logOutUser.php"><span class="material-icons">exit_to_app</span></a></li>
        </div>
    </ul>
</nav>