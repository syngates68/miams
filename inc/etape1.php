<div class="bloc-etape">
    <div class="etape">
        1.Informations sur le plat
    </div>
    <div class="row">
        <div class="col l12">
            <div class="input-form">
                <label for="nom">Nom de votre plat</label>
                <input type="text" name="nom" id="nom" placeholder="Exemple : Boeuf Bourguignon" <?php if (isset($_SESSION['nom'])) : ?>value="<?= $_SESSION['nom']; ?>"<?php unset($_SESSION['nom']); endif; ?>>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col l12">
            <div class="row">
                <div class="col l3 radio">
                    <input type="radio" name="type_plat" id="type_plat_1" value="1" <?php if(isset($_SESSION['type_plat']) && $_SESSION['type_plat'] == 1) : ?> checked <?php unset($_SESSION['type_plat']); endif; ?>>
                    <label for="type_plat_1">Entrée</label>
                </div>
            </div>
            <div class="row">
                <div class="col l3 radio">
                    <input type="radio" name="type_plat" id="type_plat_2" value="2" <?php if(isset($_SESSION['type_plat']) && $_SESSION['type_plat'] == 2) : ?> checked <?php unset($_SESSION['type_plat']); endif; ?>>
                    <label for="type_plat_2">Plat</label>
                </div>
            </div>
            <div class="row">
                <div class="col l3 radio">
                    <input type="radio" name="type_plat" id="type_plat_3" value="3" <?php if(isset($_SESSION['type_plat']) && $_SESSION['type_plat'] == 3) : ?> checked <?php unset($_SESSION['type_plat']); endif; ?>>
                    <label for="type_plat_3">Dessert</label>
                </div>
            </div>
        </div>
    </div>
</div>