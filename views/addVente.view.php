
    

    <label for="id_categorie">Catégorie:</label>
    <input id='form-id_categorie' type='number' name="id_categorie"/>
<br>  
    <label for="quantite">Quantite:</label>
    <textarea id="form-quantite" type='number' name="quantite"></textarea>
<br>
    <label for="date_enregistrement">Date d'enregistrement:</label>
    <input id='form-date_enregistrement_Vente' type='date' name="date_enregistrement"/>
<br>   
    <label for="cout_reparation">Coût de réparation:</label>
    <input id='form-cout_reparation' type='number' name="cout_reparation"/>
<br>
    <label for="temps_passe">Temps passé:</label>
    <input id='form-temps_passe' type='number' name="temps_passe"/>
<br>
    <input id='form-VenteButton' type="submit" value="Enregistrer la vente" />
</form> 

<?php
    $content = ob_get_clean();
    require('base.view.php');
?>