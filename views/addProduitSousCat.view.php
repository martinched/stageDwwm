<?php 
    $title = "Formulaire d'ajout de produit";

    ob_start()
?>

<h1>Formulaire d'ajout de produit</h1>

    <div class="formSousCat">
        <form id='form' action="index.php?page=addFormProduit" method="post">
            <label for="id_sous_categorie">Sous catégories:</label>
            <select id="selecSousCat" name="id_sous_categorie">
                <?php
                    while($sousCategorie = $reponse->fetch()) {
                ?>
                        <option value="<?= $sousCategorie['id_sous_categorie'] ?>"><?= $sousCategorie['nom_sous_categorie'] ?></option>
                <?php
                    }
                ?>
            </select>
            <br>
        </div>

