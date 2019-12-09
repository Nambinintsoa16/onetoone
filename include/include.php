<?php
session_start(); 
include_once('../fonction/main.php');
include_once('../fonction/fonctionaditionelle.php');
include_once('../fonction/main_function.php');
$main=new main();
$main_function=new main_function();

if (!$_SESSION['matricule']) {
	header('Location:/index.php');
}
   

$date_du_jour= date("d-m-Y");
$dateDB=date("Y-m-d");
$mois_en_cours=date("Y-m");
?>