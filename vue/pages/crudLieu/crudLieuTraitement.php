<?php
	//session_start();
	include_once('BDD/connectBdd.php');

	if(isset($_POST['addLieu'])){
		$nom = $_POST['nom'];
		$adresse = $_POST['adresse'];
		$codePostale = $_POST['codePostale'];
		$ville = $_POST['ville'];
		$id_Lieu = $_POST['id_Lieu'];

		$req = $connexion->prepare('INSERT INTO port (nom,adresse,codePostale,ville,id_Lieu) VALUES (:nom,:adresse,:codePostale,:ville,:id_Lieu)');
		//$req->bindParam(':pnom', $pnom, PDO::PARAM_STR);
		$resultat = $req->execute(array('nom'=>$nom,'adresse'=>$adresse,'codePostale'=>$codePostale,'ville'=>$ville,'id_Lieu'=>$id_Lieu));
		//$resultat = $req->execute();
		if($resultat){
			$_SESSION["success"] = 'Lieu ajouté';
		}
		else{
			$_SESSION["error"] = 'Problème lors de l\'ajout d\'un lieu';
		}
		header('location: index.php?action=modifieLieu');
	}
	
	if(isset($_POST['editL'])){
		$id = $_POST['id'];
		$nom = $_POST['nom'];
		$adresse = $_POST['adresse'];
		$codePostale = $_POST['codePostale'];
		$ville = $_POST['ville'];
	
				
					
		$req = $connexion->prepare('UPDATE port SET nom = :nom , adresse =:adresse , codePostale = :codePostale , ville = :ville WHERE id = :id');
		$resultat = $req->execute(array('id'=>$id,'nom'=>$nom,'adresse'=>$adresse,'codePostale'=>$codePostale,'ville'=>$ville));
		if($resultat){
			$_SESSION['success'] = 'Port modifié';
		}		
		else{
			$_SESSION['error'] = 'Problème lors de la modification du port';
		}
		header('location: index.php?action=modifieLieu');
	}
	
	if(isset($_POST['suprLieu'])){
		$id = $_POST['id'];
		$req = $connexion->prepare('DELETE FROM port WHERE id = :id ');
		$req->bindParam(':id', $id, PDO::PARAM_INT);
		$resultat = $req->execute();
		if($resultat){
			$_SESSION['success'] = 'lieu supprimé';
		}		
		else{
			$_SESSION['error'] = 'Problème lors de la suppression du lieu';
		}
		header('location: index.php?action=modifieLieu');
	}
?>