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
    // btnpanel & sidebalr 
    const btnPanel = document.querySelector(".btn-panel");
    const sideBar = document.querySelector(".sideBar");

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
        // fonction pour afficher/masquer la sidebar
        if (btnPanel && sideBar) {  // Vérifier que les éléments existent
            btnPanel.addEventListener("click", function() {
                if (sideBar.classList.contains("d-none")) {
                    sideBar.classList.remove("d-none");
                    sideBar.classList.add("d-flex");
                } else {
                    sideBar.classList.remove("d-flex");
                    sideBar.classList.add("d-none");
                }
            });
        } else {
            console.error("btnPanel ou sideBar introuvable !");
        }
});
