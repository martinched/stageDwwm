
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

require('model/ProduitManager.php');


class ProduitController{
    public function listProduits(){
        $produitManager = new ProduitManager();
        $reponse = $produitManager->getProduits(0);
        require ('views/produit.view.php');
    }
    
    public function choixCategories(){
        $choixCategorie = new CategorieManager();
        $reponse =  $choixCategorie->getCategories();
        require ('views/addFormProduitCat.view.php');
    }
    
    public function choixSousCategories($nom_categorie){
        $choixSousCategorie = new CategorieManager();
	$reponse =  $choixSousCategorie->getSousCategories($nom_categorie);
        require ('views/addFormProduitSousCat.view.php');
    }

    public function formProduit($formValues) {
	# 1 Si l'utilisateur n'a pas choisi une catégorie
	if(!isset($formValues['nom_categorie']) && !isset($formValues['nom_sous_categorie'])) {
	    $this->choixCategories();
	    # 2 S'il n'a pas rempli de nom_produit
	} elseif (isset($formValues['nom_categorie']) && !isset($formValues['nom_sous_categorie'])) {
	    $this->choixSousCategories($formValues['nom_categorie']);
	    $action = $formValues['action'];
	    require('views/addFormProduit.view.php');
	    # On enregistre
	} else { # le produit
	    $addProduitManager = new ProduitManager();
	    $addProduitManager->addProduit(
		$formValues['nom_sous_categorie'],
		$formValues['nom_produit'],
		$formValues['description'],
		$formValues['lieu'],
		$formValues['cout_reparation'],
		$formValues['temps_passe'].":00",
		$formValues['vendu']);

	    if ($formValues['vendu']) { # et la vente
		$venteController = new VenteController();
		$reponse = $addProduitManager->getProduits($formValues['vendu']);
		$row = $reponse->fetch();
		if ($venteController->autoriseVente($row['id_produit'])) {
		    $venteController->addVente($formValues['quantite'],
					       $row['id_produit'],
					       $formValues['prix_libre']);
		    #TODO document_root
		    header ('location: /~martin/index.php?page=ventes');
		    exit();
		}
	    } else {
		#TODO document_root
		header ('location: /~martin/index.php?page=produits');
		exit();
	    }
	}
	return true;
    }
    
    
    public function deleteProduit($id_produit){
	$produitManager = new ProduitManager();
	
	return $produitManager->deleteProduit($id_produit);
	
    }
}
