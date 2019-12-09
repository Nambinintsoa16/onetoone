<?php
include_once('../include/include.php');
date_default_timezone_set("Europe/Moscow");
$dt=new dateTime();
$date=$dt->format("H:i:s");
$Date=$dt->format("Y/m");
if (isset($_POST['content_produit']) AND isset($_POST['content_quantite']) AND isset($_POST['ville']) AND isset($_POST['quartier']) AND isset($_POST['codeClient']) ) {
    if (!empty($_POST['content_produit']) AND !empty($_POST['content_quantite']) AND !empty($_POST['ville']) AND !empty($_POST['quartier']) AND !empty($_POST['codeClient'])) {
  $activite="client fidele";
  $activity_coach="coach fidele";
  $id_coach='NULL';
  $idfacture="";
    
    
    $sqll="SELECT * FROM `vente`  ORDER BY `idVente` DESC LIMIT 1";
    $fact=$main->query($sqll);
    if($fact){
       $facture=explode("/",$fact['facture']);
       $codefactvar=$facture[3];
       if($codefactvar<10){
      $idfacture="CTL/TR/". $Date."/000".$codefactvar+=1;
   }else if($codefactvar<100){
       $idfacture="CTL/TR/". $Date."/00".$codefactvar+=1;
   }else if($codefactvar<1000){
      $idfacture="CTL/TR/". $Date."/0".$codefactvar+=1;
   }else{
      $idfacture="CTL/TR/". $Date."/".$codefactvar+=1;
   }
    }else{
       $idfacture="CTL/TR/". $Date."/0001";
    }  
    
  
  
  
  
  
  
        if(($date>=date("08:00:00") AND $date<date("11:30:00")) OR  ($date>=date("14:00:00") AND $date<date("17:30:00"))  ){
            $main->historique(array(null,date("Y-m-d"),$date,$activite, $_SESSION['matricule'],25,$idfacture));
                $nbPoint=$main->testPoint($_SESSION['matricule']);
                //pour coach
                    $coach=$main->getCoachDuCom($_SESSION['matricule']);
                    $main->historique(array(null,date("Y-m-d"),$date,$activity_coach, $coach['coach'],5,$idfacture));
                    $id_coach=$main->getIdStory_coach($coach['coach'],date("Y-m-d"),$date);
                    $nbPoint_coach=$main->testPoint($coach['coach']);
                //Fin coach
               if($nbPoint){
                       $newpoint=($nbPoint->NbPoint)+ 25;
                       $main->upDatePoint(array( $newpoint ,$_SESSION['matricule']));
                       if($nbPoint_coach){
                            $newpoint_coach=($nbPoint_coach->NbPoint)+ 5;
                            $main->upDatePoint(array( $newpoint_coach ,$coach['coach']));
                        }else{
                        //pour coach
                            $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
                            $main->query($sql,array(null,$coach['coach'],5));
                        //fin coach
                        }

               }else{

                     $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
                     $main->query($sql,array(null,$_SESSION['matricule'],25));
                     if($nbPoint_coach){
                            $newpoint_coach=($nbPoint_coach->NbPoint)+ 5;
                            $main->upDatePoint(array( $newpoint_coach ,$coach['coach']));
                        }else{
                        //pour coach
                            $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
                            $main->query($sql,array(null,$coach['coach'],5));
                        //fin coach
                    }
               }

         }else if($date>=date("11:30:00") AND $date<date("14:00:00") ) {
              $main->historique(array(null,date("Y-m-d"),$date,$activite, $_SESSION['matricule'], 15,$idfacture));
              $nbPoint=$main->testPoint($_SESSION['matricule']);
              //pour coach
                    $coach=$main->getCoachDuCom($_SESSION['matricule']);
                    $main->historique(array(null,date("Y-m-d"),$date,$activity_coach, $coach['coach'],3,$idfacture));
                    $id_coach=$main->getIdStory_coach($coach['coach'],date("Y-m-d"),$date);
                    $nbPoint_coach=$main->testPoint($coach['coach']);
                //Fin coach
              if($nbPoint){
                    $newpoint=($nbPoint->NbPoint)+ 15;
                    $main->upDatePoint(array($newpoint ,$_SESSION['matricule']));
                    if($nbPoint_coach){
                            $newpoint_coach=($nbPoint_coach->NbPoint)+ 3;
                            $main->upDatePoint(array( $newpoint_coach ,$coach['coach']));
                    }else{
                        //pour coach
                            $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
                            $main->query($sql,array(null,$coach['coach'],3));
                        //fin coach
                    }

               }else{
                   $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
                   $main->query($sql,array(null,$_SESSION['matricule'],15));
                   if($nbPoint_coach){
                            $newpoint_coach=($nbPoint_coach->NbPoint)+ 3;
                            $main->upDatePoint(array( $newpoint_coach ,$coach['coach']));
                    }else{
                        //pour coach
                            $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
                            $main->query($sql,array(null,$coach['coach'],3));
                        //fin coach
                    }
               }

         }else if($date>=date("17:30:00") AND $date<=date("19:00:00")) {
                $main->historique(array(null,date("Y-m-d"),$date,$activite, $_SESSION['matricule'], 10,$idfacture));
                $nbPoint=$main->testPoint($_SESSION['matricule']);
                //pour coach
                    $coach=$main->getCoachDuCom($_SESSION['matricule']);
                    $main->historique(array(null,date("Y-m-d"),$date,$activity_coach, $coach['coach'],3,$idfacture));
                    $id_coach=$main->getIdStory_coach($coach['coach'],date("Y-m-d"),$date);
                    $nbPoint_coach=$main->testPoint($coach['coach']);
                //Fin coach
                 if($nbPoint){
                    $newpoint=($nbPoint->NbPoint)+ 10;
                    $main->upDatePoint(array($newpoint ,$_SESSION['matricule']));
                    if($nbPoint_coach){
                            $newpoint_coach=($nbPoint_coach->NbPoint)+ 3;
                            $main->upDatePoint(array( $newpoint_coach ,$coach['coach']));
                        }else{
                        //pour coach
                            $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
                            $main->query($sql,array(null,$coach['coach'],3));
                        //fin coach
                    }

                }else{

                    $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
                    $main->query($sql,array(null,$_SESSION['matricule'],10));
                    if($nbPoint_coach){
                            $newpoint_coach=($nbPoint_coach->NbPoint)+ 3;
                            $main->upDatePoint(array( $newpoint_coach ,$coach['coach']));
                    }else{
                        //pour coach
                            $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
                            $main->query($sql,array(null,$coach['coach'],3));
                        //fin coach
                    }

               }
         }
        $content_produit=array();
        $content_quantite=array();
        $content_produit=json_decode($_POST['content_produit']);
        $content_quantite=json_decode($_POST['content_quantite']);
        $idPrix=json_decode($_POST['idPrix']);
        //get de l'équipe du commercial
        $sql="SELECT `designationEquipe` FROM `planing_equipe` WHERE `mtrP` LIKE ? AND `statut` LIKE 'Active'";
        $equipe=$main->query($sql,array($_SESSION['matricule']));
        foreach ($content_produit as $key=>$content_produit) {
            $sql="INSERT INTO `vente`(`idVente`,`codeClient`,`quantite`, `lieu`, `date`, `idVP`, `heure`,`codeproduit`, `ville`, `quartier`,`id_equipe`,`id_historique_coach`,`facture`,`idPrix`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $main->query($sql,array(null,$_POST['codeClient'],$content_quantite[$key],$_SESSION['idMission'],date("Y-m-d"),$_SESSION['matricule'],$date,$content_produit,$_POST['ville'],$_POST['quartier'],$equipe['designationEquipe'],$id_coach,$idfacture,$idPrix[$key]));
        }
        echo "false";
 }
}
?>

