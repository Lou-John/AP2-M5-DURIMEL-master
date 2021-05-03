<?php
	//session_start();
	include_once('BDD/connectBdd.php');


	if(isset($_POST['addT'])){
		$id_Port = $_POST['id_Port'];
		$id_Port_Arrivee = $_POST['id_Port_Arrivee'];


        $req = $connexion->prepare('INSERT INTO trajet (id_Port,id_Port_Arrivee ) VALUES (:id_Port,:id_Port_Arrivee)');
        //$req->bindParam(':nom', $nom, PDO::PARAM_STR);
		

        $resultat = $req->execute(array('id_Port'=>$id_Port,'id_Port_Arrivee'=>$id_Port_Arrivee));
        if($resultat){
			$_SESSION["success"] = 'Trajet ajouté';
		}
		else{
			$_SESSION["error"] = 'Problème lors de l\'ajout du trajet';
		}
		header('location: index.php?action=modifieTrajet');
	}
	
	if(isset($_POST['editT'])){
		$id = $_POST['id'];

		$id_Port = $_POST['id_Port'];
		$id_Port_Arrivee = $_POST['id_Port_Arrivee'];

		$req = $connexion->prepare('UPDATE trajet SET id_Port = :id_Port , id_Port_Arrivee = :id_Port_Arrivee');
		/*$req->bindParam(':nom', $nom, PDO::PARAM_STR);
		$req->bindParam(':id', $id, PDO::PARAM_INT);
		$resultat = $req->execute();*/
		$resultat = $req->execute(array('id_Port'=>$id_Port,'id_Port_Arrivee'=>$id_Port_Arrivee));


		if($resultat){
			$_SESSION['success'] = 'Trajet modifié';
		}		
		else{
			$_SESSION['error'] = 'Problème lors de la modification du trajet';
		}
		header('location: index.php?action=modifieTrajet');
	}
	
	if(isset($_POST['supr'])){
		$id = $_POST['id'];
		$req = $connexion->prepare('DELETE FROM trajet WHERE id = :id ');
		$req->bindParam(':id', $id, PDO::PARAM_INT);
		$resultat = $req->execute();
		if($resultat){
			$_SESSION['success'] = 'Trajet supprimé';
		}		
		else{
			$_SESSION['error'] = 'Problème lors de la suppression du trajet';
		}
		header('location: index.php?action=modifieTrajet');
	}
?>