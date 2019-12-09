<?php 
include_once('main.php');
$main = new main();
session_start();
$json=array("Message"=>"false");
$date=date("Y-m-d");
$heure=date("h:m:s");
if (isset($_POST['codeproduit'])  && isset($_POST['quantite']) && isset($_POST['lieu'])){
  if (!empty($_POST['codeproduit'])  && !empty($_POST['quantite']) && !empty($_POST['lieu']))
		  {
		   $sql="INSERT INTO `vente`(`codeproduit`, `quantite`, `lieu`,`date`,`idVP`,`heure`) VALUES (?,?,?,?,?,?)"; 
		   $main->query($sql,array($_POST['codeproduit'],$_POST['quantite'],$_POST['lieu'],$date,$_SESSION['vp'],$heure));
		       $json['Message']="true";
		   	 } 
}
echo json_encode($json);
  ?>





