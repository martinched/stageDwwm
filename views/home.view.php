<?php 
$title = "homePage";

ob_start();
?>

<h3>Derniers produits ajoutés</h3>
<?php
    while($getProduit = $requeteProduit->fetch()) {
?>
        <p>
            <b>Nom&nbsp;:&nbsp; <?= $getProduit['nom_produit'] ?></b><br/>
            <b>description&nbsp;:&nbsp;</b> <?= $getProduit['description'] ?><br/>
            <b>Date&nbsp;d'enregistrement&nbsp;:&nbsp;</b> <?=$getProduit['date_enregistrement'] ?><br/>
            <b>Coût&nbsp;de&nbsp;reparation&nbsp;:&nbsp;</b> <?= $getProduit['cout_reparation'] ?> € <br/>
            <b>Temps&nbsp;passé&nbsp;:&nbsp;</b> <?= $getProduit['temps_passe']?> h <br/>
        </p>
<?php
    }
?>
<hr>

    <h3>Dernières ventes</h3>
<?php
    while($getVente = $requeteVente->fetch()) {
?>
    <p>
        <b>N°&nbsp;<?= $getVente['id_vente'] ?></b><br/>
        <b>Produit&nbsp;:&nbsp;</b> <?=$getVente['nom_produit']?><br>
        <b>Enregistré&nbsp;le&nbsp;:&nbsp;</b> <?=$getVente['date_enregistrement']?><br/>
        <b>Vendu&nbsp;le&nbsp;:&nbsp;</b> <?= $getVente['date_vente']?>             
    </p>
<?php
    }



//assigns to the $content variable, the following code for using it elsewhere
    $content = ob_get_clean();
    require('base.view.php');
?>

