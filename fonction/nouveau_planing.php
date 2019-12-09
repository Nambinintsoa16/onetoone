<?php
    include_once('main.php');
    $main = new main();   
    
    //insertion table planing
    if(isset($_POST['date_depart']) and isset($_POST['date_retour']) and isset($_POST['destination']) and isset($_POST['code_mission']) and isset($_POST['nom_equipe']) and isset($_POST['panier'])){
        if(!empty($_POST['date_depart']) and !empty($_POST['date_retour']) and !empty($_POST['destination']) and !empty($_POST['code_mission']) and !empty($_POST['nom_equipe']) and !empty($_POST['panier'])){
                $dateDepart=$_POST['date_depart'];
                $Arriver=$_POST['date_retour'];
                $dt=new dateTime($dateDepart);
                $date=$dt->format("Y-m-d");
                
                $dtdtemp=new dateTime($dateDepart);
                $dtdtemp->modify("-1 day");
                $dtdtemps=$dtdtemp->format("Y-m-d");
                $dtTemp=$dtdtemps;
                
                $dtr=new dateTime($Arriver);
                $dateAr=$dtr->format("Y-m-d");
                $dateArriver=$dateAr;
                
                do{
                  
                  $dt=new dateTime($dtTemp);
                  $dt->modify("+1 day");
                  $date=$dt->format("Y-m-d"); 
                  $sql1="INSERT INTO `planing`(`idPL`,`idMission`, `date`, `ville`, `province`, `quartier`,`IdEquipe`,`Panier`) VALUES (?,?,?,?,?,?,?,?)";
                  $main->query($sql1,array(NULL,$_POST['code_mission'],$date,$_POST['destination'],$_POST['destination'],$_POST['destination'],$_POST['nom_equipe'],$_POST['panier']));
                  
                  $dtTemp="";
                  $dtTemp=$date;
                   
                }while($date!=$dateArriver);
                
                
                echo '<h4 class="text-success text-center">Nouvelle equipe ajouté</h4>';
        }else{
            echo '<h4 class="text-danger text-center">Veuillez complete tous les champs</h4>';
        }
    }else{
        echo '<h4 class="text-danger text-center">Erreur d`\' insertion</h4>';
    }
?>