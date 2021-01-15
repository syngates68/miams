<?php

$is = '';

if (isset($_SESSION['informations_supplementaires']) && $_SESSION['informations_supplementaires'] != NULL)
{
    $is = $_SESSION['informations_supplementaires'];
}

?>

<div class="bloc-etape">
    <div class="etape">
        4.Informations supplémentaires
    </div>
    <div class="row">
        <div class="col l12">
            <div class="input-form">
                <textarea name="informations_supplementaires" id="informations_supplementaires"><?= $is; ?></textarea>
            </div>
        </div>
    </div>
</div>