<?php

// requires ( once for all others) the file Manager.php
require_once("Manager.php");

// defines an object and extends it an other object
class VenteManager extends Manager{

    // link the dataBase
    public function getVentes(){
        $bd = $this->connexion();
        // stock the query's requete
        $reponse = $bd->query(
            'SELECT v.id_vente, v.quantite, v.date_vente, v.prix_libre, p.nom_produit 
            FROM ventes v INNER JOIN produits p  ON v.id_produit = p.id_produit ORDER BY `date_enregistrement` DESC');
        return $reponse;
    }

    public function lastVentes(){
        $bd = $this->connexion();
        $reponse = $bd->query('SELECT * FROM ventes ORDER BY date DESC LIMIT 5');
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
 
    
    public function deleteVente($id_vente){
        $bd = $this->connexion();
       
        $deleteVente = 'DELETE FROM ventes WHERE id_vente = ?';
            try{
                $stmt = $bd->prepare($deleteVente);   
                $stmt->execute([$id_vente]);
                echo'la vente a bien été supprimée';
            }
            catch(Exception $e){
                throw new Exception('Probleme de récuperation des donnees'); 
            }
    }
}
   