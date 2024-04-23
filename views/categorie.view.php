<?php 
$title = "Liste des catégories";

ob_start()
?>

<u><h2>Liste des catégories</h2></u>

<a  href='index.php?page=gestionCategories'><button class="ajout">Gérer les categories</button></a>

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

