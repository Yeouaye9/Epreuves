<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
    </head>
    <?php include("pap.php"); ?>
    <body style='background:#fff;'>
        <div id="content">
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if($_SESSION['nom'] !== ""){
                    $nom = $_SESSION['nom'];
                    // afficher un message
                    echo "Bonjour $nom, vous êtes connecté";
                }
            ?>
            
        </div>
    </body>
</html>