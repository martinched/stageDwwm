
<?php
require("model/ProduitManager.php");
require ('controllers/categorie.controller.php');
require ('controllers/lieu.controller.php');
require ('controllers/benne.controller.php');

$produitManager = new ProduitManager();
$reponse = $produitManager->getProduitsByFiltres($_GET["nom_categorie"]);
$tableau = array();

while ($ligne = $reponse->fetch ()) {
    # On récupère les détails du produit
    $tableau[] = $ligne;
}
$chainejson = json_encode($tableau);
$title = "Produits";

require ("base_vueGlobaleProduit.php");
?>
	    <content>
		<div class="tri">
		    <div class="filtre">
			<form action="" methode="GET">
			    <select id="nom_categorie" class="champ" name="nom_categorie">
				<option value="">Catégorie</option>
				<?php
				$filtreCat = new CategorieController();
				$reponse = $filtreCat->tableauCategories();
				while($categorie = $reponse->fetch()) {
				?>
				    <option value="<?= $categorie['nom_categorie'] ?>">
					<?= $categorie['nom_categorie'] ?></option>
				<?php
				} 
				?>     
			    </select>

			    <select id="nom_sous_categorie" class="champ" name="nom_sous_categorie">
				<option value="">Sous-catégorie</option>
				<?php
				$filtreSousCat = new CategorieController();
				$tableauSC = $filtreSousCat->listSousCategories();
				foreach($tableauSC as $categories) {
				    //			    var_dump ( $categories);
				    foreach($categories as $sousCategorie) {
				?>
				    <option value="<?= $sousCategorie["nom_sous_categorie"] ?>">
					<?= $sousCategorie['nom_sous_categorie'] ?></option>			    
				<?php
				}
				}
				?>
			    </select>

			    <select id="lieu" class="champ" name="lieu">
				<option value="">Lieu</option>
				<?php
				$filtreLieu = new LieuController();
				$reponseL = $filtreLieu->listLieux();
				while($lieu = $reponseL->fetch()) {
				?>
				    <option value="<?= $lieu["lieu"] ?>">
					<?= $lieu["lieu"] ?></option>			    
				<?php
				}
				?>
			    </select>

			    <select id="benne" class="champ" name="benne">
				<option value="">Benne</option>
				<?php
				$filtreBenne = new BenneController();
				$reponseB = $filtreBenne->listBennes();
				while($benne = $reponseB->fetch()) {
				?>
				    <option value="<?= $benne["benne"] ?>">
					<?= $benne["benne"] ?></option>			    
				<?php
				}
				?>
			    </select>
			    <span>Entre</span>
			    <input type="date" name="dateE_debut" />
			    <span>et</span>
			    <input type="date" name="dateE_fin" />
			    <input type="submit" value="Filtrer"/>
			</form>
		    </div>
		</div>
		<table>
		    <thead>
			<tr>
			    <th><button onclick="filterBy('id_produit')">
				ID
			    </button></th>
			    <th><button onclick="filterBy('nom_produit')">
				Nom
			    </button></th>
			    <th><button onclick="filterBy('date_enregistrement')">
				Date entrée
			    </button></th>
			    <th><button onclick="filterBy('nom_categorie')">
				Catégorie
			    </button></th>
			    <th><button onclick="filterBy('nom_sous_categorie')">
				Sous-catégorie
			    </button></th>
			    <th><button onclick="filterBy('poids')">
				Poids
			    </button></th>
			    <th><button onclick="filterBy('cout_reparation')">
				Coût
			    </button></th>
			    <th><button onclick="filterBy('temps_passe')">
				Temps
			    </button></th>
			    <th><button onclick="filterBy('lieu')">
				Lieu
			    </button></th>
			    <th><button onclick="filterBy('benne')">
				Benne
			    </button></th>
			</tr>
		    </thead>
		    <tbody>
		    </tbody>
		</table>
	    </content>
	</container>
    </body>
</html>
