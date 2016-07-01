<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "liste des Matieres";
$page= '../Public/listeMatiere.php';
require_once('../includes/profileRp.php');