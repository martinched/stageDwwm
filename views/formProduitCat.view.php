<?php 
    $title = "Ajouter un produit";

    ob_start();
?>

<u><h2>Ajouter un produit</h2></u>

<script>
 // Indique au formulaire si on est dans une vente ou un produit
 document.addEventListener( "DOMContentLoaded", function(){
     url = document.referrer;
     if (url.match (/.*vente.*/)) {
	 input = document.getElementById ('form-action');
	 input.value = "vente";
     } else if (url.match (/.*produits.*/)) {
	 input = document.getElementById ('form-action');
	 input.value = "produit";
     }
 });
</script>

<form onsubmit="FormSubmit(this)" id='formProduit' action="index.php?page=formProduit" method="POST">
    <div>
	<label for="nom_categorie">Catégorie:</label>
	<input id="menu_nom_categorie" type="hidden" name="nom_categorie" />
	<select id="nom_categorie" class="champ" name="ddl_nom_categorie"> <!-- onchange="DropDownChanged(this);"-->
            <?php 
	    while($categorie = $reponse->fetch()) {
	    ?>
                <option value="<?= $categorie['nom_categorie'] ?>">
		    <?= $categorie['nom_categorie'] ?></option>
            <?php
	    } 
            ?>            
	  <!--  <option value="">Autre...</option>-->
	</select>
	<input type="text" name="txt_nom_categorie" style="display: none;" />
    </div>

    <div class="formCat">
	<input id='form-action' type="hidden" name="action" value="" />
        <input id='form-cat_button' type="submit" value="Ok!" />
    </div>
    
    <br>



        <?php
    $content = ob_get_clean();
    require('base.view.php');
?>
