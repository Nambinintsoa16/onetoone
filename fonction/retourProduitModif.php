<?php
    include_once("../include/include.php");
    $array=array();
    if(isset($_POST['valeur']) AND !empty($_POST['valeur'])){
        $sql="SELECT `description`, `ingredient`,`modedutilisation`,`presentation`,`argumentaire` FROM `produit` WHERE `idProduit` LIKE ?";
        $tempIdProduit=explode("|",$_POST['valeur']);
       
        $result=$main->query($sql,array($tempIdProduit[0]));
         $array["description"]=$result['description'];
         $array["ingredient"]=$result['ingredient'];
         $array["modedutilisation"]=$result['modedutilisation'];
         $array["presentation"]=$result['presentation'];
         $array["argumentaire"]=$result['argumentaire'];
    }
    echo json_encode($array);  
?>