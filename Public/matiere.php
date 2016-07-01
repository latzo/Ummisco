<?php 
require "../Functions/ue.php";
require "../Functions/matiere.php";
$ues = allUe();


if (isset($_GET['id']))
{
	$matiere = uneMatiere($_GET['id']);
}

 ?>


<section class="content">
	<div class="row">
		<div class="col-md-12">

				<div class="col-md-12">
					<div class="box box-info">
						<div class="box box-header with-border">
							<h3 class="box-title">
								Ajouter  une Matiere
							</h3>
						</div>
						 <form method="post" action="../Functions/matiere.php" class="form-horizontal">

							 <div class="box-body">
								 <div class="form-group">
									 <div class="col-sm-10">
									 	<input type="hidden" name="id" value="<?php echo isset($matiere['id'])?$matiere['id']:null ; ?>" class="form-control">
									 </div>
								 </div>

								 <div class="form-group">
									 <label class="col-sm-2 control-label">Nom de la Matiere :</label>
									 <div class="col-sm-8">
										 <input type="text" name="nomMatiere" placeholder="Nom de la Matiere" value="<?php echo isset($matiere['nomMatiere'])?$matiere['nomMatiere']:null ; ?>" class="form-control"/>
									 </div>
								 </div>

								 <div class="form-group">
									 <label class="col-sm-2 control-label">Unite d'enseignement :</label>
									 <div class="col-sm-8">
										 <select name="id_ue" class="form-control">
											 <?php foreach($ues as $ue ) :?>
												 <option value="<?php echo $ue['id']; ?>" <?php echo isset($matiere) && $matiere['id_ue'] == $ue['id'] ?  "selected"  : null ; ?> > <?php echo $ue['nomUe']; ?> </option>
											 <?php endforeach ;?>
										 </select>
									 </div>
								 </div>

								 <div class="form-group">
									 <label class="col-sm-2 control-label">Quantum horaire :</label>
									 <div class="col-sm-8">
										 <input type="number" name="quantum" placeholder="Quantum horaire" class="form-control" value="<?php echo isset($matiere['quantum'])?$matiere['quantum']:null ; ?>" "/>
									 </div>
								 </div>

								 <div class="form-group">
									 <label class="col-sm-2 control-label">Coefficient :</label>
									 <div class="col-sm-8">
										 <input type="number" name="coefficient" placeholder="Coefficient" class="form-control" value="<?php echo isset($matiere['coefficient'])?$matiere['coefficient']:null ; ?>" />
									 </div>
								 </div>
							 </div>
							 <div class="box box-footer">
								 <div class="col-sm-2">
						
								 </div>
								 <div class="col-sm-8">
									 <input type="submit" value="Ajouter une Matiere" class="btn btn-info pull-left col-lg-4" >
								 </div>
						
							 </div>
						
						 </form>
					</div>
				</div>
			
		</div>
	</div>
</section>