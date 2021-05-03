		
<div class="row">
		<table id="myTable" class="table table-bordered table-striped">
			<thead>
                <th> id du trajet </th>
				<th> nom du port de depart </th>
                <th> nom du port d'arrivée </th>
				<th> durée </th>

			</thead>
			<tbody>
            <?php
            
            include_once('BDD/connectBdd.php');

				
					$SQL = "SELECT * FROM trajet";
                    $stmt = $connexion->prepare($SQL);
                    $stmt->execute(array()); // on passe dans le tableaux les paramètres si il y en a à fournir (aucun ici)
                    $lieu = $stmt->fetchAll();
                    foreach ($lieu as $row){
                        $SQL2 = "SELECT port.nom FROM port WHERE port.id = ".$row['id_Port']."";
                        $stmt2 = $connexion->prepare($SQL2);
                        $stmt2->execute(array());
                        $portDepart = $stmt2->fetch();
                        $SQL3 = "SELECT port.nom FROM port WHERE port.id = ".$row['id_Port_Arrivee']."";
                        $stmt3 = $connexion->prepare($SQL3);
                        $stmt3->execute(array());
                        $portArrivee = $stmt3->fetch();



                        $SQL4 = "SELECT * FROM utiliser WHERE id_Trajet = ".$row['id']."";
                        $stmt4 = $connexion->prepare($SQL4);
                        $stmt4->execute(array());
                        $duree = $stmt4->fetch();
                echo 

                "<tr>
					<td>".$row['id']."</td>
					<td>".$portDepart['nom']."</td>
					<td>".$portArrivee['nom']."</td>
					<td>".$duree['duree']."</td>

                </tr>";
            }
        ?>
			</tbody>
		</table>
	</div>
