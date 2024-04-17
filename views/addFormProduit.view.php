

    <label for="nom_produit">Nom du produit:</label>
    <input  required id='form-nom_produit' type="string" name="nom_produit"/>
<br>
    <label for="description">Description:</label>
    <textarea maxlength=255 required id="form-description" name="description"></textarea>
<br>
<label for="cout_reparation">Coût de réparation:</label>
<input required id='form-cout_reparation' type='number' value="0" name="cout_reparation"/> €
<br>
<label for="temps_passe">Temps passé:</label>
<input id="form-temps_passe"
       name="temps_passe"
       type="text" required
       pattern="[0-9]{2}(:[0-9]{2})?"
       value="00:00"
       title="Écrire une durée au format hh ou hh:mm" onfocus="verifierDuree()"> h
<p id="output"></p>
<br>
    <input type="checkbox" id="form-vendu" name="vendu" />
    <label required for="vendu">Vendu</label>
<br>
    <input id='form-produitButton' type="submit" value="Envoyer le formulaire" />
</form> 



<?php
    $content = ob_get_clean();
    require('base.view.php');
?>
