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

    public function getNomsCategories(){
        $bd = $this->connexion();  
        $reponse = $bd->query('SELECT nom_categorie FROM categories');
        return $reponse;
    }
    
    public function getCategories(){
        $bd = $this->connexion();  
        $reponse = $bd->query('SELECT * FROM categories');
        return $reponse;
    }

    public function getSousCategories($id_categorie){
        $bd = $this->connexion();    
        $sql = ("SELECT s.id_sous_categorie, s.nom_sous_categorie, s.id_categorie, c.nom_categorie, s.poids 
        FROM categories c INNER JOIN sous_categories s ON s.id_categorie = c.id_categorie
        WHERE s.id_categorie =" . $id_categorie .
		" ORDER BY nom_sous_categorie");
        $reponse = $bd->query($sql);
        return $reponse;
    }

    public function addFormCategorie($nom_categorie, $sous_categorie){
        $bd = $this->connexion();

        $requeteSQL =
            "INSERT INTO categories (`nom_categorie`, `sous_categorie`)
            VALUES (:nom_categorie, :sous_categorie)";

        $requetePrepare = $bd->prepare($requeteSQL);

        $parameterArray = array(
            ':nom_categorie' => htmlspecialchars($nom_categorie),
            ':sous_categorie' =>  htmlspecialchars($sous_categorie),
        );

        $this->executDisplay($requetePrepare, $parameterArray);
    }

    public function deleteCategorie($id_categorie){
        $bd = $this->connexion();
	
        $deleteCategorie = 'DELETE FROM categories WHERE id_categorie = ?';
        try{
            $stmt = $bd->prepare($deleteCategorie);   
            $stmt->execute([$id_categorie]);
            echo'Le Categorie à bien été supprimé';
        }
        catch(Exception $e){
            throw new Exception('Problème de récuperation des données'); 
        }
    }

}
