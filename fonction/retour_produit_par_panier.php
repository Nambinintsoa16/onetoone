<?php
include_once('../include/include.php');
$mot=$_GET['term'];
$array=array();
$sql="SELECT produit.idProduit,produit.designation,produit.quantite FROM `produit`,`panier` WHERE produit.idProduit LIKE panier.IdProduit AND panier.desigbation LIKE '".$_SESSION['panier']."' AND ( produit.designation LIKE '%".$mot."%'  OR produit.idProduit   LIKE '%".$mot."%')";
$result=$main->queryAll($sql);

foreach ($result as $result) {
		array_push($array, $result['idProduit'].'| '.$result['designation'].'| '.$result['quantite']);
}
echo json_encode($array); 

?>