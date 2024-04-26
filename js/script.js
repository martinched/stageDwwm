

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




function afficherChampsVente(id_produit) {

    var champQuantite = document.getElementById("champQuantite"+id_produit);
    var champPrixLibre = document.getElementById("champPrix"+id_produit);
    var enregistrerVente = document.getElementById("bouton_enregistrer_vente"+id_produit);
    var updateProduit = document.getElementById("updateProduit");
    
    champQuantite.style.display = "block";
    champPrixLibre.style.display = "block";
    enregistrerVente.style.display = "block";
    updateProduit.value = 1;
}


function suppression(id, type) {
    if (confirm("Supprimer definitivement?")) {
  // Si l'utilisateur confirme, effectuez la suppression en envoyant une requête AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'succes.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
	    if (xhr.readyState == 4 && xhr.status == 200) {
//		alert (xhr.responseText);
		//window.location.reload();
		window.location.href = window.location.href;
            }
        };
        xhr.send('id=' + encodeURIComponent(id) + '&type=' + encodeURIComponent(type));
    }
}

function verifierDuree() {
  let durationIn = document.getElementById("form-temps_passe");
  let resultP = document.getElementById("output");
  
  durationIn.addEventListener("change", function (e) {
    resultP.textContent = "";
    durationIn.checkValidity();
  });
  
  durationIn.addEventListener("invalid", function (e) {
      resultP.textContent = "Vous devez rentrer un nombre d'heures au format HH ou HH:MM";
  });
}

function DropDownChanged(oDDL) {
    var oTextbox = oDDL.form.elements["txt_"+oDDL.id];
    if (oTextbox) {
        oTextbox.style.display = (oDDL.value == "") ? "" : "none";
        if (oDDL.value == "")
            oTextbox.focus();
    }
}

function FormSubmit(oForm) {
    var oHiddens = document.querySelectorAll('[id^="menu_"]');
    oHiddens.forEach(function (oHidden) {
	var nom_valeur = oHidden.name;
	var oTextbox = oForm.elements["txt_"+nom_valeur];
	var oDDL = oForm.elements["ddl_"+nom_valeur];
	if (oHidden && oTextbox)
            oHidden.value = (oDDL.value == "") ? oTextbox.value : oDDL.value;
    });
}
