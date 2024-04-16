<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> <?= $title ?> </title>
        <link rel="stylesheet" href="/public/css/style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="js/script.js" defer></script>
	<style>
	 input:invalid:not(:focus) { background: orange; }
	</style>
    </head>

<body>
    <header>
        <h1>La Pétappli</h1>
    </header>

    <nav>
	<button><a href="index.php?page=produits">Produits</a></button><br>
	<button><a href="index.php?page=ventes">Ventes</a></button><br>
	<button><a href="index.php?page=categories">Catégories</a></button><br>
    </nav>

    <hr>

    <div class='content'>
        <?= $content ?>
    </div>

</body>
</html>
