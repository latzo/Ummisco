<?php 
session_start();
session_destroy();
$title = 'Login' ;
$stylesheets = "<link rel='stylesheet' type='text/css' href='../dist/mycss/login.css'/>";
$etatC='active';
require_once('../includes/header.php');
require_once('../includes/basenav.php');
if(isset($_SESSION['flashBag']))
{
	echo $_SESSION['flashBag'];
	unset($_SESSION['flashBag']);
}
?>

<br/><br/><br/>

<div class="container content">
		<div class="row content">
			<div class="col-xs-6 col-xs-offset-3">
				<div>
					<div class="panel panel-info">
						<div class="panel-body text-center">
								<div>
									<img class="img-responsive img-thumbnail mini" src="../dist/img/avatar.png" />
								</div>
								<hr>
								<form class="form" action="../Functions/login.php" method="post">
									<div class="form-group" >
										<div class="col-xs-8 col-xs-offset-2 input-group input-group-lg">
										  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
										  <input style="width:295px;padding:30px;border-radius:0px"  type="text" class="form-control" placeholder="Login" name="login">
										</div>
									</div>
									<br/>
									<div class="form-group">
										<div class="col-xs-8 col-xs-offset-2 input-group input-group-lg">
											<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
											<input style="width:295px;padding:30px;border-radius:0px" type="password" placeholder="Mot de Passe" class="form-control" name="password">
											<br/>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-6 text-center">
											<input type="checkbox"><strong>Se souvenir de moi</strong>
											<br/>
										</div>
										<div class="col-xs-6">
											<a href="#" class="text-danger"><strong>Mot de passe oublié?</strong></a>
										</div>
									</div>
									<div class="col-xs-12">
										<hr>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<button type="submit" class="btn btn-info btn-lg" style="width:340px;padding:20px;border-radius:0px"><strong>Connexion</strong></button> 	
									<div class="col-xs-12">
										<hr>
									</div>
								</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--row content-->
	</div><!--container content-->

<?php 
	require_once('../includes/footer.php');
 ?>