<?php
include_once("../include/include.php");
$reponse="";
//if(isset($_GET['groupe']) AND isset($_GET['famille'])  AND !empty($_GET['groupe']) AND !empty($_GET['famille']))
if($_GET['groupe']=="Tout" && $_GET['famille']=="Tout" ){
   $sql="SELECT `idProduit`,`designation`,`quantite` FROM `produit` WHERE 1";
   $reponse=$main->queryAll($sql);  
   
 }else if($_GET['groupe']!="Tout" && $_GET['famille']=="Tout" ){
     
   $sql="SELECT `idProduit`,`designation`,`quantite` FROM `produit` INNER JOIN `categorie` ON produit.idCategorie LIKE categorie.idCategorie WHERE categorie.type LIKE ?";
   $reponse=$main->queryAll($sql,array($_GET['groupe']));  
   
 }else if($_GET['groupe']=="Tout" && $_GET['famille']!="Tout"){
     
   $sql="SELECT `idProduit`,`designation`,`quantite` FROM `produit` INNER JOIN `categorie` ON produit.idCategorie LIKE categorie.idCategorie WHERE categorie.famille LIKE ? ";
   $reponse=$main->queryAll($sql,array($_GET['famille']));  
 }else {
     
   $sql="SELECT `idProduit`,`designation`,`quantite` FROM `produit` INNER JOIN `categorie` ON produit.idCategorie LIKE categorie.idCategorie WHERE categorie.famille LIKE ? AND categorie.type LIKE ?";
   $reponse=$main->queryAll($sql,array($_GET['famille'],$_GET['groupe']));  
 }
 
  

echo json_encode($reponse);
?>