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
