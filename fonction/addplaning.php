<?php
include_once('../include/include.php');
if(isset($_POST['idMission']) AND isset($_POST['date']) AND isset($_POST['ville']) AND isset($_POST['province']) AND isset($_POST['quartier']) AND isset($_POST['IdEquipe'])AND isset($_POST['Panier'])){
    if(!empty($_POST['idMission']) AND !empty($_POST['date']) AND !empty($_POST['ville']) AND !empty($_POST['province']) AND !empty($_POST['quartier']) AND !empty($_POST['IdEquipe'])AND !empty($_POST['Panier'])){
       $sql="INSERT INTO `planing`(`idPL`, `idMission`, `date`, `ville`, `province`, `quartier`, `IdEquipe`, `Panier`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])";
       $main->query($sql,array(null,$_POST['idMission'],$_POST['date'],$_POST['ville'],$_POST['province'],$_POST['quartier'],$_POST['IdEquipe'],$_POST['Panier']));
    }  
}

?>
