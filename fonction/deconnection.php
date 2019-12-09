<?php
session_start();
if ($_SESSION['matricule'] OR $_SESSION['DesFonction']) {
    session_unset($_SESSION['matricule']);
    session_unset($_SESSION['fonction']);
    session_unset($_SESSION['designationEquipe']); 
    session_unset($_SESSION['id']);
    session_unset($_SESSION['idMission']);
    session_unset($_SESSION['panier']);
              
    header('Location:../index.php');
}else {
    header('Location:../index.php');
}


?>