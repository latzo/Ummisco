
<?php

require('../Functions/bdd.php');


$bdd = connexion();

$id  = $_SESSION['UserId'] ;

$req=$bdd->prepare('select * from ummisco_actor where id=:id');
$req->execute(array('id'=>$id));
$res= $req->fetch();

$req2=$bdd->prepare('select * from candidat where actor_id=:id');
$req2->execute(array('id'=>$id));
$res2= $req2->fetch();
$responsable_id=$res2['responsable_id'];

$req3=$bdd->prepare('select * from adresse where id=:id');
$req3->execute(array('id'=>$id));
$res3= $req3->fetch();

$req4=$bdd->prepare('select * from responsable where id=:id');
$req4->execute(array('id'=>$responsable_id));

$res4= $req4->fetch();

?>

<script language="javascript">
    function annuler()
    {


        if(confirm("Etes vous sur ?"))
        {
            window.location.replace('annuler_preinscr.php');
        }
    }






</script>
<div class="row col-md-12">

    <div class="panel nav-tabs-custom with-nav-tabs panel-primary panel-content">

        <div class="panel-heading clearfix">
            <div class="pull-right">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1primary" data-toggle="tab">Etat Civil</a></li>
                    <li><a href="#tab2primary" data-toggle="tab">Adresse</a></li>
                    <li><a href="#tab3primary" data-toggle="tab">Emploi-Famille</a></li>
                    <li><a href="#tab7primary" data-toggle="tab">Responsable</a></li>
                </ul>
            </div>
        </div>



        <div class="panel-body">
            <form  method="POST" action="modif_preinscr.php" class="form" name="form1" enctype="multipart/form-data">

                <div class="tab-content">
                    <br>

                    <div class="tab-pane fade in active" id="tab1primary">
                        <div class="form-group col-xs-6">
                            <input type="text" name="ine" value="<?php echo($res2['ine']) ;?>" id="0"    placeholder="Ine" class="form-control" onkeyup="check(0,8)" >
                            <br/>
                        </div>
                        <div class="form-group col-xs-6">
                            <input type="text" name="cni" value="<?php echo($res2['cni']) ;?>" id="1" placeholder="Cni" class="form-control" onkeyup="check(0,8)">
                            <br/>
                        </div>
                        <div class="form-group col-xs-6">
                            <input type="text" name="prenom" id="2" value="<?php echo($res['prenom']) ;?>" placeholder="Prénom" class="form-control" onkeyup="check(0,8)">
                            <br/>
                        </div>
                        <div class="form-group col-xs-6">
                            <input type="text" name="nom" value="<?php echo($res['nom']) ;?>"   id="3" placeholder="Nom" class="form-control" onkeyup="check(0,8)">
                            <br/>
                        </div>
                        <div class="form-group col-xs-6">
                            <label class="col-xs-6 control-label text-right" for="dateNaiss">Date de Naissance :</label>
                            <div class="col-xs-6">
                                <input  name="dateNaiss" value="<?php echo($res['datNaiss']) ;?>"id="4" class="form-control" type="date" onkeyup="check(0,8)">
                            </div>
                        </div>
                        <div class="form-group col-xs-6">
                            <label class="col-xs-6 control-label" for="sexe">Sexe :</label>
                            <div class="col-xs-6">
                                <select onselect="check(0,8)" class="form-control" name="sexe"  >
                                    <option value="Masculin" selected><?php echo($res['sexe']) ;?></option>
                                    <option value="Masculin" >Feminin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-6 ">
                            <input type="text" name="lieuNaiss" id="5" value="<?php echo($res['lieuNaiss']) ;?>" placeholder="Lieu de Naissance" class="form-control" onkeyup="check(0,8)">
                            <br/>
                        </div>

                        <div class="form-group col-xs-6">
                            <input type="text" name="regionNaiss"  value="<?php echo($res['regionNaiss']) ;?>"id="6" placeholder="Region de Naissance" class="form-control" onkeyup="check(0,8)">
                            <br/>
                        </div>
                        <div class="form-group col-xs-6">
                            <input type="text" name="paysNaiss" id="7" value="<?php echo($res['paysNaiss']) ;?>" placeholder="Pays de Naissance" class="form-control" onkeyup="check(0,8)">
                            <br/>
                        </div>
                        <div class="form-group col-xs-6">
                            <input type="text" name="nationalite" id="8" value="<?php echo($res['nationalite']) ;?>" placeholder="Nationalite" class="form-control" onkeyup="check(0,8)">
                            <br/>
                        </div>
                        <!--<div class="row">
                            <div class="col-lg-12">
                                <div class="pull-right">
                                    <button class="btn btn-default next-tab" type="button" id="s1" ><span class="glyphicon glyphicon-chevron-right"></span> Suivant</button>
                                </div>
                            </div>
                        </div>-->

                    </div>

                    <div class="tab-pane fade" id="tab2primary">
                        <div class="form-group col-xs-12 ">
                            <input type="text" name="email" value="<?php echo($res['email']) ;?>" placeholder="Email" class="form-control" onkeyup="check(9,12)">
                            <br/>
                        </div>
                        <div class="form-group col-xs-12">
                            <input type="text" name="numTel"value="<?php echo($res['numTel']) ;?>" placeholder="Numero de Telephone" class="form-control" onkeyup="check(9,12)">
                            <br/>
                        </div>
                        <div class="form-group col-xs-12">
                            <input type="text" name="boitePostale" value="<?php echo($res['boitePostale']) ;?>"placeholder="Boite Postale" class="form-control" onkeyup="check(9,12)">
                            <br/>
                        </div>
                        <div class="form-group col-xs-12">
                            <input type="text" name="ville" value="<?php echo($res3['ville']) ;?>" placeholder="Adresse" class="form-control" onkeyup="check(9,12)">
                            <br/>
                        </div>
                        <!--<div class="row">
                            <div class="col-lg-12">
                                <div class="pull-right">
                                    <button class="btn btn-default previous-tab" type="button"><span class="glyphicon glyphicon-chevron-left"></span> Precedent</button>
                                    <button class="btn btn-default next-tab" type="button" id="s2" ><span class="glyphicon glyphicon-chevron-right"></span> Suivant</button>
                                </div>
                            </div>
                        </div>-->
                    </div>

                    <div class="tab-pane fade" id="tab3primary">
                        <div class="form-group col-xs-6">
                            <label class="col-xs-6 control-label" for="Statut">Statut Etudiant :</label>
                            <div class="col-xs-6">
                                <select onselect="check(13,14)" class="form-control" name="statut">
                                    <option value="Regime Normal" selected><?php echo($res2['statut']) ;?></option>
                                    <option value="Regime Salarie" >Regime Salarie</option>
                                    <option value="Regime Particulier" >Regime Particulier</option>
                                    <option value="Mise en Position de Stage" >Mise en Position de Stage</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-xs-6">
                            <input type="text" name="categorieSocioPro" value="<?php echo($res2['categorieSocioPro']) ;?>" placeholder="Categorie SocioProfessionnelle" class="form-control" onkeyup="check(13,14)">
                            <br/>
                        </div>
                        <div class="form-group col-xs-6">
                            <label class="col-xs-6 control-label" for="situationFamiliale">Situation Familiale :</label>
                            <div class="col-xs-6">
                                <select onselect="check(13,14)" class="form-control" name="situationFamiliale">
                                    <option value="Celibataire" selected><?php echo($res2['situationFamiliale']) ;?></option>
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
                            <input type="number" min="0" name="nbEnfants" value="<?php echo($res2['nbEnfants']) ;?>" placeholder="Nombre d'enfants" class="form-control" onkeyup="check(13,14)">
                            <br/>
                        </div>

                        <!--<div class="row">
                            <div class="col-lg-12">
                                <div class="pull-right">
                                    <button class="btn btn-default previous-tab" type="button"><span class="glyphicon glyphicon-chevron-left"></span> Precedent</button>
                                    <button class="btn btn-default next-tab" type="button" id="s3" ><span class="glyphicon glyphicon-chevron-right"></span> Suivant</button>
                                </div>
                            </div>
                        </div>-->
                    </div>

                    <div class="tab-pane fade" id="tab7primary">

                        <div class="form-group col-xs-6">
                            <input type="text" name="prenomResponsable" value="<?php echo($res4['prenom']) ;?>"placeholder="Prénom" class="form-control" onkeyup="check(40,45)">
                            <br/>
                        </div>
                        <div class="form-group col-xs-6">
                            <input type="text" name="nomResponsable" value="<?php echo($res4['nom']) ;?>"placeholder="Nom" class="form-control" onkeyup="check(40,45)">
                            <br/>
                        </div>
                        <div class="form-group col-xs-6">
                            <input type="text" name="emailResponsable" value="<?php echo($res4['email']) ;?>" placeholder="Email" class="form-control" onkeyup="check(40,45)">
                            <br/>
                        </div>
                        <div class="form-group col-xs-6">
                            <input type="text" name="numTelResponsable" value="<?php echo($res4['numTel']) ;?>" placeholder="Telephone" class="form-control" onkeyup="check(40,45)">
                            <br/>
                        </div>
                        <div class="form-group col-xs-6">
                            <input type="text" name="boitePostaleResponsable" value="<?php echo($res4['boitePostale']) ;?>" placeholder="Boite Postale" class="form-control" onkeyup="check(40,45)">
                            <br/>
                        </div>
                        <div class="form-group col-xs-6">
                            <input type="text" name="adresseResponsable" value="<?php echo($res3['ville']) ;?>" placeholder="Adresse" class="form-control" onkeyup="check(40,45)">
                            <br/>
                        </div>

                        <!--<div class="row">
                            <div class="col-lg-12">
                                <div class="pull-right">
                                    <button class="btn btn-default previous-tab" type="button"><span class="glyphicon glyphicon-chevron-left"></span> Precedent</button>
                                    <button class="btn btn-default next-tab" type="button" id="s7" ><span class="glyphicon glyphicon-chevron-right"></span> Suivant</button>
                                </div>
                            </div>
                        </div>-->
                    </div>

                </div>
                <div class="text-right">
                    <input type="button" class="btn btn-danger" value="Annuler Preinscription" onClick="annuler();">


                    <input type="submit" class="btn btn-success" value="Modifier Preinscription">

                </div>
            </form>

        </div><!--fin panel-body-->

    </div><!--fin panel-content-->
</div><!--fin panel-entier-->



<!--<a class="btn btn-success" href="C:/wamp/www/Ummisco/Candidat/content/modif_preinscr.php">
    <b>Modifier Preinscription</b>

</a>-->


