<?php 
    $title = "Formulaire de vente";

    ob_start()
?>

<h1>Formulaire de vente</h1>
    
<form id='formVente' action="index.php?page=addFormVente" method="post">
    <label for="nom_Vente">Nom du Vente:</label>
    <input id='form-nom_Vente' type="string" name="nom_Vente"/>
      
    <label for="quantite">Quantite:</label>
    <textarea id="form-quantite" name="quantite"></textarea>

    <label for="date_enregistrement">Date d'enregistrement:</label>
    <input id='form-date_enregistrement_Vente' type='date' name="date_enregistrement"/>

    <label for="id_categorie">Catégorie:</label>
    <input id='form-id_categorie' type='number' name="id_categorie"/>

    <label for="cout_reparation">Coût de réparation:</label>
    <input id='form-cout_reparation' type='number' name="cout_reparation"/>

    <label for="temps_passe">Temps passé:</label>
    <input id='form-temps_passe' type='number' name="temps_passe"/>
  
    <input id='form-VenteButton' type="submit" value="Enregistrer la vente" />
</form> 



<?php
    $content = ob_get_clean();
    require('base.view.php');
?>