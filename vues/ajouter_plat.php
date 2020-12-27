<?php
    $page_title = "Ajouter un plat"; 
?>

<div class="container-ajout-plat">
    <div class="bloc-formulaire">
        <h1>Ajouter un plat</h1>
        <?php 
            if (isset($_SESSION['error_ajout']))
            {
        ?>
            <div class="alert alert-erreur">
                <span class="material-icons">error</span>
                <span class="message"><?= $_SESSION['error_ajout']; ?></span>
            </div>
        <?php
            unset($_SESSION['error_ajout']) ;
            }
        ?>    
        <?php 
            if (isset($_SESSION['success_ajout']))
            {
        ?>
            <div class="alert alert-succes">
                <span class="material-icons">check_circle</span>
                <span class="message"><?= $_SESSION['success_ajout']; ?></span>
            </div>
        <?php
            unset($_SESSION['success_ajout']) ;
            }
        ?>    
        <form method="POST" action="<?= BASEURL; ?>inc/traitement/ajout_plat.php">
            <div class="form-container">
                <div class="row">
                    <div class="col l12">
                        <div class="input-form">
                            <input type="text" name="nom" placeholder="Nom de votre plat">
                        </div>
                    </div>
                    <div class="col l12">
                        <div class="input-form">
                            <input type="text" name="prix" placeholder="Prix">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l12">
                        <div class="input-form">
                            <input type="text" name="heure_debut" placeholder="Heure de début">
                        </div>
                    </div>
                    <div class="col l12">
                        <div class="input-form">
                            <input type="text" name="heure_fin" placeholder="Heure de fin">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l12">
                        <div class="input-form">
                            <input type="text" name="adresse" placeholder="Adresse">
                        </div>
                    </div>
                    <div class="col l12">
                        <div class="input-form">
                            <input type="text" name="code_postal" placeholder="Code Postal">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l12">
                        <div class="input-form">
                            <input type="text" name="ville" placeholder="Ville">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-formulaire" name="submit_plat">Ajouter</button>
        </form>
    </div>
</div>