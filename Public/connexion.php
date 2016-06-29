<?php
session_start();
require('../Functions/bdd.php');

 if(isset($_POST['email']) && isset($_POST['password']) )
			
		
 {
		 
		 
	   $bdd = connexion();
		
		$login=$_POST['email'];
		$pass_hache=sha1($_POST['password']);
		$req=$bdd->prepare('select id from ummisco_actor where email= :login and password= :pass');
		$req->execute(array(
			'login'=>$login,
			'pass'=>$pass_hache,
			)
		);
		$res=$req->fetch();
		$id=$res['id'];
		
		if(!$res){
			echo '<script>alert("Login ou mot de passe incorrect!")</script>';
			 
			echo '<META http-equiv="refresh" content="0;URL=http://localhost/Ummisco/Public/login.php">';
			
			
		}
		else
		{
			$req2=$bdd->prepare('select nom,prenom,discr from ummisco_actor where id=:id');
			$req2->execute(array(
				'id'=>$id,
				)
			);
			$res2=$req2->fetch();
			$_SESSION['UserId']=$id;
			$_SESSION['UserDiscr']=$res2['discr'];
			$_SESSION['UserName']=$res2['prenom'].' '.$res2['nom'];
			switch ($_SESSION['UserDiscr'])
			{
				case "rp":
					header("location:../Rp/profile.php");

			}

		}
 }
 else
 {
	 echo 'Aucun login ou mot de passe defini!';
 }
		
?>