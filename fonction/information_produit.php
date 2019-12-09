<?php
include_once('/include/include.php');
$json=array();
if(isset($_POST['codeProduit']) AND !empty($_POST['codeProduit'])){
     $sql="SELECT `quantite`,`designation`,`idProduit` FROM `produit` WHERE `idProduit` LIKE  ?";
     $produit=$main->query($sql,array($sql,$_POST['codeProduit']));
     $json['quantite']= $produit['quantite'];
     $json['designation']= $produit['designation'];
     $json['idProduit']= $produit['idProduit'];
}
echo json_encode($json);
?>