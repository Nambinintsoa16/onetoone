<?php
include_once("../include/include.php");
$json=array("error"=>"true");
if(isset($_POST['produit']) AND isset($_POST['mission']) AND isset($_POST['prixdet']) AND isset($_POST['prixgros']) AND isset($_POST['observation'])){
   if(!empty($_POST['produit']) AND !empty($_POST['mission']) AND !empty($_POST['prixdet']) AND !empty($_POST['prixgros']) AND !empty($_POST['observation'])){
   $produit=explode("|",$_POST['produit']);
   $sql="ALTER TABLE prix ALTER COLUMN observation VARCHAR(250) NOT NULL";
   $main-exec($ql);
    $sql="UPDATE `prix` SET `statut` = ?,`dateOff` = ?,`observation`= ? WHERE `idProduit` LIKE ? AND prix.idMission LIKE ? AND prix.statut <> 'off'";
    $main->query($sql,array('off',date("Y-m-d"),$_POST['observation'],$produit[0],$_POST['mission']));
   
    $sql="INSERT INTO `prix`(`idPrix`, `prixdetail`, `prixgros`, `idMission`, `idProduit`, `dateOn`, `statut`, `dateOff`) VALUES (?,?,?,?,?,?,?,?)";
    $main->query($sql,array(null,$_POST['prixdet'],$_POST['prixgros'],$_POST['mission'],$produit[0],date("Y-m-d"),'on',NULL));
    $json["error"]="false";  
   }
    
}
echo json_encode($json);
?>