<?php
include_once("../include/include.php");
$sql='SELECT prix.idPrix ,vente.idVente FROM `prix`,`vente` WHERE vente.codeproduit LIKE prix.idProduit AND prix.statut LIKE "on" AND prix.idMission=5';
$resultat=$main->queryAll($sql);
foreach($resultat as $resultat){
    $insertion="UPDATE `vente` SET `idPrix`=?  WHERE `idVente` =  ?";
    $resultat1=$main->query($insertion,array($resultat['idPrix'],$resultat['idVente']));
}
?>
