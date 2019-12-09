<?php
include_once("../include/include.php");
if(isset($_POST['valeur']) AND !empty($_POST['valeur'])):
    $cont="<tr>";
    $codeproduit=explode("|",$_POST['valeur']);
    $sql="SELECT `idMission` FROM `mission` WHERE 1";
    $lieu=$main->queryAll($sql);
foreach($lieu as $lieu ):    
    $sql="SELECT `prixdetail`,`prixgros` FROM `prix` WHERE `idMission` = ? AND  `statut` LIKE 'on' AND idProduit LIKE ?";
    $prix=$main->query($sql,array($lieu['idMission'],$codeproduit[0]));
    if($prix){
       $cont.='<td>'.number_format($prix['prixdetail'],2,',',' ').'</td><td>'.number_format($prix['prixgros'],2,',',' ').'</td>'; 
    }else{
        $cont.='<td>'.number_format(000,2,',',' ').'</td><td>'.number_format(000,2,',',' ').'</td>';
    }
     
endforeach;
$cont.='</tr>';
echo $cont;
endif;
?>

    