<?php 
$title = "Liste des ventes";

ob_start();
?>

<u><h2>Liste des ventes</h2></u>

<a href='index.php?page=formProduit'> <button class="ajout">Enregistrer une vente</button></a>  
 
<div>
    <?php
    // displays each row of the following columns
        while($vente= $reponse->fetch()) {
    ?>
        <div class="card"> 
            <p>
		<u><b><?= $vente['nom_produit']?></b></u><br>
                <b>Prix libre&nbsp;:&nbsp;</b> <?=$vente['prix_libre'] ?> €<br>
                <b>Quantité&nbsp;:&nbsp;</b> <?=$vente['quantite'] ?><br>
                <b>Vendu le&nbsp;:&nbsp;</b><br> <?= $vente['date_vente'] ?>
            </p>
	    <input class="suppr" type="button" value="supprimer"
		   onclick="suppression(<?=$vente['id_vente']?>, 'vente')"><br>        
        </div>
    <?php
        }

        //assigns to the $content variable, the following code for using it elsewhere
        $content = ob_get_clean();

        require('base.view.php');
    ?>
</div>
