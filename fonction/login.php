<?php
include_once('../include/include.php');
$json=array();
 $_SESSION['matricule']=array();
if(isset($_POST['matricule']) AND isset($_POST['pass'])){
   if(!empty($_POST['matricule'])){
     $sql="SELECT `matricule`,`Fonction_Acutelle` FROM `personnel` WHERE `matricule` LIKE  ? AND  `mode_de_pass_login` LIKE ?";
     $matricule=$main->query($sql,array($_POST['matricule'],$_POST['pass']));
      if($matricule){
          $sql="SELECT `DesFonction` FROM `fonction` WHERE  `id` LIKE ?";
          $fonction=$main->query($sql,array($matricule['Fonction_Acutelle']));
          if($fonction['DesFonction']=="Commercial" OR $fonction['DesFonction'] =="Animatrice"){
              $sql="SELECT `designationEquipe` FROM `planing_equipe` WHERE `mtrP` LIKE ? AND `statut` LIKE 'Active'";
              $equipe=$main->query($sql,array($_POST['matricule']));
              $sql="SELECT `Panier`,`idMission` FROM `planing` WHERE `date` LIKE '".date("Y-m-d")."' AND `IdEquipe` = ?";
              $panier=$main->query($sql,array($equipe['designationEquipe']));
              $_SESSION['designationEquipe'] = $equipe['designationEquipe'];
              $_SESSION['id']= $equipe['id'];
              $_SESSION['idMission']=$panier['idMission'];
              $_SESSION['panier']= $panier['Panier'];
              $_SESSION['matricule']=$matricule['matricule'];
              $_SESSION['fonction']=$fonction['DesFonction'];
            header('Location:../commercial/accueil.php');
          }else if($fonction['DesFonction']=="Coach"){
            $_SESSION['matricule']=$matricule['matricule'];
            $_SESSION['fonction']=$fonction['DesFonction'];
            header('Location:../coach/index.php');
          }else if($fonction['DesFonction']=="Controlleur"){
            $_SESSION['matricule']=$matricule['matricule'];
            $_SESSION['fonction']=$fonction['DesFonction'];
            header('Location:../controlleur/');  
          }
          
          

      }else{
        $sql='SELECT `matricul` FROM `respstock` WHERE `matricul` LIKE ?  AND  `pass` LIKE ?';
        $matricules=$main->query($sql,array($_POST['matricule'],$_POST['pass']));
        if ($matricules) {
           $_SESSION['matricule']=$matricules['matricul'];
           header('Location:../stock/accueil.php');
        }else{

         $sql="SELECT `matricule` FROM `admin` WHERE `users` LIKE ? AND  `pass` LIKE ?";
         $admin=$main->query($sql,array($_POST['matricule'],$_POST['pass']));
           if($admin){
            $_SESSION['matricule']=$admin['matricule'];
            header('Location:../admin/accueil.php');
           }

        }

      }
   }
}
?>

