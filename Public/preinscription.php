<script type="text/javascript">

function isEmpty(arg)
{
	if (arg=='')
	{
		return true;
	}
}

function check(deb,fin)
{
	var disabled = false;
	var inputs = document.getElementsByTagName('input'),
	inputsLength = inputs.length;
	//alert(inputs[4].value);
	for (var i = deb ; i <= fin ; i++) {

		if(i>35 && i<=39)
		{
			continue;
		}

		if(isEmpty(inputs[i].value))
		{
			disabled = true;
			break;

		}
		if(i==47)
		{
			if(inputs[i].checked == true)
			{
				disabled=false;
			}
			else
			{
				disabled=true;
			}
		}
	}
	//alert(inputs[14].name);
	if(disabled==true)
	{
		if(fin==8)
		{
			s1.disabled=true;
		}
		
		if(fin==12)
		{
			s2.disabled=true;
		}
		if(fin==14)
		{
			s3.disabled=true;
		}
		if(fin==17)
		{
			s4.disabled=true;
		}
		if(fin==19)
		{
			s5.disabled=true;
		}
		if(fin==39)
		{
			s6.disabled=true;
		}
		if(fin==45)
		{
			s7.disabled=true;
		}
		if(fin==46)
		{
			s8.disabled=true;
		}
		if(fin==47)
		{
			s9.disabled=true;
		}
	}
	else
	{
		if(fin==8)
		{
			s1.disabled=false;
		}
		
		if(fin==12)
		{
			s2.disabled=false;
		}
		if(fin==14)
		{
			s3.disabled=false;
		}
		if(fin==17)
		{
			s4.disabled=false;
		}
		if(fin==19)
		{
			s5.disabled=false;
		}
		if(fin==39)
		{
			s6.disabled=false;
		}
		if(fin==45)
		{
			s7.disabled=false;
		}
		if(fin==46)
		{
			s8.disabled=false;
		}
		if(fin==47)
		{
			s9.disabled=false;
		}

	}
	
}


</script>




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

	<hr>

	<?php
	if(isset($_GET['action']) && isset($_GET['mail']))
	{
		if($_GET['action']=="success")
		{
			?>
			<div class="col-md-12">
				<div class="box box-default">
					<div class="box-header with-border">
						<i class="fa fa-bullhorn"></i>
						<h3 class="box-title">Informations</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<!--<div class="callout callout-danger">
							<h4>I am a danger callout!</h4>
							<p>There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
						</div>-->
						<div class="callout callout-success">
							<h4>Votre Préincription a été bien prise en compte!</h4>
							<p>Veuillez suivre les prochaines étapes.</p>
						</div>
						<div class="callout callout-info">
							<h4>Prochaines étapes</h4>
							<ol>
								<li>
									<p>
										Un mail vous a ete envoye a l'adresse <?php echo $_GET['mail']; ?>
										<br>
										Veuillez suivre ce mail pour confirmer votre preinscription.
									</p>
								</li>
								<li>
									<p>
										Veuillez vous rapprocher de la scolarite afin de completer votre preinscription.
									</p>
								</li>
							</ol>
						</div>
						
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div><!-- /.col -->
	<?php
			die();
		}
	}
	?>


	<div class="row text-center">
		<h3><span class="label label-success">DOSSIER D'INSCRIPTION ADMINISTRATIVE</span></h3>
		<br/><br/>
	</div><!--row titre-->

	<hr>
	<br>
	
	<div class="row col-md-12">
		
		<div class="panel nav-tabs-custom with-nav-tabs panel-primary panel-content">

            <div class="panel-heading clearfix">
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
                   		<li><a href="#tab9primary" data-toggle="tab">Finalisation</a></li>
                    </ul>
                </div>
            </div>

            

            <div class="panel-body">
            	<form action="preinscriptionaction.php" method="POST" class="form" name="form1" enctype="multipart/form-data">

                	<div class="tab-content">  
                		<br>
                    	<div class="tab-pane fade in active" id="tab1primary">                                 
							<div class="form-group col-xs-6">
								<input type="text" name="ine" id="0" placeholder="Ine" class="form-control" onkeyup="check(0,8)" >
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="cni" id="1" placeholder="Cni" class="form-control" onkeyup="check(0,8)">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="prenom" id="2" placeholder="Prénom" class="form-control" onkeyup="check(0,8)">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="nom" id="3" placeholder="Nom" class="form-control" onkeyup="check(0,8)">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<label class="col-xs-6 control-label text-right" for="dateNaiss">Date de Naissance :</label>
								<div class="col-xs-6">
			    					<input  name="dateNaiss" id="4" class="form-control" type="date" onkeyup="check(0,8)">
								</div>
							</div>
							<div class="form-group col-xs-6">
								<label class="col-xs-6 control-label" for="sexe">Sexe :</label>
								<div class="col-xs-6">
									<select onselect="check(0,8)" class="form-control" name="sexe" >																			
										<option value="Masculin" selected>Masculin</option>
										<option value="Masculin" >Feminin</option>
									</select>
								</div>
							</div>
							<div class="form-group col-xs-6 ">
								<input type="text" name="lieuNaiss" id="5" placeholder="Lieu de Naissance" class="form-control" onkeyup="check(0,8)">
								<br/>
							</div>

							<div class="form-group col-xs-6">
								<input type="text" name="regionNaiss" id="6" placeholder="Region de Naissance" class="form-control" onkeyup="check(0,8)">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="paysNaiss" id="7" placeholder="Pays de Naissance" class="form-control" onkeyup="check(0,8)">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="nationalite" id="8" placeholder="Nationalite" class="form-control" onkeyup="check(0,8)">
								<br/>
							</div>						
	                        <div class="row">
	                            <div class="col-lg-12">
	                                <div class="pull-right">
	                                    <button class="btn btn-default next-tab" type="button" id="s1" disabled><span class="glyphicon glyphicon-chevron-right"></span> Suivant</button>
	                                </div>
	                            </div>
	                        </div>

                    	</div>
                    
                    	<div class="tab-pane fade" id="tab2primary">                                           
							<div class="form-group col-xs-12 ">
								<input type="text" name="email" placeholder="Email" class="form-control" onkeyup="check(9,12)">
								<br/>
							</div>
							<div class="form-group col-xs-12">
								<input type="text" name="numTel" placeholder="Numero de Telephone" class="form-control" onkeyup="check(9,12)">
								<br/>
							</div>
							<div class="form-group col-xs-12">
								<input type="text" name="boitePostale" placeholder="Boite Postale" class="form-control" onkeyup="check(9,12)">
								<br/>
							</div>
							<div class="form-group col-xs-12">
								<input type="text" name="ville" placeholder="Adresse" class="form-control" onkeyup="check(9,12)">
								<br/>
							</div>						
	                        <div class="row">
	                            <div class="col-lg-12">
	                                <div class="pull-right">
	                                    <button class="btn btn-default previous-tab" type="button"><span class="glyphicon glyphicon-chevron-left"></span> Precedent</button>
	                                    <button class="btn btn-default next-tab" type="button" id="s2" disabled><span class="glyphicon glyphicon-chevron-right"></span> Suivant</button>
	                                </div>
	                            </div>
	                        </div>
                    	</div>
                    
                    	<div class="tab-pane fade" id="tab3primary">                                                
                        	<div class="form-group col-xs-6">
								<label class="col-xs-6 control-label" for="Statut">Statut Etudiant :</label>
								<div class="col-xs-6">
									<select onselect="check(13,14)" class="form-control" name="statut">										
										<option value="Regime Normal" selected>Regime Normal</option>
										<option value="Regime Salarie" >Regime Salarie</option>
										<option value="Regime Particulier" >Regime Particulier</option>
										<option value="Mise en Position de Stage" >Mise en Position de Stage</option>
									</select>
								</div>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="categorieSocioPro" placeholder="Categorie SocioProfessionnelle" class="form-control" onkeyup="check(13,14)">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<label class="col-xs-6 control-label" for="situationFamiliale">Situation Familiale :</label>
								<div class="col-xs-6">
									<select onselect="check(13,14)" class="form-control" name="situationFamiliale">
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
								<input type="number" min="0" name="nbEnfants" placeholder="Nombre d'enfants" class="form-control" onkeyup="check(13,14)">
								<br/>
							</div>
						
	                        <div class="row">
	                            <div class="col-lg-12">
	                                <div class="pull-right">
	                                    <button class="btn btn-default previous-tab" type="button"><span class="glyphicon glyphicon-chevron-left"></span> Precedent</button>
	                                    <button class="btn btn-default next-tab" type="button" id="s3" disabled><span class="glyphicon glyphicon-chevron-right"></span> Suivant</button>
	                                </div>
	                            </div>
	                        </div>
                    	</div>
                    
                    	<div class="tab-pane fade" id="tab4primary">
                                            	
							<div class="form-group col-xs-6">
								<input type="text" name="anneeEtude" placeholder="Annee d'Etude" class="form-control" onkeyup="check(15,17)">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="cycle" placeholder="Cycle" class="form-control" onkeyup="check(15,17)">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<label class="col-xs-6 control-label" for="departement">Departement :</label>
								<div class="col-xs-6">
									<select class="form-control" name="departement">
										<option value="Genie Informatique" selected>Genie Informatique</option>
										<option value="Genie Chimique" >Genie Chimique</option>
										<option value="Genie Mecanique" >Genie Mecanique</option>
										<option value="Genie Electrique" >Genie Electrique</option>								
										<option value="Genie Civil" >Genie Civil</option>
										<option value="Gestion" >Gestion</option>
									</select>
								</div>
								<br>
							</div>							
							<div class="form-group col-xs-6">
								<label class="col-xs-6 control-label" for="option">Option :</label>
								<div class="col-xs-6">
									<select class="form-control" name="option">
										<option value="Informatique" selected>Informatique</option>
										<option value="Genie Chimique" >Telecoms</option>
									</select>
								</div>
								<br>
							</div>		
							<br>
							<br>					
							<div class="form-group col-xs-6">
								<input type="number" min="0" max="2" name="nbInscriptAnt" placeholder="Nombre d'Inscriptions Anterieures" class="form-control" onkeyup="check(15,17)">
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
								<br>
							</div>

	                        <div class="row">
	                            <div class="col-lg-12">
	                                <div class="pull-right">
	                                    <button class="btn btn-default previous-tab" type="button"><span class="glyphicon glyphicon-chevron-left"></span> Precedent</button>
	                                    <button class="btn btn-default next-tab" type="button" id="s4" disabled><span class="glyphicon glyphicon-chevron-right"></span> Suivant</button>
	                                </div>
	                            </div>
	                        </div>

                    	</div>
                    
                    	<div class="tab-pane fade" id="tab5primary">                        
							<div class="form-group col-xs-12">
								<label class="col-xs-6 control-label" for="statutBourse">Statut Bourse :</label>
								<div class="col-xs-6">
									<select onselect="check(18,19)" class="form-control" name="statutBourse">
										<option value="Boursier" selected>Boursier</option>
										<option value="Non Boursier" >Non Boursier</option>
										<option value="Etranger" >Etranger</option>
										<option value="Etranger Exonere" >Etranger Exonere</option>
									</select>
								</div>
								<br/>
							</div>							
							<div class="form-group col-xs-12">
								<label class="col-xs-6 control-label" for="natureBourse">Nature Bourse :</label>
								<div class="col-xs-6">
									<select onselect="check(18,19)" class="form-control" name="natureBourse">
										<option value="Nationale" selected>Nationale</option>								
										<option value="Etrangere" >Etrangere</option>
										<option value="Etablissement" >Etablissement</option>										
									</select>
								</div>
								<br/>
							</div>						
							<div class="form-group col-xs-12">
								<input type="number" min="0" name="montantBourse" placeholder="Montant Bourse" class="form-control" onkeyup="check(18,19)">
								
							</div>
							<div class="form-group col-xs-12">
								<input type="number" name="tauxExoneration" placeholder="Taux Exoneration" class="form-control" onkeyup="check(18,19)">
							</div>												
	                        <div class="row">
	                            <div class="col-lg-12">
	                                <div class="pull-right">
	                                    <button class="btn btn-default previous-tab" type="button"><span class="glyphicon glyphicon-chevron-left"></span> Precedent</button>
	                                    <button class="btn btn-default next-tab" type="button" id="s5" disabled><span class="glyphicon glyphicon-chevron-right"></span> Suivant</button>
	                                </div>
	                            </div>
	                        </div>   
                    	</div>

                    	<div class="tab-pane fade" id="tab6primary">
 
                        	<div class="form-group col-xs-12">
                        		
                        		<div class="col-xs-3">                        			
                        			<input type="text" name="nomDiplomeBac" placeholder="Baccalaureat Serie" class="form-control"
										   onkeyup="check(20,39)">
                        		</div>
								
								<div class="col-xs-3">
									<!--<label class="col-xs-4 control-label" for="mentionBac">Mention</label>-->
									<select class="form-control" name="mentionBac">
										<option value="Passable" selected>Passable</option>
										<option value="Assez Bien">Assez Bien</option>
										<option value="Bien">Bien</option>
										<option value="Tres Bien">Tres Bien</option>
									</select>
								</div>

								<div class="col-xs-2">                        			
                        			<input type="text" name="anneeObtentionBac" placeholder="Aneee Obtention" class="form-control" onkeyup="check(20,39)">
                        		</div>

                        		<div class="col-xs-2">                        			
                        			<input type="text" name="lieuObtentionBac" placeholder="Lieu Obtention" class="form-control" onkeyup="check(20,39)">
                        		</div>

                        		<div class="col-xs-2">                        			
                        			<input type="file" name="fileBac" placeholder="Justificatif" class="form-control" onchange="check(20,39)">
                        		</div>

							</div>

							<div class="form-group col-xs-12">
                        		
                        		<div class="col-xs-3">
                        			<!--<label class="control-label" for="nomDiplomeBac">Baccalaureat</label>-->
                        			<input type="text" name="nomDiplome2" placeholder="DUEL,DUES,DUT,BTS" class="form-control" onkeyup="check(20,39)">
                        		</div>
								
								<div class="col-xs-3">
									<!--<label class="col-xs-4 control-label" for="mentionBac">Mention</label>-->
									<select class="form-control" name="mentionDiplome2">
										<option value="Passable" selected>Passable</option>
										<option value="Assez Bien">Assez Bien</option>
										<option value="Bien">Bien</option>
										<option value="Tres Bien">Tres Bien</option>
									</select>
								</div>

								<div class="col-xs-2">                        			
                        			<input type="text" name="anneeObtentionDiplome2" placeholder="Aneee Obtention" class="form-control" onkeyup="check(20,39)">
                        		</div>

                        		<div class="col-xs-2">                        			
                        			<input type="text" name="lieuObtentionDiplome2" placeholder="Lieu Obtention" class="form-control" onkeyup="check(20,39)">
                        		</div>

                        		<div class="col-xs-2">                        			
                        			<input type="file" name="fileDiplome2" placeholder="Justificatif" class="form-control" onkeyup="check(20,39)">
                        		</div>

							</div>

							<div class="form-group col-xs-12">
                        		
                        		<div class="col-xs-3">
                        			<!--<label class="control-label" for="nomDiplomeBac">Baccalaureat</label>-->
                        			<input type="text" name="nomDiplome3" placeholder="Licence complete" class="form-control" onkeyup="check(20,39)">
                        		</div>
								
								<div class="col-xs-3">
									<!--<label class="col-xs-4 control-label" for="mentionBac">Mention</label>-->
									<select class="form-control" name="mentionDiplome3">
										<option value="Passable" selected>Passable</option>
										<option value="Assez Bien">Assez Bien</option>
										<option value="Bien">Bien</option>
										<option value="Tres Bien">Tres Bien</option>
									</select>
								</div>

								<div class="col-xs-2">                        			
                        			<input type="text" name="anneeObtentionDiplome3" placeholder="Aneee Obtention" class="form-control" onkeyup="check(20,39)">
                        		</div>

                        		<div class="col-xs-2">                        			
                        			<input type="text" name="lieuObtentionDiplome3" placeholder="Lieu Obtention" class="form-control" onkeyup="check(20,39)">
                        		</div>

                        		<div class="col-xs-2">                        			
                        			<input type="file" name="fileDiplome3" placeholder="Justificatif" class="form-control" onkeyup="check(20,39)">
                        		</div>

							</div>

							<div class="form-group col-xs-12">
                        		
                        		<div class="col-xs-3">
                        			<!--<label class="control-label" for="nomDiplomeBac">Baccalaureat</label>-->
                        			<input type="text" name="nomDiplome4" placeholder="Master 1" class="form-control" onkeyup="check(20,39)">
                        		</div>
								
								<div class="col-xs-3">
									<!--<label class="col-xs-4 control-label" for="mentionBac">Mention</label>-->
									<select class="form-control" name="mentionDiplome4">
										<option value="Passable" selected>Passable</option>
										<option value="Assez Bien">Assez Bien</option>
										<option value="Bien">Bien</option>
										<option value="Tres Bien">Tres Bien</option>
									</select>
								</div>

								<div class="col-xs-2">                        			
                        			<input type="text" name="anneeObtentionDiplome4" placeholder="Aneee Obtention" class="form-control" onkeyup="check(20,39)">
                        		</div>

                        		<div class="col-xs-2">                        			
                        			<input type="text" name="lieuObtentionDiplome4" placeholder="Lieu Obtention" class="form-control" onkeyup="check(20,39)">
                        		</div>

                        		<div class="col-xs-2">                        			
                        			<input type="file" name="fileDiplome4" placeholder="Justificatif" class="form-control" onkeyup="check(20,39)">
                        		</div>

							</div>

							<div class="form-group col-xs-12">
                        		
                        		<div class="col-xs-3">
                        			<!--<label class="control-label" for="nomDiplomeBac">Baccalaureat</label>-->
                        			<input type="text" name="nomDiplome5" placeholder="Master 2" class="form-control" onkeyup="check(20,39)">
                        		</div>
								
								<div class="col-xs-3">
									<!--<label class="col-xs-4 control-label" for="mentionBac">Mention</label>-->
									<select class="form-control" name="mentionDiplome5">
										<option value="Passable" selected>Passable</option>
										<option value="Assez Bien">Assez Bien</option>
										<option value="Bien">Bien</option>
										<option value="Tres Bien">Tres Bien</option>
									</select>
								</div>

								<div class="col-xs-2">                        			
                        			<input type="text" name="anneeObtentionDiplome5" placeholder="Aneee Obtention" class="form-control" onkeyup="check(20,39)">
                        		</div>

                        		<div class="col-xs-2">                        			
                        			<input type="text" name="lieuObtentionDiplome5" placeholder="Lieu Obtention" class="form-control" onkeyup="check(20,39)">
                        		</div>

                        		<div class="col-xs-2">                        			
                        			<input type="file" name="fileDiplome5" placeholder="Justificatif" class="form-control" onkeyup="check(20,39)">
                        		</div>

							</div>

	                        <div class="row">
	                            <div class="col-lg-12">
	                                <div class="pull-right">
	                                    <button class="btn btn-default previous-tab" type="button"><span class="glyphicon glyphicon-chevron-left"></span> Precedent</button>
	                                    <button class="btn btn-default next-tab" type="button" id="s6" disabled><span class="glyphicon glyphicon-chevron-right"></span> Suivant</button>
	                                </div>
	                            </div>
	                        </div>   

                    	</div>

                    	<div class="tab-pane fade" id="tab7primary">

                        	<div class="form-group col-xs-6">
								<input type="text" name="prenomResponsable" placeholder="Prénom" class="form-control" onkeyup="check(40,45)">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="nomReponsable" placeholder="Nom" class="form-control" onkeyup="check(40,45)">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="emailResponsable" placeholder="Email" class="form-control" onkeyup="check(40,45)">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="numTelResponsable" placeholder="Telephone" class="form-control" onkeyup="check(40,45)">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="boitePostaleResponsable" placeholder="Boite Postale" class="form-control" onkeyup="check(40,45)">
								<br/>
							</div>
							<div class="form-group col-xs-6">
								<input type="text" name="adresseReponsable" placeholder="Adresse" class="form-control" onkeyup="check(40,45)">
								<br/>
							</div>

	                        <div class="row">
	                            <div class="col-lg-12">
	                                <div class="pull-right">
	                                    <button class="btn btn-default previous-tab" type="button"><span class="glyphicon glyphicon-chevron-left"></span> Precedent</button>
	                                    <button class="btn btn-default next-tab" type="button" id="s7" disabled><span class="glyphicon glyphicon-chevron-right"></span> Suivant</button>
	                                </div>
	                            </div>
	                        </div>   
                    	</div>

                    	<div class="tab-pane fade" id="tab8primary">
                        
							<div class="col-xs-6">
								<label class="col-xs-6 control-label" for="aptitude">Aptitude</label>
								<select class="form-control" name="aptitude">
									<option value="Oui" selected>Oui</option>
									<option value="Non">Non</option>									
								</select>
							</div>

							<div class="col-xs-6">
								<label class="col-xs-6 control-label" for="Justificatif">Justificatif visite Medicale</label>
								<input type="file" name="fileVisiteMedicale" class="form-control" onchange="check(46,46)">
								<br>
							</div>
							<br>
	                        <div class="row">
	                            <div class="col-lg-12">
	                                <div class="pull-right">
	                                    <button class="btn btn-default previous-tab" type="button"><span class="glyphicon glyphicon-chevron-left"></span> Precedent</button>
	                                    <button class="btn btn-default next-tab" type="button" id="s8" disabled><span class="glyphicon glyphicon-chevron-right"></span> Suivant</button>
	                                </div>
	                            </div>
	                        </div>   
                    	</div>

                    	<div class="tab-pane fade" id="tab9primary">
							<input type="checkbox" onchange="check(47,47)">
							<label> Je soussigne sur l'honneur l'exactitude des renseignements fournis</label>
							<br>
	                    	<br>                    		                
	                        <div class="row">
								<br>
	                            <div class="col-lg-12">
	                                <div class="pull-right">
	                                    <button class="btn btn-default previous-tab" type="button"><span class="glyphicon glyphicon-chevron-left"></span> Precedent</button>
	                                    <button type="submit" class="btn btn-default next-tab" disabled id="s9"><span class="glyphicon glyphicon-chevron-ok"></span> Valider</button>
	                                </div>
	                            </div>
	                        </div>   	                   
                    	</div>                 	
                	
                	</div>

				</form>

            </div><!--fin panel-body-->

		</div><!--fin panel-content-->

	</div><!--fin panel-entier-->
		
		
</div><!--page container-->


<?php 
	require_once('../includes/footer.php');

?>