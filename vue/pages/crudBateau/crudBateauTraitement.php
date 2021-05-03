<?php
	//session_start();
	include_once('BDD/connectBdd.php');


	if(isset($_POST['add'])){
        $nom = $_POST['nom'];
		$longueur = $_POST['longueur'];
		$largeur = $_POST['largeur'];
        $vitesse = $_POST['vitesse'];
        $nbpassager = $_POST['nbPassager'];
        $nbvehicule = $_POST['nbVehicule'];

        $req = $connexion->prepare('INSERT INTO bateau (nom,longueur,largeur,vitesse,nbPassager,nbVehicule) VALUES (:nom,:longueur,:largeur,:vitesse,:nbPassager,:nbVehicule)');
        //$req->bindParam(':nom', $nom, PDO::PARAM_STR);
		

        $resultat = $req->execute(array('nom'=>$nom,'longueur'=>$longueur,'largeur'=>$largeur,'vitesse'=>$vitesse,'nbPassager'=>$nbpassager,'nbVehicule'=>$nbvehicule));
        if($resultat){
			$_SESSION["success"] = 'Bateau ajouté';
		}
		else{
			$_SESSION["error"] = 'Problème lors de l\'ajout du bateau';
		}
		header('location: index.php?action=modifieBateau');
	}
	
	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$nom = $_POST['nom'];
		$longueur = $_POST['longueur'];
		$largeur = $_POST['largeur'];
        $vitesse = $_POST['vitesse'];
        $nbpassager = $_POST['nbPassager'];
        $nbvehicule = $_POST['nbVehicule'];

		$req = $connexion->prepare('UPDATE bateau SET nom = :nom , longueur = :longueur , largeur = :largeur , vitesse = :vitesse , nbPassager = :nbPassager , nbVehicule = :nbVehicule WHERE id = :id');
		/*$req->bindParam(':nom', $nom, PDO::PARAM_STR);
		$req->bindParam(':id', $id, PDO::PARAM_INT);
		$resultat = $req->execute();*/
		$resultat = $req->execute(array('id'=>$id,'nom'=>$nom,'longueur'=>$longueur,'largeur'=>$largeur,'vitesse'=>$vitesse,'nbPassager'=>$nbpassager,'nbVehicule'=>$nbvehicule));


		if($resultat){
			$_SESSION['success'] = 'Bateau modifié';
		}		
		else{
			$_SESSION['error'] = 'Problème lors de la modification du bateau';
		}
		header('location: index.php?action=modifieBateau');
	}
	
	if(isset($_POST['supr'])){
		$id = $_POST['id'];
		$req = $connexion->prepare('DELETE FROM bateau WHERE id = :id ');
		$req->bindParam(':id', $id, PDO::PARAM_INT);
		$resultat = $req->execute();
		if($resultat){
			$_SESSION['success'] = 'Bateau supprimé';
		}		
		else{
			$_SESSION['error'] = 'Problème lors de la suppression du bateau';
		}
		header('location: index.php?action=modifieBateau');
	}
?>