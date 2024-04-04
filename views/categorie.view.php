<?php 
$title = "liste des catégories";

ob_start()
?>

    <h1>liste des catégories</h1>

<?php
    // displays each row of the following columns
    while($categorie = $requete->fetch()) {
?>
    <p>
        <b><u><?= $categorie['nom_categorie'] ?></u></b> <br/> 
        <b>Sous-catégorie&nbsp;:&nbsp;</b> <?= $categorie['sous_categorie'] ?><br/> 
        <b>Poids&nbsp;:&nbsp;</b> <?= $categorie['poids'] ?> Grammes
    </p>
    
<?php
    }

    $content = ob_get_clean();

    require('base.view.php');
?>

