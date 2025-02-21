document.addEventListener("DOMContentLoaded", function() {
    // Boutons du dropdown
    const petitRevenue = document.querySelector(".petitRevenue");
    const moyenRevenue = document.querySelector(".MoyenRevenue");
    const grosRevenue = document.querySelector(".GrosRevenue");
    const visiteur = document.querySelector(".visiteur");

    // Zones à afficher/masquer
    const tarifRevenuePetit = document.querySelector(".TarifPetitRevenue");
    const tarifRevenueMoyen = document.querySelector(".TarifMoyenRevenue");
    const tarifRevenueGros = document.querySelector(".TarifGrosRevenue");
    const tarifVisiteur = document.querySelector(".TarifVisiteur");

    // Vérifie que les éléments existent dans le DOM avant d'ajouter des événements
    if (petitRevenue) {
        petitRevenue.addEventListener("click", function() {
            toggleVisibility(tarifRevenuePetit);
        });
    }
    if (moyenRevenue) {
        moyenRevenue.addEventListener("click", function() {
            toggleVisibility(tarifRevenueMoyen);
        });
    }
    if (grosRevenue) {
        grosRevenue.addEventListener("click", function() {
            toggleVisibility(tarifRevenueGros);
        });
    }
    if (visiteur) {
        visiteur.addEventListener("click", function() {
            toggleVisibility(tarifVisiteur);
        });
    }

    // Fonction pour afficher/masquer une zone
    function toggleVisibility(element) {
        // Masquer toutes les zones
        const allTarifZones = [tarifRevenuePetit, tarifRevenueMoyen, tarifRevenueGros, tarifVisiteur];
        allTarifZones.forEach(function(zone) {
            if (zone !== element) {
                zone.classList.remove("d-block");
                zone.classList.add("d-none");
            }
        });

        // Afficher la zone sélectionnée
        if (element.classList.contains("d-none")) {
            element.classList.remove("d-none");
            element.classList.add("d-block");
        }
    }
});
