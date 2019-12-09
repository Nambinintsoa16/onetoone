<?php
include_once('../include/include.php');
$json=array("error"=>true);
if(isset($_POST['codeproduit'])){
    $sql="SELECT `id` FROM `panier` WHERE `desigbation` LIKE ? AND  `IdProduit` LIKE ?";    
    $existePanier=$main->query($sql,array($_SESSION['panier'],$_POST['codeproduit']));
    if($existePanier){
     $sql="SELECT `prixdetail`,`idPrix` FROM `prix` WHERE `idMission` LIKE ? AND `idProduit` LIKE ? AND `statut` LIKE 'on'";
     $prix=$main->query($sql,array($_SESSION['idMission'],$_POST['codeproduit']));
     $sql="SELECT `designation`,`idProduit`,`quantite` FROM `produit` WHERE `idProduit` LIKE  ?";
     $reponse=$main->query($sql,array($_POST['codeproduit']));
     $json['codeproduit']=$reponse['idProduit'];
     $json['prix']=number_format($prix['prixdetail'],2,",",".");
     $json['designation']=$reponse['designation'];
     $json['quantite']='<th>'.$reponse['quantite'].'</th>';
     $json['photoproduit']='<th><img style="width:50px;"src=../image/produit/'.$reponse['idProduit'].'></th>';
     $json['Message']='Produit trouver';
     $json['idPrix']=$prix['idPrix'];
     $json['error']=false;
    }else{
       $json['Message']="Produit indisponible."; 
    } 
}else{
     	$json['Message']="Aucun resultat.";
     }
echo json_encode($json);
?>
