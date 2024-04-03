<?php 
$title = "liste des catégories";

ob_start()
?>

    <h1>liste des catégories</h1>

<?php
    // displays each row of the following columns
    while($categorie = $requete->fetch()) {
?>
    <p><b><?= $categorie['nom_categorie'] ?></b><br/> <?= $categorie['sous-categorie'] ?><br/> <?= $categorie['poids'] ?></p><br/>
<?php
    }

    $content = ob_get_clean();

    require('base.view.php');
?>

