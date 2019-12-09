<?php
    include_once("../include/include.php");
 
    if(isset($_POST['valeur']) AND !empty($_POST['valeur']) AND isset($_POST['modif'])  AND !empty($_POST['modif']) AND  !empty($_POST['data']) AND isset($_POST['data'])){
       
       if($_POST['modif']=="description"){ 
         $sql="UPDATE `produit` SET `description`= ?  WHERE  `idProduit` LIKE ?";
         $sql1='SELECT `description` FROM `produit` WHERE `idProduit` LIKE ?';
         $main->query($sql,array($_POST['data'],$_POST['valeur']));
         $retour=$main->query($sql1,array($_POST['valeur']));
         echo $retour['description'];
       }else if($_POST['modif']=="ingredient"){
           $sql="UPDATE `produit` SET `ingredient`= ?  WHERE  `idProduit` LIKE ?";
           $sql1='SELECT `ingredient` FROM `produit` WHERE `idProduit` LIKE ?';
           $main->query($sql,array($_POST['data'],$_POST['valeur']));
           $retour=$main->query($sql1,array($_POST['valeur']));
           echo $retour['ingredient'];
           
         }else if($_POST['modif']=="modedutilisation"){
           $sql="UPDATE `produit` SET `modedutilisation`= ? WHERE  `idProduit` LIKE ?"; 
           $sql1='SELECT `modedutilisation` FROM `produit` WHERE `idProduit` LIKE ?';
           $main->query($sql,array($_POST['data'],$_POST['valeur']));
           $retour=$main->query($sql1,array($_POST['valeur']));
           echo $retour['modedutilisation'];
         }else if($_POST['modif']=="argumentaire"){
           $sql="UPDATE `produit` SET `argumentaire`=? WHERE  `idProduit` LIKE ?";  
           $sql1='SELECT `argumentaire` FROM `produit` WHERE `idProduit` LIKE ?';
           $main->query($sql,array($_POST['data'],$_POST['valeur']));
           $retour=$main->query($sql1,array($_POST['valeur']));
          echo $retour['argumentaire'];
         }else if($_POST['modif']=="presentation"){
          $sql="UPDATE `produit` SET `presentation`= ? WHERE `idProduit` LIKE ?";
          $sql1='SELECT `presentation` FROM `produit` WHERE `idProduit` LIKE ?';
          $main->query($sql,array($_POST['data'],$_POST['valeur']));
          $retour=$main->query($sql1,array($_POST['valeur']));
           echo $retour['presentation'];
          }
        
    }else{
?>

<p><i class="fa fa-warning"></i> aucun element retourner</p>

<?php
    }
    
?>