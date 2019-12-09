<?php
include_once ('main.php');
$main= new main;
$mot=$_GET['term'];
$array=array();

$sql="SELECT `matricule`,`Nom`,`Prenom`,`Fonction_Acutelle` FROM `personnel` WHERE `Nom` LIKE '%".$mot."%' OR `Prenom` LIKE '%".$mot."%' OR `matricule` LIKE '%".$mot."%'";
$result=$main->queryAll($sql);
foreach ($result as $result) {
      $sql="SELECT `DesFonction` FROM `fonction` WHERE `id`=?";
      $fonction=$main->query($sql,array($result['Fonction_Acutelle']));
		array_push($array, $result['matricule'].'| '.$result['Nom'].' '.$result['Prenom'].'| '.$fonction['DesFonction']);
}
echo json_encode($array); 

?>