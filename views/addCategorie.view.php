<?php 
    $title = "Formulaire d'ajout de catégorie";

    ob_start()
?>

<h1>Formulaire d'ajout de catégorie</h1>

<div class='formulaire'>
    <form id='formCategorie' action="index.php?page=addFormCategorie" method="post">
        <label for="nom_categorie">Nom&nbsp;de&nbsp;la&nbsp;categorie&nbsp;:&nbsp;</label>
        <input require id='form-nom_categorie' type="string" name="nom_categorie"/>
    
        <label for="sous_categorie">Sous-categorie:</label>
        <input id="form-sous_categorie" type="string" name="sous_categorie"></input>

        <label for="poids">Poids&nbsp;:&nbsp;</label>
        <input id='form-poids_categorie' type='number' name="poids"/>

    
        <input id='form-categorieButton' type="submit" value="Envoyer le formulaire" />
    </form> 
</div>


<?php
    $content = ob_get_clean();
    require('base.view.php');
?>
