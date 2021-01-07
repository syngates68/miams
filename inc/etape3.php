<div class="bloc-etape">
    <div class="bloc-etape-gauche">
        <div class="etape">Etape 3</div>
    </div>
    <div class="bloc-etape-droit">
        <div class="row">
            <div class="col l6">
                <div class="input-form">
                    <label for="prix">Prix</label>
                    <input type="text" name="prix" id="prix" <?php if (isset($_SESSION['prix'])) : ?>value="<?= $_SESSION['prix']; ?>"<?php endif; ?>>
                </div>
            </div>
            <div class="col l6">
                <div class="input-form">
                    <label for="quantite">Quantité</label>
                    <input type="text" name="quantite" id="quantite" <?php if (isset($_SESSION['quantite'])) : ?>value="<?= $_SESSION['quantite']; ?>"<?php endif; ?>>
                </div>
            </div>
        </div>
    </div>
</div>