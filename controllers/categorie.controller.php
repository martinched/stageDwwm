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



require ('model/CategorieManager.php');

class CategorieController{

    public function tableauCategories(){
        $categorieManager = new CategorieManager();
        $reponse = $categorieManager->getCategories();
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
            $sousCategories = $sousCategorieManager->getSousCategories($categorie["nom_categorie"]);
            // Assignez les sous-catégories à la catégorie correspondante dans le tableau $reponse
            $tableau[$categorie['nom_categorie']] = $sousCategories;
        }
	return $tableau;
    }

    public function formCategorie($nom_categorie, $sous_categorie, $poids){
        $addCategorieManager = new CategorieManager();
        $addCategorieManager->formCategorie($nom_categorie, $sous_categorie, $poids);
    }

    public function deleteCategorie($nom_categorie){ 
        $categorieManager = new CategorieManager();
        $categorieManager->deleteCategorie($nom_categorie);
	header ('location:index.php?page=gestionCategories');
        exit();
    }

    public function deleteSousCategorie($nom_sous_categorie){ 
	$categorieManager = new CategorieManager();
	$categorieManager->deleteSousCategorie($nom_sous_categorie);
	header ('location:index.php?page=gestionCategories');
	exit();
    }

}

