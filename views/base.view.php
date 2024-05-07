<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> <?= $title ?> </title>
        <link rel="stylesheet" href="./public/css/style.css" />
	<link rel="stylesheet" href="./public/css/couleur.css" />
        <script src="js/script.js" defer></script>
	<style>
	 input:invalid:not(:focus) { background: orange; }
	</style>
    </head>

<body>
    <header>
        <h1>LA PÉTAPPLI</h1>
   
	<nav>
	    <a href="index.php?page=produits#titreProduits"> <button class="btn">Produits</button></a><br>
	    <a href="index.php?page=ventes#titreVentes"> <button class="btn">Ventes</button></a><br>
	    <a href="index.php?page=gestionCategories#titreCategories"> <button class="btn">Catégories</button></a><br>
	</nav>
    </header>

    <div id="info" ><?php
		    if (isset($message_info))
			echo $message_info;
		    ?></div>
    <hr class="separation">
    
    <div class='content'>
        <?= $content ?>
    </div>

</body>
</html>
