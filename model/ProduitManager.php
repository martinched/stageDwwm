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

class ProduitManager extends Manager{

    public function getProduits($vendu){ 
        $bd = $this->connexion(); 
        $reponse = $bd->query(
            'SELECT p.id_produit, p.id_sous_categorie, p.nom_produit, p.description,
             p.date_enregistrement, p.cout_reparation, p.temps_passe, p.vendu, sc.id_categorie, sc.poids
             FROM produits p INNER JOIN sous_categories sc ON p.id_sous_categorie = sc.id_sous_categorie
             WHERE p.vendu = '.$vendu.'
             ORDER BY p.id_produit DESC');

        return $reponse;
    }

    public function addProduit($nom_produit, $description, $date_enregistrement, $id_sous_categorie, $cout_reparation, $temps_passe, $vendu){
        $bd = $this->connexion();
        $requeteSQL =
            "INSERT INTO produits(
                `nom_produit`,`description`, `id_sous_categorie`, `date_enregistrement`,
                 `cout_reparation`, `temps_passe`, `vendu`)
            VALUES (
                :nom_produit, :description, :id_sous_categorie, :date_enregistrement,
                :cout_reparation, :temps_passe, :vendu)";

        $requetePrepare = $bd->prepare($requeteSQL);

        $parameterArray = array(
            ':nom_produit' => htmlspecialchars($nom_produit),
            ':description' =>  htmlspecialchars($description),
            ':id_sous_categorie' => $id_sous_categorie,
	    ':date_enregistrement' => $date_enregistrement,
            ':cout_reparation' => $cout_reparation,
            ':temps_passe' => $temps_passe,
            ':vendu' => htmlspecialchars($vendu)
        );
	$requetePrepare->execute($parameterArray);
	
    }

    public function deleteProduit($id){
        $bd = $this->connexion();
        $requeteSQL = "DELETE FROM produits WHERE id_produit = ".$id;
        $reponse = $bd->query($requeteSQL); 
	return $reponse;
    }
}
