<!--<div class="bloc-etape">
    <div class="bloc-etape-gauche">
        <div class="etape">Etape 2 : Quel est le type de plat ?</div>
        <div class="explication">
            Cela permettra de mieux faire ressortir votre plat
            dans la catégorie définie.
        </div>
    </div>
    <div class="bloc-etape-droit">
        <div class="row">
            <div class="col l12">
                <div class="row">
                    <div class="col l3 radio">
                        <input type="radio" name="type_plat" id="type_plat_1" value="1" <?php if(isset($_SESSION['type_plat']) && $_SESSION['type_plat'] == 1) : ?> checked <?php endif; ?>>
                        <label for="type_plat_1">Entrée</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col l3 radio">
                        <input type="radio" name="type_plat" id="type_plat_2" value="2" <?php if(isset($_SESSION['type_plat']) && $_SESSION['type_plat'] == 2) : ?> checked <?php endif; ?>>
                        <label for="type_plat_2">Plat</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col l3 radio">
                        <input type="radio" name="type_plat" id="type_plat_3" value="3" <?php if(isset($_SESSION['type_plat']) && $_SESSION['type_plat'] == 3) : ?> checked <?php endif; ?>>
                        <label for="type_plat_3">Dessert</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<div class="bloc-etape">
    <div class="bloc-etape-gauche">
        <div class="etape">Etape 2</div>
    </div>
    <div class="bloc-etape-droit">
        <div class="row">
            <div class="col l6">
                <div class="input-form">
                    <label for="heure_debut">Heure de début</label>
                    <select name="heure_debut" id="heure_debut">
                        <?php
                        $heure = 0;
                        $minutes = 0;
                        $selected = '';
    
                        for ($i = 0; $i <= 23; $i++)
                        {
                            for ($j = 0; $j <= 1; $j++)
                            {
                                $heure = $i;
                                if ($i < 10)
                                    $heure = '0'.$i;
                                
                                $minutes = '00';
                                if ($j == 1)
                                    $minutes = '30';
    
                                if (isset($_SESSION['heure_debut']) && $_SESSION['heure_debut'] == $heure.':'.$minutes)
                                    $selected = 'selected';
                                
                                echo '<option value="'.$heure.':'.$minutes.'" '.$selected.'>'.$heure.':'.$minutes.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col l6">
                <div class="input-form">
                    <label for="heure_fin">Heure de fin</label>
                    <select name="heure_fin" id="heure_fin">
                        <?php
                        $heure = 0;
                        $minutes = 0;
                        $selected = '';
    
                        for ($i = 0; $i <= 23; $i++)
                        {
                            for ($j = 0; $j <= 1; $j++)
                            {
                                $heure = $i;
                                if ($i < 10)
                                    $heure = '0'.$i;
                                
                                $minutes = '00';
                                if ($j == 1)
                                    $minutes = '30';
    
                                if (isset($_SESSION['heure_fin']) && $_SESSION['heure_fin'] == $heure.':'.$minutes)
                                    $selected = 'selected';
                                
                                echo '<option value="'.$heure.':'.$minutes.'" '.$selected.'>'.$heure.':'.$minutes.'</option>';
                            }
                        }
                        ?>
                    </select>
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
</div>