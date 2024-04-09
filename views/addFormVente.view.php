


    <label for="nom_produit">Produit&nbsp;:&nbsp;</label>
    <input id="form-nom_produit" type='text' name="nom_produit" ></input>
<br>
    <label for="date_enregistrement">Date d'enregistrement&nbsp;:&nbsp;</label>
    <input id='form-date_enregistrement_Vente' type='date' name="date_enregistrement" />
<br>   
    <label for="cout_reparation">Coût de réparation&nbsp;:&nbsp;</label>
    <input id='form-cout_reparation' type='number' name="cout_reparation" />
<br>
    <label for="temps_passe">Temps passé&nbsp;:&nbsp;</label>
    <input id='form-temps_passe' type='number' name="temps_passe" />
<br>
    <label for="prix_libre">Prix libre&nbsp;:&nbsp;</label>
    <input id="form-prix_libre" type='number' name="prix_libre" ></input>
<br> 
   <label for="quantite">Quantite&nbsp;:&nbsp;</label>
    <input id="form-quantite" type='number' name="quantite"></input>
<br>
    <input id='form-VenteButton' type="submit" value="Enregistrer la vente" />
</form> 

<?php
    $content = ob_get_clean();
    require('base.view.php');
?>