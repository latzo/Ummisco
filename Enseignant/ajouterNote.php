<?php

session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}

if(!empty($_GET) )
{
    $nomPage = "Ajouter une Note";
    $page= '../Public/note.php';
    require_once('../includes/profileEnseignant.php');
}

$nomPage = "Ajouter une Note";
$page= '../Public/listeClassePourNote.php';
require_once('../includes/profileEnseignant.php');