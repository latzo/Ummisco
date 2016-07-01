<?php
session_start();
session_destroy();
//Activation du flashBag
session_start();
$_SESSION['flashBag']=
    "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> Alerte</h4>
                    Vous êtes déconnecté!
                </div>";
header('location:login.php');