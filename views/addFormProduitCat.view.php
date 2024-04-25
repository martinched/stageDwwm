<?php 
    $title = "Ajouter un produit";

    ob_start();
?>

<h1>Ajouter un produit</h1>

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

    <form id='formProduit' action="index.php?page=formProduit" method="POST">
        <label for="id_categorie">Categorie:</label>
        <select id="selectCat" name="id_categorie">
            <?php 
    while($categorie = $reponse->fetch()) {
	    ?>
                <option value="<?= $categorie['id_categorie'] ?>">
		    <?= $categorie['nom_categorie'] ?></option>
            <?php
     } 
            ?>            
        </select>
	<div class="formCat">
	    <input id='form-action' type="hidden" name="action" value="" />
            <input id='form-cat_button' type="submit" value="Ok!" />
	</div>
    
    <br>



        <?php
    $content = ob_get_clean();
    require('base.view.php');
?>
