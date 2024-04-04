<?php 
$title = "homePage";

//saves the following code for using it elsewhere
ob_start();
?>

    <h1><b>Que désires tu?</b></h1>
<hr>

<h3>Derniers produit ajoutés</h3>
<?php
    while($lastProduit = $requeteProduit->fetch()) {
?>
        <p>
            <b>Nom&nbsp;:&nbsp; <?= $lastProduit['nom_produit'] ?></b><br/>
            <b>description&nbsp;:&nbsp;</b> <?= $lastProduit['description'] ?><br/>
            <b>Date&nbsp;d'enregistrement&nbsp;:&nbsp;</b> <?=$lastProduit['date_enregistrement'] ?><br/>
            <b>Coût&nbsp;de&nbsp;reparation&nbsp;:&nbsp;</b> <?= $lastProduit['cout_reparation'] ?> € <br/>
            <b>Temps&nbsp;passé&nbsp;:&nbsp;</b> <?= $lastProduit['temps_passe']?> h <br/>
        </p>
<?php
    }
?>
<hr>

    <h3>dernieres ventes</h3>
<?php
    while($lastVente = $requeteVente->fetch()) {
?>
    <p>
        <b>N°&nbsp;<?= $lastVente['id_vente'] ?></b><br/>
        <b>Enregistré&nbsp;le&nbsp;:&nbsp;</b> <?=$lastVente['date_vente'] ?><br/>
        <b>Vendu&nbsp;le&nbsp;:&nbsp;</b> <?= $lastVente['date'] ?>             
    </p>
<?php
    }



//assigns to the $content variable, the following code for using it elsewhere
    $content = ob_get_clean();
    require('base.view.php');
?>

