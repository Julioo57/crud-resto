document.addEventListener('DOMContentLoaded', function () {
    // crud pour categorie
    const editButtons = document.querySelectorAll(".BtnEdit");

    editButtons.forEach(button => {
        button.addEventListener("click", function () {
            // Récupérer l'ID et le nom de la catégorie
            const id = this.getAttribute("data-id");
            const nomCategorie = this.getAttribute("data-name");


            // Vérifier si les éléments existent avant de les modifier
            const inputHidden = document.getElementById("idCategorie");
            const inputCategorie = document.getElementById("editCategorie");

            if (inputHidden) {
                inputHidden.value = id;
            }
            if (inputCategorie) {
                inputCategorie.value = nomCategorie; 
            }
        });
    });

    // Pour chaque bouton, ajouter un gestionnaire d'événements
    editButtons.forEach(button => {
        button.addEventListener("click", function () {
            // Récupérer l'ID et le nom de la prestation depuis les attributs data-* du bouton
            const id = this.getAttribute("data-id");
            const nomPrestation = this.getAttribute("data-name");

            // Vérifier que les éléments du formulaire modal existent avant de les modifier
            const inputHidden = document.getElementById("idPrestation");
            const inputPrestation = document.getElementById("editPrestation");

            // Si les éléments existent, affecter les valeurs récupérées
            if (inputHidden) {
                inputHidden.value = id; // Assigner l'ID à l'input caché
            }
            if (inputPrestation) {
                inputPrestation.value = nomPrestation; // Assigner le nom de la prestation à l'input
            }
        });
    });
});

