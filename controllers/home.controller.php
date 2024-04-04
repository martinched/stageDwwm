<?php
    require_once('model/ProduitManager.php');
    require_once('model/VenteManager.php');

    class HomeController{
        public function home(){ 
            $lastProduit = new ProduitManager();
            $requeteProduit = $lastProduit->lastProduits();
            
            $lastVente = new VenteManager();
            $requeteVente = $lastVente->lastVentes();

            require('views/home.view.php');  
        }
    }


