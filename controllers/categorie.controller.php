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


// require following file
require ('model/CategorieManager.php');

class CategorieController{

    public function tableauCategories(){
        $categorieManager = new CategorieManager();
        $reponse = $categorieManager->getNomsCategories();
	return $reponse;
    }

    public function listCategories(){
        $categorieManager = new CategorieManager();
        $reponse = $categorieManager->getCategories();
        require ('views/categorie.view.php');
    }

    public function listSousCategories(){
        $sousCategorieManager = new CategorieManager();
        $reponse = $sousCategorieManager->getCategories();
        $tableau = array();
        
        while($categorie = $reponse->fetch()){
            // Pour chaque catégorie, obtenez ses sous-catégories
            $sousCategories = $sousCategorieManager->getSousCategories($categorie["id_categorie"]);
            // Assignez les sous-catégories à la catégorie correspondante dans le tableau $reponse
            $tableau[$categorie['nom_categorie']] = $sousCategories;
        }
        require ('views/gestionCat.view.php');
    }

    public function addFormCategorie($nom_categorie, $sous_categorie, $poids){
        $addCategorieManager = new CategorieManager();
        $addCategorieManager->addFormCategorie($nom_categorie, $sous_categorie, $poids);
        require ('views/addFormCategorie.view.php');
    }

    public function deleteCategorie($id_categorie){ 
        $categorieManager = new CategorieManager();
        $categorieManager->deleteCategorie($id_categorie);
        header ('location:index.php?page=categories');
        exit();
        echo 'la Catégorie à bien été supprimée!';
    }
}
