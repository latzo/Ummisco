<?php

session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Liste des Classes";
$page= '../Public/listeClasse.php';
require_once('../includes/profileRp.php');