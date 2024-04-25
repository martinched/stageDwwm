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

class CategorieManager extends Manager{

    public function getCategories(){
        $bd = $this->connexion();  
        $reponse = $bd->query('SELECT * FROM categories');
        return $reponse;
    }

    public function getSousCategories($nom_categorie){
        $bd = $this->connexion();    
        $sql = ("SELECT s.nom_sous_categorie, s.nom_categorie, s.poids
        FROM sous_categories s
        WHERE s.nom_categorie ='" . $nom_categorie .
		"' ORDER BY nom_sous_categorie");
        $reponse = $bd->query($sql);
        return $reponse;
    }

    public function addCategorie($nom_categorie) {
        $bd = $this->connexion();
	$requeteSQL = "INSERT INTO categories(`nom_categorie`)
                            VALUES(:nom_categorie)";
	
        $requetePrepare = $bd->prepare($requeteSQL);
        $parameterArray = array(
	    ':nom_categorie' => htmlspecialchars($nom_categorie));
	$this->executDisplay($requetePrepare, $parameterArray);
	echo "On a ajouté la categorie $nom_categorie";
    }
    
    public function addFormCategorie($nom_categorie,
				     $nom_sous_categorie, $poids){
        $bd = $this->connexion();
        $requeteSQL = "SELECT * FROM categories WHERE nom_categorie='"
		    . $nom_categorie . "'";
	$existe = $bd->query($requeteSQL);
	# Si la categorie n'existe pas encore, la créer
	
	if (!$existe->fetch()) {
	    $this->addCategorie($nom_categorie);
	}
	$requeteSQL =
	    "INSERT INTO sous_categories(`nom_categorie`,
             `nom_sous_categorie`, `poids`)
             VALUES(:nom_categorie, :nom_sous_categorie, :poids)";
        $requetePrepare = $bd->prepare($requeteSQL);
	$parameterArray = array(
	    ':nom_categorie' => htmlspecialchars($nom_categorie),
	    ':nom_sous_categorie' => htmlspecialchars($nom_sous_categorie),
	    ':poids' => $poids);
        $this->executDisplay($requetePrepare, $parameterArray);
    }
    
    public function deleteCategorie($nom_categorie){
	$bd = $this->connexion();
	
	$requeteSQL = 'DELETE FROM categories
                       WHERE nom_categorie = :nom_categorie';
	try{
	    $requetePrepare = $bd->prepare($requeteSQL);
	    $parameterArray = array(
		':nom_categorie' => htmlspecialchars($nom_categorie));
	    $requetePrepare->execute($parameterArray);
	    echo'La categorie a bien été supprimée';
	}
	catch(Exception $e){
	    throw new Exception('Problème de récuperation des données');
	}
    }

    public function deleteSousCategorie($nom_sous_categorie) {
	$bd = $this->connexion();
	
	$requeteSQL = 'DELETE FROM sous_categories
                       WHERE nom_sous_categorie = :nom_sous_categorie';
	try{
	    $requetePrepare = $bd->prepare($requeteSQL);
	    $parameterArray = array(':nom_sous_categorie' =>
		htmlspecialchars($nom_sous_categorie));
	    $requetePrepare->execute($parameterArray);
	    echo 'La sous-categorie a bien été supprimée';
	} catch(Exception $e){
	    throw new Exception('Problème de récuperation des données');
	}
    }
}
