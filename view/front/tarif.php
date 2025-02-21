<?php 
require_once '../../controller/requeteController.php';
?> 
<body>
<h2 class="text-center pt-3">Tarif Par Categories</h2>
<div class="d-flex justify-content-end p-3">
    <div class="btn-group">
        <button class="btn btn-primary btn-lg" type="button">
            Selectionner votre categorie
        </button>
        <button type="button" class="btn btn-lg btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
            <li type="button" class="petitRevenue text-center p-1" value=1>Petits revenus</li>
            <li type="button" class="MoyenRevenue text-center p-1" value=2>Revenus moyens</li>
            <li type="button" class="GrosRevenue text-center p-1" value=3>Gros revenus</li>
            <li type="button" class="visiteur text-center p-1" value=4>Visiteurs</li>
        </ul>
    </div>
</div>
    <div class="container">
        <div class="d-block TarifPetitRevenue">
            <h5 class="text-center">Tarif pour les utilisateurs à Petits revenus.</h5>
            <table class="m-5 table table-striped w-50 text-center mx-auto">
                <tr>
                    <th class="p-2">Tarif</th>
                    <th class="p-2">Prestation</th>
                </tr>
                <?php foreach ($petitRevenue as $revenue): ?>
                    <tr>
                        <td><?= htmlspecialchars($revenue['prix']); ?></td>
                        <td><?= htmlspecialchars($revenue['type_prestation']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="d-none TarifMoyenRevenue">
            <h5 class="text-center">Tarif pour les utilisateurs à Revenus moyens.</h5>
            <table class="m-5 table table-striped w-50 text-center mx-auto">
                <tr>
                    <th class="p-2">Tarif</th>
                    <th class="p-2">Prestation</th>
                </tr>
                <?php foreach ($RevenueMoyen as $revenue): ?>
                    <tr>
                        <td><?= htmlspecialchars($revenue['prix']); ?></td>
                        <td><?= htmlspecialchars($revenue['type_prestation']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="d-none TarifGrosRevenue">
            <h5 class="text-center">Tarif pour les utilisateurs à Gros revenus.</h5>
            <table class="m-5 table table-striped w-50 text-center mx-auto">
                <tr>
                    <th class="p-2">Tarif</th>
                    <th class="p-2">Prestation</th>
                </tr>
                <?php foreach ($grosRevenue as $revenue): ?>
                    <tr>
                        <td><?= htmlspecialchars($revenue['prix']); ?></td>
                        <td><?= htmlspecialchars($revenue['type_prestation']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class=" d-none TarifVisiteur">
            <h5 class="text-center">Tarif pour les Visiteurs.</h5>
            <table class="m-5 table table-striped w-50 text-center mx-auto">
                <tr>
                    <th class="p-2">Tarif</th>
                    <th class="p-2">Prestation</th>
                </tr>
                <?php foreach ($visiteur as $revenue): ?>
                    <tr>
                        <td><?= htmlspecialchars($revenue['prix']); ?></td>
                        <td><?= htmlspecialchars($revenue['type_prestation']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
</div>
</body>
