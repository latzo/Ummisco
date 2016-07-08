<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Liste des enseignants";
$page= '../Public/listeEnseignants.php';
require_once('../includes/profileRp.php');