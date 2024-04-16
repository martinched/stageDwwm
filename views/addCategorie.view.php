<?php



    $title = "Formulaire d'ajout de catégorie";

    ob_start()
?>

<h1>Formulaire d'ajout de catégorie</h1>
<script>
 document.addEventListener( "DOMContentLoaded", function(){
     var categories = <?php echo json_encode($categories); ?>;
     console.log (categories);
     autocomplete(document.getElementById("form-nom_categorie"), categories);
 });
</script>
<div class='formulaire'>
    <form id='formCategorie' action="index.php?page=addFormCategorie" method="post">
        <label for="nom_categorie">Nom&nbsp;de&nbsp;la&nbsp;categorie&nbsp;:&nbsp;</label>
	<div class="autocomplete">
	    <input require id="form-nom_categorie" type="text" name="nom_categorie" placeholder="Catégorie">
	</div>
        <label for="sous_categorie">Sous-categorie:</label>
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
