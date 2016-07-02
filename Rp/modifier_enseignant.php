<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Ajouter un enseignant";
$page= '../Public/modif_ens.php';
require_once('../includes/profileRp.php');