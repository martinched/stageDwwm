<?php

// requires ( once for all others) the file Manager.php
require_once("Manager.php");

// defines an object and extends it an other object
class CategorieManager extends Manager{

    public function getCategories(){
        // assigns the result required by the 'connection' method 
        // of the object ($this) 'CategorieManager!
        $bd = $this->connexion();
        
        // stock the query 's requete
        $requete = $bd->query('SELECT * FROM categories');
        return $requete;
    }

    public function getSousCategories($id_categorie){
        $bd = $this->connexion();    
        $requete = $bd->query('SELECT * FROM sous_categories WHERE id_categorie = ' . $id_categorie);
        return $requete;
    }

    public function addFormCategorie($nom_categorie, $sous_categorie, $poids){
        $bd = $this->connexion();

        $requeteSQL =
            "INSERT INTO categories (`nom_categorie`, `sous_categorie`, `poids`)
            VALUES (:nom_categorie, :sous_categorie, :poids)";

        $requetePrepare = $bd->prepare($requeteSQL);

        $parameterArray = array(
            ':nom_categorie' => htmlspecialchars($nom_categorie),
            ':sous_categorie' =>  htmlspecialchars($sous_categorie),
            ':poids' => htmlspecialchars($poids)
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
