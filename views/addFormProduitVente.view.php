    <div id="champQuantite">
        <label for="quantite">Quantité&nbsp;:&nbsp;</label>
        <input type="number" id="quantite" name="quantite">
    </div>

    <div id="champPrix">
        <label for="prix_libre">Prix libre&nbsp;:&nbsp;</label>
        <input type="number" id="prix_libre" name="prix_libre">€
    </div>

    <input id="updateProduit" type="hidden" name="vendu" value="1"/>  
    <br>

    <input class="btn" id='form-produitButton' type="submit" value="Enregistrer"/>

</form> 

<?php
$content = ob_get_clean();
require('base.view.php');
?>
