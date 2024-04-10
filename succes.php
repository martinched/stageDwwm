

<?php

require('controllers/produit.controller.php');

$produitController = new ProduitController();

if ($produitController->deleteProduit()){
    echo "Super succès!";
}

?>


                