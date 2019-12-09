<?php
include_once('../include/include.php');
$codeClient="";
$commercial=$_GET['com'];
$sexe=$_GET['sexe'];
$contact=$_GET['contact'];
$nom=$_GET['nom'];
$contact=$_GET['contact'];
$prenom=$_GET['Prenom'];
$ville=$_GET['ville'];
$quartier=$_GET['quartier'];

date_default_timezone_set("Europe/Moscow");
$dt=new dateTime();
$date=$dt->format("H:i:s");
$Date=$dt->format("Y-m");
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
    




$sql="SELECT `id` FROM `clientTr` WHERE 1 ORDER BY `id` DESC LIMIT 1";
$code=$main->query($sql);
if($code){
   if($code['id']<10){
      $id=(int)$code['id'] + 1;
      $codeClient="00000".$id;
   }else if($code['id']<100){
      $id=(int)$code['id']+1;
      $codeClient="00000".$id;
   }else if($code['id']<1000){
      $id=(int)$code['id']+1;
      $codeClient="0000".$id;
   }else if($code['id']<10000){
      $id=(int)$code['id']+1;
      $codeClient="000".$id;
   }else if($code['id']<100000){
      $id=(int)$code['id']+1;
      $codeClient="00".$id;
   }else if($code['id']<1000000){
      $id=(int)$code['id']+1;
      $codeClient="0".$id;
   }else if($code['id']<10000000){
      $id=(int)$code['id']+1;
      $codeClient=$id;
   }
    $codeClient="CLT-TR-".$codeClient."-".date("y")."-".date("m");

}else{
   $codeClient="CLT-TR-000001-".date("y")."-".date("m");
}


$content_produit=array();
$content_quantite=array();
$content_note=array();

$content_produit=json_decode($_GET['content_produit']);
$content_quantite=json_decode($_GET['content_quantite']);
$content_note=json_decode($_GET['content_note']);
$idPrix=json_decode($_GET['idPrix']);

$uploadOk = 1;
if($uploadOk == 0){
   echo 0;
}else{



      $activites="vente d'accompagnement";
      $activity_coach="coach client";
      $id_coach='NULL';
      
      $sql="INSERT INTO `clientTr`(`id`, `codeClient`, `Nom`, `Prenom`, `codevp`, `ville`, `sexe`, `dateNaiss`, `contact`, `quartier`) VALUES (?,?,?,?,?,?,?,?,?,?)";
      $main->query($sql,array(null,$codeClient,$nom,$prenom,$_SESSION['matricule'],$ville,$sexe,"2019-11-20",$contact,$quartier));

      $sql1="SELECT `designationEquipe` FROM `planing_equipe` WHERE `mtrP` LIKE ? AND `statut` LIKE 'Active'";
        $equipe=$main->query($sql1,array($commercial));
        
        $main->historique(array(null,date("Y-m-d"),$date,$activites, $_SESSION['matricule'],0,''));
        $id_coach=$main->getIdStory_coach($_SESSION['matricule'],date("Y-m-d"),$date);
        
        $motif=array('presentation','argumentaire','cible','comportement');
        
        foreach($content_note as $key=>$content_note){
                $sql="INSERT INTO `evaluation`(`idev`,`note`,`motif`,`id_historique_coach`) VALUES (?,?,?,?)";
                $main->query($sql,array(null,$content_note,$motif[$key],$id_coach));
        }
                    
        foreach($content_produit as $key=>$content_produit){
              $sql="INSERT INTO `vente`(`idVente`,`codeClient`,`quantite`, `lieu`, `date`, `idVP`, `heure`,`codeproduit`, `ville`, `quartier`,`id_equipe`,`id_historique_coach`,`facture`,`idPrix`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
              $main->query($sql,array(null,$codeClient,$content_quantite[$key],$_SESSION['idMission'],$dateDB,$commercial,$date,$content_produit,$_GET['ville'],$_GET['quartier'],$equipe['designationEquipe'],$id_coach, $idfacture,$idPrix[$key]));
        }
     
       /* 
      if(($date>=date("08:00:00") AND $date<date("11:30:00")) OR  ($date>=date("14:00:00") AND $date<date("17:30:00"))  ){
         $main->historique(array(null,date("Y-m-d"),$date,$activites, $commercial,50,''));
             $nbPoint=$main->testPoint($commercial);
             //pour coach
                    $coach=$main->getCoachDuCom($commercial);
                    $main->historique(array(null,date("Y-m-d"),$date,$activity_coach, $coach['coach'],7,''));
                    $id_coach=$main->getIdStory_coach($coach['coach'],date("Y-m-d"),$date);
                    $nbPoint_coach=$main->testPoint($coach['coach']);
                //Fin coach
            if($nbPoint){
                    $newpoint=($nbPoint->NbPoint)+ 50;
                    $main->upDatePoint(array( $newpoint ,$commercial));
                    if($nbPoint_coach){
                            $newpoint_coach=($nbPoint_coach->NbPoint)+ 7;
                            $main->upDatePoint(array( $newpoint_coach ,$coach['coach']));
                        }else{
                        //pour coach
                            $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
                            $main->query($sql,array(null,$coach['coach'],7));
                        //fin coach
                    }
            }else{
                    $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
                    $main->query($sql,array(null,$commercial,50));
                    if($nbPoint_coach){
                            $newpoint_coach=($nbPoint_coach->NbPoint)+ 7;
                            $main->upDatePoint(array( $newpoint_coach ,$coach['coach']));
                        }else{
                        //pour coach
                            $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
                            $main->query($sql,array(null,$coach['coach'],7));
                        //fin coach
                    }
            }

      }else if($date>=date("11:30:00") AND $date<date("14:00:00") ) {
           $main->historique(array(null,date("Y-m-d"),$date,$activite, $commercial, 25,''));
           $nbPoint=$main->testPoint($commercial);
           //pour coach
                    $coach=$main->getCoachDuCom($commercial);
                    $main->historique(array(null,date("Y-m-d"),$date,$activity_coach, $coach['coach'],3,''));
                    $id_coach=$main->getIdStory_coach($coach['coach'],date("Y-m-d"),$date);
                    $nbPoint_coach=$main->testPoint($coach['coach']);
                //Fin coach
           if($nbPoint){

                 $newpoint=($nbPoint->NbPoint)+ 25;
                 $main->upDatePoint(array($newpoint ,$commercial));
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
                  $main->query($sql,array(null,$commercial,25));
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
             $main->historique(array(null,date("Y-m-d"),$date,$activite, $commercial, 25,''));
             $nbPoint=$main->testPoint($commercial);
             //pour coach
                    $coach=$main->getCoachDuCom($commercial);
                    $main->historique(array(null,date("Y-m-d"),$date,$activity_coach, $coach['coach'],3,''));
                    $id_coach=$main->getIdStory_coach($coach['coach'],date("Y-m-d"),$date);
                    $nbPoint_coach=$main->testPoint($coach['coach']);
                //Fin coach
             if($nbPoint){

                 $newpoint=($nbPoint->NbPoint)+ 25;
                 $main->upDatePoint(array($newpoint ,$commercial));
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
                  $main->query($sql,array(null,$commercial,25));
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


        






      $activite="vente";
        if(($date>date("08:00:00") AND $date<date("12:20:00")) OR  ($date>date("14:00:00") AND $date<date("17:30:00"))  ){
            $main->historique(array(null,date("Y-m-d"),$date,$activite, $commercial,25,''));
                $nbPoint=$main->testPoint($commercial);
               if($nbPoint){
                       $newpoint=($nbPoint->NbPoint)+ 25;
                       $main->upDatePoint(array( $newpoint ,$commercial));

               }else{

                     $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
                     $main->query($sql,array(null,$commercial,25));
               }

         }else if($date>date("11:30:00") AND $date<date("14:50:00") ) {
              $main->historique(array(null,date("Y-m-d"),$date,$activite, $commercial, 15,''));
              $nbPoint=$main->testPoint($commercial);
              if($nbPoint){
                    $newpoint=($nbPoint->NbPoint)+ 15;
                    $main->upDatePoint(array($newpoint ,$commercial));

               }else{
                   $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
                   $main->query($sql,array(null,$commercial,15));
               }

         }else if($date>date("17:30:00") AND $date<date("19:00:00")) {
                $main->historique(array(null,date("Y-m-d"),$date,$activite, $commercial, 10,''));
                $nbPoint=$main->testPoint($commercial);
                 if($nbPoint){
                    $newpoint=($nbPoint->NbPoint)+ 10;
                    $main->upDatePoint(array($newpoint ,$commercial));

                }else{

                    $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
                    $main->query($sql,array(null,$commercial,10));

               }
         }





        //get de l'équipe du commercial
        $sql1="SELECT `designationEquipe` FROM `planing_equipe` WHERE `mtrP` LIKE ? AND `statut` LIKE 'Active'";
        $equipe=$main->query($sql1,array($commercial));
        foreach ($content_produit as $key=>$content_produit) {
            $sql="INSERT INTO `vente`(`idVente`,`codeClient`,`quantite`, `lieu`, `date`, `idVP`, `heure`,`codeproduit`, `ville`, `quartier`,`id_equipe`,`id_historique_coach`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                $main->query($sql,array(null,'',$content_quantite[$key],$_SESSION['idMission'],$dateDB,$commercial,$date,$content_produit,$_GET['ville'],$_GET['quartier'],$equipe['designationEquipe'],$id_coach));
        }




*/



      echo $location;
      echo "false";
   /*}else{
      echo 0;
   }*/
 }

?>