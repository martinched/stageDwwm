<?php
    require_once('model/ProduitManager.php');
    require_once('model/VenteManager.php');

    class HomeController{
        public function home(){ 
            $getProduit = new ProduitManager();
            $requeteProduit = $getProduit->getProduits();
            
            $getVente = new VenteManager();
            $requeteVente = $getVente->getVentes();

            require('views/home.view.php');  
        }
    }


