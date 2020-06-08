<?php


if (isset($_POST['send'])) {
    if(!empty($_POST['mode']))
        {
            if(!empty($_POST['user_message']))
            {
                $_POST['user_message']=addslashes($_POST['user_message']);
                $link= mysqli_connect("127.0.0.1", "root", "", "discussion");
                $requete="INSERT INTO messages (message, id_utilisateur,date,mode) VALUES ('".$_POST['user_message']."', '".$_SESSION['id']."', NOW(),'".$_POST['mode']."')";
                mysqli_query($link, $requete);
                echo $requete;
                header('location: discussion.php');
            }
        }
}

?>

<form action="discussion.php" method="post" class="formmess">



    <div class="form__group field">
        <br/>
        <br/>
        <label for="msg">Dans quel fil voulez vous poster ?</label>
        <br/>
        <br/>
        <select class="apparence" name="mode">
            <option value="TFT">TFT</option>
            <option value="ARAM">ARAM</option>
            <option value="FI">Faille de l'invocateur</option>
        </select>
        <br/>
        <br/>
        <label for="msg">Votre message :</label>
        <br/>
        <br/>
        <input type="text" id="msg" class="form__field apparence" name="user_message" required>
    </div>

    <br/>
    <br/>

    <div class="form__group field">
        <input type="submit" class="submit apparence aussi" name="send" value="Envoyer">
    </div>

</form>