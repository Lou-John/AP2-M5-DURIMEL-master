<!-- Edit -->
<div class="modal fade" id="editT_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Modifier bateau</h4></center>
            </div>
            <div class="modal-body">
				<form method="POST" action="?action=TrajetTraitement">
					<div class="container-fluid">
						<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">id du Port de depart:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="id_Port" value="<?php echo $row['id_Port']; ?>">
							</div>
							<div class="col-sm-2">
								<label class="control-label modal-label">id du port d'arrivee:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="id_Port_Arrivee" value="<?php echo $row['id_Port_Arrivee']; ?>">
							</div>
							
							
						</div>
					</div> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
					<button type="submit" name="editT" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Modifier</a>
				</div>
			</form>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteT_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Supprimer un trajet</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Etes-vous sur	 de vouloir supprimer un trajet <?php echo $row['id']; ?></p>
			</div>
            <div class="modal-footer">
				<form method="POST" action="?action=TrajetTraitement">
					<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
					<button type="submit" name="supr" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Oui</a>
				</form>
            </div>

        </div>
    </div>
</div>
