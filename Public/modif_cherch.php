<?php

require('../Functions/bdd.php');


$bdd = connexion();

$id=$_GET['id_cherch']; 


$req=$bdd->prepare('select * from ummisco_actor where id=:id');
$req->execute(array('id'=>$id));
$res= $req->fetch();

$req2=$bdd->prepare('select nbPublications from chercheur where actor_id=:id');
$req2->execute(array('id'=>$id));
$res2= $req2->fetch();




?>






<section class="content">
	<div class="row">
		<div class="col-md-12">

				<div class="col-md-12">
					<div class="box box-info">
						<div class="box box-header with-border">
							<h3 class="box-title">
								Modifier  un chercheur
							</h3>
						</div>
						 <form method="post" action="../Rp/modifier_cherch.php?id_cherch=<?php echo($id) ;?>" class="form-horizontal">

							 <div class="box-body">
								 <div class="form-group">
									 <!--<div class="col-sm-10">
									 	<input type="hidden" name="id" class="form-control">
									 </div>-->
								 </div>

								 <div class="form-group">
									 <label class="col-sm-2 control-label">Nom :</label>
									 <div class="col-sm-8">
										 <input type="text" name="nom" value="<?php echo($res['nom']) ;?>"  class="form-control"/>
									 </div>
								 </div>

								  <div class="form-group">
									 <label class="col-sm-2 control-label">Prénom :</label>
									 <div class="col-sm-8">
										 <input type="text" name="prenom" value="<?php echo($res['prenom']) ;?>" class="form-control"/>
									 </div>
								 </div>

								 <div class="form-group">
									 <label class="col-sm-2 control-label">Date de naissance :</label>
									 <div class="col-sm-8">
									 
										 <input type="date" name="dateNaiss" value="<?php echo($res['datNaiss']) ;?>" class="form-control" onkeyup="check(0,8)" />
									 </div>
								 </div>

								 <div class="form-group">
									 <label class="col-sm-2 control-label">Lieu de naissance:</label>
									 <div class="col-sm-8">
										 <input type="text" name="lieuNaiss" value="<?php echo($res['lieuNaiss']) ;?>" class="form-control"  />
									 </div>
								 </div>
								  <div class="form-group">
									 <label class="col-sm-2 control-label">Nationalité :</label>
									 <div class="col-sm-8">
										 <input type="text" name="nationalite" value="<?php echo($res['nationalite']) ;?>"  class="form-control"/>
									 </div>
								 </div>
								  <div class="form-group">
									 <label class="col-sm-2 control-label">Email :</label>
									 <div class="col-sm-8">
										 <input type="text" name="email" value="<?php echo($res['email']) ;?>"  class="form-control"/>
									 </div>
								 </div>
								  <div class="form-group">
									 <label class="col-sm-2 control-label">Numéro de téléphone :</label>
									 <div class="col-sm-8">
										 <input type="text" name="numTel" value="<?php echo($res['numTel']) ;?>"  class="form-control"/>
									 </div>
								 </div>
								  <div class="form-group">
									 <label class="col-sm-2 control-label">Nombre de publications :</label>
									 <div class="col-sm-8">
										 <input type="text" name="nbPub" value="<?php echo($res2['nbPublications']) ;?>"  class="form-control"/>
									 </div>
								 </div>
							 </div>
							 <div class="box box-footer">
								 <div class="col-sm-2">
						
								 </div>
								 <div class="col-sm-8">
									 <input type="submit" value="Enregistrer" class="btn btn-info pull-left col-lg-4" >
								 </div>
						
							 </div>
						
						 </form>
					</div>
				</div>
			
		</div>
	</div>
</section>