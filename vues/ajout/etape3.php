<div class="bloc-etape">
    <div class="etape">Etape 3 : De quelle heure à quelle heure, et où est-ce possible de récupérer le plat ?</div>
    <div class="row">
        <div class="col l6">
            <div class="input-form">
                <label for="heure_debut">Heure de début</label>
                <input type="text" name="heure_debut" id="heure_debut" <?php if (isset($_SESSION['heure_debut'])) : ?>value="<?= $_SESSION['heure_debut']; ?>"<?php endif; ?>>
            </div>
        </div>
        <div class="col l6">
            <div class="input-form">
                <label for="heure_fin">Heure de fin</label>
                <input type="text" name="heure_fin" id="heure_fin" <?php if (isset($_SESSION['heure_fin'])) : ?>value="<?= $_SESSION['heure_fin']; ?>"<?php endif; ?>>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col l12">
            <div class="input-form">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" <?php if (isset($_SESSION['heure_debut'])) : ?>value="<?= $_SESSION['heure_debut']; ?>"<?php endif; ?>>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col l6">
            <div class="input-form">
                <label for="code_postal">Code Postal</label>
                <input type="text" name="code_postal" id="code_postal" value="68127" readonly>
            </div>
        </div>
        <div class="col l6">
            <div class="input-form">
                <label for="ville">Ville</label>
                <input type="text" name="ville" id="ville" value="Niederhergheim" readonly>
            </div>
        </div>
    </div>
</div>