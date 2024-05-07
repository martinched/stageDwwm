<input class="btn" type="button" value="Vendre" onclick="this.hidden=true;afficherChampsVente()"><br>

<!-- le 'undefined' vient dun id produit non-definit car on crer le produit au moment de la vente -->
<div id="champPrixundefined" style="display:none;">
    <label for="prix_libre">Prix libre&nbsp;:&nbsp;</label>
    <input type="number" id="prix_libre" name="prix_libre"> €
</div>

<input  id="updateProduit" type="hidden" name="vendu" value="0" />  
<br>
<input class="btn" id='bouton_enregistrer_venteundefined' type="submit" value="Enregistrer" />
</form> 

<?php
$content = ob_get_clean();
require('base.view.php');
?>
