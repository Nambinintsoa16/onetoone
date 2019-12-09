<?php
class main
  {

private  $user='inexped1_admin';
private  $pass='crea.dev.121*';
private  $dbname='inexped1_gestion_com';
private  $host='localhost';
private  $con;
    function __CONSTRUCT($host=null,$dbname=null,$user=null,$pass=null){
        if($host==null){
        $user=$this->user;
        $pass=$this->pass;
        $dbname=$this->dbname;
        $host=$this->host;
        }
        try{
            $sdn="mysql:host=".$host.";dbname=".$dbname;
            $this->con=new PDO($sdn,$user,$pass);
         }catch(Exception $e){
             die($e->getMessage());
         }
    }

public function query($sql,$parametre=array()){
     $query=$this->con->prepare($sql);
     $query->execute($parametre);
     return $query->fetch();
   }
public function queryAll($sql,$parametre=array()){
    $query=$this->con->prepare($sql);
    $query->execute($parametre);
    return $query->fetchAll();
}

public function monquery($sql, $parametre = array()) {
        $query = $this->con->prepare($sql);
        $query->execute($parametre);
        $result = array();
        while ($row = $query->fetch()) {
            $result[] = $row;
        }
        return $result;
    }
public function getPoint($parametre){
    $sql="SELECT * FROM `point` WHERE `idPersonel` LIKE ?";
    $query=$this->con->prepare($sql);
    $query->execute(array($parametre));
    return $query->fetch(PDO::FETCH_OBJ);
}
public function upDatePoint($parametre=array()){
    $sql="UPDATE `point` SET `NbPoint`=? WHERE `idPersonel` LIKE ?";
    $query=$this->con->prepare($sql);
    $query->execute($parametre);   
}

public function historique($parametre=array()){
    $sql="INSERT INTO `historique_personnel`(`id`,`date`, `heure`,`activite`, `personnel`, `point`,`facture`) VALUES (?,?,?,?,?,?,?)";
    $query=$this->con->prepare($sql);
    $query->execute($parametre);   
}

public function testPoint($paremetre){
     $sql="SELECT `NbPoint` FROM `point` WHERE `idPersonel` LIKE '".$paremetre."'";
     $query=$this->con->prepare($sql);
     $query->execute();
     return $query->fetch(PDO::FETCH_OBJ);
}

public function heureServeur(){
     $sql="SELECT CURRENT_TIME()";
     $query=$this->con->prepare($sql);
     $query->execute();
     return $query->fetch();
}


public function getCoachDuCom($com){
    $sql="SELECT `coach` FROM `personnel` WHERE `matricule` LIKE ?";
    return $this->query($sql,array($com));
}

public function getIdStory_coach($coach,$date,$heure){
    $sql="SELECT `id` FROM `historique_personnel` WHERE `personnel` LIKE ? AND `date` LIKE ? AND `heure` LIKE ?";
    $result=$this->query($sql,array($coach,$date,$heure));
    return $result['id'];
}

public function filigramme($paremtre){
    
setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');    
    
   $filigramme=array(
"badge"=>"Bonjour et bienvenue !",
"moncompte"=>"Mon compte",
"enregistrement_de_vente"=>"Enregistrement de ventes",
"liste_des_produits"=>"Mes produits",
"mes_vente"=>"Ventes du ".date("d-m-Y"),
"suivi_des_ventes"=>"Calendrier de vente",
"detail_vente_sur_terrain"=>"Ventes sur Terrain <br/>".strftime(" %B %Y"),
"detail_vente_facebook"=>"Ventes sur Facebook",
"liste_des_facebook"=>"Mes clients sur Facebook",
"liste_des_clients_sur_terrain"=>"Mes clients sur Terrain",
"information_sur_produit"=>"detail produit",
"deduction_sur_salaire"=>"deduction sur salaire",
"detailsClientsFB"=>"detail client",
"privilege"=>"mes Privileges",
"historiqueAchatClientSurTerrain"=>"Historique",
"detail_point"=>"historique des Points",
"historiqueAchatClient"=>"<span style='font-size:12px'>Historique d'achat du client</span>",
"historiqueAchatClientSurTerrain"=>"<span style='font-size:12px'>Historique d'achat du client</span>",
"information_produit_terrain"=>"Detail produit",
"detailClientSurTerrain"=>"<span style='font-size:12px'>Detail client sur terrain</span>",
"Vente_sur_terrain"=>"Vente sur terrain",
"Vente_sur_facebook"=>"Mes vente sur facebook",
);
    return $filigramme[$paremtre];
    
}

public function BimMois($parametre){
    $bim=array("1"=>"Jan-fev","2"=>"Mar-Avr","3"=>"Mai-Jun","4"=>"Jul-Aoû","5"=>"Sep-Oct","6"=>"Nov-Déc");
    $mois="";
    if($parametre=="01" OR $parametre=="02"){
          $mois=$bim["1"];
    }else if($parametre=="03" OR $parametre=="04"){
          $mois=$bim["2"];
    }else if($parametre=="05" OR $parametre=="06"){
          $mois=$bim["3"];
    }else if($parametre=="07" OR $parametre=="08"){
          $mois=$bim["4"];
    }else if($parametre=="09" OR $parametre=="10"){
          $mois=$bim["5"];
    }else if($parametre=="11" OR $parametre=="12"){
         $mois=$bim["6"];
    }
    return  $mois;
}
public function progress($parametre){
   $date=$this->query("SELECT CURDATE() as date");
   $moth=explode("-",$date['date']);
     if($moth[0]=='01' || $moth[0]=='02'){
          $sql="SELECT SUM(point) as point  FROM `historique_personnel` WHERE (`date`  LIKE ? OR `date` LIKE ?) AND `personnel` LIKE ?";
          $data=$this->query($sql,array($moth[0]."-01-%",$moth[0]."-02-%",$parametre));
       }else if($moth[1]=='03' || $moth[1]=='04'){
          $sql="SELECT SUM(point) as point  FROM `historique_personnel` WHERE (`date`  LIKE ? OR `date` LIKE ?) AND `personnel` LIKE ?";
          $data=$this->query($sql,array($moth[0]."-03-%",$moth[0]."-04-%",$parametre));
       }else if($moth[1]=='05' || $moth[1]=='06'){
        $sql="SELECT SUM(point) as point  FROM `historique_personnel` WHERE (`date`  LIKE ? OR `date` LIKE ?) AND `personnel` LIKE ?";
        $data=$this->query($sql,array($moth[0]."-05-%",$moth[0]."-06-%",$parametre));
       }else if($moth[1]=='07' || $moth[1]=='08'){
        $sql="SELECT SUM(point) as point  FROM `historique_personnel` WHERE (`date`  LIKE ? OR `date` LIKE ?) AND `personnel` LIKE ?";
        $data=$this->query($sql,array($moth[0]."-07-%",$moth[0]."-08-%",$parametre));
       }else if($moth[1]=='09' || $moth[1]=='10'){
        $sql="SELECT SUM(point) as point  FROM `historique_personnel` WHERE (`date`  LIKE ? OR `date` LIKE ?) AND `personnel` LIKE ?";
        $data=$this->query($sql,array($moth[0]."-09-%",$moth[0]."-10-%",$parametre));
       }else if($moth[1]=='11' || $moth[1]=='12'){
        $sql="SELECT SUM(point) as point  FROM `historique_personnel` WHERE (`date`  LIKE ? OR `date` LIKE ?) AND `personnel` LIKE ?";
        $data=$this->query($sql,array($moth[0]."-11-%",$moth[0]."-12-%",$parametre));
    }
    return $data;
}

public function ca_mois($matricule,$mois){
   
    //$sql_vente_mois="SELECT `quantite`,`lieu`,`date`,`codeproduit` FROM `vente` WHERE `idVP` LIKE ? AND MONTH(`date`) LIKE ?";
    
    $sql_vente_mois=$sql_vente_jour="SELECT vente.idPrix as idprix,vente.quantite FROM `vente`,historique_personnel WHERE `idVP` LIKE ? AND id_historique_coach = historique_personnel.id AND historique_personnel.activite != ? AND MONTH(`vente.date`) LIKE ?";
    $vente=$this->queryAll($sql_vente_mois,array($matricule,'vente d\'accompagnement',$mois));
    
    //$vente=$this->queryAll($sql_vente_mois,array($matricule,$mois));
    $prix_quantite=0;
                            
    //$sql_prix_mois="SELECT `prixdetail` FROM `prix` WHERE `idMission` LIKE ? AND `idProduit` LIKE ?";
     $sql_prix_mois="SELECT `prixdetail` FROM `idPrix` = ?";
    foreach($vente as $vente){
        //$prix=$this->query($sql_prix_mois,array($vente['lieu'],$vente['codeproduit']));
        $prix=$this->query($sql_prix_mois,array($vente['idprix']));
        $prix_quantite+=$prix['prixdetail']*$vente['quantite'];
                                
                                
    }
    return $prix_quantite;
}

public function ca_jour($nom_equipe,$date){
    
    $sql_membre="SELECT `mtrP` FROM `planing_equipe` WHERE `designationEquipe` LIKE ?";
    $membre=$this->queryAll($sql_membre,array($nom_equipe));
    $prix_quantite_equipe=0;
    foreach($membre as $membre){
        //$sql_vente_jour="SELECT `quantite`,`lieu`,`codeproduit` FROM `vente` WHERE `idVP` LIKE ? and `date` LIKE ?";
        //$vente=$this->queryAll($sql_vente_jour,array($membre['mtrP'],$date));
        $sql_vente_jour="SELECT vente.idPrix as idprix,vente.quantite FROM `vente`,historique_personnel WHERE `idVP` LIKE ? AND id_historique_coach = historique_personnel.id AND historique_personnel.activite != ? AND vente.date LIKE ?";
        $vente=$this->queryAll($sql_vente_jour,array($membre['mtrP'],'vente d\'accompagnement',$date));
                                        
        $prix_quantite_personne=0;
        foreach($vente as $vente){
            //$sql_prix_jour="SELECT `prixdetail` FROM `prix` WHERE `idMission` LIKE ? AND `idProduit` LIKE ?";
            $sql_prix_jour="SELECT `prixdetail` FROM `idPrix` = ?";
            //$prix=$this->query($sql_prix_jour,array($vente['lieu'],$vente['codeproduit']));
            $prix=$this->query($sql_prix_jour,array($vente['idprix']));
            $prix_quantite_personne+=$prix['prixdetail']*$vente['quantite'];
        }
        $prix_quantite_equipe+=$prix_quantite_personne;
    }
    return $prix_quantite_equipe;
}
public function ca_jour_com($matricule,$date){
    //$sql_vente_jour="SELECT `quantite`,`lieu`,`date`,`codeproduit` FROM `vente` WHERE `idVP` LIKE ? AND `date` LIKE ?";
    $sql_vente_jour="SELECT vente.idPrix as idprix,vente.quantite FROM `vente`,historique_personnel WHERE `idVP` LIKE ? AND id_historique_coach = historique_personnel.id AND historique_personnel.activite != ? AND vente.date LIKE ?";
    //$vente=$this->queryAll($sql_vente_jour,array($matricule,$date));
    $vente=$this->queryAll($sql_vente_jour,array($matricule,'vente d\'accompagnement',$date));
    $prix_quantite=0;
                            
    //$sql_prix_jour="SELECT `prixdetail` FROM `prix` WHERE `idMission` LIKE ? AND `idProduit` LIKE ?";
    $sql_prix_jour="SELECT `prixdetail` FROM `idPrix` = ?";
    foreach($vente as $vente){
        //$prix=$this->query($sql_prix_jour,array($vente['lieu'],$vente['codeproduit']));
        $prix=$this->query($sql_prix_jour,array($vente['idprix']));
        $prix_quantite+=$prix['prixdetail']*$vente['quantite'];
                                
                                
    }
    return $prix_quantite;
}
//prix du produit
public function getPriceProduit($idproduit,$quantite,$lieu){
    $sql="SELECT `prixdetail` FROM `prix` WHERE `idProduit` LIKE ? AND `idMission` LIKE ?";
    $prix=$this->query($sql,array($idproduit,$lieu));
    return (int)$quantite*$prix[prixdetail];
}

 }

?>