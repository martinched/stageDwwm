
<div class="firstMargin">
    <label class="label" for="nom_produit">Nom du produit&nbsp;:&nbsp;</label>
    <input class="champ"  required id='form-nom_produit' type="string" name="nom_produit"/>
</div>

<div>
<textarea class="champ" maxlength=255 id="form-description" name="description" placeholder="Description"></textarea>
</div>

<div>
    <label class="label" for="photo">Ajouter une photo&nbsp;:</label>
    <input type="file" id="photo" name="photo"><br><br>
</div>

<div>
    <label for="lieu">Lieu de stockage&nbsp;:&nbsp;</label>
    <input id="menu_lieu" type="hidden" name="lieu" />
    <select id="lieu" class="champ" name="ddl_lieu" onchange="DropDownChanged(this);">
	<?php
	while ($lieu = $reponse->fetch ()) {
            echo "<option value='".$lieu["lieu"]."'>".$lieu["lieu"]."</option>";
	}
	?>
	<option value="">Autre...</option>
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
    require ("views/formProduitFin.view.php");
} elseif ($action == "vente") {
    require ("views/formProduitVente.view.php");
} else {
    echo "zuteu!";
}
