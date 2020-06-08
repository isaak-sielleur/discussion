<?php
    if(!isset($_SESSION['login']))
    { 
?>

<main class="main1">
    <div class="center">
        <p class="p1"> Bienvenue sur le forum de discussion lié à</p> <img class="img1" src="images/lol.png">
        <p class="p1">Ici vous pourrez échanger sur tout ce qui concerne le jeux - nouveaux patchs, combos efficaces ... - ou encore faire des demandes pour entrer dans un groupe de jeux.</p>
    </div>
</main>

<?php
     }
    else
    {
 ?>
        
    <div class="center">
        <p class="p1">Bienvenue/bon retour parmi nous,</p>
        <p class="p1">Nous vous laissons visiter notre site et discuter.</p>
    </div>

<?php
    }
?>
