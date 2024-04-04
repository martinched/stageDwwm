<?php 
$title = "Liste des produits";

ob_start()
?>
    <h2>Voici la liste des produits</h2>
    <button> <a href="index.php?page=addFormProduit">Ajouter un produits</a></button>
<?php
    // displays each row of the following columns
    while($product = $requete->fetch()) {
?>
    <p>
        <b>Nom&nbsp;:&nbsp; <?= $product['nom_produit'] ?></b><br/>
        <b>description&nbsp;:&nbsp;</b> <?= $product['description'] ?><br/>
        <b>Date&nbsp;d'enregistrement&nbsp;:&nbsp;</b> <?=$product['date_enregistrement'] ?><br/>
        <b>Coût&nbsp;de&nbsp;reparation&nbsp;:&nbsp;</b> <?= $product['cout_reparation'] ?> € <br/>
        <b>Temps&nbsp;passé&nbsp;:&nbsp;</b> <?= $product['temps_passe']?> h <br/>
    </p>
    <button> <a href='index.php?page=deleteReview&id_avis=......'>Jeter</a> </button>  
    <button> <a href="index.php?page=addFormVente">Vendre</a></button>
<hr>
 <?php
    }
    $content = ob_get_clean();

    require('base.view.php');
?>

