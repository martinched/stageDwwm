<?php 
    $title = "Formulaire d'ajout de vente";

    ob_start()
?>

<h1>Ajouter une vente</h1>


        <div class="formCat">
            <form id='formvente' action="index.php?page=addFormVente" method="post">
                <label for="id_categorie">Categorie&nbsp;:&nbsp;</label>
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