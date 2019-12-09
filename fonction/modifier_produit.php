
<?php
include_once("../include/include.php");

if( isset($_POST['presentation']) AND isset($_POST['idproduit']) AND isset($_POST['description']) AND isset($_POST['ingredient']) AND isset($_POST['modedutilisation']) AND isset($_POST['argumentaire'])){
    if(!empty($_POST['presentation']) AND !empty($_POST['idproduit']) AND !empty($_POST['description']) AND !empty($_POST['ingredient']) AND !empty($_POST['modedutilisation']) AND !empty($_POST['argumentaire'])){
     $sql="UPDATE `produit` SET `presentation`=? , `description`=?,`ingredient`=?,`modedutilisation`=?,`argumentaire`=? WHERE `idProduit` LIKE ?";
     $main->query($sql,array( $_POST['presentation'],$_POST['description'],$_POST['ingredient'],$_POST['modedutilisation'],$_POST['argumentaire'],$_POST['idproduit']));
        echo "true";
    }else{
        echo "false-1";
    }
}else if(isset($_POST['details']) AND !empty($_POST['details']) AND isset($_POST['idproduit']) AND !empty($_POST['idproduit']) AND isset($_POST['test']) AND !empty($_POST['test'])){
         /*$sql="UPDATE `produit` SET `modedutilisation`=? WHERE `idProduit` LIKE ? ";
         $main->query($sql,array($_POST['modedutilisation'],$_POST['idproduit']));*/
         if($_POST['test']=="utilisation"){
             $sql="UPDATE `produit` SET `modedutilisation`=? WHERE `idProduit` LIKE ?";
             $main->query($sql,array($_POST['details'],$_POST['idproduit']));
             echo "Modification terminé utilisation";
         }else if($_POST['test']=="argumentaire"){
             $sql="UPDATE `produit` SET `argumentaire`=? WHERE `idProduit` LIKE ?";
             $main->query($sql,array($_POST['details'],$_POST['idproduit']));
             echo "Modification terminé argumentaire";
         }else if($_POST['test']=="ingredient"){
             $sql="UPDATE `produit` SET `ingredient`=? WHERE `idProduit` LIKE ?";
             $main->query($sql,array($_POST['details'],$_POST['idproduit']));
             echo "Modification terminé ingredient";
         }else if($_POST['test']=="presentation"){
            $sql="UPDATE `produit` SET `presentation`=? WHERE `idProduit` LIKE ?";
             $main->query($sql,array($_POST['details'],$_POST['idproduit']));
             echo "Modification terminé presentation ";
         }
         
}

?>