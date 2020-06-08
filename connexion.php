<?php

    function chiffre($mdp)
    {
        $mdp="azerty".$mdp."cvbn";
        $mdp=hash('sha256',$mdp);
        return $mdp;
    }

    session_start();

    if(isset($_POST['connexion']))
    {
        if(!empty($_POST['pseudo']))
        {
            if(!empty($_POST['password']))
            {
                $link= mysqli_connect("127.0.0.1", "root", "", "discussion");

                $password= chiffre($_POST['password']);

                $requete="SELECT * FROM utilisateurs WHERE login = '".$_POST['pseudo']."' && password = '".$password."'";
                $query= mysqli_query($link, $requete);
                $resultat= mysqli_fetch_all($query, MYSQLI_ASSOC);

                if(!empty($resultat))
                {   $_SESSION['login']=$_POST['pseudo'];
                    $_SESSION['id']=$resultat[0]['id'];
                   
                    header('Location: index.php');
                }
            }
        }
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

<body class="bodyco">
    <?php include('header.footer.form/header.php'); ?>

    <section class="forminscri">

    <form action="connexion.php" method="post">

        <br/>

        <div class="form__group field">
            <label for="name">Votre identifiant :</label>
            <br/>
            <br/>
            <input type="text" id="name" class="form__field" name="pseudo" required>
        </div>

        <br/>
        <br/>

        <div class="form__group field">
            <label for="password">Votre mot de passe :</label>
            <br/>
            <br/>
            <input type="password" id="password" class="form__field" name="password" required>
        </div>

        <br/>
        <br/>
        
        <div class="form__group field">
            <input type="submit" class="submit" name="connexion" value="Se connecter">
        </div>

    </form>

</section>
</body>

</html>