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
    <p><?= $lastProduit['name_produit'] ?><br/><?= $lastProduit['Description'] ?></p>
<?php
    }
?>
<hr>

    <h3>dernieres ventes</h3>
<?php
    while($lastVente = $requeteVente->fetch()) {
?>
    
    <p><?= $lastVente['Categorie']?><br/><?= $lastVente['Prix libre']?>euros</p>
<?php
    }



//assigns to the $content variable, the following code for using it elsewhere
    $content = ob_get_clean();
    require('base.view.php');
?>

