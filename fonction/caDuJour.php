<?php
include_once('../include/include.php');
$json=array();
$db_gestion_de_vente=new main('localhost','inexped1_gestiondevente','inexped1_admin','crea.dev.121*');
$CA_FB=0;
$sql="SELECT facture.idcomande FROM `facture`,`client` WHERE facture.idclient LIKE client.idclient AND facture.datedefacture  LIKE '".$mois_en_cours."%' AND  client.idVP LIKE '".$_SESSION['matricule']."'";
$facture=$db_gestion_de_vente->queryAll($sql);
foreach ($facture as $facture) {
   $sql="SELECT `codeproduit`,`quantite` FROM `comande` WHERE `idcomand` =".$facture['idcomande'];
   $produit=$db_gestion_de_vente->query($sql);

  $sql='SELECT `prix` FROM `produit` WHERE `codeproduit` LIKE "'.$produit['codeproduit'].'"';
  $prix_produit=$db_gestion_de_vente->query($sql);
   $CA_FB+=($prix_produit['prix']*$produit['quantite']);
}

$CA_du_mois=0;
//$sql="SELECT `quantite`,`lieu`,`codeproduit` FROM `vente` WHERE `idVP` LIKE '".$_SESSION['matricule']."'  AND `date` LIKE '".$mois_en_cours."%'";
$activite="vente d'accompagnement"; // select tous les ventes du mois à part les vente d'accompagnement
$sql='SELECT historique_personnel.activite,vente.quantite,vente.idPrix,vente.lieu,vente.idVP,vente.codeproduit FROM `historique_personnel`,vente WHERE vente.idVP LIKE "'.$_SESSION['matricule'].'" AND vente.date LIKE "'.$mois_en_cours.'%" AND historique_personnel.activite != "'.$activite.'" AND historique_personnel.id LIKE vente.id_historique_coach';
                    $produit=$main->queryAll($sql);
               
               foreach ($produit as $produit) {
              ;
              
              $sql="SELECT `prixdetail` FROM `prix` WHERE `idProduit` LIKE ? AND `idMission`=? AND `idPrix`=?";
              $prixdetail=$main->query($sql,array($produit['codeproduit'],$produit['lieu'],$produit['idPrix']));
              $CA_du_mois+=$prixdetail['prixdetail']*$produit['quantite'];

                   }
$json['CA']=number_format($CA_du_mois+$CA_FB,2,',',' ');


                   echo json_encode($json);
                     ?>