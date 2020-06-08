<header>
    <nav>
        <ul>
            <li><a href="index.php">Presentation</a></li>
            <li><a href="discussion.php">Discussion</a></li>
            <?php
                if(!isset($_SESSION['login']))
                { 
            ?>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <?php
                }
                else
                {
            ?>
            <li><a href="profil.php">Modifier le profil</a></li>
            <li><a href="index.php?deco=true">Deconnexion</a></li>
            <?php
                }
            ?>
        </ul>
    </nav>
</header>

