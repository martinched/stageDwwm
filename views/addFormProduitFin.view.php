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
