<?php
    $page_title = "Ajouter un plat";
    if (isset($_SESSION['utilisateur']))
    {
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
                <form method="POST" action="<?= BASEURL; ?>inc/traitement/ajout_plat.php" enctype="multipart/form-data">
                    <div class="form-container">
                        <?php 
                            include('./inc/etape1.php');
                            include('./inc/etape2.php');
                            include('./inc/etape3.php');
                            include('./inc/etape4.php');
                        ?>
                    </div>
                    <button class="btn-ajouter-plat" name="submit_plat">Ajouter</button>
                </form>
            </div>
        </div>

<?php
    }
    else
    {
        $_SESSION['error_connexion'] = "Vous devez être connecté afin d'accéder à cette page.";
        header('Location:'.BASEURL.'connexion.html');
        exit;
    }
?>