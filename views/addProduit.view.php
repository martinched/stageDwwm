<?php 
    $title = "Formulaire d'ajout de produit";

    ob_start()
?>

<h1>Formulaire d'ajout de produit</h1>
    
<form id='formProduit' action="index.php?page=addFormProduit" method="post">
    <label for="nom_produit">Nom du produit:</label>
    <input require id='form-nom_produit' type="string" name="nom_produit"/>
      
    <label for="description">Description:</label>
    <textarea id="form-description" name="description"></textarea>

    <label for="date_enregistrement">Date d'enregistrement:</label>
    <input id='form-date_enregistrement_produit' type='date' name="date_enregistrement"/>

    <label for="id_categorie">Catégorie:</label>
    <input id='form-id_categorie' type='number' name="id_categorie"/>

    <label for="cout_reparation">Coût de réparation:</label>
    <input id='form-cout_reparation' type='number' name="cout_reparation"/>

    <label for="temps_passe">Temps passé:</label>
    <input id='form-temps_passe' type='number' name="temps_passe"/>

    <input type="checkbox" id="form-vendu" name="vendu" />
    <label for="vendu">Vendu</label>
  
    <input id='form-produitButton' type="submit" value="Envoyer le formulaire" />
</form> 



<?php
    $content = ob_get_clean();
    require('base.view.php');
?>
