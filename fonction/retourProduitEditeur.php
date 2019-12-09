<?php
    include_once("../include/include.php");
 
    if(isset($_POST['valeur']) AND !empty($_POST['valeur']) AND isset($_POST['modif'])  AND !empty($_POST['modif'])){
        $sql="SELECT `description`, `ingredient`,`modedutilisation`,`presentation`,`argumentaire` FROM `produit` WHERE `idProduit` LIKE ?";
        $tempIdProduit=explode("|",$_POST['valeur']);
       
        $result=$main->query($sql,array($tempIdProduit[0]));
       if($_POST['modif']=="ingredient"){
             echo $result['ingredient'];
         }else if($_POST['modif']=="modedutilisation"){
             echo $result['modedutilisation'];
         }else if($_POST['modif']=="argumentaire"){
             echo $result['argumentaire'];
         }else if($_POST['modif']=="presentation"){
            echo $result['presentation']; 
         }
        
    }else{
?>

<p><i class="fa fa-warning"></i> aucun element retourner</p>

<?php
    }
    
?>