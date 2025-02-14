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

require('controllers/produit.controller.php');
require('controllers/vente.controller.php');

if ($_POST['type'] == 'produit'){
    $produitController = new ProduitController();
    if ($produitController->deleteProduit($_POST['id'])) {
	echo "Super succès suppression produit!";
    }
} elseif ($_POST['type'] == 'vente') {
    $venteController = new VenteController();
    if ($venteController->deleteVente($_POST['id'])) {
	echo "Super succès suppression vente!";
    }
} else {
    echo ('type inconnu');
}

?>
