

<section class="content">
	<div class="row">
		<div class="col-md-12">

				<div class="col-md-12">
					<div class="box box-info">
						<div class="box box-header with-border">
							<h3 class="box-title">
								Ajouter  un chercheur
							</h3>
						</div>
						 <form method="post" action="../Public/ajouter_chercheur.php" class="form-horizontal">

							 <div class="box-body">
								 <div class="form-group">
									 <!--<div class="col-sm-10">
									 	<input type="hidden" name="id" class="form-control">
									 </div>-->
								 </div>

								 <div class="form-group">
									 <label class="col-sm-2 control-label">Nom :</label>
									 <div class="col-sm-8">
										 <input type="text" name="nom" placeholder="Nom du chercheur"  class="form-control"/>
									 </div>
								 </div>

								  <div class="form-group">
									 <label class="col-sm-2 control-label">Prénom :</label>
									 <div class="col-sm-8">
										 <input type="text" name="prenom" placeholder="Prénom du chercheur"  class="form-control"/>
									 </div>
								 </div>

								 <div class="form-group">
									 <label class="col-sm-2 control-label">Date de naissance :</label>
									 <div class="col-sm-8">
									 
										 <input type="date" name="dateNaiss" placeholder="Date de naissance" class="form-control" onkeyup="check(0,8)" />
									 </div>
								 </div>

								 <div class="form-group">
									 <label class="col-sm-2 control-label">Lieu de naissance:</label>
									 <div class="col-sm-8">
										 <input type="text" name="lieuNaiss" placeholder="Lieu de naissance" class="form-control"  />
									 </div>
								 </div>
								  <div class="form-group">
									 <label class="col-sm-2 control-label">Nationalité :</label>
									 <div class="col-sm-8">
										 <input type="text" name="nationalite" placeholder="Nationalite du chercheur"  class="form-control"/>
									 </div>
								 </div>
								  <div class="form-group">
									 <label class="col-sm-2 control-label">Email :</label>
									 <div class="col-sm-8">
										 <input type="text" name="email" placeholder="Email du chercheur"  class="form-control"/>
									 </div>
								 </div>
								  <div class="form-group">
									 <label class="col-sm-2 control-label">Numéro de téléphone :</label>
									 <div class="col-sm-8">
										 <input type="text" name="numTel" placeholder="Numéro de téléphone du chercheur"  class="form-control"/>
									 </div>
								 </div>
								  <div class="form-group">
									 <label class="col-sm-2 control-label">Nombre de publications :</label>
									 <div class="col-sm-8">
										 <input type="text" name="nbPub" placeholder="Nombre de publication du chercheur"  class="form-control"/>
									 </div>
								 </div>
							 </div>
							 <div class="box box-footer">
								 <div class="col-sm-2">
						
								 </div>
								 <div class="col-sm-8">
									 <input type="submit" value="Ajouter un chercheur" class="btn btn-info pull-left col-lg-4" >
								 </div>
						
							 </div>
						
						 </form>
					</div>
				</div>
			
		</div>
	</div>
</section>