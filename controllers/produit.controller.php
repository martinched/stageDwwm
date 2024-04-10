<?php

    require('model/ProduitManager.php');
    

    class ProduitController{
        public function listProduits(){
            $produitManager = new ProduitManager();
            $reponse = $produitManager->getProduits();
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

        public function deleteProduit(){ 
            $produitManager = new ProduitManager();
            return $produitManager->deleteProduit();
        }
       
    }
    