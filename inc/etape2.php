<div class="bloc-etape">
    <div class="etape">
        2.Informations sur la vente
    </div>
    <div class="row">
        <div class="col l6">
            <div class="input-form">
                <label for="heure_debut">Heure de début</label>
                <select name="heure_debut" id="heure_debut">
                    <?php
                    $heure = 0;
                    $minutes = 0;

                    for ($i = 0; $i <= 23; $i++)
                    {
                        for ($j = 0; $j <= 1; $j++)
                        {
                            $selected = '';

                            $heure = $i;
                            if ($i < 10)
                                $heure = '0'.$i;
                            
                            $minutes = '00';
                            if ($j == 1)
                                $minutes = '30';

                            if (isset($_SESSION['heure_debut']) && $_SESSION['heure_debut'] == $heure.':'.$minutes)
                            {
                                $selected = 'selected';
                                unset($_SESSION['heure_debut']);
                            }
                            
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

                    for ($i = 0; $i <= 23; $i++)
                    {
                        for ($j = 0; $j <= 1; $j++)
                        {
                            $selected = '';

                            $heure = $i;
                            if ($i < 10)
                                $heure = '0'.$i;
                            
                            $minutes = '00';
                            if ($j == 1)
                                $minutes = '30';

                            if (isset($_SESSION['heure_fin']) && $_SESSION['heure_fin'] == $heure.':'.$minutes)
                            {
                                $selected = 'selected';
                                unset($_SESSION['heure_fin']);
                            }
                            
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
                <input type="text" name="adresse" id="adresse" <?php if (isset($_SESSION['adresse'])) : ?>value="<?= $_SESSION['adresse']; ?>"<?php unset($_SESSION['adresse']); endif; ?>>
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
    <div class="row">
        <div class="col l6">
            <div class="input-form">
                <label for="prix">Prix</label>
                <input type="text" name="prix" id="prix" <?php if (isset($_SESSION['prix'])) : ?>value="<?= $_SESSION['prix']; ?>"<?php unset($_SESSION['prix']); endif; ?>>
            </div>
        </div>
        <div class="col l6">
            <div class="input-form">
                <label for="quantite">Quantité</label>
                <input type="text" name="quantite" id="quantite" <?php if (isset($_SESSION['quantite'])) : ?>value="<?= $_SESSION['quantite']; ?>"<?php unset($_SESSION['quantite']); endif; ?>>
            </div>
        </div>
    </div>
</div>