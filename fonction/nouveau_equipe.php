<?php
    include_once('main.php');
    $main = new main();   
  
    if(isset($_POST['nom_equipe']) AND isset($_POST['code_mission'])AND isset($_POST['matricule'])){
            //Insertion nouveau equipe
            if(!empty($_POST['nom_equipe']) AND !empty($_POST['code_mission']) AND !empty($_POST['matricule']) ){
                        $sql="INSERT INTO `planing_equipe`(`id`, `mtrP`, `statut`, `designationEquipe`) VALUES (?,?,?,?)";
                        $main->query($sql,array(NULL,$_POST['matricule'],'Active',$_POST['nom_equipe']));
            }
            else{
                echo "vide";
            }

          //insertion dans planning
         // $sql1="INSERT INTO `planing`(`idMission`,`ville`, `province`, `quartier`) VALUES (?,?,?,?)";
          //$main->query($sql,array($_POST['nouveau_equipe'],$_POST['destination_equipe'],$_POST['destination_equipe'],$_POST['destination_equipe']));
          
    }
    else{
        echo 'erreur';
    }
    
?>