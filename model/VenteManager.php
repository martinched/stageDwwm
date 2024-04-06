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
            'SELECT v.id_vente, v.quantite, v.date_vente, p.nom_produit, p.date_enregistrement, p.cout_reparation, p.temps_passe 
            FROM ventes v INNER JOIN produits p  ON v.id_produit = p.id_produit ORDER BY `date_enregistrement` DESC');

        return $reponse;
    }


    public function addFormVente($quantite, $date_vente, $id_produit, $prix_libre){
        $bd = $this->connexion();

        $requeteSQL =
            "INSERT INTO `ventes`(`quantite`,`date_vente`, `id_produit`, `prix_libre`)
            VALUES (:quantite, :date, :id_produit, :prix_libre)";

        $requetePrepare = $bd->prepare($requeteSQL);

        $parameterArray = array(
            ':quantite' => htmlspecialchars($quantite),
            ':date_vente' => htmlspecialchars($date_vente),
            ':id_produit' => htmlspecialchars($id_produit),
            ':prix_libre' => htmlspecialchars($prix_libre)
        );
        $requetePrepare->execute($parameterArray);


 $requeteSQL =
        "UPDATE  "; 
        // $requeteSQL =
        //     "SELECT id_vente FROM `ventes` order by id_vente desc limit 1 ";

        // $reponse = $bd->query($requeteSQL);

  

            // A voir plus tar
        //  Récupérer l'id_vente de la vente qui vient d'être créée
        //  Mettre à jour le produit vendu avec produits.id_vente = ventes.id_vente
    }
 
    public function lastVentes(){
        $bd = $this->connexion();
        $reponse = $bd->query('SELECT * FROM ventes ORDER BY date DESC LIMIT 5');
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
   