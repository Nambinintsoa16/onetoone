<?php
include_once('../include/include.php');
date_default_timezone_set("Europe/Moscow");
$dt=new dateTime();
$date=$dt->format("H:i:s");
$commercial=$_POST['com'];



if (isset($_POST['content_produit']) AND isset($_POST['content_quantite']) AND isset($_POST['ville']) AND isset($_POST['quartier']) AND isset($_POST['content_note']) ) {
    if (!empty($_POST['content_produit']) AND !empty($_POST['content_quantite']) AND !empty($_POST['ville']) AND !empty($_POST['quartier']) AND !empty($_POST['content_note']) ) {
          $activites="vente d'accompagnement";
          $id_coach='NULL';
        
        $content_produit=array();
        $content_quantite=array();
        $content_note=array();
        
        $content_produit=json_decode($_POST['content_produit']);
        $content_quantite=json_decode($_POST['content_quantite']);
        $content_note=json_decode($_POST['content_note']);
        
        //get de l'équipe du commercial
        $sql="SELECT `designationEquipe` FROM `planing_equipe` WHERE `mtrP` LIKE ? AND `statut` LIKE 'Active'";
        $equipe=$main->query($sql,array($commercial));
        
         $main->historique(array(null,date("Y-m-d"),$date,$activites, $_SESSION['matricule'],0,''));
        $id_coach=$main->getIdStory_coach($_SESSION['matricule'],date("Y-m-d"),$date);
        
        $motif=array('presentation','argumentaire','cible','comportement');
     
        foreach($content_note as $key=>$content_note){
                $sql="INSERT INTO `evaluation`(`idev`,`note`,`motif`,`id_historique_coach`) VALUES (?,?,?,?)";
                $main->query($sql,array(null,$content_note,$motif[$key],$id_coach));
        }
    
      $idPrix=json_decode($_POST['idPrix']);
        foreach ($content_produit as $key=>$content_produit) {
            $sql="INSERT INTO `vente`(`idVente`,`codeClient`,`quantite`, `lieu`, `date`, `idVP`, `heure`,`codeproduit`, `ville`, `quartier`,`id_equipe`,`id_historique_coach`,`idPrix`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $main->query($sql,array(null,null,$content_quantite[$key],$_SESSION['idMission'],date("Y-m-d"),$commercial,$date,$content_produit,$_POST['ville'],$_POST['quartier'],$equipe['designationEquipe'],$id_coach,$idPrix[$key]));
          }
          var_dump($idPrix);
 }
}
?>



