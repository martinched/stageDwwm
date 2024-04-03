<?php

    require('model/ProduitManager.php');


    class ProduitController{
        public function listProduits(){
            $produitManager = new ProduitManager();
            $requete = $produitManager->getProduit();
            require ('views/produit.view.php');
        }
    
        public function addFormProduit($nom_produit, $description, $date_enregistrement, $id_categorie, $cout_reparation, $temps_passe, $vendu){
            $addProduitManager = new ProduitManager();
            $addProduitManager->addFormProduit($nom_produit, $description, $date_enregistrement, $id_categorie, $cout_reparation, $temps_passe, $vendu);
            require ('views/addProduit.view.php');
        }

        
    }