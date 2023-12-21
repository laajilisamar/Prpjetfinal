

<html>
<section>
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;&nbsp; &nbsp; </button>
                <center><h4 class="modal-title" id="myModalLabel"> AjouterProf</h4></center>
            </div>
			
            <div class="modal-body">
			<div class="container-fluid">

			<form method="POST" action="add.php">

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">NumRatV:</label>
					</div>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="NumRatV" required  min="0">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">MatProf:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="MatProf" required>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">DateRat:</label>
					</div>
					<div class="col-sm-10">
						<input type="datetime-local" class="form-control" name="DateRat" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Seance:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Seance" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Session:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Session" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Salle:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Salle" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Jour:</label>
					</div>
					<div class="col-sm-10">
					<select type="Datetime" name="Jour" class="form-control" name="Jour" required>
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
						<input type="text" class="form-control" name="CodeClasse" required min="0">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">CodeMatiere:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="CodeMatiere" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Etat:</label>
					</div>
					<div class="col-sm-10">
					<select type="text" name="Etat"  class="form-control" name="Etat" required>
       				 <option value="valideé" name="Etat">Valideé</option>
        			<option value="annuler" name="Etat">Annuler</option>
   				   </select>
					</div>
				</div>
				

            </div> 
			</div> 

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler
                </button>

                <button type="submit" name="add" class="btn btn-primary">
                	<span class="glyphicon glyphicon-floppy-disk"></span> Ajouter</a>

			    </form>
            </div>

        </div>
    </div>
</div>



</section>
</html>