

<label for="nom_produit">Nom du produit&nbsp;:&nbsp;</label>
    <input  required id='form-nom_produit' type="string" name="nom_produit"/>
<br>
<label for="description">Description&nbsp;:&nbsp;</label>
<textarea maxlength=255 id="form-description" name="description"></textarea>
<br>
<label for="lieuStockage">Lieu de stockage&nbsp;:&nbsp;</label>
<input type="string" name="lieuStockage" />
<br>
    <label for="cout_reparation">Coût de réparation&nbsp;:&nbsp;</label>
<input required id='form-cout_reparation' type='number' value="0" name="cout_reparation"/> €
<br>
<label for="temps_passe">Temps passé&nbsp;:&nbsp;</label>
<input id="form-temps_passe"
       name="temps_passe"
       type="text" required
       pattern="[0-9]{2}(:[0-9]{2})?"
       value="00:00"
       title="Écrire une durée au format hh ou hh:mm" onfocus="verifierDuree()"> h
<p id="output"></p>

<input type="button" value="Vendre" onclick="this.hidden=true;afficherChampsVente()"><br>

<div id="champQuantite" style="display:none;">
    <label for="quantite">Quantité&nbsp;:&nbsp;</label>
    <input type="number" id="quantite" name="quantite"><br><br>
</div>

<div id="champPrix" style="display:none;">
    <label for="prix_libre">Prix libre&nbsp;:&nbsp;</label>
    <input type="number" id="prix_libre" name="prix_libre"> €<br>
</div>

<input id="updateProduit" type="hidden" name="vendu" value="0" />  
<br>
<input id='form-produitButton' type="submit" value="Enregistrer" />
</form> 



<?php
    $content = ob_get_clean();
    require('base.view.php');
?>
