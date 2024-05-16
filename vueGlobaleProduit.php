
<?php
require("model/ProduitManager.php");
$produitManager = new ProduitManager();
$reponse = $produitManager->getProduits();
$tableau = array();

while ($ligne = $reponse->fetch ()) {
    # On récupère les détails du produit
    $tableau[] = $ligne;
}
$chainejson = json_encode($tableau);
//var_dump($chainejson);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0">
        <title>Vue globale des produits</title>
        <link rel="stylesheet" href="./public/css/tableau.css" />
        <script src="js/tableau.js" ></script>
	<script>
	 window.onload = function (e) {
	     data = <?=$chainejson?>;
	     console.log (data);
	     displayData(data);
	 };
	</script>
    </head>

    <body>
	<header>
	    <h2>Vue globale des produits</h2>
	    <a class="boutonTableauVente" href="./vueGlobaleVente.php">Tableau des ventes ? =></a>
	</header>
	<container>
	    <table>
		<thead>
		    <tr>
			<th><button onclick="filterBy('id_produit')">ID</button></th>
			<th><button onclick="filterBy('nom_produit')">Nom</button></th>
			<th><button onclick="filterBy('date_enregistrement')">Date entrée</button></th>
			<th><button onclick="filterBy('nom_categorie')">Catégorie</button></th>
			<th><button onclick="filterBy('nom_sous_categorie')">Sous-catégorie</button></th>
			<th><button onclick="filterBy('poids')">Poids</button></th>
			<th><button onclick="filterBy('cout_reparation')">Coût</button></th>
			<th><button onclick="filterBy('temps_passe')">Temps</button></th>
			<th><button onclick="filterBy('lieu')">Lieu</button></th>
			<th><button onclick="filterBy('benne')">Benne</button></th>
		    </tr>
		</thead>
		
		<tbody>
		</tbody>
	    </table>
	</container>
