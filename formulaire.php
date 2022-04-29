<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Treaitemen</title>
</head>
<body>
<?php
session_start();
if(isset($_POST['nom']) && isset($_POST['password']))
{
	    $db_nom = 'root';
    $db_password = 'mot_de_passe_bdd';
    $db_name     = 'nom_bdd';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_nom, $db_password,$db_name)
           or die('could not connect to database');
            $nom = mysqli_real_escape_string($db,htmlspecialchars($_POST['nom'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($nom !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateur where 
              nom = '.$nom."' and mot_de_passe = '
              .
              .$password."' ;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['name'] = $nom;
           header('Location: principale.php');
        }
        else
        {
           header('Location: comptes.php?erreur=1');
        }
    }
    
    	    else
    {
       header('Location: comptes.php?erreur=2');

       }
   }
else
{
   header('Location: comptes.php');
}
mysqli_close($db); // fermer la connexion
?>
</body>
</html>