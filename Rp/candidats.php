<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Soumission Candidats";
$page='content/candidatscontent.php';
$activeLC="active";
require_once('../includes/profileRp.php');

