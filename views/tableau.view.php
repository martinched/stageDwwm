<?php
$title = "Vue globale";
ob_start()
?>

<h2>Vue globale</h2>


<div class="filters">
    <button class="filter-btn" onclick="filterBy('date')">Date</button>
    <button class="filter-btn" onclick="filterBy('nom')">Nom</button>
    <!-- Ajoutez d'autres boutons pour d'autres filtres si nécessaire -->
</div>




<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Date entrée</th>
            <th>Catégorie</th>
            <th>Sous-catégorie</th>
            <th>Poids</th>
            <th>Coût</th>
            <th>Temps</th>
            <th>Lieu</th>
            <th>Matière</th>
            <th>Benne</th>
            <th>Date vente</th>
            <th>Prix</th>
        </tr>
    </thead>
    <tbody>
        <!-- Les données seront ajoutées dynamiquement ici -->
    </tbody>
</table>

