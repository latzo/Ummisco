<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Ajouter un chercheur";
$page= '../Public/modif_cherch.php';
require_once('../includes/profileRp.php');