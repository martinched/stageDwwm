<?php 
$title = "Liste des produits";

ob_start()
?>

    <h2>Liste des produits</h2>
    <button> <a href="index.php?page=formProduit">Ajouter un produit</a></button>
<?php
    
    while($product = $reponse->fetch()) {
?>
<form method="POST" action="index.php?page=addVente" >
    <p>
        <b>Nom&nbsp;:&nbsp; <?= $product['nom_produit'] ?></b>
        <input type="hidden" name="nom_produit" value="<?=$product['nom_produit']?>">
        <br>
        <b>description&nbsp;:&nbsp;</b> <?= $product['description'] ?>
        <input type="hidden" name="description" value="<?=$product['description']?>">
        <br>
        <b>Date d'enregistrement&nbsp;:&nbsp;</b> <?=$product['date_enregistrement']?>
        <input type="hidden" name="date_enregistrement" value="<?=$product['date_enregistrement']?>">
        <br>
        <b>Coût de reparation&nbsp;:&nbsp;</b> <?=$product['cout_reparation']?> € 
        <input type="hidden" name="cout_reparation" value="<?=$product['cout_reparation']?>">
        <br>
        <b>Temps passé&nbsp;:&nbsp;</b> <?=$product['temps_passe']?> h
        <input type="hidden" name="temps_passe" value="<?=$product['temps_passe']?>"> 
        <input type="hidden" name="poids" value="<?=$product['poids']?>">
        <input type="hidden" name="id_categorie" value="<?=$product['id_categorie']?>">
        <br>
           <input type="button" value="Vendre" onclick="this.hidden=true;afficherChampsVente(<?=$product['id_produit']?>)"><br>

           <div id="champQuantite<?=$product['id_produit']?>" style="display:none;">
            <label for="quantite">Quantité&nbsp;:&nbsp;</label>
            <input type="number" id="quantite" name="quantite"><br>
        </div>

        <div id="champPrix<?=$product['id_produit']?>" style="display:none;">
            <label for="prix_libre">Prix libre&nbsp;:&nbsp;</label>
            <input type="number" id="prix_libre" name="prix_libre"> €<br>
        </div>

        <input type="hidden" name="id_produit" value="<?=$product['id_produit']?>">
        
        <input id="bouton_enregistrer_vente<?=$product['id_produit']?>" style="display:none" type="submit" name="" value="Enregister la vente">

        
    </p>

    
</form>

 <input type="button" value="Supprimer" onclick="suppression(<?=$product['id_produit']?>, 'produit')"><br>

   

 <?php
    }
    $content = ob_get_clean();

    require('base.view.php');
?>

