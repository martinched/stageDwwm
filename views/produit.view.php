<?php 
$title = "Liste des produits";

ob_start()
?>

<u><h2>Liste des produits</h2></u>

<a href="index.php?page=formProduit"> <button class="ajout"> Ajouter un produit</button></a>

<?php
while($product = $reponse->fetch()) {
?>	
    <div class="card">
	<form method="POST" action="index.php?page=addVente" >
	    <div class="card_info">
		<div>
		    <u><b><?= $product['nom_produit'] ?></b></u>
		    <input type="hidden" name="nom_produit" value="<?=$product['nom_produit']?>">
		</div>

		<div>
		    <?= $product['description'] ?>
		    <input type="hidden" name="description" value="<?=$product['description']?>">
		</div>

		<div>
		    <b>Date d'enregistrement&nbsp;:&nbsp;</b><br> <?=$product['date_enregistrement']?>
		</div>

		<div>
		    <input type="hidden" name="date_enregistrement" value="<?=$product['date_enregistrement']?>">
		</div>

		<div>
		    <b>Coût de reparation&nbsp;:&nbsp;</b> <?=$product['cout_reparation']?>&nbsp;€
		    <input type="hidden" name="cout_reparation" value="<?=$product['cout_reparation']?>">
		</div>

		<div>
		    <b>Temps passé&nbsp;:&nbsp;</b>
		    <?php $date = date_create ($product['temps_passe']);
		    echo date_format ($date, "G \h i \m"); ?>
		</div>

		<div>
		    <input type="hidden" name="temps_passe" value="<?=$product['temps_passe']?>"> 
		</div>

		<div>
		    <input type="hidden" name="poids" value="<?=$product['poids']?>">
		</div>

		<div>
		    <input type="hidden" name="nom_categorie" value="<?=$product['nom_categorie']?>">
		</div>
	    </div>

	    <div class="card_vendre" >
		<input class="sell" type="button" value="Vendre"
		       onclick="this.hidden=true;afficherChampsVente(<?=$product['id_produit']?>)">

		<div class="card_vendre-champsCacher">
		    <div class="quantite" id="champQuantite<?=$product['id_produit']?>"
			 style="display:none;">
			<label for="quantite">Quantité&nbsp;:&nbsp;</label>
			<input class="champ" type="number" id="quantite" name="quantite"><br>
		    </div>
		    
		    <div id="champPrix<?=$product['id_produit']?>" style="display:none;">
			<label for="prix_libre">Prix libre (€)&nbsp;:&nbsp;</label>
			<input class="champ" type="number" id="prix_libre" name="prix_libre">
		    </div>
		    
		    <input type="hidden" name="id_produit" value="<?=$product['id_produit']?>">
		    <div>  
		    <input class="btn"
			   id="bouton_enregistrer_vente<?=$product['id_produit']?>"
			   style="display:none" type="submit" name="" value="Enregister la vente">
		    </div>
		</div>
	    </div>  
	</form>
	
	<input class="suppr" type="button" value="Supprimer"
	       onclick="suppression(<?=$product['id_produit']?>, 'produit')"> 
    </div>
    
<?php
}

$content = ob_get_clean();

require('base.view.php');
?>

