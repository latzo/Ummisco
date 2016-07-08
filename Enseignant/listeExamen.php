<?php

session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Liste des Examen";
$page= '../Public/listeExamenEns.php';
require_once('../includes/profileEnseignant.php');