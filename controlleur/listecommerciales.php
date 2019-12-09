<?php
include_once("../include/include.php");
include("header.php");
$sql="SELECT `id`, `matricule`, `date_d_embauche`, `Nom`, `Prenom`,  `CIN_COM`, `Contact`, `Contact_flotte`, `Fonction_Acutelle`,`Statut` FROM `personnel` WHERE `Fonction_Acutelle`=? OR `Fonction_Acutelle`=?";
$data=$main->queryAll($sql,array(1,2));
$contImage=scandir("../image/personnel");

$sql1="SELECT COUNT(`id`) as conte FROM `personnel` WHERE 1 ";
$rs1=$main->query($sql1);
$n=$rs1['conte'];

$sql2="SELECT COUNT(`id`) as conte FROM `personnel` WHERE `Statut` LIKE ?";
$rs2=$main->query($sql2,array(1));
$n2=$rs2['conte'];


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
           <div class="row" style="padding-left:7px;padding-right:7px">
                <div class="col-md-12 mb-2" style="background:black;opacity:0.9;margin-top:-20px;padding-top:13px">
                    <h4 style="opacity:1;color:white;font-size:14px">Listes commerciaux du <?=date("Y-m-d")?></h4>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-12">
                     <img src="images/banniere-commerciaux.jpg" style="height:300px!important" class="bann_accueil">
                </div>
            </div>  
            <div class="row block_menu">
                <div class="col-md-3 col-sm-6 col-6 block1">
                    <div class="row contener_entite">
                        <div class="Commerciaux commerce_enregistre" style="cursor: pointer;">
                            <i class="fa fa-users"></i> <span style="font-size:26px;padding-left:10px"><?= $n ;?> </span><br> Enregistrés        
                        </div>
                        <div class="badge_accueil">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6  block2">
                    <div class="produit status_actif bg-default" style="cursor: pointer;">
                        <div class="text"><i class="fa fa-users"></i><span style="font-size:26px;padding-left:10px"><?= $n2 ;?></span><br>
                            Actifs
                        </div>
                        <div  class="badge_accueil">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6  block3">
                    <div class="Planning">
                        <div class="text"><i class="fa fa-users"></i><span style="font-size:26px;padding-left:10px">30 </span><br>bloqués
                            <?php
                            /*Prend les produits vendu du mois avec la quantite et idMission*/
                            /*$matricule="VP00080";
                            $sql_vente_mois="SELECT `quantite`,`lieu`,`date`,`codeproduit` FROM `vente` WHERE `idVP` LIKE ? AND MONTH(`date`) LIKE ?";
                            $vente=$main->queryAll($sql_vente_mois,array($matricule,10));//prend lieu,quantite,codeproduit du commerciale
                            $prix_quantite=0;
                            
                            $sql_prix_mois="SELECT `prixdetail` FROM `prix` WHERE `idMission` LIKE ? AND `idProduit` LIKE ?";
                            foreach($vente as $vente){
                                $prix=$main->query($sql_prix_mois,array($vente['lieu'],$vente['codeproduit']));//prend le prix du produit
                                $prix_quantite+=$prix['prixdetail']*$vente['quantite'];//calcul du prix avec quantité
                                
                                
                            }
                            echo $prix_quantite;*/
                            ?>
                        </div>
                        <div class="badge_accueil">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6  block4">
                    <div class="penalites">
                        <div class="text"><i class="fa fa-users"></i><span style="font-size:26px;padding-left:10px">20 </span><br>En congés</div>
                            <div class="badge_accueil">
                            </div>
                    </div>
                </div>
            </div> 
        
            <div class="row mb-2">
                <div class="col-md-12" style="background:#fff">
                    <div  class="table-responsive">
                        <table class="table" style="font-size:12px; margin-top: 10px;">
                            <input class = "form-control inputiltre"  type = "text" placeholder = "Rechercher">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Contact</th>
                                    <th>C A</th>
                                    <th>Sanction</th>
                                    <th>Salaire Previsionelle</th>
                                    <th>statut</th>
                                    <th>Plus</th>
                                </tr>
                            </thead>
                            <tbody class="tbode">
                                <?php 
                                   if($data):  
                                        foreach($data as $data):
                            
                                                
                                     $image="";
                                     $temp_image=$data['matricule'].".jpg";
                                     if(!in_array( $temp_image,$contImage)){
                                         $image="../images/avatar.png";
                                        
                                     }else{ 
                                         $image="../image/personnel/".$data['matricule'].".jpg";
                                         
                                     }
                                    
                                ?>
                                <tr>
                                    <td class=""><img class="img-thumbnail" src="<?=$image?>" width="50px" height="50" ></td>
                                    <td class=""><?=$data['matricule']?></td>
                                    <td class=""><?=$data['Nom']." ".$data['Prenom']?></td>
                                    <td class=""><?php /*
                                    $sql='SELECT `NbPoint` FROM `point` WHERE `idPersonel` LIKE ?';
                                    $point=$main->query($sql,array($data['matricule']));
                                    if($point){
                                      echo $point['NbPoint'];  
                                    }else{
                                        echo '00';
                                    }
                                    
                                    */?><?=$data['Contact']?></td>
                                    <td class="">
                                        <?= number_format ($main->ca_mois($data['matricule'],10),0,"." ," " )." Ar"; ?>
                                    </td>
                                    <td class=""></td>
                                    <td class=""><?=$data['']?></td>
                                    <td class=""><?=$data['Statut']?></td>
                                    <td class=""><a href="#"><i class="fa fa-plus"></i></a></td>

                                <tr>
                                <?php endforeach; endif;?>
                            </tbody>

                        </table>
                    </div> 
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
 </div>
  
   <?php include "footer.php";?>
 