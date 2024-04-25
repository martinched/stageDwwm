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
	
        <label for="nom_categorie">Nom de la categorie&nbsp;:&nbsp;</label>

	<div class="autocomplete">
	    <input require id="form-nom_categorie" value="<?=$_GET['nom_categorie']?>" type="text" name="nom_categorie">
	</div>

	<label for="sous_categorie">Sous-categorie&nbsp;:&nbsp;</label>
        <input id="form-sous_categorie" type="string" name="sous_categorie"></input>
	<br>

	<label for="poids">Poids&nbsp;:&nbsp;</label>
        <input id='form-poids_categorie' type='number' name="poids"/>
	<br>

	<input id='form-categorieButton' type="submit" value="Envoyer le formulaire" />
    </form> 
</div>


<?php
    $content = ob_get_clean();
    require('base.view.php');
?>
