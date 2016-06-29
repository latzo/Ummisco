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

            </form>

        </div><!--fin panel-body-->

    </div><!--fin panel-content-->
</div><!--fin panel-entier-->
<div class="text-right">
    <a class="btn btn-danger" href="">
        <b>Annuler Preinscription</b>
    </a>
    <a class="btn btn-success" href="">
        <b>Modifier Preinscription</b>
    </a>
</div>