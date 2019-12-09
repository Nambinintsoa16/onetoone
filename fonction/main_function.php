<?php
 class main_function extends main
 {
   private $main;
   private $db_gestion_de_vente;
    function __construct(){
        $this->main=new main();
        $this->db_gestion_de_vente=new main('localhost','inexped1_gestiondevente','inexped1_admin','crea.dev.121*');
    }



public function chiffreAffaireFB($mois_en_cours,$vp){
$CA_FB=0;
$sql="SELECT facture.idcomande FROM `facture`,`client` WHERE facture.idclient LIKE client.idclient AND facture.datedefacture  LIKE '".$mois_en_cours."%' AND  client.idVP LIKE '".$vp."'";
$facture=$this->db_gestion_de_vente->queryAll($sql);
foreach ($facture as $facture) {
   $sql="SELECT `codeproduit`,`quantite` FROM `comande` WHERE `idcomand` =".$facture['idcomande'];
   $produit=$this->db_gestion_de_vente->query($sql);

  $sql='SELECT `prix` FROM `produit` WHERE `codeproduit` LIKE "'.$produit['codeproduit'].'"';
  $prix_produit=$this->db_gestion_de_vente->query($sql);
   $CA_FB+=($prix_produit['prix']*$produit['quantite']);
}

return  $CA_FB;
  }



public function chiffreAffaireTR($mois_en_cours,$vp){
$CA_du_mois=0;
//$sql="SELECT `quantite`,`lieu`,`codeproduit` FROM `vente` WHERE `idVP` LIKE '".$vp."'  AND `date` LIKE '".$mois_en_cours."%'";
$activite="vente d\'accompagnement"; // select tous les ventes du mois à part les vente d'accompagnement
$sql="SELECT historique_personnel.activite,vente.quantite,vente.idPrix,vente.lieu,vente.idVP,vente.codeproduit FROM `historique_personnel`,vente WHERE vente.idVP LIKE '".$vp."' AND vente.date LIKE '".$mois_en_cours."%' AND historique_personnel.activite != '".$activite."' AND historique_personnel.id LIKE vente.id_historique_coach";
                    $produit=$this->main->queryAll($sql);
               foreach ($produit as $produit) {
              $sql="SELECT  `prixdetail` FROM `prix` WHERE `idProduit` LIKE '".$produit['codeproduit']."' AND `idMission`=".$produit['lieu']." AND `idPrix` =".$produit['idPrix'];
              $prixdetail=$this->main->query($sql);
              $CA_du_mois+=$prixdetail['prixdetail']*$produit['quantite'];

                   }
    return $CA_du_mois;
  }

public function dimanche($prametre) {
    /*preg_match('/([0-9]+)\/([0-9]+)\/([0-9]+)/ ', $prametre , $match );
    $date = date("l", mktime(0, 0, 0, $match[2], $match[1], $match[3]));
    $date = trim($date);*/
    $date=date('D',strtotime($prametre));
    if (strstr($date,"Sun")) return $date;
    else return $date;
    }
public function malus($deg,$ods,$dat){
    $dt=$dat."-%";
    $prix=0;
    $sql="SELECT  `montont` FROM `penalite` WHERE `designation` LIKE ? AND `IdCodeVp` LIKE ?  AND `date` LIKE ?";
    $data=$this->main->queryAll($sql,array($deg,$ods,$dt));
    if($data){
        foreach($data as $data){
           $prix+=$data['montont']; 
        }
    }
    return $prix;
}    

public function ttmalus($ods,$dat){
    $dt=$dat."-%";
    $prix=0;
    $sql="SELECT  `montont` FROM `penalite` WHERE `IdCodeVp` LIKE ?  AND `date` LIKE ?";
    $data=$this->main->queryAll($sql,array($ods,$dt));
    if($data){
        foreach($data as $data){
           $prix+=$data['montont']; 
        }
    }
    return $prix;
}        
    
    
 }
 ?>
