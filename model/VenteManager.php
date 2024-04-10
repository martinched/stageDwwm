<?php

require_once("Manager.php");

class VenteManager extends Manager{


    public function getVentes(){
        $bd = $this->connexion();
        $reponse = $bd->query(
            'SELECT v.id_vente, v.quantite, v.date_vente, v.prix_libre, p.nom_produit, p.id_produit, p.date_enregistrement
            FROM ventes v INNER JOIN produits p  ON v.id_produit = p.id_produit ORDER BY `date_vente` DESC');
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
   