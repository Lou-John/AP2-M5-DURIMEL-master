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
    <h1> Deconnexion </h2> 
    <br/> 
    <form method="POST" action=""> 
    <?php 
        echo 'Voulez vous vraiment vous deconnecter  ?';
    ?>
    </br>
    <button type="submit" name="addD" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Se deconnecter</a>

</body>
</html>

<?php 
if(isset($_POST['addD'])){
    
    // Suppression des variables de session et de la session
    $_SESSION = array();
    session_destroy();
    
    // Suppression des cookies de connexion automatique
    setcookie('login', '');
    setcookie('pass_hache', '');
    //header("Refresh:0");
    header("Refresh:0;");




}