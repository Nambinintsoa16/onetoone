<?php
     include_once("../include/include.php");
     $sql="SELECT `idCategorie` FROM `categorie` WHERE `famille` LIKE ? AND `type` LIKE ?";
     $sql1="INSERT INTO `produit`(`idProduit`,`designation`,`description`,`ingredient`,`quantite`,`modedutilisation`,`idCategorie`,`argumentaire`,`presentation`) VALUES (?,?,?,?,?,?,?,?,?)";
     if(isset($_POST['famille']) AND isset($_POST['type'])  AND isset($_POST['idproduit']) AND isset($_POST['designation']) AND isset($_POST['description']) AND isset($_POST['ingredient']) AND isset($_POST['quantite'])){
        if(!empty($_POST['famille']) AND !empty($_POST['type']) AND !empty($_POST['idproduit']) AND !empty($_POST['designation']) AND !empty($_POST['description']) AND !empty($_POST['ingredient']) AND !empty($_POST['quantite'])){
                $resultat = $main->query($sql,array($_POST['famille'],$_POST['type']));
                $resultat1=$main->query($sql1,array($_POST['idproduit'],$_POST['designation'],$_POST['description'],$_POST['ingredient'],$_POST['quantite'],$_POST['modedutilisation'],$resultat['idCategorie'],$_POST['argumentaire'],$_POST['presentation']));
                echo "true";
        }else{
             echo "false-1";
        }
    }else{
         echo "false-2";
     }
?>