<div class="bloc-etape">
    <div class="etape">Etape 4 : A combien souhaiteriez-vous vendre votre plat et de quelle quantité disposez vous ?</div>
    <div class="explication">
        La quantité est définie en fonction du nombre de parts/assiettes
        pouvant être vendues, et le prix est définie en fonction
        d'une part/assiette.
    </div>
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