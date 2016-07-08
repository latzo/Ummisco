<?php

session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Liste des Examen";
$page= '../Public/listeExamen.php';
require_once('../includes/profileRp.php');