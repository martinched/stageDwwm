<?php

    require('model/ProduitManager.php');
    

    class ProduitController{
        public function listProduits(){
            $produitManager = new ProduitManager();
            $reponse = $produitManager->getProduit();
            require ('views/produit.view.php');
        }
    
        public function choixCategories(){
            $choixCategorie = new CategorieManager();
            $reponse =  $choixCategorie->getCategories();
            require ('views/addProduitCat.view.php');
        }
        
        public function choixSousCategories($id_categorie){
            $choixSousCategorie = new CategorieManager();
            $reponse =  $choixSousCategorie->getSousCategories($id_categorie);
            require ('views/addProduitSousCat.view.php');
        }

        public function addFormProduit($nom_produit, $description, $date_enregistrement, $id_sous_categorie, $cout_reparation, $temps_passe, $vendu){
            $addProduitManager = new ProduitManager();
            $addProduitManager->addFormProduit($nom_produit, $description, $date_enregistrement, $id_sous_categorie, $cout_reparation, $temps_passe, $vendu);
            // require ('views/addProduit.view.php');
        }

        public function deleteProduit($id_produit){ 
            $produitManager = new ProduitManager();
            $produitManager->deleteProduit($id_produit);
            header ('location:index.php?page=produits');
            exit();
            echo 'le produit a bien été supprimé!';
        }
    }