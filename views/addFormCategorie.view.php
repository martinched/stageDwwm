<?php

    $title = "Ajout de catégorie";

    ob_start()
?>

<u><h2>Ajouter une catégorie</h2></u>

<script>
 document.addEventListener( "DOMContentLoaded", function(){
     var categories = <?php echo json_encode($categories); ?>;
     autocomplete(document.getElementById("form-nom_categorie"), categories);
 });
</script>

<div class='formulaire'>
    <form id='formCategorie' action="index.php?page=addFormCategorie" method="POST">

        <label for="categorie">Categorie&nbsp;:&nbsp;</label>
	<input type="hidden" name="categorie" />
	<select class='champ' name="categorie_ddl" onchange="DropDownChanged(this);">
	    <option value="1">Meuble</option>
	    <option value="2">Textile</option>
	    <option value="3">Puériculture</option>
	    <option value="4">Vaisselle</option>
	    <option value="5">HiFi</option>
	    <option value="6">Other..</option>
	</select>
	<input class='champ' type="text" name="categorie_txt" style="display: none;"/>
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
