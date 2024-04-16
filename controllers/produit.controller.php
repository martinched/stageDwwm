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
    
    public function choixSousCategories($id_categorie){
        $choixSousCategorie = new CategorieManager();
        $reponse =  $choixSousCategorie->getSousCategories($id_categorie);
        require ('views/addFormProduitSousCat.view.php');
    }

    public function addFormProduit($nom_produit, $description, $date_enregistrement,
                                   $id_sous_categorie, $cout_reparation, $temps_passe, $vendu){
        $addProduitManager = new ProduitManager();
        $addProduitManager->addFormProduit($nom_produit, $description, $date_enregistrement, 
                                           $id_sous_categorie, $cout_reparation, $temps_passe, $vendu);
        return $addProduitManager->getProduits(1);
    }

    public function deleteProduit($id_produit){ 
        $produitManager = new ProduitManager();
        return $produitManager->deleteProduit($id_produit);
    }
    
}
