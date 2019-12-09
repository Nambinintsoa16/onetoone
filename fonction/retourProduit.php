<?php 
include_once ('main.php');
$main= new main;
$mot=$_GET['term'];
$array=array();

$sql="SELECT`designation`, `idProduit`,`quantite` FROM `produit` WHERE `designation` LIKE '%".$mot."%' OR `idProduit` LIKE '%".$mot."%'";
$result=$main->queryAll($sql);
foreach ($result as $result) {
		array_push($array, $result['idProduit'].'| '.$result['designation'].'| '.$result['quantite']);
}
echo json_encode($array); 

?>
