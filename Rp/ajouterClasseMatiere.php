<?php


session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Ajouter une Classe";
$page= '../Public/ajouterMatiereClasse.php';
require_once('../includes/profileRp.php');