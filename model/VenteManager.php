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


require_once("Manager.php");

class VenteManager extends Manager{


    public function getVentes(){
        $bd = $this->connexion();
        $reponse = $bd->query(
            'SELECT v.id_vente, v.quantite, v.date_vente, v.prix_libre,
             p.nom_produit, p.id_produit, p.date_enregistrement
             FROM ventes v
             INNER JOIN produits p
             ON v.id_produit = p.id_produit
             ORDER BY `date_vente` DESC');
        return $reponse;
    }

    public function addVente($quantite, $id_produit, $prix_libre){
	$bd = $this->connexion();
        $requeteSQL =
            "INSERT INTO `ventes`(`quantite`, `id_produit`, `prix_libre`)
            VALUES (:quantite, :id_produit, :prix_libre)";

        $requetePrepare = $bd->prepare($requeteSQL);

        $parameterArray = array(
            ':quantite' => htmlspecialchars($quantite),
            ':id_produit' => htmlspecialchars($id_produit),
            ':prix_libre' => htmlspecialchars($prix_libre)
        );
	$requetePrepare->execute($parameterArray);
    }

    public function VendreUnProduit($id_produit){
        $bd = $this->connexion();
        $sql = 
            'UPDATE produits 
             SET vendu = 1
             WHERE id_produit = ' . $id_produit;
        $reponse = $bd->query($sql);
        return $reponse;
    }
    
    
    public function deleteVente($id){
        $bd = $this->connexion();
	
        $deleteVente = "DELETE FROM ventes WHERE id_vente =" . $id;
	try{
            $bd->query($deleteVente);  
        }
        catch(Exception $e){
            throw new Exception('Probleme de récuperation des donnees'); 
        }
    }
}
