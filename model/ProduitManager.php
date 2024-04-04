<?php

// requires ( once for all others) the file Manager.php
require_once("Manager.php");

// defines an object and extends it an other object
class ProduitManager extends Manager{

    // link the dataBase
    public function getProduit(){ 
        // assigns the result required by the 'connection' method 
        // of the object ($this) 'ProduitManager!
        $bd = $this->connexion();
        
    // stock the query 's requete
    $requete = $bd->query('SELECT * FROM produits');

    return $requete;
    }

    public function addFormProduit($nom_produit, $description, $date_enregistrement, $id_categorie, $cout_reparation, $temps_passe, $vendu){
        $bd = $this->connexion();

        $requeteSQL =
            "INSERT INTO Produits(
                `nom_produit`,`description`, `date_enregistrement`, `id_categorie`,
                 `cout_reparation`, `temps_passe`, `vendu`)
            VALUES (
                :nom_produit, :description, :date_enregistrement, :id_categorie, 
                :cout_reparation, :temps_passe, :vendu)";

        $requetePrepare = $bd->prepare($requeteSQL);

        $parameterArray = array(
            ':nom_produit' => htmlspecialchars($nom_produit),
            ':description' =>  htmlspecialchars($description),
            ':date_enregistrement' => htmlspecialchars($date_enregistrement),
            ':id_categorie' => htmlspecialchars($id_categorie),
            ':cout_reparation' => htmlspecialchars($cout_reparation),
            ':temps_passe' => htmlspecialchars($temps_passe),
            ':vendu' => htmlspecialchars($vendu)
        );
        
        $requetePrepare->execute($parameterArray);
    }

    public function lastProduits(){
        $bd = $this->connexion();
        // stock the query 's requete
        $requete = $bd->query('SELECT * FROM produits ORDER BY `date_enregistrement` DESC LIMIT 5');

        return $requete;
    }

    public function deleteProduit($id_produit){
        $bd = $this->connexion();
       
        $deleteProduit = 'DELETE FROM produits WHERE id_produit = ?';
            try{
                $stmt = $bd->prepare($deleteProduit);   
                $stmt->execute([$id_produit]);
                echo'Le produit à bien été supprimé';
            }
            catch(Exception $e){
                throw new Exception('Problème de récuperation des données'); 
            }
    }
}