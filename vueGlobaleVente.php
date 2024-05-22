
<?php
require("model/VenteManager.php");
$venteManager = new VenteManager();
$reponseV = $venteManager->getVentes();
$tableau = array();

while ($vente = $reponseV->fetch()) {
    $reponsePV = $venteManager->getProduitsVendus($vente["id_vente"]);
    while ($produitVendu = $reponsePV->fetch()) {
	$produitVendu["prix_libre"] = $vente["prix_libre"];
	$produitVendu["date_vente"] = $vente["date_vente"];
	$tableau[] = $produitVendu;
    }
}
$chainejson = json_encode($tableau);

$title = "Ventes";

require ("base_vueGlobaleProduit.php");
?>
	    <content>
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
			    <th><button onclick="filterBy('benne')">
				Benne
			    </button></th>
	                    <th><button onclick="filterBy('date_vente')">
				Date sortie
			    </button></th>
			    <th><button onclick="filterBy('prix_libre')">
				Prix
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
