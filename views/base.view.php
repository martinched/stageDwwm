<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> <?= $title ?> </title>
        <link rel="stylesheet" href="./public/css/style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="js/script.js" defer></script>
	<style>
	 input:invalid:not(:focus) { background: orange; }
	</style>
    </head>

<body>
    <header>
        <h1>La Pétappli</h1>
   
	<nav>
	    <a href="index.php?page=produits"> <button class="btn">Produits</button></a><br>
	    <a href="index.php?page=ventes"> <button class="bnt">Ventes</button></a><br>
	    <a href="index.php?page=categories"> <button class="btn">Catégories</button></a><br>
	</nav>
    </header>

    <div id="info" ><?=$message_info ?></div>
    <hr class="separation">
    
    <div class='content'>
        <?= $content ?>
    </div>

</body>
</html>
