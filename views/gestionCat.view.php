<?php 
$title = "Gestion des catégories";

ob_start()
?>

<u><h2>Gestion des catégories</h2></u>

<a href='index.php?page=addFormCategorie'><button class="btn">Nouvelle catégorie</button></a>

    <?php
    foreach ($tableau as $nomcat => $reponsecat) {
	$sousCats = $reponsecat->fetchAll();
    ?>
	<div class="card">
            <p class="liensboutons">
		<b><u><?= $nomcat ?></u></b> 
		<a class="poubelle" href='index.php?page=deleteCategorie&nom_categorie=<?=$sousCats[0]['id_categorie']?>'>&#x1F5D1;</a><br>
		<a  href='index.php?page=addFormCategorie&nom_categorie=<?=$sousCats[0]['id_categorie']?>'><button class="btn newSouCat">New sous-catégorie</button></a><br>
		
		<div class="multicard">
		<?php
		foreach ($sousCats as $sousCat) {
		?>
		    <div class="card">
			<?= $sousCat['nom_sous_categorie'] ?>
			<a class="poubelle" href='index.php?page=deleteSousCategorie&nom_sous_categorie=<?=$sousCat['nom_sous_categorie']?>'>&#x1F5D1;</a>
			<ul>
			    <li>(<?= $sousCat['poids'] ?>&nbsp;g)</li>
			</ul>
		    </div>
		<?php
		}
		?>
		</div>
            </p>
	</div>
    <?php
    }
$content = ob_get_clean();
require('base.view.php');
?>

