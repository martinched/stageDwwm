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
require('controllers/lieu.controller.php');
//require('controllers/benne.controller.php');



try{
    if( isset($_GET['page']) ) {

        switch ($_GET['page']) {
            case 'produits':
                $produitController = new ProduitController();
                $produitController->listProduits();
		break;

	    case 'formProduit': 
                $produitController = new ProduitController();
		$produitController->formProduit($_POST);
		break;
		
	    case 'deleteProduit':
		$produitController = new ProduitController();
		$produitController->deleteProduit($_POST['id_produit']);
		break;

            case 'ventes':
                $venteController = new VenteController();
                $venteController->listVentes();
		break;

	    case 'addVente':
		$id_produit = $_POST['id_produit'];
		$quantite = $_POST['quantite'];
		$prix_libre = $_POST['prix_libre'];
		$venteController = new VenteController();
		$venteController->addVente($quantite,
					   $id_produit, $prix_libre);
		#TODO document_root
		header ('location: /~martin/index.php?page=ventes');
		break;

            case 'deleteVente':
                $venteController = new VenteController();
                $venteController->deleteVente($_POST['id_vente']);
		break;

            case 'categories':
                $categorieController = new CategorieController();
                $categorieController->listCategories();
		break;

            case 'gestionCategories':
                $categorieController = new CategorieController();
                $categorieController->listSousCategories();
		break;

	    case 'deleteCategorie':
                $categorieController = new CategorieController();
		$categorieController->deleteCategorie(
		    $_GET['nom_categorie']);
		break;

	    case 'deleteSousCategorie':
                $categorieController = new CategorieController();
		$categorieController->deleteSousCategorie(
		    $_GET['nom_sous_categorie']);
		break;

	    case 'addFormCategorie':
		if(isset($_POST['nom_categorie'])) {
		    $nom_categorie = $_POST['nom_categorie'];
		    $sous_categorie = $_POST['sous_categorie'];
		    $poids = $_POST['poids'];
		    
		    $categorieController = new CategorieController();
		    $categorieController->addFormCategorie(
			$nom_categorie, $sous_categorie, $poids);
		    $categorieController->listSousCategories();
		}else{
                    $categorieController = new CategorieController();
                    $tableau = $categorieController->tableauCategories();
		    foreach ($tableau as $row)
		    {
			$categories[] = $row['nom_categorie'];
		    }
		    require('views/addFormCategorie.view.php');
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
