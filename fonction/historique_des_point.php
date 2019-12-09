<?php
include_once("../include/include.php");
$json=array();
$sql="SELECT * FROM `historique_personnel` WHERE   `date`!= ? AND `personnel` LIKE ? ORDER BY `date` DESC";
$point=$main->queryAll($sql,array(date("Y-m-d"),$_SESSION['matricule']));
echo json_encode($point);
?>

