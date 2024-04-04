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
                if(isset($_POST['id_vente'])) {
                    $quantite = $_POST['quantite'];
                    $date = $_POST['date'];
                    $id_produit = $_POST['id_produit'];
                    $prix_libre = $_POST['prix_libre'];
                    // $vendu = (isset($_POST['vendu'])) ? 0 : 1;        

                    $venteController = new VenteController();
                    $requete = $venteController->addFormVente(
                    $quantite, $date, $id_produit, $prix_libre);
                    echo "<p>Le Vente a bien été ajouté!</p>"; 
                }else{
                    require('views/addVente.view.php');
                }

            break;
            case 'addFormCategorie':
                if(isset($_POST['nom_categorie'])) {
                    $nom_categorie = $_POST['nom_categorie'];
                    $sous_categorie = $_POST['sous_categorie'];
                    $poids = $_POST['poids'];
                            
                    $categorieController = new CategorieController();
                    $categorieController->addFormCategorie(
                    $nom_categorie, $sous_categorie, $poids);

                    // ($succes) ?  echo "<p>La catégorie a bien été ajoutée!</p>";  :
                    
                   
                }else{
                    require('views/addCategorie.view.php');
                }

                
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