<?php 
$title = "Liste des ventes";

ob_start();
?>
    
    <h2>Liste des ventes</h2>
    
    <button> <a href='index.php?page=formProduit'>Enregistrer une vente</a> </button>  
  
<div>
    <?php
    // displays each row of the following columns
        while($vente= $reponse->fetch()) {
    ?>
        <div>
            <p>
                <b><?= $vente['nom_produit']?></b> &nbsp;
		<input type="button" value="supprimer"
		       onclick="suppression(<?=$vente['id_vente']?>, 'vente')"><br>
                <b>Prix libre&nbsp;:&nbsp;</b> <?=$vente['prix_libre'] ?> €<br>
                <b>Quantité&nbsp;:&nbsp;</b> <?=$vente['quantite'] ?><br>
                <b>Vendu le&nbsp;:&nbsp;</b> <?= $vente['date_vente'] ?>
            </p>
            
            
        </div>
    <?php
        }

        //assigns to the $content variable, the following code for using it elsewhere
        $content = ob_get_clean();

        require('base.view.php');
    ?>
</div>
