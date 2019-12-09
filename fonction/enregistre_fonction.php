<?php
include_once("../include/include.php");
if(isset($_POST['fonction']) AND !empty($_POST['fonction'])){
    $sql="SELECT `id` FROM `fonction` WHERE `DesFonction` LIKE ?";
    $result=$main->query($sql,array($_POST['fonction']));
    if($result){
        echo 1;
    }else{
       $sql="INSERT INTO `fonction`(`id`, `DesFonction`) VALUES (?,?)";
       $result=$main->query($sql,array(null,$_POST['fonction']));
       echo '3';
    }
}else{
    echo '0';
}

?>