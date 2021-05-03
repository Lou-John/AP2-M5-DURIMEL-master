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
    <h1> Inscription </h2> 
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
        <td align="right">
        <label for="mail">Mail : </label>
        </td>
    <td>
    <input type="email" placeholder ="Votre mail" id="mail" name ="email" /> 
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
    <tr>
        <td align="right">
        <label for="password2">Confirmation mot de passe : </label>
    </td>
    <td>
    <input type="password" placeholder ="Confirmation du mot de passe" id="pass2" name ="pass2" /> 
        </td>
    </tr>
    </table> 
    </br>
    <button type="submit" name="addI" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Inscription</a>

</body>
</html>

<?php 


// Vérification de la validité des informations
if(isset($_POST['addI'])){
    if($pass== $pass2){

    // Hachage du mot de passe
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];

    $req = $connexion->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
    $resultat=$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_hache,
    'email' => $email));

    if($resultat){
        $_SESSION["success"] = 'Trajet ajouté';
        }
        else{
            $_SESSION["error"] = 'Problème lors de l\'ajout du trajet';
        }
        //header('location: index.php?action=modifieTrajet');
}
else{
    ?>
    <!-- Add New -->
<div class="modal fade" id="erreur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Ajouter un nouveau trajet</h4></center>
            </div>
            <div class="modal-body">
            <div class="container-fluid">
            <form method="POST" action="?action=TrajetTraitement">
                <div class="row form-group">

                    <div class="col-sm-2">
                        <label class="control-label modal-label">id du port de depart:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="id_Port" required>
                    </div> 

                    <div class="col-sm-2">
                        <label class="control-label modal-label">id du port de d'arrivée:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="id_Port_Arrivee" required>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
<?php }

}
