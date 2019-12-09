<?php 
include_once("../include/include.php");
date_default_timezone_set("Europe/Moscow");
$dt=new dateTime();
$heure=$dt->format("H:i:s");
$date=$dt->format("Y-m-d");

$fonction=$_POST['fonction'];

if(isset($_POST['matricule']) AND !empty($_POST['matricule']) AND isset($_POST['equipe']) AND !empty($_POST['equipe'])){
$sql="INSERT INTO `planing_equipe`(`id`, `mtrP`, `statut`, `designationEquipe`, `dateActive`, `dateDeActive`, `TimeActive`, `TimeDesactive`, `Motif`,`fonction`) VALUES (?,?,?,?,?,?,?,?,?,?)";
$main->query($sql,array(null,$_POST['matricule'],'Active',$_POST['equipe'],$date,null,$heure,null,null,$fonction));  
}

?>