<?php


session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Ajouter un Examen";
$page= '../Public/examen.php';
require_once('../includes/profileRp.php');