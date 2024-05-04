<?php 
$title = "Gestion des catégories";

ob_start()
?>

<h2>Gestion des catégories</h2>

<a href='index.php?page=formCategorie'><button class="btn">Nouvelle catégorie</button></a>

<div class="multicard">
    <?php
    foreach ($tableau as $nomcat => $reponsecat) {
	$sousCats = $reponsecat->fetchAll();
    ?>
	<div class="card liensboutons">
	    <details>
		<summary><li></li>
		    <b><u><?= $nomcat ?></u></b>
		    <a class="poubelle" href='index.php?page=deleteCategorie&nom_categorie=<?=$nomcat?>'>&#x1F5D1;</a><br>
		</summary>
		<ul>
		    <?php
		    foreach ($sousCats as $sousCat) {
		    ?>
			<li>
			    <?= $sousCat['nom_sous_categorie'] ?>
			    (<?= $sousCat['poids'] ?>&nbsp;g)
			    <a class="poubelle" href='index.php?page=deleteSousCategorie&nom_sous_categorie=<?=$sousCat['nom_sous_categorie']?>'>&#x1F5D1;</a>
			</li>
		    <?php
		    }
		    ?>
		</ul>
		<a  href='index.php?page=formCategorie&nom_categorie=<?=$nomcat?>'><button class="btn newSouCat">Nouvelle sous-catégorie</button></a><br>
	    </details>
	</div>
    <?php
    }
    ?>
</div>
<?php
$content = ob_get_clean();
require('base.view.php');
?>

