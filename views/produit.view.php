<?php 
$title = "Liste des produits";

ob_start()
?>

    <h1>Gestionnaire de produit</h1>
    <p>Voici la liste des produits :</p>

    <?php
    // displays each row of the following columns
        while($product = $requete->fetch()) {
    ?>
        <p>
            <b><?= $product['nom_produit'] ?></b><br/>
            <?= $product['description'] ?><br/>
            <b><?= $product['date_enregistrement'] ?></b><br/>
            <b><?= $product['cout_reparation'] ?></b><br/>
            <b><?= $product['temps_passe'] ?></b><br/>
        </p>
    <?php
        }

        $content = ob_get_clean();

        require('base.view.php');
    ?>