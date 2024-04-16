<?php 
$title = "Liste des ventes";

//saves the following code for using it elsewhere
ob_start();
?>
    
    <h2>Liste des ventes</h2>
    
    <button> <a href='index.php?page=addFormVente'>Enregistrer une vente</a> </button>  
  
<div>
    <?php
    // displays each row of the following columns
        while($result = $reponse->fetch()) {
    ?>
        <div class='vente'>
            <p>
                <b><?= $result['nom_produit'] ?></b> &nbsp; <button><a href='index.php?page=deleteVente&id_vente=<?=$result['id_vente']?>'>Supprimer</a></button><br/>
                <b>Prix libre&nbsp;:&nbsp;</b> <?=$result['prix_libre'] ?> €<br/>
                <b>Quantité&nbsp;:&nbsp;</b> <?=$result['quantite'] ?><br/>
                <b>Vendu le&nbsp;:&nbsp;</b> <?= $result['date_vente'] ?>
            </p>
            
            
        </div>
    <?php
        }

        //assigns to the $content variable, the following code for using it elsewhere
        $content = ob_get_clean();

        require('base.view.php');
    ?>
</div>
