<?php 
require "../Functions/ue.php";

if (isset($_GET['id']))
{
	$ue = uneUe($_GET['id']);
}

 ?>

<section class="content">
	<div class="row">
		<div class="col-md-12">

				<div class="col-md-12">
					<div class="box box-info">
						<div class="box box-header with-border">
							<h3 class="box-title">
								Ajouter  une Unite d'Enseignement
							</h3>
						</div>

						<form method="post" action="../Functions/ue.php" class="form-horizontal">
							<div class="box-body">
								<div class="form-group">
									<div class="col-sm-10">
										<input type="hidden" name="id" class="form-control" value="<?php echo isset($ue['id'])?$ue['id']:null; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="nomUe" class="col-sm-2 control-label">Nom de l'Unite d'Enseignement :</label>
									<div class="col-sm-10">
										<input type="text" name="nomUe" class="form-control" placeholder="Nom de l'Unite d'Enseignement" value="<?php echo isset($ue['nomUe'])?$ue['nomUe']:null; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label for="nbMatieres" class="col-sm-2 control-label">Nombre de matiere :</label>
									<div class="col-sm-10">
										<input type="number" name="nbMatieres" class="form-control" placeholder="Nombre de matiere" value="<?php echo isset($ue['nbMatieres'])?$ue['nbMatieres']:null; ?>" />
									</div>
								</div>

								<div class="box-footer">
									<div class="col-sm-2"></div>
									<div class="col-sm-8">
										<input type="submit" value="Ajouter une Unite Enseignement" class="btn btn-info pull-left col-lg-4">
									</div>
								</div>


							</div>
						</form>

					</div>
				</div>
			
		</div>
	</div>
</section>