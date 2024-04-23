

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
 console.log (id, type);
	    if (xhr.readyState == 4 && xhr.status == 200) {
                alert(xhr.responseText); // Afficher le message de confirmation retourné par le serveur
		window.location.reload();
            }
        };
        xhr.send('id=' + encodeURIComponent(id) + '&type=' + encodeURIComponent(type));
	console.log(xhr);
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




/*
 * Code provenant de W3Schools
 * Affichant un menu auto-complétant (pour le formulaire d'ajout de sous-catégories)
 */
function autocomplete(input, categories) {
    var currentFocus;
    input.addEventListener("input", function(e) {
	var a, b, i, val = this.value;
	closeAllLists();
	if (!val) { return false;}
	currentFocus = -1;
	a = document.createElement("DIV");
	a.setAttribute("id", this.id + "autocomplete-list");
	a.setAttribute("class", "autocomplete-items");
	this.parentNode.appendChild(a);

	for (i = 0; i < categories.length; i++) {
            if (categories[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
		b = document.createElement("DIV");
		b.innerHTML = "<strong>" + categories[i].substr(0, val.length) + "</strong>";
		b.innerHTML += categories[i].substr(val.length);
		b.innerHTML += "<input type='hidden' value='" + categories[i] + "'>";
		b.addEventListener("click", function(e) {
		    input.value = this.getElementsByTagName("input")[0].value;
		    closeAllLists();
		});
		a.appendChild(b);
            }
	}
    });
    /* affiche la liste totale au départ */
    input.addEventListener("click",  function showList () {
	closeAllLists();
	/*create a DIV element that will contain the items (values):*/
	a = document.createElement("DIV");
	a.setAttribute("id", this.id + "autocomplete-list");
	a.setAttribute("class", "autocomplete-items");
	/*append the DIV element as a child of the autocomplete container:*/
	this.parentNode.appendChild(a);
	/*for each item in the categoriesay...*/
	for (i = 0; i < categories.length; i++) {
	    /*create a DIV element for each matching element:*/
	    b = document.createElement("DIV");
	    b.innerHTML += categories[i];
            b.innerHTML += "<input type='hidden' value='" + categories[i] + "'>";
            b.addEventListener("click", function(e) {
		input.value = this.getElementsByTagName("input")[0].value;
		closeAllLists();
            });
	    a.appendChild(b);
	}
    });
    /*execute a function presses a key on the keyboard:*/
    input.addEventListener("keydown", function(e) {
	var x = document.getElementById(this.id + "autocomplete-list");
	if (x) x = x.getElementsByTagName("div");
	if (e.keyCode == 40) {        //down
            currentFocus++;
            addActive(x);
	} else if (e.keyCode == 38) { //up
            currentFocus--;
            addActive(x);
	} else if (e.keyCode == 13) { //enter
            e.preventDefault();
            if (currentFocus > -1) {
		if (x) x[currentFocus].click();
            }
	}
    });
    function addActive(x) {
	/*a function to classify an item as "active":*/
	if (!x) return false;
	/*start by removing the "active" class on all items:*/
	removeActive(x);
	if (currentFocus >= x.length) currentFocus = 0;
	if (currentFocus < 0) currentFocus = (x.length - 1);
	/*add class "autocomplete-active":*/
	x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
	/*a function to remove the "active" class from all autocomplete items:*/
	for (var i = 0; i < x.length; i++) {
	    x[i].classList.remove("autocomplete-active");
	}
    }
    function closeAllLists(elmnt) {
	/*close all autocomplete lists in the document,
	  except the one passed as an argument:*/
	var x = document.getElementsByClassName("autocomplete-items");
	for (var i = 0; i < x.length; i++) {
	    if (elmnt != x[i] && elmnt != input){
		x[i].parentNode.removeChild(x[i]);
	    }
	}
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
	closeAllLists(e.target);
    });
} 
