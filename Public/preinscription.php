<?php 
	$title = 'Preinscription' ;
	$stylesheets = "<link rel='stylesheet' type='text/css' href='../dist/mycss/preinscription.css'/>";
	$etatP='active';
	$scripts = "<script type='text/javascript' src='../dist/myjs/preinscription.js'></script>";
	require_once('../includes/header.php');
	require_once('../includes/basenav.php');
 ?>

<br/><br/><br/>

<div class="container col-xs-10 col-xs-offset-1 preinscriptioncontent">
		
	<div class="row header">
		<div class="col-xs-6 text-left">
			<h3>Université Cheikh Anta Diop de Dakar</h3>
			<div class="row col-xs-6 text-center">
				<img class="img-responsive img-circle mini " src="../dist/img/logo_ucad.png" />
			</div>
		</div>
		<div class="col-xs-6 text-right">
			<h3><span class="label label-primary">Année Universitaire 2016-2017</span></h3>
		</div>
		<div>
			
		</div>
	</div><!--row header-->

	<div class="row text-center">
		<h3><span class="label label-success">DOSSIER D'INSCRIPTION ADMINISTRATIVE</span></h3>
		<br/><br/>
	</div><!--row titre-->

	<hr>
	<br>
	
	<div class="row col-md-12 col-md-offset-0">
		
		<div class="panel with-nav-tabs panel-info panel-content">
            <div class="panel-heading clearfix">
                <!--<div class="pull-left">
                    <h1 class="panel-title">Title</h1>
                </div>-->
                <div class="pull-right">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1primary" data-toggle="tab">Etat Civil</a></li>
                        <li><a href="#tab2primary" data-toggle="tab">Adresse</a></li>
                        <li><a href="#tab3primary" data-toggle="tab">Emploi-Famille</a></li>
                        <li><a href="#tab4primary" data-toggle="tab">Inscription Annuelle</a></li>
                        <li><a href="#tab5primary" data-toggle="tab">Bourses</a></li>
                        <li><a href="#tab6primary" data-toggle="tab">Curriculum</a></li>
                        <li><a href="#tab7primary" data-toggle="tab">Responsable</a></li>
                        <li><a href="#tab8primary" data-toggle="tab">Visite Medicale</a></li>
                   
                    </ul>
                </div>
            </div>


            <div class="panel-body">
                <div class="tab-content">
                    
                    <div class="tab-pane fade in active" id="tab1primary">         
                        <form method="POST" class="form" id="form1" role="form">
							<div class="form-group col-xs-6">
								<input type="text" name="ine" placeholder="Ine" class="form-control">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="cni" placeholder="Cni" class="form-control">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="prenom" placeholder="Prénom" class="form-control">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="nom" placeholder="Nom" class="form-control">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<label class="col-xs-6 control-label text-right" for="dateNaiss">Date de Naissance :</label>
								<div class="col-xs-6">
			    						<input  name="dateNaiss" class="form-control" type="date" required="required" onblur='valide_date()'></input>
								</div>
							</div>
							<div class="form-group col-xs-6">
								<label class="col-xs-6 control-label" for="sexe">Sexe :</label>
								<div class="col-xs-6">
									<select class="form-control" name="sexe">
										<option value="-1" selected>Votre Sexe</option>
										<option value="Masculin" >Masculin</option>
										<option value="Masculin" >Feminin</option>
									</select>
								</div>
							</div>
							<div class="form-group col-xs-6 ">
								<input type="text" name="lieuNaiss" placeholder="Lieu de Naissance" class="form-control">
								<br/>
							</div>

							<div class="form-group col-xs-6">
								<input type="text" name="regionNaiss" placeholder="Region de Naissance" class="form-control">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="paysNaiss" placeholder="Pays de Naissance" class="form-control">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="nationalite" placeholder="Nationalite" class="form-control">
								<br/>
							</div>
						</form>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pull-right">
                                    <button class="btn btn-default next-tab" type="button"><span class="glyphicon glyphicon-chevron-right"></span> Suivant</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="tab2primary">                       
                    	<form class="form" form="form1" role="form">
							<div class="form-group col-xs-12 ">
								<input type="text" name="email" placeholder="Email" class="form-control">
								<br/>
							</div>
							<div class="form-group col-xs-12">
								<input type="text" name="numTel" placeholder="Numero de Telephone" class="form-control">
								<br/>
							</div>
							<div class="form-group col-xs-12">
								<input type="text" name="boitePostale" placeholder="Boite Postale" class="form-control">
								<br/>
							</div>
							<div class="form-group col-xs-12">
								<input type="text" name="ville" placeholder="Adresse" class="form-control">
								<br/>
							</div>
						</form>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pull-right">
                                    <button class="btn btn-default previous-tab" type="button"><span class="glyphicon glyphicon-chevron-left"></span> Precedent</button>
                                    <button class="btn btn-default next-tab" type="button"><span class="glyphicon glyphicon-chevron-right"></span> Suivant</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="tab3primary">                        
                        <form class="form" form="form1" role="form">
                        	<div class="form-group col-xs-6">
								<label class="col-xs-6 control-label" for="Statut">Statut Etudiant :</label>
								<div class="col-xs-6">
									<select class="form-control" name="statut">
										<option value="-1" selected>Votre Statut</option>
										<option value="Regime Normal" >Regime Normal</option>
										<option value="Regime Salarie" >Regime Salarie</option>
										<option value="Regime Particulier" >Regime Particulier</option>
										<option value="Mise en Position de Stage" >Mise en Position de Stage</option>
									</select>
								</div>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="categorieSocioPro" placeholder="Categorie SocioProfessionnelle" class="form-control">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<label class="col-xs-6 control-label" for="situationFamiliale">Situation Familiale :</label>
								<div class="col-xs-6">
									<select class="form-control" name="situationFamiliale">
										<option value="Celibataire" selected>Celibataire</option>
										<option value="Marie" >Marie</option>
										<option value="Mariee" >Mariee</option>
										<option value="Divorce" >Divorce</option>
										<option value="Divorcee" >Divorcee</option>
										<option value="Veuf" >Veuf</option>
										<option value="Veuve" >Veuve</option>
									</select>
								</div>
							</div>
							<div class="form-group col-xs-6">
								<input type="number" min="0" name="nbEnfants" placeholder="Nombre d'enfants" class="form-control">
								<br/>
							</div>
						</form>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pull-right">
                                    <button class="btn btn-default previous-tab" type="button"><span class="glyphicon glyphicon-chevron-left"></span> Previous</button>
                                    <button class="btn btn-default next-tab" type="button"><span class="glyphicon glyphicon-chevron-right"></span> Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="tab4primary">
                        
                    	<form class="form" form="form1" role="form">
							<div class="form-group col-xs-6">
								<input type="text" name="anneeEtude" placeholder="Annee d'Etude" class="form-control">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="cycle" placeholder="Cycle" class="form-control">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<label class="col-xs-6 control-label" for="departement">Departement :</label>
								<div class="col-xs-6">
									<select class="form-control" name="departement">
										<option value="Celibataire" selected>Genie Informatique</option>
										<option value="Genie Chimique" >Genie Chimique</option>
										<option value="Genie Mecanique" >Genie Mecanique</option>
										<option value="Genie Electrique" >Genie Electrique</option>								
										<option value="Genie Civil" >Genie Civil</option>
										<option value="Gestion" >Gestion</option>
									</select>
								</div>
							</div>
							<div class="form-group col-xs-6">
								<label class="col-xs-6 control-label" for="option">Option :</label>
								<div class="col-xs-6">
									<select class="form-control" name="option">
										<option value="Celibataire" selected>Informatique</option>
										<option value="Genie Chimique" >Telecoms</option>
									</select>
								</div>
							</div>
							<div class="form-group col-xs-6">
								<input type="number" min="0" max="2" name="nbInscriptAnt" placeholder="Nombre d'Inscriptions Anterieures" class="form-control">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<label class="col-xs-6 control-label" for="redouble">Redoublez-vous ?</label>
								<div class="col-xs-6">
									<select class="form-control" name="redouble">
										<option value="Non" selected>Non</option>
										<option value="Oui" >Oui</option>
									</select>
								</div>
							</div>
						</form>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pull-right">
                                    <button class="btn btn-default previous-tab" type="button"><span class="glyphicon glyphicon-chevron-left"></span> Previous</button>
                                    <button class="btn btn-default next-tab" type="button"><span class="glyphicon glyphicon-chevron-right"></span> Next</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="tab-pane fade" id="tab5primary">
                        <p>Primary 5</p>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pull-right">
                                    <button class="btn btn-default previous-tab" type="button"><span class="glyphicon glyphicon-chevron-left"></span> Previous</button>
                                    <button class="btn btn-default next-tab" type="submit"><span class="glyphicon glyphicon-chevron-ok"></span> Submit</button>
                                </div>
                            </div>
                        </div>   
                    </div>

                </div>
            </div>
		</div>



	</div>
		
		
</div><!--page container-->


<?php 
	require_once('../includes/footer.php');

?>