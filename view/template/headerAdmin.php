<!-- Header pour la page admin -->
<header class="ps-3 pe-3 d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom shadow-sm">
    <!-- Liste de navigation pour desktop (visible uniquement sur les grands écrans) -->
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 d-none d-md-flex">
        <!-- Des liens de navigation supplémentaires pourraient être ajoutés ici -->
    </ul>

    <!-- Section à droite avec des boutons -->
    <div class="col-12 col-md-3 text-center text-md-end">
        <!-- Boutons côte à côte sur les écrans plus larges et empilés sur mobile -->
        <div class="d-flex justify-content-center justify-content-md-end gap-3">
            <!-- Lien vers la vue client -->
            <a href="../front/landing.php" type="button" class="btn btn-danger shadow-sm item-center px-4 py-2 rounded-pill w-75 w-md-auto d-flex align-items-center justify-content-center">
                <i class="fas fa-eye"></i> Vue Client
            </a>
            <!-- Bouton pour ouvrir le panneau administratif -->    
            <button type="button" id="btnPanel" class="btn btn-outline-dark btn-panel shadow-sm px-4 py-2 rounded-pill w-75 w-md-auto">
                <i class="fas fa-cogs"></i> Panel Administratif
            </button>
        </div>
    </div>
</header>
<!-- Fin de l'en-tête -->
