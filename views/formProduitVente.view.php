    <div id="champPrix">
        <label for="prix_libre">Prix libre&nbsp;:&nbsp;</label>
        <input type="number" id="prix_libre" name="prix_libre">€
    </div>

    <input id="updateProduit" type="hidden" name="vendu" value="1"/>  
    <br>

    <input class="btn" id='form-produitButton' type="submit" value="Ajouter un autre produit"/>

    <input class="btn" id='form-produitButton' type="submit" value="Terminer la vente"/>
</form> 

<?php
$content = ob_get_clean();
require('base.view.php');
?>
