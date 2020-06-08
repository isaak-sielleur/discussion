<?php

    session_start();

    function chiffre($mdp)
    {
        $mdp="azerty".$mdp."cvbn";
        $mdp=hash('sha256',$mdp);
        return $mdp;
    }

    if(isset($_POST['modif']))
    {
        if(!empty($_POST['pseudo']))
        {

            $link= mysqli_connect("127.0.0.1", "root", "", "discussion");

            $requete="SELECT * FROM utilisateurs WHERE login = '".$_POST['pseudo']."'";
            $query= mysqli_query($link, $requete);
            $resultat= mysqli_fetch_all($query, MYSQLI_ASSOC);


            if(empty($resultat))
            {

                $requete= "UPDATE utilisateurs SET login = '".$_POST['pseudo']."' WHERE id=".$_SESSION['id']." ";
                $query= mysqli_query($link, $requete);
                $_SESSION['login'] = $_POST['pseudo'];
            }
            else
            {
                $err="Ce login est déjà utilisé, veuillez en choisir un autre";
            }    
        }

        if(!empty($_POST['password']))
        {
            $link= mysqli_connect("127.0.0.1", "root", "", "discussion");

            $password=chiffre($_POST['password']);
            $requete= "UPDATE utilisateurs SET password = '".$password."' WHERE id=".$_SESSION['id']." ";
            $query= mysqli_query($link, $requete);
        }
        if(!isset($err))
        {
            header('location: profil.php');
        }
    }
?>
<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
    <link rel="stylesheet" href="apparence/discussion.css">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Kelly+Slab&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/icone.png" />
    <link href="https://fonts.googleapis.com/css?family=Acme|Oswald|Playfair+Display&display=swap" rel="stylesheet">
    <title>DISCUSSION</title>

</head>

<body class="bodyprof">

<?php include('header.footer.form/header.php'); ?>

    <section class="forminscri">

    <form action="profil.php" method="post">

        <br/>

        <div class="form__group field">
            <label for="name">Votre nouvel identifiant :</label>
            <br/>
            <br/>
            <input type="text" id="name" class="form__field copie tours2" name="pseudo" value=<?php echo $_SESSION['login'] ?>>
        </div>

        <br/>
        <br/>

        <div class="form__group field">
            <label for="password">Votre nouveau mot de passe :</label>
            <br/>
            <br/>
            <input type="password" id="password" class="form__field copie tours2" name="password">
        </div>

        <br/>
        <br/>
        
        <div class="form__group field">
            <input type="submit" class="submit copie tours" name="modif" value="Modifier">
        </div>

    </form>
    <?php if(isset($err))
    {
        echo $err;
    }
    ?>
</section>

</body>

</html>