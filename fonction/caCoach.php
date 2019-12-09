<?php
include_once('../include/include.php');


$sql1="SELECT `matricule` FROM `personnel` WHERE `coach` LIKE ?";
$commerciale=$main->queryAll($sql1,array($_SESSION['matricule']));
$json=array();
$ca_coach=0;

$mois_en_cours=date('Y-m');
foreach($commerciale as $commerciale){
    $db_gestion_de_vente=new main('localhost','inexped1_gestiondevente','inexped1_admin','crea.dev.121*');
    $CA_FB=0;
    
    $sql="SELECT facture.idcomande FROM `facture`,`client` WHERE facture.idclient LIKE client.idclient AND facture.datedefacture  LIKE '".$mois_en_cours."%' AND  client.idVP LIKE '".$commerciale['matricule']."'";
    $facture=$db_gestion_de_vente->queryAll($sql);

    foreach ($facture as $facture) {
       $sql="SELECT `codeproduit`,`quantite` FROM `comande` WHERE `idcomand` =".$facture['idcomande'];
       $produit=$db_gestion_de_vente->query($sql);
    
      $sql='SELECT `prix` FROM `produit` WHERE `codeproduit` LIKE "'.$produit['codeproduit'].'"';
      $prix_produit=$db_gestion_de_vente->query($sql);
       $CA_FB+=($prix_produit['prix']*(int)$produit['quantite']);
    }
    
    $CA_du_mois=0;
    $sql="SELECT `quantite`,`lieu`,`codeproduit`,`idPrix` FROM `vente` WHERE `idVP` LIKE '".$commerciale['matricule']."'  AND `date` LIKE '".$mois_en_cours."%'";
                        $produit=$main->queryAll($sql);
                   foreach ($produit as $produit) {
                  $sql="SELECT  `prixdetail` FROM `prix` WHERE `idProduit` LIKE ? AND `idMission`= ? AND `idPrix` =?";
                  $prixdetail=$main->query($sql,array($produit['codeproduit'],$produit['lieu'],$produit['idPrix']));
                  $CA_du_mois+=$prixdetail['prixdetail']*$produit['quantite'];
    
                       }
    $ca_coach+=($CA_du_mois+$CA_FB);
    
}
?>
<a href="#"><?=number_format($ca_coach,2,',',' ')." Ar"?></a>