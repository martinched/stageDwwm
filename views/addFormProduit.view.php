
<div class="firstMargin">
    <label class="label" for="nom_produit">Nom du produit&nbsp;:&nbsp;</label>
    <input class="champ"  required id='form-nom_produit' type="string" name="nom_produit"/>
</div>

<textarea class="champ" maxlength=255 id="form-description" name="description" placeholder="Description"></textarea>
<br>

<div>
    <label class="label" for="lieuStockage">Lieu de stockage&nbsp;:&nbsp;</label>
    <input class="champ" type="string" name="lieuStockage" />
</div>
<div>
    <label class="label" for="cout_reparation">Coût de réparation&nbsp;:&nbsp;</label>
    <input class="champ cout" required id='form-cout_reparation' type='number' value="0" name="cout_reparation"/>&nbsp;€
</div>

<div>
    <label class="label" for="temps_passe">Temps passé&nbsp;:&nbsp;</label>
    <input class="champ temps" id="form-temps_passe"
	   name="temps_passe"
	   type="text" required
	   pattern="[0-9]{2}(:[0-9]{2})?"
	   value="00:00"
	   title="Écrire une durée au format hh ou hh:mm" onfocus="verifierDuree()">&nbsp;h
</div>

<p id="output"></p>

<?php
if ($action == "produit") {
    require ("views/addFormProduitFin.view.php");
} elseif ($action == "vente") {
    require ("views/addFormProduitVente.view.php");
} else {
    echo "Merde";
}
