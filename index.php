<?php
    require('controllers/vente.controller.php');
    require('controllers/categorie.controller.php');
    require('controllers/produit.controller.php');
    // require('controllers/contact.controller.php');
    require('controllers/home.controller.php');

try{
    // setting verification of parameter page
    // if yes so to root
    if( isset($_GET['page']) ) {

        switch ($_GET['page']) {
            case 'produits':
                $produitController = new ProduitController();
                $requete = $produitController->listProduits();
            break;
            case 'ventes':
                $venteController = new VenteController();
                $requete = $venteController->listVentes();
            break;
            case 'categories':
                $categorieController = new CategorieController();
                $requete = $categorieController->listcategories();
            break;

            case 'addFormProduit':  
                if(isset($_POST['nom_produit'])) {
                    $nom_produit = $_POST['nom_produit'];
                    $description = $_POST['description'];
                    $date_enregistrement = $_POST['date_enregistrement'];
                    $id_categorie = $_POST['id_categorie'];
                    $cout_reparation = $_POST['cout_reparation'];
                    $temps_passe = $_POST['temps_passe'];
                    $vendu = (isset($_POST['vendu'])) ? 0 : 1;        

                    $produitController = new ProduitController();
                    $requete = $produitController->addFormProduit(
                    $nom_produit, $description, $date_enregistrement,
                    $id_categorie, $cout_reparation, $temps_passe, $vendu);
                    echo "<p>Le produit a bien été ajouté!</p>"; 
                }else{
                    require('views/addProduit.view.php');
                }

            break;
            case 'addFormVente':
                $venteController = new VenteController();
                $requete = $venteController->addFormVente();
            break;
            case 'addFormCategorie':
                $categorieController = new CategorieController();
                $requete = $categorieController->addFormCategorie();
            break;


            default:
                throw new Exception ("message: Cette page n'existe pas!");
            break;
        }

    }else{
        $homeController = new HomeController();
        $requete = $homeController->home();
    } 

}catch(Exception $e){
    $error = $e->getMessage();
    require('views/error.view.php');      
}