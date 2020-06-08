<?php 

session_start();
    
    if (isset($_GET["deco"])) {
        session_destroy();
        header('location:index.php');
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

<body class="presentation">

        <?php include('header.footer.form/header.php'); ?>
    
        <?php include('contenuinterractif/presentation.php'); ?>

    </body>

</html>