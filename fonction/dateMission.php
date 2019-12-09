<?php
    include_once('main.php');
    $main = new main();   
  
    if(isset($_POST['nom_equipe']) AND isset($_POST['date_depart']) AND isset($_POST['date_retour'])){
            //Insertion nouveau equipe
            if(!empty($_POST['nom_equipe']) AND !empty($_POST['date_depart']) AND !empty($_POST['date_retour']) ){
                        $sql="INSERT INTO `equipe`(`idEqupe`, `date_depart`, `date_retour`, `IdEquipe`) VALUES (?,?,?,?)";
                        $main->query($sql,array(NULL,$_POST['date_depart'],$_POST['date_retour'],$_POST['nom_equipe']));
                        echo"reussi";
            }
            else{
                echo "vide";
            }

          
    }
    else{
        echo 'erreur';
    }
    
?>