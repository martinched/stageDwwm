<?php 
$title = "liste des catégories";

ob_start()
?>

    <h1>liste des catégories</h1>
 <a href='index.php?page=gestionCategories'>Gérer les categories</a>

<?php
    // displays each row of the following columns
    while($categories = $reponse->fetch()) {
?>
    <p>
        <b><u><?= $categories['nom_categorie'] ?></u></b> <br/>
    </p>
   
<?php
    }

    $content = ob_get_clean();

    require('base.view.php');
?>

