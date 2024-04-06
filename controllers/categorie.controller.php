<?php
// require following file
require ('model/CategorieManager.php');

class CategorieController{

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
            $sousCategories = $sousCategorieManager->getSousCategories($categorie);
            // Assignez les sous-catégories à la catégorie correspondante dans le tableau $reponse
            $tableau[$categorie['nom_categorie']] = $sousCategories;
        }
        require ('views/gestionCat.view.php');
    }

    public function addFormCategorie($nom_categorie, $sous_categorie, $poids){
        $addCategorieManager = new CategorieManager();
        $addCategorieManager->addFormCategorie($nom_categorie, $sous_categorie, $poids);
        require ('views/addCategorie.view.php');
    }

    public function deleteCategorie($id_categorie){ 
        $categorieManager = new CategorieManager();
        $categorieManager->deleteCategorie($id_categorie);
        header ('location:index.php?page=categories');
        exit();
        echo 'la Catégorie à bien été supprimée!';
    }
}