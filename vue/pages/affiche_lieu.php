
<div class="Unlieu">
<table id="myTable" class="table table-bordered table-striped">
    <thead>
        
        <th> Nom port </th>
        <th>adresse</th>
        <th>codePostale</th>
        <th>Nom lieu</th>
    </thead>
    <tbody>
        <?php
            
            include_once('BDD/connectBdd.php');
            $SQL = "SELECT port.id as 'pid', port.nom as 'pnom' ,adresse, codePostale, ville , lieu.nom as 'lnom' FROM lieu INNER JOIN port ON port.id_Lieu = lieu.id            ";
            //$SQL = "SELECT * FROM port join lieu on lieu.id=id_Lieu";

            $stmt = $connexion->prepare($SQL);
            $stmt->execute(array()); // on passe dans le tableaux les paramètres si il y en a à fournir (aucun ici)
            $lieu = $stmt->fetchAll();
            //var_dump($lieu); // on affiche le contenu de la variable oui oui$consoles (ici un tableau php array())
            foreach ($lieu as $row){
                echo 
                "<tr>
                    <td>".$row['pnom']."</td>
                    <td>".$row['adresse']."</td>
                    <td>".$row['codePostale']."</td>
                    <td>".$row['lnom']."</td>
                    
                </tr>";
                //include('crudBateau/edit_delete_modal.php');
            }
        ?>
    </tbody>
</table>
</div>


