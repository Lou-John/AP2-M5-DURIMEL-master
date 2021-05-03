<?php
	session_start();
	include_once('BDD/connectBdd.php');
?>

<?php
	/* Détermination du nom de la page à charger après vérification de sa validité */
	$cheminPagesAffiche = "pages/"; 
	$title = "Compagnie Oceane";
	$keywords = "";
	$description = "";
	
	/* choix de la valeur de la variable $affiche en fonction de parametre page transmis */
	$affiche = "lostinspace.php";

	if (!isset($_GET['action'])){
		$affiche = "presentation.php";
	} 
	else {
		if (isset($_SESSION['id']) && isset($_SESSION['pseudo']))
		{
		switch ($_GET['action']) {
			case (""):

				case ("accueil"):
				$affiche = "presentation.php";
				$title = "Compagnie Océane - Accueil";
				$keywords = "accueil compagnie Océane";
				$description = "page d'accueil de la Compagnie Océane";
				break;
			case ("afficheLieu"):
				$affiche = "affiche_lieu.php";
				break;
			case ("modifieLieu"):
				$affiche = "crudLieu.php";
				break;
			case ("afficheBateau"):
				$affiche = "visuBateau.php";
				break;
			case ("modifieBateau"):
				$affiche = "crudBateau.php";
				break;
			
			case ("modifieTrajet"):
				$affiche = "crudTrajet.php";
				break;

			case ("TrajetTraitement"):
				$affiche = "crudTrajet/crudTrajetTraitement.php";
				break;

			case ("afficheTarif"):
				$affiche = "affiche_tarif.php";
				break;
	

			case ("bateauTraitement"):
				$affiche = "crudBateau/crudBateauTraitement.php";
				break;
			case ("lieuTraitement"):
				$affiche = "crudLieu/crudLieuTraitement.php";
				break;	

			case ("inscription"):
				$affiche = "inscription.php";
				break;
	
			case ("connexion"):		
				$affiche = "presentation.php";
					break;
		
			case ("deconnexion"):
				$affiche = "deconnexion.php";
				break;
			
				default:
				$affiche = "lostinspace.php";
			}}
	else 
{
switch ($_GET['action']) {
			case (""):

				case ("accueil"):
				$affiche = "presentation.php";
				$title = "Compagnie Océane - Accueil";
				$keywords = "accueil compagnie Océane";
				$description = "page d'accueil de la Compagnie Océane";
				break;	
				case ("afficheLieu"):
					$affiche = "affiche_lieu.php";
					break;
				case ("modifieLieu"):
					$affiche = "erreur_connexion.php";
					break;
				case ("afficheBateau"):
					$affiche = "visuBateau.php";
					break;
				case ("modifieBateau"):
					$affiche = "erreur_connexion.php";
					break;
				
				case ("modifieTrajet"):
					$affiche = "erreur_connexion.php";
					break;
	
				case ("TrajetTraitement"):
					$affiche = "erreur_connexion.php";
					break;
	
				case ("afficheTarif"):
					$affiche = "affiche_tarif.php";
					break;
		
	
				case ("bateauTraitement"):
					$affiche = "erreur_connexion.php";
					break;
				case ("lieuTraitement"):
					$affiche = "erreur_connexion.php";
					break;	
	
				case ("inscription"):
					$affiche = "inscription.php";
					break;
		
				case ("connexion"):		
					$affiche = "connexion.php";
						break;
				
				case ("deconnexion"):		
					$affiche = "presentation.php";
						break;
					default:
					$affiche = "lostinspace.php";
	}
		
	}
}
    /* concatenation du chemin du dossier contenant les pages avec le contenu de $affiche */
    $affiche = $cheminPagesAffiche . $affiche; 
?>
