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

    // btnPanel & sideBar 
    const btnPanel = document.querySelector(".btn-panel");
    const sideBar = document.querySelector(".sideBar");
     const mainContent = document.querySelector('.main-admin');  // Sélectionne l'élément main-admin

    // Vérif que ca existe avant de faire debug 
    function toggleVisibility(element) {
        const allTarifZones = [tarifRevenuePetit, tarifRevenueMoyen, tarifRevenueGros, tarifVisiteur];
        allTarifZones.forEach(zone => {
            if (zone !== element) {
                zone.classList.remove("d-block");
                zone.classList.add("d-none");
            }
        });

        if (element.classList.contains("d-none")) {
            element.classList.remove("d-none");
            element.classList.add("d-block");
        }
    }

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

     // Fonction pour appliquer le padding
    function updateMainContentPadding() {
        const screenWidth = window.innerWidth;
        const sideBarStyle = window.getComputedStyle(sideBar);

        // Si l'écran est plus petit que 992px (taille mobile/tablette), on gère la sidebar avec le bouton
        if (screenWidth < 992) {
            // Vérifie si la sidebar est visible (d-flex) ou cachée (d-none)
            if (sideBarStyle.display === 'flex') {
                mainContent.classList.add('ps-5');  // Ajouter du padding si la sidebar est visible
            } else {
                mainContent.classList.remove('ps-5');  // Retirer le padding si la sidebar est cachée
            }
        } else {
            // Pour les grands écrans (PC), la sidebar est toujours visible, donc on ajoute le padding
            mainContent.classList.add('ps-5');
        }
    }

    // Fonction pour afficher/masquer la sidebar sur mobile
    if (btnPanel && sideBar && mainContent) {
        btnPanel.addEventListener("click", function () {
            sideBar.classList.toggle("d-none");
            sideBar.classList.toggle("d-flex");

            // Mettez à jour le padding en fonction de l'état de la sidebar après un petit délai
            setTimeout(updateMainContentPadding, 50);
        });
    }

    // Vérifiez et appliquez le padding dès le chargement de la page
    updateMainContentPadding();

    // Ajoutez un événement pour gérer le redimensionnement de la fenêtre
    window.addEventListener("resize", updateMainContentPadding);
    // pour le popup catégorie
    const btnPopup = document.querySelector(".btnPopup");
    const popup = document.querySelector(".popupAdd");
    const btnClose = document.querySelector(".btn-close");
    const btnAddCategorie = document.querySelector(".btnAddCategorie");
    const btnEdit = document.querySelector(".btnEdit");
    const popupEdit = document.querySelector(".popupEdit");

    if (btnPopup && popup) {
        btnPopup.addEventListener("click", function() {
            popup.classList.toggle("d-none");
            popup.classList.toggle("d-block");
        });
    }
    // Bouton pour fermer le popup
    if (btnClose) {
        btnClose.addEventListener("click", function() {
            popup.classList.add("d-none");
            popup.classList.remove("d-block");
        });
    }
    if (btnEdit && popupEdit) {
        btnEdit.addEventListener("click", function() {
            popupEdit.classList.toggle("d-none");
            popupEdit.classList.toggle("d-block");
        });
    }
});