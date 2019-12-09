<?php
    include_once('../include/include.php');
    date_default_timezone_set("Europe/Moscow");
    if(isset($_POST['heure']) AND isset($_POST['description'])){
        if(!empty($_POST['heure']) AND !empty($_POST['description'])){
            $sql="INSERT INTO `rapport`(`idr`, `date`, `type` , `heure`, `description`, `ca_journaliere`, `id_coach`) VALUES (?,?,?,?,?,?,?)";
            //calcul ca jour
            $sql_coach="SELECT `matricule` FROM `personnel` WHERE `coach` LIKE ?";
            $mes_commerciaux=$main->queryAll($sql_coach,array($_SESSION['matricule']));
            $total_ca=0;
            foreach($mes_commerciaux as $mes_commerciaux){
                $total_ca+=$main->ca_jour_com($mes_commerciaux['matricule'],date('Y-m-d'));
            }
            
            $type="rapport de vente";
            
            $date = new DateTime();
            $dt = $date->format('Y-m-d');
            $sql_test_rapport="SELECT `idr` FROM `rapport` WHERE `id_coach` LIKE ? AND `date` LIKE ? AND `type` LIKE ?";
            $rapport=$main->query($sql_test_rapport,array($_SESSION['matricule'],date('Y-m-d'),$type));
            if(!$rapport){
                $main->query($sql,array(null,$dt,'rapport de vente',$_POST['heure'],$_POST['description'],$total_ca,$_SESSION['matricule']));
                echo 'Rapport ajouté'.'&nbsp;&nbsp;<i class="fa fa-check text-success" aria-hidden="true"></i>';
            }else{
                echo 'Vous avez déjà enregistré un rapport aujourd\'hui'.'&nbsp;&nbsp;<i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>';
            }
            
        }else{
            echo 'Veuillez complétez tous les champs.&nbsp;&nbsp;<i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>';
        }
    }else{
        echo 'Erreur insertion';
    }