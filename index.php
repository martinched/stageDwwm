<?php
/* 
 * La Pétappli se veut l'outil de gestion de base de données de la recyclerie
 * de Vallée Francaise.
 *
 * Copyright (C) 2024, Martin Chédaille, martin.ched@gmail.com
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *  */


require('controllers/vente.controller.php');
require('controllers/categorie.controller.php');
require('controllers/produit.controller.php');
require('controllers/home.controller.php');

try{
    if( isset($_GET['page']) ) {

        switch ($_GET['page']) {
            case 'produits':
                $produitController = new ProduitController();
                $produitController->listProduits();
		break;

            case 'ventes':
                $venteController = new VenteController();
                $venteController->listVentes();
		break;

            case 'deleteVente':
                $venteController = new VenteController();
                $venteController->deleteVente($id_vente);
		break;

            case 'categories':
                $categorieController = new CategorieController();
                $categorieController->listCategories();
		break;

            case 'gestionCategories':
                $categorieController = new CategorieController();
                $categorieController->listSousCategories();
		break;

            case 'addFormProduit': 
                $produitController = new ProduitController();

                # Si l'utilisateur a choisi une catégorie
		if(isset($_POST['id_categorie'])) {
		    $id_categorie = $_POST['id_categorie'];
		    $produitController->choixSousCategories($id_categorie);
		    require('views/addFormProduit.view.php');

		}elseif(isset($_POST['nom_produit'])) {
		    $nom_produit = $_POST['nom_produit'];
		    $description = $_POST['description'];
		    $date_enregistrement = $_POST['date_enregistrement'];
		    $id_sous_categorie = $_POST['id_sous_categorie'];
		    $cout_reparation = $_POST['cout_reparation'];
		    $temps_passe = $_POST['temps_passe'].":00";
		    $vendu = (isset($_POST['vendu'])) ? 1 : 0;

		    $requete = $produitController->addFormProduit(
			$nom_produit, $description, $date_enregistrement,
			$id_sous_categorie, $cout_reparation, $temps_passe, $vendu);
		    $produitController->listProduits();

		}else{ 
		    $produitController->choixCategories();  
		}
		break;

	    case 'addFormVente': // (si on ne part pas d'un produit existant)
		$venteController = new VenteController();
		// 1 choix cat
		if(!isset($_POST['id_categorie']) && !isset($_POST['id_sous_categorie'])) {
		    $venteController->choixCategories();  
		    // 2 Choix souscat (idem)
		} elseif(isset($_POST['id_categorie'])) {
		    $id_categorie = $_POST['id_categorie'];
		    $venteController->choixSousCategories($id_categorie);
		    require('views/addFormVente.view.php');
		    // // 3 définir le produit
		}elseif(isset($_POST['id_sous_categorie'])) {
		    $produitController = new ProduitController();
		    $id_sous_categorie = $_POST['id_sous_categorie'];
		    $nom_produit = $_POST['nom_produit'];
		    $quantite = $_POST['quantite'];
		    $date_enregistrement = $_POST['date_enregistrement'];
		    $prix_libre = $_POST['prix_libre'];
		    $cout_reparation = $_POST['cout_reparation'];
		    $temps_passe = $_POST['temps_passe'].":00";
		    $vendu = 1;
		    $reponse = $produitController->addFormProduit($nom_produit, "",
								  $date_enregistrement,
								  $id_sous_categorie,
								  $cout_reparation,
								  $temps_passe, $vendu);
		    $row = $reponse->fetch();
		    $requete = $venteController->addFormVente($quantite,
							      $row['id_produit'], $prix_libre);
		}else{
		    echo "Erreur";
		}

		break;

	    case 'addVente':

		if(isset($_POST['id_produit']) && isset($_POST['quantite']) && isset($_POST['prix_libre'])){
		    $id_produit = $_POST['id_produit'];
		    $quantite = $_POST['quantite'];
		    $prix_libre = $_POST['prix_libre'];
		    $venteController = new VenteController();
		    $venteController->addVente($quantite, $id_produit, $prix_libre);
		}else {
		    echo "Une variable n'a pas été remplie : id_produit = "
		       . $_POST['id_produit'] . "<br />quantite = " 
		       . $_POST['quantite'] . "<br />prix libre = "
		       . $_POST['prix_libre']. "<br />";
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
                    $categorieController = new CategorieController();
                    $tableau = $categorieController->tableauCategories();
		    foreach ($tableau as $row)
		    {
			$categories[] = $row['nom_categorie'];
		    }
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
