<?php 
    $title = "Ajouter un produit";

    ob_start();
?>

<h2>Ajouter un produit</h2>

    <div class="formSousCat">
        <form onsubmit="FormSubmit(this)" id='form' action="index.php?page=formProduit" method="POST">
            <label for="nom_sous_categorie">Sous catégories:</label>
	    <input id="menu_nom_sous_categorie" type="hidden" name="nom_sous_categorie" />
            <select id="nom_sous_categorie" class="champ"
		    name="ddl_nom_sous_categorie" onclick="DropDownChanged(this);">
                <?php
                    while($sousCategorie = $reponse->fetch()) {
                ?>
                    <option value="<?= $sousCategorie['nom_sous_categorie'] ?>">
			<?= $sousCategorie['nom_sous_categorie'] ?>
		    </option>
                <?php
                }
                ?>
		<option value="">Autre...</option>
            </select>
	    <input type="text" name="txt_nom_sous_categorie" style="display: none;" />

