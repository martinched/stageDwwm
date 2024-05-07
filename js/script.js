

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
    enregistrerVente.style.display = "inline";
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
	else if (oDDL.value == "%NEW%")
	    window.location.href = "index.php?page=gestionCategories";
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


function createThrobber(img) {
  //représentent respectivement la largeur et la hauteur de la barre de progression.
  const throbberWidth = 64;
  const throbberHeight = 6;
  const throbber = document.createElement("canvas");
    
  //Ajoute une classe CSS à l'élément canvas.
  throbber.classList.add("upload-progress");
  throbber.setAttribute("width", throbberWidth);
  throbber.setAttribute("height", throbberHeight);

  //ajoute l'élément canvas en tant qu'enfant de img. il sera inséré juste après l'image dans le HTML.
    img.parentNode.appendChild(throbber);
    
  //Le contexte 2D est utilisé pour dessiner et manipuler les graphiques à l'intérieur de l'élément canvas.
    throbber.ctx = throbber.getContext("2d");
    
  // Cette fonction dessine un rectangle à l'intérieur de l'élément canvas, dont la largeur est proportionnelle au pourcentage fourni en argument. Si le pourcentage est de 100, la couleur de remplissage est changée en vert.
  throbber.ctx.fillStyle = "orange";
  throbber.update = (percent) => {
    throbber.ctx.fillRect(
      0,
      0,
      (throbberWidth * percent) / 100,
      throbberHeight,
    );
    if (percent === 100) {
      throbber.ctx.fillStyle = "green";
    }
  };
    throbber.update(0);

    //renvoie l'élément canvas, qui contient désormais tout le nécessaire pour être utilisé comme une barre de progression dans le code principal.
  return throbber;
}


function FileUpload(img, file) {
    //instentiation de l'objet permetant de lire le fichier fourni.
    const reader = new FileReader();
    
    //création de la barre de chargement.
    this.ctrl = createThrobber(img);
    
    //instentiation de l'objet effectuant la requete de telechargement.
  const xhr = new XMLHttpRequest();
  this.xhr = xhr;

    //On stock une référence à 'this' dans la 'self' pour les fonctions de rappel.
    const self = this;
    
    //un écouteur d'évenement est ajouté a l'évenement de progression du telechargement; pour déclencher la fonction de rappel qui met a jour le pourcentage téléchargé.
  this.xhr.upload.addEventListener(
    "progress",
    (e) => {
      if (e.lengthComputable) {
        const percentage = Math.round((e.loaded * 100) / e.total);
        self.ctrl.update(percentage);
      }
    },
    false,
  );

    //De meme pour le chargement de la requête XMLHttpRequest. la barre de progression est mise a 100% et l'element est enlevé de la page.
  xhr.upload.addEventListener(
    "load",
    (e) => {
      self.ctrl.update(100);
      const canvas = self.ctrl.ctx.canvas;
      canvas.parentNode.removeChild(canvas);
    },
    false,
  );

  //La méthode open() est utilisée pour initialiser une nouvelle requête. Elle spécifie le type de requête et l'URL du service de téléchargement.
  xhr.open(
    "POST",
    "http://demos.hacks.mozilla.org/paul/demos/resources/webservices/devnull.php",
  );

    //La méthode overrideMimeType() remplace le type de contenu MIME de la réponse (ici en binaire).
    xhr.overrideMimeType("text/plain; charset=x-user-defined-binary");
    
    //Une fonction de rappel est définie pour être exécutée lorsque le contenu du fichier est lu avec succès. Le contenu du fichier est ensuite envoyé via la requête XMLHttpRequest (méthode send()).
  reader.onload = (evt) => {
    xhr.send(evt.target.result);
  };
  reader.readAsBinaryString(file);
}




