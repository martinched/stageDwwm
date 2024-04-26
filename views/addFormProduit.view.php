
<div class="firstMargin">
    <label class="label" for="nom_produit">Nom du produit&nbsp;:&nbsp;</label>
    <input class="champ"  required id='form-nom_produit' type="string" name="nom_produit"/>
</div>

<textarea class="champ" maxlength=255 id="form-description" name="description" placeholder="Description"></textarea>
<br>

<div>
    <label for="lieu">Lieu de stockage&nbsp;:&nbsp;</label>
    <input type="hidden" name="lieu" />
    <select class="champ" name="lieu_ddl" onchange="DropDownChanged(this);">
	<option value="1">Temple de Gabriac</option>
	<option value="2">La Boissonnade</option>
	<option value="3">St Roman</option>
	<option value="4">St Croix</option>
	<option value="5">Other..</option>
    </select> <input type="text" name="lieu_txt" style="display: none;" />
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
	   title="Écrire une durée au format hh ou hh:mm" onfocus="verifierDuree()">
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
