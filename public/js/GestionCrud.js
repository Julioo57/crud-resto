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
    });// Assurez-vous que le sélecteur est correct
        console.log("editButtons:", editButtons); // Vérifier qu'on sélectionne bien les boutons
    
        editButtons.forEach(button => {
            button.addEventListener("click", function () {
                console.log("Button clicked");
    
                const id = this.getAttribute("data-id");
                const nomdroits = this.getAttribute("data-name");
                console.log("ID:", id);
                console.log("Nom des droits:", nomdroits);
    
                const inputHidden = document.getElementById("idDroits");
                const inputdroits = document.getElementById("editDroits");
    
                if (inputHidden) {
                    inputHidden.value = id; // Assigner l'ID à l'input caché
                }
                if (inputdroits) {
                    inputdroits.value = nomdroits; // Assigner le nom du droit à l'input
                }
    
                // Afficher le modal
                const modal = new bootstrap.Modal(document.getElementById('editDroitsModal'));
                modal.show();
            });
        });
                const btnsEdit = document.querySelectorAll('.BtnEditTarif');
            
                btnsEdit.forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        // Récupérer les valeurs des attributs data
                        const idPrestation = this.getAttribute("data-id-prestation");
                        const idCategorie = this.getAttribute("data-id-categorie");
                        const prix = this.getAttribute("data-prix");
            
                        // Assurez-vous que idPrestation est bien défini
                        console.log(idPrestation);
                        console.log(idCategorie);
                        console.log(prix)  // Ajoutez un log pour vérifier
            
                        // Par exemple, vous pouvez assigner ces valeurs à des champs de formulaire dans le modal
                        document.getElementById('idTarifPrestation').value = idPrestation;
                        document.getElementById('idTarifCategorie').value = idCategorie;
                        document.getElementById('editTarif').value = prix;
                    });
                });
});

