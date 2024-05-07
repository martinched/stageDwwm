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
        return $bd->query(
            'SELECT v.id_vente, v.date_vente, v.prix_libre
             FROM ventes v
             ORDER BY `date_vente` DESC');
    }

    public function addVente ($prix_libre){
	$bd = $this->connexion();
	$bd->query("INSERT INTO `ventes`(`prix_libre`)
                    VALUES ($prix_libre)");
	return $bd->lastInsertId();
    }

    public function getProduitsVendus($id_vente){
        $bd = $this->connexion(); 
        $reponse = $bd->query(
            'SELECT p.id_produit, p.nom_sous_categorie, p.nom_produit, p.description,
             p.date_enregistrement, p.cout_reparation, p.temps_passe, p.lieu,
             p.benne, sc.nom_categorie, sc.poids
             FROM produits p INNER JOIN sous_categories sc ON p.nom_sous_categorie = sc.nom_sous_categorie
             LEFT JOIN produits_vendus pv ON pv.id_produit = p.id_produit
             WHERE pv.id_vente = '.$id_vente.'
             ORDER BY p.id_produit DESC');
        return $reponse;
    }
    
    public function addProduitVendu ($id_produit, $id_vente){
	echo "<br />ID VENTE : $id_vente <br />";
	$bd = $this->connexion();
	$requeteSQL = "INSERT INTO produits_vendus(id_produit, id_vente)
                       VALUES (".$id_produit.", ".$id_vente.")";
	echo $requeteSQL;
	$bd->query($requeteSQL);
    }
    
    public function deleteVente($id_vente){
	$bd = $this->connexion();	
	$deleteVente = "DELETE FROM ventes WHERE id_vente =" . $id_vente;
	$reponse = $bd->query($deleteVente);  
	return $reponse;
    }
}
