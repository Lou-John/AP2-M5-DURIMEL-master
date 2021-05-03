<!-- Add New -->
<div class="modal fade" id="addnewT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Ajouter un nouveau trajet</h4></center>
            </div>
            <div class="modal-body">
            <div class="container-fluid">
            <form method="POST" action="?action=TrajetTraitement">
                <div class="row form-group">

                    <div class="col-sm-2">
                        <label class="control-label modal-label">id du port de depart:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="id_Port" required>
                    </div> 

                    <div class="col-sm-2">
                        <label class="control-label modal-label">id du port de d'arrivée:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="id_Port_Arrivee" required>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                <button type="submit" name="addT" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Enregistrer</a>
            </form>
            </div>

        </div>
    </div>
</div>


           