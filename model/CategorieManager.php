<?php

require_once("Manager.php");

class CategorieManager extends Manager{

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
