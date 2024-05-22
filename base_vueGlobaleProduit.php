<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0">
        <title>Vue globale des <?=$title ?></title>
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
	    <a href="/">
		<h1>LA PÉTAPPLI</h1>
	    </a>
	</header>
	<container>
	    <tabs>
		<tab <?php if ($title == "Produits") { echo 'class="active"'; } ?>>
		    <a class="boutonTableauProduits" href="./vueGlobaleProduit.php">
			Tableau des produits
		    </a>
		</tab>
		<tab <?php if ($title == "Ventes") { echo 'class="active"'; } ?>>
		    <a class="boutonTableauVente" href="./vueGlobaleVente.php">
			Tableau des ventes
		    </a>
		</tab>
	    </tabs>
