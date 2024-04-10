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
            $reponse = $instanciation->getVentes();
            $resultats = $reponse->fetchAll();
                foreach($resultats as $vente){
                   try{
                        if($vente['id_produit'] = $id_produit){
                            throw new Exception ("message: Une vente existe déjà pour ce produit!");
                        }
                    }catch(Exception $e){
                        $error = $e->getMessage();
                        require('views/error.view.php');      
                    }
                }
                   $instanciation->addVente($quantite, $id_produit, $prix_libre);
            $instanciation->VendreUnProduit($id_produit);
           
            require ('views/vente.view.php');
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
            echo 'la vente a bien été supprimée!';
            header ('location:index.php?page=ventes');
            exit();
            
        }
    }