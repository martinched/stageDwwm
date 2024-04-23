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
	<div class="card">
            <p class="liensboutons">
		<b><u><?= $nomcat ?></u></b> 
		<a class="poubelle" href='index.php?page=deleteCategorie&id_categorie=<?=$sousCats[0]['id_categorie']?>'>&#x1F5D1;</a><br/>
		<a class="plus" href='index.php?page=addFormCategorie&id_categorie=<?=$sousCats[0]['id_categorie']?>'>+</a><br />
		<div class="multicard">
		<?php
		foreach ($sousCats as $sousCat) {
		?>
		    <div class="card">
			<?= $sousCat['nom_sous_categorie'] ?>
			<a class="poubelle" href='index.php?page=deleteCategorie&id_categorie=<?=$sousCat['id_sous_categorie']?>'>&#x1F5D1;</a>
			<ul>
			    <li><?= $sousCat['poids'] ?>&nbsp;g</li>
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

