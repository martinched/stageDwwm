<?php
$title = "Ajout de vente";
?>


<label for="nom_produit">Produit&nbsp;:&nbsp;</label>
<input id="form-nom_produit" type='text' name="nom_produit"></input>
<br>
<label for="date_enregistrement">Date d'enregistrement&nbsp;:&nbsp;</label>
<input id='form-date_enregistrement_Vente' type='date' required name="date_enregistrement"></input>
<br>   
<label for="cout_reparation">Coût de réparation&nbsp;:&nbsp;</label>
<input id='form-cout_reparation' type='number' required name="cout_reparation"> € </input>
<br>
<label for="temps_passe">Temps passé&nbsp;:&nbsp;</label>
<input id="form-temps_passe"
       name="temps_passe"
       type="text" required
       pattern="[0-9]{2}(:[0-9]{2})?"
       value="00:00"
       title="Écrire une durée au format hh ou hh:mm" onfocus="verifierDuree()"> h
<p id="output"></p>
<br>
<label for="prix_libre">Prix libre&nbsp;:&nbsp;</label>
<input id="form-prix_libre" type='number' name="prix_libre"> € </input>
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
