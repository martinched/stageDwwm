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

class LieuManager extends Manager{

    public function getLieux(){ 
        $bd = $this->connexion(); 
        $reponse = $bd->query('SELECT * FROM `lieux`');
	return $reponse;
    }

    public function addLieu($lieu){
	$bd = $this->connexion(); 
        $reponse = $bd->query("INSERT INTO lieux(`lieu`) VALUES ('$lieu')");
	return $reponse;
    }

    public function deleteLieu($lieu){
        $bd = $this->connexion();
        $requeteSQL = "DELETE FROM lieux WHERE lieu = ".$lieu;
        $reponse = $bd->query($requeteSQL); 
	return $reponse;
    }
}
