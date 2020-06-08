<?php 

session_start();

function chiffre($mdp)
{
    $mdp="azerty".$mdp."cvbn";
    $mdp=hash('sha256',$mdp);
    return $mdp;
}

if(isset($_POST['inscri']))
{
    if(!empty($_POST['name'])&&!empty($_POST['password'])&&!empty($_POST['confirmpassword']))
    {
        if($_POST['password']==$_POST['confirmpassword'])
        {
            $link= mysqli_connect("127.0.0.1", "root", "", "discussion");

            $requete="SELECT * FROM utilisateurs WHERE login = '".$_POST['name']."'";
            $query= mysqli_query($link, $requete);
            $resultat= mysqli_fetch_all($query, MYSQLI_ASSOC);

            if(empty($resultat))
            {
                //apres la verification login
                $password=chiffre($_POST['confirmpassword']);
                $requete= "INSERT INTO utilisateurs (login, password) VALUES ('".$_POST['name']."', '".$password."')";
                $query= mysqli_query($link, $requete);
                header('Location: connexion.php');
            }
            else
            {
                $erreur= "Ce login est déjà utilisé, veuillez en choisir un autre";
                
            }
        }

        else
        {
            $erreur= "Les mot de passe ne sont pas identiques, veuillez réessayer";
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

<body class="bodyinscri">
    <?php include('header.footer.form/header.php'); ?>

    <section class="forminscri">

    <form action="inscription.php" method="post">

        <br/>

        <?php 
        
        if(isset($erreur))
        {

        ?>

        <div class="echo">
           <?php echo $erreur; ?>
        </div>

        <?php

        }

        ?>

        <div class="form__group field">
            <label for="name">Votre identifiant :</label>
            <br/>
            <br/>
            <input type="text" class="form__field apparence" name="name" required>
        </div>

        <br/>
        <br/>

        <div class="form__group field">
            <label for="password">Votre mot de passe :</label>
            <br/>
            <br/>
            <input type="password" class="form__field apparence" name="password" required>
        </div>

        <br/>
        <br/>

        <div class="form__group field">
            <label for="password">Confirmez votre mot de passe :</label>
            <br/>
            <br/>
            <input type="password" class="form__field apparence" name="confirmpassword" required>
        </div>

        <br/>
        <br/>
        
        <div class="form__group field">
            <input type="submit" class="submit apparence aussi" name="inscri" value="S'inscrire">
        </div>

    </form>

</section>
</body>

</html>