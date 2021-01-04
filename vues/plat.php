<?php
$id = explode('-', $_GET['param'])[sizeof(explode('-', $_GET['param'])) - 1];
$plat = req_plat_by_id($id);
$page_title = $plat['nom_plat'];

$debut = str_replace(':', '', $plat['heure_debut']);
$fin = str_replace(':', '', $plat['heure_fin']);

$debut = ($debut[0] != 0) ? $debut : substr($debut, 1, 3);
$fin = ($fin[0] != 0) ? $fin : substr($fin, 1, 3);

$i = 0;
$tmp = $debut;

$heures = [];

while ($tmp <= $fin)
{
    //On convertit l'entier en string
    $tmp = strval($tmp);

    $val = $tmp;
    if (strlen($val) != 4)
    {
        while (strlen($val) < 4)
        {
            $val = '0'.$val;
        }
    }

    $val = substr($val, 0, 2).':'.substr($val, 2, 2);

    $heures[$i] = $val;

    if ($tmp[strlen($tmp) - 2] == '0')
        $tmp = $tmp + 30;
    else
        $tmp = $tmp + 70;

    $i++;
}
?>

<div class="container-plat">
    <div id="commander" style="display:none;">
        <p style="font-size:12px;line-height:2em;">
            Afin de finaliser votre commande, veuillez remplir les
            champs ci-dessous.
            <br/> 
            Ces informations seront transmises au
            vendeur de ce plat.
        </p>
        <div class="form-container">
            <div class="alert alert-erreur" id="alert_commande" style="display:none;">
                <span class="material-icons">error</span>
                <span class="message"></span>
            </div>
            <form id="form_commande" action="<?= BASEURL; ?>inc/traitement/valider_commande.php" method="POST">
                <input type="hidden" name="id_plat" value="<?= $id; ?>">
                <div class="row">
                    <div class="col l6">
                        <div class="input-form">
                            <label for="quantite">Quantité souhaitée</label>
                            <input type="text" name="quantite" id="quantite">
                        </div>
                    </div>
                    <div class="col l6">
                        <div class="input-form">
                            <label for="heure">Heure souhaitée de récupération</label>
                            <select name="heure" id="heure">
                                <?php
                                for ($j = 0; $j < $i; $j++)
                                {
                                    echo '<option value="'.$heures[$j].'">'.$heures[$j].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <p style="font-size:12px;line-height:2em;">
                    L'heure souhaitée n'est indiquée qu'à titre informatif,
                    afin que le vendeur puisse s'organiser au mieux pour la
                    récupération des commandes.
                </p>
                <button class="button" name="submit_commande">Valider la commande</button>
            </form>
        </div>
    </div>
    <div class="bloc-plat">
        <div class="titre"><?= $plat['nom_plat']; ?></div>
        <div class="vendeur">Proposé par <?= $plat['vendeur']; ?> (<a href="#">contacter</a>) le <?= formate_date_heure($plat['date_publication']); ?></div>
        <button class="button commander"><span class="material-icons">shopping_cart</span>Commander</button>
        <div class="image-plat">
            <img src="<?= BASEURL; ?>assets/img/<?= $plat['photo_plat']; ?>" alt="Photo du plat">
        </div>
        <div class="informations">
            <p>Informations :</p>
            <div class="prix"><?= $plat['prix']; ?>€/unité</div>
            <div class="quantite">Reste <?= $plat['quantite']; ?></div>
            <div class="heures">Disponible de <?= $plat['heure_debut']; ?> à <?= $plat['heure_fin']; ?></div>
            <div class="adresse"><?= $plat['adresse'].' '.$plat['ville'].' '.$plat['code_postal']; ?></div>
        </div>
        <div class="informations-supplementaires">
            <p>Informations supplémentaires :</p>
            <?php
                if ($plat['informations_supplementaires'] != NULL)
                {
            ?>
                    <?= $plat['informations_supplementaires']; ?>
            <?php
                }
                else
                {
            ?>
                    <span>Aucune information supplémentaire</span>
            <?php
                }
            ?>
        </div>
        <div class="informations-supplementaires">
            <table>
                <thead>
                    <tr>
                        <th>Allergènes</th>
                        <th>Contient</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><B>Céréales contenant du gluten</B></td>
                        <td>X</td>
                    </tr>
                    <tr>
                        <td>Crustacés</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Oeufs</td>
                        <td>X</td>
                    </tr>
                    <tr>
                        <td>Poissons</td>
                        <td>X</td>
                    </tr>
                    <tr>
                        <td>Arachides</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Soja</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="alert alert-info">
            <span class="material-icons">info</span>
            <span class="message">
                Si vous êtes victimes d'allergies ou d'intolérence à un aliment, 
                n'hésitez pas à contacter le vendeur afin de savoir si le plat 
                ne représente aucun danger pour votre santé.
            </span>
        </div>
    </div>
</div>
<script>
    $('.commander').modaal({
        content_source: '#commander',
        animation_speed : 100
    });
</script>