
<div class="modal fade" id="update_<?php echo $ligne['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center><h4 class="modal-title" id="myModalLabel">Modifier  Volontaire</h4></center>
            </div>
            <div class="modal-body">
		
			<div class="container-fluid">
	
			<form method="POST" action="update.php">
			
				<input type="hidden" class="form-control" name="id" value="<?php echo $ligne['id']; ?>" min="0">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">NumRatV:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="NumRatV" value="<?php echo $ligne['NumRatV']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">MatProf:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="MatProf" value="<?php echo $ligne['MatProf']; ?>">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">DateRat:</label>
					</div>
					<div class="col-sm-10">
						<input type="datetime-local" class="form-control" name="DateRat" value="<?php echo $ligne['DateRat']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Seance:</label>
					</div>
					<div class="col-sm-10">
						<input type="Datetime" class="form-control" name="Seance" value="<?php echo $ligne['Seance']; ?>">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Session:</label>
					</div>
					<div class="col-sm-10">
						<input type="Datetime" class="form-control" name="Session" value="<?php echo $ligne['Session']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Salle:</label>
					</div>
					<div class="col-sm-10">
						<input type="Datetime" class="form-control" name="Salle" value="<?php echo $ligne['Salle']; ?>">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Jour:</label>
					</div>
					<div class="col-sm-10">
					<select type="Datetime" name="Jour" class="form-control" name="Jour" required>value="<?php echo $ligne['Jour']; ?>"
        <option value="Lundi">Lundi</option>
        <option value="mardi">mardi</option>
        <option value="mercredi">mercredi</option>
        <option value="jeudi">jeudi</option>
        <option value="vendredi">vendredi</option>
        <option value="samedi">samedi</option>
        <option value="dimanche">dimanche</option>
      </select>
						
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">CodeClasse:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="CodeClasse" value="<?php echo $ligne['CodeClasse']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">CodeMatiere:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="CodeMatiere" value="<?php echo $ligne['CodeMatiere']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Etat:</label>
					</div>
					<div class="col-sm-10">
					<select><option value="<?php "' . $Etat . '">' . $etat .'?>">Annuler</option>
					<option value="<?php "' . $Etat . '">' . $etat .'?>">Valide</option>
						
						
						</select>
					</div>
				</div>




            </div>
			</div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                <button type="submit" name="update" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Modifier</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $ligne['id']; ?>"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Supprimer  Volontaire</h4></center>
            </div>
            <div class="modal-body">
            	<p class="text-center"> sûr!!!</p>
				<h2 class="text-center">id<?php echo $ligne['id'].' NumRatV'.$ligne['NumRatV']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                <a href="delete.php?id=<?php echo $ligne['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> supprimer</a>
            </div>

        </div>
    </div>
</div>
