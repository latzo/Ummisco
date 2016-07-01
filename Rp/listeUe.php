<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Liste des Unites d'Enseignement";
$page= '../Public/listeUe.php';
require_once('../includes/profileRp.php');