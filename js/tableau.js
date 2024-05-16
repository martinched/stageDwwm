

// Fonction pour afficher les données dans le tableau
function displayData(data) {
    const tbody = document.querySelector('tbody');
    tbody.innerHTML = ''; // Effacer les données existantes

    data.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.id_produit}</td>
            <td>${item.nom_produit}</td>
            <td>${item.date_enregistrement}</td>
            <td>${item.nom_categorie}</td>
	    <td>${item.nom_sous_categorie}</td>
            <td>${item.poids}</td>
	    <td>${item.cout_reparation}</td>
	    <td>${item.temps_passe}</td>`;
	if( item.date_vente === undefined ) {
	    row.innerHTML += `
            <td>${item.lieu}</td>`;
	}
	  row.innerHTML += `
	    <td>${item.benne}</td>`;
	if( item.date_vente !== undefined && item.prix_libre !== undefined) {
	    row.innerHTML += `
            <td>${item.date_vente}</td>
	    <td>${item.prix_libre}</td>`;
	}
        tbody.appendChild(row);
    });
}
var ordre = 0;
// Fonction pour trier les données par filtre
function filterBy(filterType) {
    let sortedData = [];
    if (ordre === undefined || ordre ==  0 )  {
	ordre = 2;
    } else {
	ordre = 0;
    }

    // Copie des données pour éviter de modifier l'original
    let copiedData = data.slice();

    // Trie des données en fonction du type de filtre
    if (filterType === 'id_produit') {
        sortedData = copiedData.sort(function(a, b) {
            if (a.id_produit < b.id_produit) {
                return 1 - ordre; // a doit être avant b dans l'ordre trié
            } else if (a.id_produit > b.id_produit) {
                return -1 + ordre; // b doit être avant a dans l'ordre trié
            } else {
                return 0; // l'ordre reste le même
            }
        });
    } else if (filterType === 'nom_produit') {
        sortedData = copiedData.sort(function(a, b) {
            if (a.nom_produit < b.nom_produit) {
                return 1-ordre; // a doit être avant b dans l'ordre trié
            } else if (a.nom_produit > b.nom_produit) {
                return -1+ordre; // b doit être avant a dans l'ordre trié
            } else {
                return 0; // l'ordre reste le même
            }
        });
    }else if (filterType === 'date_enregistrement') {
        sortedData = copiedData.sort(function(a, b) {
            if (a.date_enregistrement < b.date_enregistrement) {
                return 1-ordre; // a doit être avant b dans l'ordre trié
            } else if (a.date_enregistrement > b.date_enregistrement) {
                return -1+ordre; // b doit être avant a dans l'ordre trié
            } else {
                return 0; // l'ordre reste le même
            }
        });
    } else if (filterType === 'nom_categorie') {
        sortedData = copiedData.sort(function(a, b) {
            if (a.nom_categorie < b.nom_categorie) {
                return 1-ordre; // a doit être avant b dans l'ordre trié
            } else if (a.nom_categorie > b.nom_categorie) {
                return -1+ordre; // b doit être avant a dans l'ordre trié
            } else {
                return 0; // l'ordre reste le même
            }
        });
    
    }else if (filterType === 'nom_sous_categorie') {
        sortedData = copiedData.sort(function(a, b) {
            if (a.nom_sous_categorie < b.nom_sous_categorie) {
                return 1-ordre; // a doit être avant b dans l'ordre trié
            } else if (a.nom_sous_categorie > b.nom_sous_categorie) {
                return -1+ordre; // b doit être avant a dans l'ordre trié
            } else {
                return 0; // l'ordre reste le même
            }
        });
    }else if (filterType === 'poids') {
        sortedData = copiedData.sort(function(a, b) {
            if (a.poids < b.poids) {
                return 1-ordre; // a doit être avant b dans l'ordre trié
            } else if (a.poids > b.poids) {
                return -1+ordre; // b doit être avant a dans l'ordre trié
            } else {
                return 0; // l'ordre reste le même
            }
        }); 
    }else if (filterType === 'cout_reparation') {
        sortedData = copiedData.sort(function(a, b) {
            if (a.cout_reparation < b.cout_reparation) {
                return 1-ordre; // a doit être avant b dans l'ordre trié
            } else if (a.cout_reparation > b.cout_reparation) {
                return -1+ordre; // b doit être avant a dans l'ordre trié
            } else {
                return 0; // l'ordre reste le même
            }
        });
     }else if (filterType === 'temps_passe') {
        sortedData = copiedData.sort(function(a, b) {
            if (a.temps_passe < b.temps_passe) {
                return 1-ordre; // a doit être avant b dans l'ordre trié
            } else if (a.temps_passe > b.temps_passe) {
                return -1+ordre; // b doit être avant a dans l'ordre trié
            } else {
                return 0; // l'ordre reste le même
            }
        });  
    }else if (filterType === 'lieu') {
        sortedData = copiedData.sort(function(a, b) {
            if (a.lieu < b.lieu) {
                return 1-ordre; // a doit être avant b dans l'ordre trié
            } else if (a.lieu > b.lieu) {
                return -1+ordre; // b doit être avant a dans l'ordre trié
            } else {
                return 0; // l'ordre reste le même
            }
        });
    }else if (filterType === 'benne') {
        sortedData = copiedData.sort(function(a, b) {
            if (a.benne < b.benne) {
                return 1-ordre; // a doit être avant b dans l'ordre trié
            } else if (a.benne> b.benne) {
                return -1+ordre; // b doit être avant a dans l'ordre trié
            } else {
                return 0; // l'ordre reste le même
            }
        });
    } else if (filterType === 'date_vente') {
        sortedData = copiedData.sort(function(a, b) {
            if (a.date_vente < b.date_vente) {
                return 1-ordre; // a doit être avant b dans l'ordre trié
            } else if (a.date_vente > b.date_vente) {
                return -1+ordre; // b doit être avant a dans l'ordre trié
            } else {
                return 0; // l'ordre reste le même
            }
        }); 
      }else if (filterType === 'prix_libre') {
        sortedData = copiedData.sort(function(a, b) {
            if (a.prix_libre < b.prix_libre) {
                return 1-ordre; // a doit être avant b dans l'ordre trié
            } else if (a.prix_libre > b.prix_libre) {
                return -1+ordre; // b doit être avant a dans l'ordre trié
            } else {
                return 0; // l'ordre reste le même
            }
        });
    }	

    
      displayData(sortedData);
}
