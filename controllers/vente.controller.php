<?php

    require('model/VenteManager.php');


    class VenteController{
        public function listVentes(){
            $instanciation = new VenteManager();
            $reponse = $instanciation->getVentes();
            require ('views/vente.view.php');
        }

        public function choixCategories(){
            $instanciation = new CategorieManager();
            $reponse =  $instanciation->getCategories();
            require ('views/addFormVenteCat.view.php');
        }
        
        public function choixSousCategories($id_categorie){
            $choixSousCategorie = new CategorieManager();
            $reponse =  $choixSousCategorie->getSousCategories($id_categorie);
            require ('views/addFormVenteSousCat.view.php');
        }

        public function addFormVente($quantite, $id_produit, $prix_libre){
            $instanciation = new VenteManager();
            $instanciation->addVente($quantite, $id_produit, $prix_libre);
            $instanciation->VendreUnProduit($id_produit);
            require ('views/addFormVente.view.php');
        }

        public function addVente($quantite, $id_produit, $prix_libre){
            $instanciation = new VenteManager();
            $reponse = $instanciation->VendreUnProduit($id_produit);
            $reponse = $instanciation->addVente($quantite, $id_produit, $prix_libre);
            $this->listVentes();
        }

        public function deleteVente($id_vente){ 
            $instanciation = new VenteManager();
            $instanciation->deleteVente($id_vente);
            header ('location:index.php?page=ventes');
            exit();
            echo 'la vente a bien été supprimée!';
        }
    }