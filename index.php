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
                $requete = $categorieController->listCategories();
                // $requete = $categorieController->listSousCategories();
            break;

            case 'addFormProduit': 
                $produitController = new ProduitController();

                # Si l'utilisateur a choisi une catégorie
                if(isset($_POST['id_categorie'])) {
                    $id_categorie = $_POST['id_categorie'];
                    $produitController->choixSousCategories($id_categorie);
                    require('views/addProduit.view.php');

                }elseif(isset($_POST['nom_produit'])) {
                    $nom_produit = $_POST['nom_produit'];
                    $description = $_POST['description'];
                    $date_enregistrement = $_POST['date_enregistrement'];
                    $id_sous_categorie = $_POST['id_sous_categorie'];
                    $cout_reparation = $_POST['cout_reparation'];
                    $temps_passe = $_POST['temps_passe'];
                    $vendu = (isset($_POST['vendu'])) ? 0 : 1;
                    
                    $requete = $produitController->addFormProduit(
                    $nom_produit, $description, $date_enregistrement,
                    $id_sous_categorie, $cout_reparation, $temps_passe, $vendu);
                    $produitController->listProduits();

                }else{ 
                    $produitController->choixCategories();  
                }
            break;

            case 'addFormVente':
                $venteController = new VenteController();

                if(isset($_POST['id_categorie'])) {
                    $id_categorie = $_POST['id_categorie'];
                    $venteController->choixSousCategories($id_categorie);
                    require('views/addVente.view.php');

                }elseif(isset($_POST['id_vente'])) {
                    $id_sous_categorie = $_POST['id_sous_categorie'];
                    $quantite = $_POST['quantite'];
                    $date = $_POST['date'];
                    $id_produit = $_POST['id_produit'];
                    $prix_libre = $_POST['prix_libre'];
                          
                    // $venteController = new VenteController();
                    $requete = $venteController->addFormVente(
                    $id_sous_categorie, $quantite, $date, $id_produit, $prix_libre);
                    $venteController->listVentes();

                }else{
                    $venteController->choixCategories();  
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