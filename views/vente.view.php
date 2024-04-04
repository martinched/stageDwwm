<?php 
$title = "Liste des ventes";

//saves the following code for using it elsewhere
ob_start();
?>
    
    <h2>Liste des ventes</h2>
    

<div class='ligne'>
    <?php
    // displays each row of the following columns
        while($result = $requete->fetch()) {
    ?>
        <div class='vente'>
            <p>
                <b>N°&nbsp;<?= $result['nom_produit'] ?></b><br/>
                <b>Enregistré&nbsp;le&nbsp;:&nbsp;</b> <?=$result['date_enregistrement'] ?><br/>
                <b>Vendu&nbsp;le&nbsp;:&nbsp;</b> <?= $result['date_vente'] ?>  
                
                <!-- v.id_vente, v.quantite, v.date_vente, p.nom_produit, p.date_enregistrement, p.cout_reparation, p.temps_passe  -->

            </p>
            <a href='index.php?page=deleteReview&id_avis=<?=$result['id_vente']?>'>Supprimer</a>
        </div>
    <?php
        }

        //assigns to the $content variable, the following code for using it elsewhere
        $content = ob_get_clean();

        require('base.view.php');
    ?>
</div>
