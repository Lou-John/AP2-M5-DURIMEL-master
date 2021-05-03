<?php
	//session_start();
	include_once('BDD/connectBdd.php');

?>
	
<h1 class="page-header text-center">MODIFIER PORT</h1>
	<div class="row">
		<div class="row">
		<?php
			if(isset($_SESSION['error'])){
				echo
				"
				<div class='alert alert-danger text-center'>
					<button class='close'>&times;</button>
					".$_SESSION['error']."
				</div>
				";
				unset($_SESSION['error']);
			}
			if(isset($_SESSION['success'])){
				echo
				"
				<div class='alert alert-success text-center'>
					<button class='close'>&times;</button>
					".$_SESSION['success']."
				</div>
				";
				unset($_SESSION['success']);
			}
		?>
		</div>
		<div class="row">
			<a href="#addnewL" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Ajouter</a>
		</div>
		<div class="height10">
		</div>
	</div>	
		
	<div class="row">
		<table id="myTable" class="table table-bordered table-striped">
			<thead>
				<th> Nom port </th>
				<th>adresse</th>
				<th>codePostale</th>
				<th>Ville </th>
				<th> Nom du lieu </th>
				<th>Id du lieu <th>
				<th>Action</th>
			</thead>
			<tbody>
            <?php
            
            include_once('BDD/connectBdd.php');
            $SQL = "SELECT port.id as 'pid', port.nom as 'pnom' ,adresse, codePostale, ville ,id_Lieu, lieu.nom as 'lnom' FROM lieu INNER JOIN port ON port.id_Lieu = lieu.id            ";
            //$SQL= 'SELECT * FROM port';
			$stmt = $connexion->prepare($SQL);
            $stmt->execute(array()); // on passe dans le tableaux les paramètres si il y en a à fournir (aucun ici)
            $lieu = $stmt->fetchAll();
            //var_dump($lieu); // on affiche le contenu de la variable $consoles (ici un tableau php array())
            foreach ($lieu as $row){ 
                echo 
                "<tr>
					<td>".$row['pnom']."</td>
                    <td>".$row['adresse']."</td>
                    <td>".$row['codePostale']."</td>
					<td>".$row['ville']."</td>
					<td>".$row['lnom']."</td>
					<td>".$row['id_Lieu']."</td>
                    <td><a href='#editL_".$row['pid']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Modifier</a></td>
					<td><a href='#delete_".$row['pid']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Supprimer</a></td>
                </tr>";
                include('crudLieu/edit_delete_modal.php');
            }
        ?>
			</tbody>
		</table>
	</div>
<?php
	include_once('BDD/connectBdd.php');
            $SQL2 = "SELECT port.id as 'pid', port.nom as 'pnom' ,adresse, codePostale, ville ,id_Lieu, lieu.nom as 'lnom' FROM lieu INNER JOIN port ON port.id_Lieu = lieu.id            ";
            //$SQL= 'SELECT * FROM port';
			$stmt = $connexion->prepare($SQL2);
            $stmt->execute(array()); // on passe dans le tableaux les paramètres si il y en a à fournir (aucun ici)
            $lieu = $stmt->fetchAll(); ?>
	<form method="post">
	<select name="uncours">
		<option value="">--sélectionner le lieu</option>
			<? 
			foreach ($cours as $uncours) {
				$selected = "";
				if ((isset($_POST['pid'])) && ($_POST['pid']==$uncours['pid'])) {
					$selected = "selected";	
				}
				echo '<option value="'.$uncours['pid'].'" '.$selected.'>'.$uncours['lnom'].'</option>';

			}
			?>

	<input type="submit" value="Charger " title="Charger les instruments" />
</form>

</select></td></tr>
<?php include('crudLieu/add_modal.php') ?>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->
<script>
$(document).ready(function(){
	//inialize datatable
    $('#myTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function(){
    	$('.alert').hide();
    })
});
</script>


<?php
	echo '<h1 class="entry-title">Liste des cours </h1>';
	include_once('BDD/connectBdd.php');
	$SQL = "SELECT port.id as 'pid', port.nom as 'pnom' ,adresse, codePostale, ville ,id_Lieu, lieu.nom as 'lnom' FROM lieu INNER JOIN port ON port.id_Lieu = lieu.id  ORDER BY pnom";
	$stmt = $connexion->prepare($SQL);
	$stmt->execute(array()); // on passe dans le tableaux les paramètres si il y en a à fournir (ici aucun)
	$cours = $stmt->fetchall(PDO::FETCH_ASSOC); // on met le resultat de la requete dans un tableau
	//var_dump($cours); // on affiche le contenu de la variable $consoles (ici un tableau php array())
	$stmt->closeCursor(); // on ferme le curseur des résultats
?>
			
	<form method="post" action="?action=modifieLieu ">
	<select name="uncours">
		<option value="">--sélectionner votre cours</option>
			<?
			foreach ($cours as $uncours) {
				$selected = "";
				if ((isset($_POST['uncours'])) && ($_POST['uncours']==$uncours['pid'])) {
					$selected = "selected";	
				}
				echo '<option value="'.$uncours['pid'].'" '.$selected.'>'.$uncours['pnom'].'</option>';

			}
			?>

	<input type="submit" value="Charger " title="Charger les instruments" />
</form>

<select name='id_userD'>
<?

$SQL = "SELECT port.id as 'pid', port.nom as 'pnom' ,adresse, codePostale, ville ,id_Lieu, lieu.nom as 'lnom' FROM lieu INNER JOIN port ON port.id_Lieu = lieu.id  ORDER BY pnom";
$result=mysql_query($SQL);
while($i=mysql_fetch_array($result))
{
$categorie=$i[ ];
$id_cate=$i[id_users];
?>
<option value="<? echo "$id_cate"; ?>"><? echo "$categorie"; ?></option>
<?
}
?>
</select>