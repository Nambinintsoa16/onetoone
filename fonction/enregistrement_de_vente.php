<?php
include_once('../include/include.php');
include ('../image/QRCode/qrcode.php');  


$heure=date('h:m:s');
$json=array("Message"=>"true");
$codeClient="";
date_default_timezone_set("Europe/Moscow");
$dt=new dateTime();
$date=$dt->format("H:i:s");

if(isset($_POST['contact']) AND isset($_POST['anne']) AND isset($_POST['mois']) AND isset($_POST['jour']) AND isset($_POST['sexe']) AND isset($_POST['Prenom']) AND isset($_POST['Nom']) AND isset($_POST['content_quantite']) AND isset($_POST['content_produit']) AND isset($_POST['ville']) AND isset($_POST['quartier'])){
   if(!empty( $_POST['content_produit']) AND !empty($_POST['ville']) AND !empty($_POST['quartier'])){
  
   if($date>date("06:00:00") AND $date<date("19:00:00")){
   
 
 
 if(!empty($_POST['contact']) AND  !empty($_POST['anne']) AND !empty($_POST['mois']) AND !empty($_POST['sexe']) AND !empty($_POST['Prenom']) AND !empty($_POST['Nom'])){
      if(!empty($_POST['jour']) ){
       $dateNaiss=$_POST['jour']."-".$_POST['mois']."-".$_POST['anne'];
      }else if(empty($_POST['jour'])) {
       $dateNaiss=$_POST['mois']."-".$_POST['anne'];
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
   $activite="vente";
   if(($date>date("08:00:00") AND $date<date("12:20:00")) OR  ($date>date("14:00:00") AND $date<date("17:30:00"))  ){
      $main->historique(array(null,date("Y-m-d"),$date,$activite, $_SESSION['matricule'],25));
      //historique du coach
     /* $coach = $main->getCoachDuCom($_SESSION['matricule']);
      $main->historique(array(null,date("Y-m-d"),$date,'coach', $coach['coach'],25));*/
          $nbPoint=$main->testPoint($_SESSION['matricule']);
         if($nbPoint){
                 $newpoint=($nbPoint->NbPoint)+ 50;  
                 $main->upDatePoint(array( $newpoint ,$_SESSION['matricule'])); 
                 /*
              $main->upDatePoint(array($newpoint ,$_SESSION['coach']));**/
         }else{
                 $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
                 $main->query($sql,array(null,$_SESSION['matricule'],50)); 
         }
      
   }else if($date>date("11:30:00") AND $date<date("14:50:00") ) {
        $main->historique(array(null,date("Y-m-d"),$date,$activite, $_SESSION['matricule'], 15));
        $nbPoint=$main->testPoint($_SESSION['matricule']);
        if($nbPoint){
          
              $newpoint=($nbPoint->NbPoint)+ 25; 
              $main->upDatePoint(array($newpoint ,$_SESSION['matricule']));  
              
         }else{
             
               $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
               $main->query($sql,array(null,$_SESSION['matricule'],25));  
           
         }
        
   }else if($date>date("17:30:00") AND $date<date("19:00:00")) {
          $main->historique(array(null,date("Y-m-d"),$date,$activite, $_SESSION['matricule'], 10));
          $nbPoint=$main->testPoint($_SESSION['matricule']);
          if($nbPoint){
              
              $newpoint=($nbPoint->NbPoint)+ 25;  
              $main->upDatePoint(array($newpoint ,$_SESSION['matricule']));  
           
          }else{
          
               $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
               $main->query($sql,array(null,$_SESSION['matricule'],25));  
            
          
         }
   }
   
   
   
   
 
   
   $sql="INSERT INTO `clientTr`(`id`, `contact`,`codeClient`, `Nom`, `Prenom`, `codevp`, `ville`, `sexe`, `dateNaiss`) VALUES (?,?,?,?,?,?,?,?,?)";
   $main->query($sql,array(null,$_POST['contact'],$codeClient,$_POST['Nom'],$_POST['Prenom'],$_SESSION['matricule'],$_POST['ville'],$_POST['sexe'],$dateNaiss));
   $qc = new QRCODE(); 
   $qc->TEXT($codeClient);
   $qc->QRCODE(400,$codeClient);
   $json['Message']="false";
 }else{
     $codeClient=null;
 }
 
  if(!empty($_POST['codeClient'])){
      
      $codeLientTemp=explode("|",$_POST['codeClient']);
      $codeClient=$codeLientTemp[0];
  }
   
$content_produit=array();
$content_quantite=array();
$content_produit=json_decode($_POST['content_produit']);
$content_quantite=json_decode($_POST['content_quantite']);
if(!empty($content_quantite)){
    
    
    
    
    if(($date>date("08:00:00") AND $date<date("12:20:00")) OR  ($date>date("14:00:00") AND $date<date("17:30:00"))  ){
      $main->historique(array(null,date("Y-m-d"),$date,$activite, $_SESSION['matricule'],25));
          $nbPoint=$main->testPoint($_SESSION['matricule']);
         if($nbPoint){
                 $newpoint=($nbPoint->NbPoint)+ 25;  
                 $main->upDatePoint(array( $newpoint ,$_SESSION['matricule']));

         }else{
          
               $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
               $main->query($sql,array(null,$_SESSION['matricule'],25));  
         }
      
   }else if($date>date("11:30:00") AND $date<date("14:50:00") ) {
        $main->historique(array(null,date("Y-m-d"),$date,$activite, $_SESSION['matricule'], 15));
        $nbPoint=$main->testPoint($_SESSION['matricule']);
        if($nbPoint){
              $newpoint=($nbPoint->NbPoint)+ 15;  
              $main->upDatePoint(array($newpoint ,$_SESSION['matricule']));  

         }else{
             $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
             $main->query($sql,array(null,$_SESSION['matricule'],15));   
         }
        
   }else if($date>date("17:30:00") AND $date<date("19:00:00")) {
          $main->historique(array(null,date("Y-m-d"),$date,$activite, $_SESSION['matricule'], 10));
          $nbPoint=$main->testPoint($_SESSION['matricule']);
           if($nbPoint){
              $newpoint=($nbPoint->NbPoint)+ 10;  
              $main->upDatePoint(array($newpoint ,$_SESSION['matricule']));  
     
          }else{

              $sql="INSERT INTO `point`(`id`, `idPersonel`, `NbPoint`) VALUES (?,?,?)";
              $main->query($sql,array(null,$_SESSION['matricule'],10));  
 
         }
   }
    
    
    
    
    
  foreach ($content_produit as $key=>$content_produit) {

       $sql="INSERT INTO `vente`(`idVente`,`codeClient`,`quantite`, `lieu`, `date`, `idVP`, `heure`,`codeproduit`, `ville`, `quartier`) VALUES (?,?,?,?,?,?,?,?,?,?)";
       $main->query($sql,array(null,$codeClient,$content_quantite[$key],$_SESSION['idMission'],$dateDB,$_SESSION['matricule'],$heure,$content_produit,$_POST['ville'],$_POST['quartier']));
   
  }
  
   $json['Message']="false";
  } 
  
   }else{
       $json['Message']="0";
   }
 }else{
    $json['Message']="0";  
 }
}else{
     $json['Message']="0";
}
echo json_encode($json);
?>