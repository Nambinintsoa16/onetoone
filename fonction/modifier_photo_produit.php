<?php
include_once('../include/include.php');
if(isset($_FILES['image']) AND isset($_POST['codeproduit'])){
	if(!empty($_FILES['image']) AND !empty($_POST['codeproduit'])){
      $codeproduit=explode("|",$_POST['codeproduit']);
      $image=$_FILES['image']['tmp_name'];
      $extentionup=strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
      $extentionValide=array('jpg','JPG','PNG','pmg','gif');
   if(array($extentionup,$extentionValide)){

      $thumb=$codeproduit[0].'.'.$extentionup;
  	  $chemien="../image/produit/".$codeproduit[0].'.'.$extentionup;
      $resultat=move_uploaded_file($image,$chemien);

      }
     }
    header('location:/admin/accueil.php?page=modifier_photo_produit');
    }else{
    header('location:/admin/accueil.php?pagemodifier_photo_produit');
    }



?>
