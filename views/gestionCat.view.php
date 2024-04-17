<?php 
$title = "Gestion des catégories";

ob_start()
?>

    <h1>Gestion des catégories</h1>

    <a href='index.php?page=addFormCategorie'>Nouvelle catégorie</a>

    <?php
    foreach ($tableau as $nomcat => $reponsecat) {
	$sousCats = $reponsecat->fetchAll();
    ?>
        <p>
            <b><u><?= $nomcat ?></u></b> 
            <a href='index.php?page=deleteCategorie&id_categorie=<?=$sousCats[0]['id_categorie']?>'>Supprimer cette catégorie</a><br/>
            <a href='index.php?page=addFormCategorie&id_categorie=<?=$sousCats[0]['id_categorie']?>'>Ajouter une sous-catégorie</a><br />

<?php
        foreach ($sousCats as $sousCat) {
?>
            <?= $sousCat['nom_sous_categorie'] ?><br>
            <?= $sousCat['poids'] ?>
            <a href='index.php?page=deleteCategorie&id_categorie=<?=$sousCat['id_sous_categorie']?>'>Supprimer </a><br/>
<?php
        }
?>
        </p>
     
   
<?php
    }

$content = ob_get_clean();
require('base.view.php');
?>

