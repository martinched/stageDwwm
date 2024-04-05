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
        <b>Sous-catégorie&nbsp;:&nbsp;</b> <?= $categorie['nom_sous_categorie'] ?><br/> 
        <b>Poids&nbsp;:&nbsp;</b> <?= $categorie['poids'] ?> Grammes
    </p>
    <a href='index.php?page=deleteReview&id_categorie=<?=$categorie['id_categorie']?>'>Supprimer</a>
<?php
    }

    $content = ob_get_clean();

    require('base.view.php');
?>

