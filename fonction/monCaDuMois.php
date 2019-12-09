<?php
include_once('../include/include.php');
$json=array();
$db_gestion_de_vente=new main('localhost','inexped1_gestiondevente','inexped1_admin','crea.dev.121*');
$CA_FB=0;
$sql="SELECT facture.idcomande FROM `facture`,`client` WHERE facture.idclient LIKE client.idclient AND facture.datedefacture  LIKE '".$mois_en_cours."%' AND  client.idVP LIKE '".$_SESSION['vp']."'";
$facture=$db_gestion_de_vente->queryAll($sql);
foreach ($facture as $facture) {
   $sql="SELECT `codeproduit`,`quantite` FROM `comande` WHERE `idcomand` =".$facture['idcomande'];
   $produit=$db_gestion_de_vente->query($sql);

  $sql='SELECT `prix` FROM `produit` WHERE `codeproduit` LIKE "'.$produit['codeproduit'].'"';
  $prix_produit=$db_gestion_de_vente->query($sql);
   $CA_FB+=($prix_produit['prix']*$produit['quantite']);
}

$CA_du_mois=0;
$sql="SELECT `quantite`,`lieu`,`codeproduit`,`idPrix` FROM `vente` WHERE `idVP` LIKE ?  AND `date` LIKE ?";
                    $produit=$main->queryAll($sql,array($_SESSION['vp'],$mois_en_cours."%"));
               foreach ($produit as $produit) {
              $sql="SELECT  `prixdetail` FROM `prix` WHERE `idProduit` LIKE ? AND `idMission`=? AND `idPrix`=?";
              $prixdetail=$main->query($sql,array($produit['codeproduit'],$produit['lieu'],$produit['idPrix']));
              $CA_du_mois+=$prixdetail['prixdetail']*$produit['quantite'];

                   }
$json['CA']=number_format($CA_du_mois+ $CA_FB);


                   echo json_encode($json);
                     ?>