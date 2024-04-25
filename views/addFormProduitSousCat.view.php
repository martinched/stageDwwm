<?php 
    $title = "Ajouter un produit";

    ob_start();
?>

<h1>Formulaire d'ajout de produit</h1>

    <div class="formSousCat">
        <form id='form' action="index.php?page=formProduit" method="POST">
            <label for="nom_sous_categorie">Sous catégories:</label>
            <select id="selecSousCat" name="nom_sous_categorie">
                <?php
                    while($sousCategorie = $reponse->fetch()) {
                ?>
                        <option value="<?= $sousCategorie['nom_sous_categorie'] ?>"><?= $sousCategorie['nom_sous_categorie'] ?></option>
                <?php
                    }
                ?>
            </select>
            <br>
        </div>

