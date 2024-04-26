<?php

    $title = "Ajout de catégorie";

    ob_start()
?>

<u><h2>Ajouter une catégorie</h2></u>

<div class='formulaire'>
    <form onsubmit="FormSubmit(this)" id='formCategorie'
	  action="index.php?page=addFormCategorie"
	  method="POST">
        <label for="categorie">Categorie&nbsp;:&nbsp;</label>
	<input id="menu_nom_categorie" type="hidden" name="nom_categorie" />
	<select id="nom_categorie" class='champ'
		name="ddl_nom_categorie" onchange="DropDownChanged(this);">
	    <?php
	    foreach ($categories as $categorie) {
	    ?>
                <option value="<?=$categorie?>"><?=$categorie?></option>
            <?php
	    }
	    ?>
	    <option value="">Autre...</option>
	</select>
	<input class='champ' type="text" name="txt_nom_categorie" style="display: none;"/>
	<br>
	<label for="sous_categorie">Sous-categorie&nbsp;:&nbsp;</label>
        <input class='champ' id="form-sous_categorie" type="string" name="sous_categorie"></input>
	<br>

	<label for="poids">Poids (en g)&nbsp;:&nbsp;</label>
        <input class='champ' id='form-poids_categorie' type='number' name="poids"/>
	<br>

	<input class='champ btn' id='form-categorieButton' type="submit" value="Envoyer le formulaire" />
    </form> 
</div>


<?php
    $content = ob_get_clean();
    require('base.view.php');
?>
