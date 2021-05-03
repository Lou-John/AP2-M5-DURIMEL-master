<!-- Edit -->
<div class="modal fade" id="editL_<?php echo $row['pid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Modifier bateau</h4></center>
            </div>
            <div class="modal-body">
				<form method="POST" action="?action=lieuTraitement">
					<div class="container-fluid">
						<input type="hidden" class="form-control" name="id" value="<?php echo $row['pid']; ?>">
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">nom du port :</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nom" value="<?php echo $row['pnom']; ?>">
							</div>
							<div class="col-sm-2">
								<label class="control-label modal-label">adresse:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="adresse" value="<?php echo $row['adresse']; ?>">
							</div>

							<div class="col-sm-2">
								<label class="control-label modal-label">code postale:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="codePostale" value="<?php echo $row['codePostale']; ?>">
							</div>

							
							<div class="col-sm-2">
								<label class="control-label modal-label">Ville:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="ville" value="<?php echo $row['ville']; ?>">
							</div>

				
						</div>
					</div> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
					<button type="submit" name="editL" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Modifier</a>
				</div>
			</form>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['pid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" pid="myModalLabel">Supprimer le lieu</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Etes-vous sure de vouloir supprimer le lieu ? <?php echo $row['pnom']; ?></p>
			</div>
            <div class="modal-footer">
				<form method="POST" action="?action=lieuTraitement">
					<input type="hidden" class="form-control" name="id" value="<?php echo $row['pid']; ?>">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
					<button type="submit" name="suprLieu" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Oui</a>
				</form>
            </div>

        </div>
    </div>
</div>