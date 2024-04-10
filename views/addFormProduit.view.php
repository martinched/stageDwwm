

    <label for="nom_produit">Nom du produit:</label>
    <input  require id='form-nom_produit' type="string" name="nom_produit"/>
<br>
    <label for="description">Description:</label>
    <textarea maxlength=255 require id="form-description" name="description"></textarea>
<br>
    <label for="date_enregistrement">Date d'enregistrement:</label>
    <input require id='form-date_enregistrement_produit' type='date' name="date_enregistrement"/>
    
<br>
    <label for="cout_reparation">Coût de réparation:</label>
    <input require id='form-cout_reparation' type='number' name="cout_reparation"/> €
<br>
    <label for="temps_passe">Temps passé:</label>
    <input require id='form-temps_passe' type='number' name="temps_passe"/> h
<br>
    <input type="checkbox" id="form-vendu" name="vendu" />
    <label require for="vendu">Vendu</label>
<br>
    <input id='form-produitButton' type="submit" value="Envoyer le formulaire" />
</form> 



<?php
    $content = ob_get_clean();
    require('base.view.php');
?>
