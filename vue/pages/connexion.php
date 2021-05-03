<!doctype html>
<html lang="fr">
<?php
//session_start();
include_once('BDD/connectBdd.php');
?>
 
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="skin/favicon.ico" />
    <link rel="icon" href="skin/favicon_anime.gif" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="<?php echo $keywords; ?>" />
    <meta name="description" content="<?php echo $description; ?>" />
    <meta name="robots" content="index,follow,all" />
    <title><?php echo $title; ?></title>
    
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
 
</head>
 
<body>
 
    <div align="center"> 
    <h1> Connexion </h2> 
    <br/> 
    <form method="POST" action=""> 
 
    <table>
    <tr>
    <td align="right">
        <label for="pseudo">Pseudo : </label>
    </td>
    <td>
    <input type="text" placeholder ="Votre pseudo" id="pseudo" name ="pseudo" /> 
    </td>
    </tr>
    <tr>
        <td align="right" >
        <label for="password">Mot de passe : </label>
        </td>
    <td>
    <input type="password" placeholder ="Votre mot de passe" id="pass" name ="pass" /> 
    </td>
    </tr>
    
    </table> 
    </br>
    <button type="submit" name="addC" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Connexion</a>

</body>
</html>

<?php 
if(isset($_POST['addC'])){
    $pseudo = $_POST['pseudo'];

//  Récupération de l'utilisateur et de son pass hashé
$req = $connexion->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $pseudo));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($isPasswordCorrect) {
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
        echo 'Bonjour ' . $_SESSION['pseudo'];
        
        $_SESSION["success"] = 'Trajet ajouté';
	
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';

			$_SESSION["error"] = 'Problème lors de l\'ajout du trajet';
		
    }
    header("Refresh:1");
}}?>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>

