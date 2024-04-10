
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



