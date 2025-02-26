<?php 
require_once '../../controller/requeteController.php';
?> 
<!--  afficher la tbale prestation dans la landing  -->
<div class="container">
        <div class="d-block TarifPetitRevenue">
        <h2 class="text-center pt-3">Tarif Par Prestations</h2>
            <table class="m-5 table table-striped w-50 text-center mx-auto">
                <tr>
                    <th class="p-2">Prestation</th>
                </tr>
                <?php foreach ($prestations as $revenue): ?>
                    <tr>
                        <td><?= htmlspecialchars($revenue['type_prestation']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
</div>