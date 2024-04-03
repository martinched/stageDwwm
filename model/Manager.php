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
}