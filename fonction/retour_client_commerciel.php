<?php 
include_once ('main.php');
$main= new main;
$mot=$_GET['term'];
$array=array();

$sql="SELECT `codeClient`, `Nom`,`Prenom` FROM `clientTr` WHERE `Nom` LIKE  '%".$mot."%' OR `Prenom` LIKE '%".$mot."%' OR `codeClient` LIKE '%".$mot."%'";
$result=$main->queryAll($sql);
foreach ($result as $result) {
		array_push($array, $result['codeClient'].'| '.$result['Nom']." ".$result['Prenom']);
}
echo json_encode($array); 

?>