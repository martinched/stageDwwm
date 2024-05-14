<?php 
$title = "Liste des ventes";

ob_start();
?>

<h2 id="titreVentes">Liste des ventes</h2>

<a href='index.php?page=formProduit'> <button class="ajout">Enregistrer une vente</button></a>  

<?php

foreach ($ventes as $vente) {
?>
    <div class="card multicard">
	<div>
	    <h3>Vente n°<?= $vente["id_vente"] ?></h3>
	    <input class="suppr" type="button" value="supprimer"
		   onclick="suppression(<?=$vente['id_vente']?>, 'vente')"><br>        
	    <b>Prix libre&nbsp;:&nbsp;</b> <?=$vente['prix_libre'] ?> €<br>
	    <b>Vendu le&nbsp;:&nbsp;</b><br> <?= $vente['date_vente'] ?>
	</div>
	<?php
	foreach ($tableau[$vente["id_vente"]] as $id_produit => $produit) {
	?>
	    <div class="card">
		<u><b><?= $produit['nom_produit']?></b></u><br>
		<?= $produit['description']?><br>
		<?= $produit['nom_sous_categorie']?><br>
	    </div>
	<?php
	}
	?>
    </div>
<?php
}

//assigns to the $content variable, the following code for using it elsewhere
$content = ob_get_clean();

require('base.view.php');
?>

