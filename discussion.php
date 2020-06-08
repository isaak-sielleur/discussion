<?php

    session_start();

    $link= mysqli_connect("127.0.0.1", "root", "", "discussion");

    $query= mysqli_query($link, "SELECT message, date, login FROM `messages` INNER JOIN `utilisateurs` on messages.id_utilisateur = utilisateurs.id WHERE mode = 'TFT' order by date desc");
    $resultattft= mysqli_fetch_all($query, MYSQLI_ASSOC);

    $query= mysqli_query($link, "SELECT message, date, login FROM `messages` INNER JOIN `utilisateurs` on messages.id_utilisateur = utilisateurs.id WHERE mode = 'ARAM' order by date desc");
    $resultataram= mysqli_fetch_all($query, MYSQLI_ASSOC);

    $query= mysqli_query($link, "SELECT message, date, login FROM `messages` INNER JOIN `utilisateurs` on messages.id_utilisateur = utilisateurs.id WHERE mode = 'FI' order by date desc");
    $resultatfi= mysqli_fetch_all($query, MYSQLI_ASSOC);

    if(!isset($_SESSION['login']))
    { 
        header('location:connexion.php');
    }

?>


<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="apparence/discussion.css">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Kelly+Slab&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/icone.png" />
    <link href="https://fonts.googleapis.com/css?family=Acme|Oswald|Playfair+Display&display=swap" rel="stylesheet">
    <title>DISCUSSION</title>
</head>

<body class="fil">
    <?php include('header.footer.form/header.php'); ?>
<section class="position">
    <details>
        <summary>
            TFT
            <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
            <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
        </summary>
        <?php foreach($resultattft as $commentairestft): ?>
                <div>
                    <p class="appinter plus">Posté le <?=$commentairestft['date']?> par <?=$commentairestft['login']?> :</p>
                    <p class="appinter encore"><?=$commentairestft['message']?></p>
                </div>
            <?php endforeach; ?>
    </details>

    <details>
        <summary>
            ARAM 
            <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
            <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
        </summary>
        <?php foreach($resultataram as $commentairesaram): ?>
                <div>
                    <p class="appinter plus">Posté le <?=$commentairesaram['date']?> par <?=$commentairesaram['login']?> :</p>
                    <p class="appinter encore"><?=$commentairesaram['message']?></p>
                </div>
                <?php endforeach; ?>
    </details>

    <details>
        <summary>
            FAILLE DE L'INVOCATEUR
            <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
            <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
        </summary>
        <?php foreach($resultatfi as $commentairesfi): ?>
                <div >
                    <p class="appinter plus">Posté le <?=$commentairesfi['date']?> par <?=$commentairesfi['login']?> :</p>
                    <p class="appinter encore"><?=$commentairesfi['message']?></p>
                </div>
                <?php endforeach; ?>
    </details>

    </section>

    <?php include('header.footer.form/form.php'); ?>

</body>

</html>