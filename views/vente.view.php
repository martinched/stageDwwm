<?php 
$title = "Liste des ventes";

//saves the following code for using it elsewhere
ob_start();
?>
    
    <h1><U>Liste des ventes</U></h1>

<div class='ligne'>
    <?php
    // displays each row of the following columns
        while($vente = $requete->fetch()) {
    ?>
        <div class='vente'>
            <p>
                <b>"<?= $vente['nom_produit'] ?>"</b><br/>
                <?='enregistré le&nbsp;: ' . $vente['date_enregistrement'] ?>
                <?= 'vendu le&nbsp;: ' . $vente['date'] ?> <br/>           
                <?= $vente['nom_produit'] ?><br/>
            </p>
            <a href='index.php?page=deleteReview&id_avis=<?=$vente['id_vente']?>'>Supprimer</a>
        </div>
    <?php
        }

        //assigns to the $content variable, the following code for using it elsewhere
        $content = ob_get_clean();

        require('base.view.php');
    ?>
</div>
