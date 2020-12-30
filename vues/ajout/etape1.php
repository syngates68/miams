<div class="bloc-etape">
    <div class="etape">Etape 1 : Quel est le nom de votre plat ?</div>
    <div class="explication">
        Soyez le plus précis possible sans pour autant donner trop
        de détails. Par exemple "Pizza aux champignons" sera plus
        intéressant que simplement "Pizza".
    </div>
    <div class="row">
        <div class="col l12">
            <div class="input-form">
                <label for="nom">Nom de votre plat</label>
                <input type="text" name="nom" id="nom" <?php if (isset($_SESSION['nom'])) : ?>value="<?= $_SESSION['nom']; ?>"<?php endif; ?>>
            </div>
        </div>
    </div>
</div>