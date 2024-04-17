<?php 
    $title = "Formulaire d'ajout de produit";

    ob_start()
?>

<h1>Ajouter un produit</h1>


        <div class="formCat">
            <form id='formProduit' action="index.php?page=formProduit" method="POST">
                <label for="id_categorie">Categorie:</label>
                <select id="selecCat" name="id_categorie">
                <?php 
    while($categorie = $reponse->fetch()) {
?>
                    <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>
                    <?php
     } 
                    ?>            
                </select>

                <input id='form-cat_Button' type="submit" value="Ok!" />
            </form>

            <br>
        </div>


        <?php
    $content = ob_get_clean();
    require('base.view.php');
?>
