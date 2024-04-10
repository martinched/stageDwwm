<?php

require_once("Manager.php");

class ProduitManager extends Manager{

    public function getProduits(){ 
        $bd = $this->connexion(); 
        $reponse = $bd->query(
            'SELECT p.id_produit, p.id_sous_categorie, p.nom_produit, p.description,
             p.date_enregistrement, p.cout_reparation, p.temps_passe, p.vendu, sc.id_categorie, sc.poids
             FROM produits p INNER JOIN sous_categories sc ON p.id_sous_categorie = sc.id_sous_categorie
             WHERE p.vendu = 0
             ORDER BY date_enregistrement DESC;');

        return $reponse;
    }

    public function addFormProduit($nom_produit, $description, $date_enregistrement, $id_sous_categorie, $cout_reparation, $temps_passe, $vendu){
        $bd = $this->connexion();
        $requeteSQL =
            "INSERT INTO Produits(
                `nom_produit`,`description`, `id_sous_categorie`,
                 `cout_reparation`, `temps_passe`, `vendu`)
            VALUES (
                :nom_produit, :description, :id_sous_categorie, 
                :cout_reparation, :temps_passe, :vendu)";

        $requetePrepare = $bd->prepare($requeteSQL);

        $parameterArray = array(
            ':nom_produit' => htmlspecialchars($nom_produit),
            ':description' =>  htmlspecialchars($description),
            ':id_sous_categorie' => $id_sous_categorie,
            ':cout_reparation' => htmlspecialchars($cout_reparation),
            ':temps_passe' => htmlspecialchars($temps_passe),
            ':vendu' => htmlspecialchars($vendu)
        );
        
        $requetePrepare->execute($parameterArray);
       
    }

    public function deleteProduit(){
        $bd = $this->connexion();
        $requeteSQL = "DELETE FROM produits WHERE id_produit = :id_produit";
        $requetePrepare = $bd->prepare($requeteSQL); 
        $parameterArray = array(
            ':id_produit' => htmlspecialchars($_POST['id_produit'])
        );
       return $requetePrepare->execute($parameterArray);

    }
}