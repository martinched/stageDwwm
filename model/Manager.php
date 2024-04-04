<?php

class Manager {
    protected function connexion() {
        try {
            $bd = new PDO('mysql:host=localhost:3306;dbname=petassou;charset=utf8', 'root', '');
            return $bd;
        }
        catch(Exception $e) {
            throw new Exception('Probleme de récuperation des donnees');
        }
    } 

    protected function executDisplay($requetePrepare, $parameterArray) {
        try {
            $requetePrepare->execute($parameterArray);
            echo "Ajout réussi!";
        }
        catch(Exception $e) {
            $error = $e->getMessage();
            require('views/error.view.php');  
        }
            
    }
}