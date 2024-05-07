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
    public function getVentes(){
        $venteManager = new VenteManager();
        $reponse = $venteManager->getVentes();
	return $reponse;
    }

    public function addVente($prix_libre){
	$venteManager = new VenteManager();
	return $venteManager->addVente($prix_libre);
    }

    public function deleteVente($id_vente){
	$venteManager = new VenteManager();
	return $venteManager->deleteVente($id_vente);
    }

    ##
    ## Fonctions pour produits_vendus
    ##

    public function addProduitVendu($id_produit, $id_vente){
	$venteManager = new VenteManager();
	$venteManager->addProduitVendu ($id_produit, $id_vente);
    }
    
    public function listProduitsVendus(){
	# Initialisations
	$tableau = array();
	$produitManager = new ProduitManager();
	$venteManager = new VenteManager();
	# On récupère les ventes
	$reponseVentes = $venteManager->getVentes();
	$ventes = $reponseVentes->fetchAll ();
	# Pour chaque vente
	foreach ($ventes as $col => $val) {
	    # On récupère les produits vendus associés
	    $reponsePV = $venteManager->getProduitsVendus($val["id_vente"]);
	    # Pour chaque produit vendu associé
	    while ($produitVendu = $reponsePV->fetch ()) {
		# On récupère les détails du produit
		$reponseP = $produitManager->getProduit($produitVendu["id_produit"]);
		$tableau[$val["id_vente"]][] = $reponseP->fetch ();
	    }
	}
	require ('views/produitsVendus.view.php');
    }
}
