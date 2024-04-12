

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

function afficherChampsVente() {

    var champQuantite = document.getElementById("champQuantite");
    var champPrixLibre = document.getElementById("champPrix");
    var enregistrerVente = document.getElementById("bouton_enregistrer_vente");
    
    champQuantite.style.display = "block";
    champPrixLibre.style.display = "block";
    enregistrerVente.style.display = "block";
}


function confirmerSuppression(id_produit) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce produit?")) {
        // Si l'utilisateur confirme, effectuez la suppression en envoyant une requête AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'succes.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert(xhr.responseText); // Afficher le message de confirmation retourné par le serveur
            }
        };
        xhr.send('id_produit=' + encodeURIComponent(id_produit));
    }
    window.open("index.php?page=produits");

}



