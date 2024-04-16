<?php 
$title = "Gestion des catégories";

ob_start()
?>

    <h1>Gestion des catégories</h1>

    <a href='index.php?page=addFormCategorie&id_categorie=<?=$categorie['id_categorie']?>'>Nouvelle catégorie</a>

<?php
    foreach ($tableau as $nomcat => $reponsecat) {
?>
        <p>
            <b><u><?= $nomcat ?></u></b> 
            <a href='index.php?page=deleteCategorie&id_categorie=
                <?=$categorie['id_categorie']?>'>Supprimer cette catégorie</a><br/>
            <a href='index.php?page=addFormCategorie&id_categorie=
                <?=$categorie['id_categorie']?>'>Nouvelle sous catégorie</a><br />

<?php
        while ($souscat = $reponsecat->fetch()) {
?>
            <?= $souscat['nom_sous_categorie'] ?><br>
            <?= $souscat['poids'] ?>
            <a href='index.php?page=deleteCategorie&id_categorie=<?=$categorie['id_categorie']?>'>Supprimer </a><br/>
<?php
        }
?>
        </p>
     
   
<?php
    }

$content = ob_get_clean();
require('base.view.php');
?>

