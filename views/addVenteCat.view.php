<?php 
    $title = "Formulaire d'ajout de vente";

    ob_start()
?>

<h1>Formulaire d'ajout de vente</h1>


        <div class="formCat">
            <form id='formvente' action="index.php?page=addFormvente" method="post">
                <label for="id_categorie">Categorie:</label>
                <select id="selecCat" name="id_categorie">
                <?php 
    while($categorie = $requete->fetch()) {
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