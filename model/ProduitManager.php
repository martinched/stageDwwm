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

    public function getProduit ($id_produit){ 
        $bd = $this->connexion(); 
        $reponse = $bd->query(
            'SELECT p.id_produit, p.nom_sous_categorie, p.nom_produit, p.description,
             p.date_enregistrement, p.cout_reparation, p.temps_passe, p.lieu,
             p.benne, sc.nom_categorie, sc.poids
             FROM produits p INNER JOIN sous_categories sc ON p.nom_sous_categorie = sc.nom_sous_categorie
             WHERE p.id_produit = '.$id_produit);
        return $reponse;
    }
    
    public function getProduits(){ 
        $bd = $this->connexion();
        $reponse = $bd->query(
            'SELECT p.id_produit, p.nom_sous_categorie, p.nom_produit, p.photo, p.description,
             p.date_enregistrement, p.cout_reparation, p.temps_passe, p.lieu,
             p.benne, sc.nom_categorie, sc.poids
             FROM produits p INNER JOIN sous_categories sc ON p.nom_sous_categorie = sc.nom_sous_categorie
             LEFT JOIN produits_vendus pv ON p.id_produit = pv.id_produit WHERE pv.id_produit IS NULL
             ORDER BY p.id_produit DESC');
        return $reponse;
    }
    
    public function addProduit($nom_sous_categorie, $nom_produit, $description, $lieu, $cout_reparation, $temps_passe, $photo){
        $bd = $this->connexion();
        $requeteSQL =
            "INSERT INTO produits(
                `nom_produit`,`description`, `nom_sous_categorie`,
                 `cout_reparation`, `temps_passe`, `lieu`, `benne`, `photo`)
            VALUES (
                :nom_produit, :description, :nom_sous_categorie,
                :cout_reparation, :temps_passe, :lieu, :benne, :photo)";

        $requetePrepare = $bd->prepare($requeteSQL);

        $parameterArray = array(
            ':nom_produit' => htmlspecialchars($nom_produit),
            ':description' =>  htmlspecialchars($description),
            ':nom_sous_categorie' =>  htmlspecialchars($nom_sous_categorie),
            ':cout_reparation' => $cout_reparation,
            ':temps_passe' => $temps_passe,
	    ':lieu' => htmlspecialchars($lieu),
	    ':benne' => "", 
	    ':photo' => $photo
        );
	$requetePrepare->execute($parameterArray);
	
    }

    public function deleteProduit($id_produit){
        $bd = $this->connexion();
        $requeteSQL = "DELETE FROM produits WHERE id_produit = ".$id_produit;
        $reponse = $bd->query($requeteSQL); 
	return $reponse;
    }

    public function getProduitsByFiltres($nom_categorie){
	$requeteSQL = "SELECT p.id_produit, p.nom_sous_categorie,
             p.nom_produit, p.description, p.date_enregistrement,
             p.cout_reparation, p.temps_passe, p.lieu, p.benne,
             sc.nom_categorie, sc.poids FROM produits p
             INNER JOIN sous_categories sc
             ON p.nom_sous_categorie = sc.nom_sous_categorie " ;

	if (isset($nom_categorie) && $nom_categorie != "") {
	    $requeteSQL .= " WHERE `nom_categorie` = '$nom_categorie'";
	}
	if (isset($nom_sous_categorie) && $nom_sous_categorie != "") {
	    $requeteSQL .= " WHERE `nom_sous_categorie` = '$nom_sous_categorie'";
	}
	if (isset($lieu) && $lieu != "") {
	    $requeteSQL .= " WHERE `lieu` = '$lieu'";
	}
	if (isset($benne) && $benne != "") {
	    $requeteSQL .= " WHERE `benne` = '$benne'";
	}
	if (isset($date_fin) && isset($date_debut)
	    && $date_fin != "" && $date_debut != "" ) {
	    $requeteSQL .= " WHERE `date_enregistrement` BETWEEN '$date_debut'
	    AND '$date_fin'";
	}
	
	$bd = $this->connexion();
        return $bd->query($requeteSQL);
    }
}
