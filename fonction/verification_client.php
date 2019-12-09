<?php 
include_once ('main.php');
$main= new main;
$mot=$_GET['term'];
$json=array("Message"=>"false");
$sql="SELECT `id` FROM `clientTr` WHERE `contact`LIKE ?";
$result=$main->query($sql,array($mot));
if($result){
   $json["Message"]="true"; 
}

?>