<?php

    require('model/VenteManager.php');


    class VenteController{
        public function listVentes(){
            $venteManager = new VenteManager();
            $requete = $venteManager->getVentes();
            require ('views/vente.view.php');
        }

        public function addFormVente($quantite, $date, $id_produit, $prix_libre){
            $addVenteManager = new VenteManager();
            $addVenteManager->addFormVente($quantite, $date, $id_produit, $prix_libre);
            require ('views/addVente.view.php');
        }

        public function deleteVente($id_vente){ 
            $venteManager = new VenteManager();
            $venteManager->deleteVente($id_vente);
            header ('location:index.php?page=ventes');
            exit();
            echo 'la vente a bien été supprimée!';
        }
    }