

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

<?php
if ($action == "produit") {
    require ("views/addFormProduitFin.view.php");
} elseif ($action == "vente") {
    require ("views/addFormProduitVente.view.php");
} else {
    echo "Merde";
}
