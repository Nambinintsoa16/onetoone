<?php
include_once('../fonction/main.php');
$dbfacebook=new main('localhost','inexped1_gestiondevente','inexped1_admin','crea.dev.121*');
$sql="SELECT `Nom`,`Prenom`,`Fonction_Acutelle` FROM `personnel` WHERE `matricule` LIKE '".$_SESSION['matricule']."'";
$matricule=$main->query($sql);
$main_function->chiffreAffaireFB($mois_en_cours,$_SESSION['matricule']);
$point=$main->getPoint($_SESSION['matricule']);
$sql="SELECT DISTINCT `date` FROM `vente` WHERE `idVP` LIKE ? AND `date`  LIKE  '".date("Y-m")."-%'";
$date=$main->queryAll($sql,array($_SESSION['matricule']));
$sql="SELECT DISTINCT facture.NumFact FROM `client`,`facture` WHERE facture.datedefacture LIKE '".date("Y-m-")."%'  AND  facture.idclient LIKE client.idclient AND client.idVP LIKE '".$_SESSION['matricule']."'";
$resultat=$dbfacebook->queryAll($sql);
$montant=0;
$qunatite=0;

 $data=$main->progress($_SESSION['matricule']);
 $tabcouleur=['#e91e63','#0099CC','#9933CC','#ad1457','#3949ab','#00acc1'];
     if($data['point']<1800){
       $pointM=($data['point']*100)/1800;
       $poindD=100-$pointM;
       $i=0;
      $statDeb="0";
      $statFin="1800";
     }else if($data['point']<3600){
      $pointM=($data['point']*100)/3600;
      $poindD=100-$pointM;
      $i=1;
      $statDeb="1800";
      $statFin="3600";
     }else if($data['point']<5400){
      $pointM=($data['point']*100)/5400;
      $poindD=100-$pointM;
      $i=2;
      $statDeb="3600";
      $statFin="5400";
     }else if($data['point']<7200){
      $pointM=($data['point']*100)/7200;
      $poindD=100-$pointM;
      $i=3;
      $statDeb="5400";
      $statFin="72000";
     }else if($data['point']<9000){
      $pointM=($data['point']*100)/9000;
      $poindD=100-$pointM;
      $i=4;
      $statDeb="7200";
      $statFin="9000";
     }else if($data['point']<10800){
      $pointM=($data['point']*100)/10800;
      $poindD=100-$pointM;
      $i=5;
      $statDeb="9000";
      $statFin="10800";
    }else{
        $i=5;
        $statDeb="9000";
      $statFin="10800";
    }
    /*STATUT ANNUELEE*/
    $bgcouleurAn=['#149046','#614e1a','#C0C0C0','#f2e02e'];
$point=$main->getPoint($_SESSION['matricule']);

  if($point->NbPoint<70000){
    $pointP=(100*$point->NbPoint)/70000;
    $restPoint=100-$pointP;
    $j=0;
    $statAn="N";
    $debAn="0";
    $finAn="70000";
  }else if($point->NbPoint<90000 ){
    $pointP=(100*$point->NbPoint)/90000;
    $restPoint=100-$pointP;
    $statAn="B";
    $j=1;
    $debAn="70000";
    $finAn="90000";
  }else if($point->NbPoint<130000){
    $pointP=(100*$point->NbPoint)/130000;
    $restPoint=100-$pointP;
    $statAn="S";
    $j=2;
    $debAn="90000";
    $finAn="130000";
  }
  else{
         $pointP=(100*$point->NbPoint)/130000;
        $restPoint=100-$pointP;
      $statAn="G";
      $j=3;
  }     
?>
<style>
.entete{
    background:#fff; 
    padding:5px 10px;
    font-size:12px!important;
}
.img-profile{
    width:100%;
    height:120px;
    overflow:hidden;
    object-fit:cover;
    z-index:111;
}
@media (min-width:720px){
    .img-profile{
        height:250px;
    }
}

.statut{
    /*background:#149046;*/
    height:35px;
    width:100%; 
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    margin-top:-5px;
    z-index:22222;
    font-size:10px;
}

.statut2{
    height:35px;
    width:60px; 
    
/*    border-bottom-right-radius: 5px;*/
    margin-top:-5px;
    /*z-index:22222;*/
    font-size:10px;
  /*  padding: 10px;*/
    border-radius: 5px;
    
}

.statut > h3{
    font-size:14px;
    color:#fff;
    padding:10px 0px;
}

.detail > h3 {
    font-size:16px;
    color:#000;
    font-weight:normal;
}
.detail:hover{
    color:#000!important;
}
table > tbody > tr > td{
    padding:7px!important;
    font-size:9px!important;
}
.point{
    background:#FF8800;padding:5px 5px;color:#fff;
}
</style>


<div class="container-fluid" style="background-color:rgba(0,0,0,.05);" >
    
    <div class="container" style="">
           <div class="row entete" style="">
               <div class="col-md-5 col-sm-5 col-5">
                   
                   <a href="../image/personnel/<?=$_SESSION['matricule'].".jpg"?>"data-lightbox="roadtrip" title="">
                       <img src="../image/personnel/<?=$_SESSION['matricule'].".jpg"?>" class="img-thumbnail img-responsive  img-profile"  style="" alt="...">
                   </a>
                    <div>
                        <div>
                            <div class="statut" style="padding:0px 0px;padding-top:-5px!important;color:#fff;background-color:<?=$tabcouleur[$i];?>">
                                                   
                                    <?php
                          
                                      if($data['point']<1800){
                                        $statutCouleur="Beginner";
                                        
                                    ?>
                                    <h3 class="text-center" style="font-size:10px;"> <span style='padding-right:5px;'><?=$statutCouleur;?></span> <br>
     
                                    <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#808080;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#808080;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#808080;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#808080;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#808080;"></i>
                                  </h3>
                                    <?php }else if($data['point']<3600){
                                        $statutCouleur="Intermediate";
                                        
                                    ;?>
                                    <h3 class="text-center" aria-hidden="true" style="font-size:10px;"> <?=$statutCouleur;?> <br>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#808080;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#808080;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#808080;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#808080;"></i>
                                   </h3>
                                    <?php }else if($data['point']<5400){
                                        $statutCouleur="Advanced 1";
                                        
                                    ?>
                                    <h3 class="text-center" aria-hidden="true" style="font-size:10px;"> <?=$statutCouleur?> <br>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#808080;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#808080;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#808080;"></i>
                                    </h3>
                                    <?php }else if($data['point']<7200){
                                        $statutCouleur="Advanced 2";
                                       
                                    ?>
                                    <h3 class="text-center" aria-hidden="true" style="font-size:10px;"> <?=$statutCouleur;?> <br>
                                     <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#808080;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#808080;"></i>
                                   </h3>
                                    <?php }else if($data['point']<9000){
                                        $statutCouleur="Professionel";
                                        
                                    ?>
                                    <h3 class="text-center" aria-hidden="true" style="font-size:10px;"><?=$statutCouleur?> <br> 
                                     <i class="fa fa-star" aria-hidden="true" style="color:#FFD877;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#FFD877;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#FFD877;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#FFD877;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#FFD877;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color:#808080;"></i>
                                    </h3>
                                    <?php }else if($data['point']<10800){
                                        $statutCouleur="Expert";
                                        
                                    ?>
                                    <h3 class="text-center" style="font-size:12px;"> <?=$statutCouleur?><br>
                                     <i class="fa fa-star" style="color:#FFF;"></i>
                                    <i class="fa fa-star" style="color:#FFF;"></i>
                                    <i class="fa fa-star" style="color:#FFF;"></i>
                                    <i class="fa fa-star" style="color:#FFF;"></i>
                                    <i class="fa fa-star" style="color:#FFF;"></i>
                                    <i class="fa fa-star" style="color:#FFF;"></i>
                                   </h3>
                                    <?php }else{
                                     $statutCouleur="Platinium";?>
                                    <h3 class="text-center" style="font-size:12px;"> <?=$statutCouleur;?> <br>
                                    <i class="fa fa-star" style="color:#FFF;"></i>
                                    <i class="fa fa-star" style="color:#FFF;"></i>
                                    <i class="fa fa-star" style="color:#FFF;"></i>
                                    <i class="fa fa-star" style="color:#FFF;"></i>
                                    <i class="fa fa-star" style="color:#FFF;"></i>
                                    <i class="fa fa-star" style="color:#FFF;"></i>
                                    <?php } ?>
                            </div>                            
                        </div>
                      
                    </div>
                   

               </div>
                <div class="col-md-7 col-sm-7 col-7 detail">
                    <ul class="text-right" style="list-style-type:none;font-size:11px;">
                        <li style="margin-bottom:10px" id="myBtn"> 
                          <span class="point" style="background:<?=$tabcouleur[$i];?>;border-radius:3px;font-size:12px;">
                                <a href="?page=detail_point" style="color:#fff" id="PointBimestriel"> 
                                            <?php if($data){echo $data['point'].' '.'Points (B)';}else{echo "00 Point (JR)";}?>
                                </a>
                          </span>
                        </li>
                        <li><?=$matricule['Nom'];?></li>
                        <li><?=$matricule['Prenom'];?></li>
                        <li><?=$_SESSION['matricule']?></li>
                       <!--<li id="testPoint">11000 points</li>-->
                       <!--<li id="testpointAn"><?=$point->NbPoint." points (JR)"?></li>-->
                        <li>
                            
                     
                                <div class="pull-right  col-md-2 btn " style="margin-top:38px;margin-left:5px;background-color:<?=$bgcouleurAn[$j]?>;font-size:14px;color:#fff;">
                                    <span class="badge"><?=" ".$point->NbPoint?> Points (A)</span>
                                </div>
                            
                        </li>
                    </ul>
                                            

               </div>               

               
           </div>
           <div class="row entete" style="margin-top:0px">
                <div class="col-md-12">
                  <p class="text-center" style="font-size:12px!important;">C A  <?php  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1'); echo utf8_encode(strftime(" %B %Y")); ?> : <a href="#" class="catotal"></a></p>
                 
                </div>
           </div>                   
             
    </div>
 </div>
 
            <table class="table table-hover table-bordered size" align="center">

               <tbody>
                   

                    <tr style="font-size:10px;">

                        <td><a href="?page=detail_vente_facebook">Vente facebook</a></td>
                        <td><a href="?page=detail_vente_facebook"><?php $fb=$main_function->chiffreAffaireFB($mois_en_cours,$_SESSION['matricule']);echo  number_format($fb, 2, ',', ' ');?>Ar </a></td>

                    </tr>


                    <tr style="font-size:10px;">
                     <td><a href="?page=detail_vente_sur_terrain">Vente terrain</a></td>
                     <td><a href="?page=detail_vente_sur_terrain"><?php $tr=$main_function->chiffreAffaireTR($mois_en_cours,$_SESSION['matricule']);echo number_format($tr, 2, ',', ' ');?>Ar</a></td>

                 </tr>

                  <tr style="font-size:10px;">
                     <td><a href="?page=deduction_sur_salaire">Déduction sur salaire</a></td>
                     <td><a href="?page=deduction_sur_salaire">- 
                     
                       <?php 
                        $Man=$main_function->ttmalus($_SESSION['matricule'],date('Y-m'));
                        echo number_format($Man,2,","," ");
                        ?> Ar
                       </a></td>

                 </tr>

                </tbody>
            </table>

            <table class="table table-hover text-center  table-bordered table-striped size" align="center">
              <tbody>
                <tr>
                 <td>Salaire du mois prévisionnel : </td>
                 <td> 
                 
                   <?php if($resultat){ foreach($resultat as $resultat){
                        $produitClientMontant=0;
                        $sql="SELECT produit.designation,produit.prix,produit.quantite,comande.codeproduit,comande.quantite FROM `facture`,`comande`,`produit` WHERE comande.idcomand LIKE facture.idcomande AND comande.codeproduit LIKE produit.codeproduit  AND facture.NumFact LIKE '".$resultat['NumFact']."'";
                        $produit=$dbfacebook->queryAll($sql);
                        foreach($produit as $produit){
                          $qunatite+=$produit["quantite"];  
                          $produitClientMontant=$produit["prix"]*$produit["quantite"];
                          $montant+=$produitClientMontant;
                            
                          }
                        } 
                       $sa=($montant*15)/100;
                   }
                      $totaReal=0; if($date): foreach($date as $date):
                      $monca=0;
                      $com=0;
                      $sql="SELECT `lieu`,`codeproduit`,`quantite`,`idPrix` FROM `vente` WHERE `idVP` LIKE ? AND  `date`  LIKE ?";
                      $resultat=$main->queryAll($sql,array($_SESSION['matricule'],$date['date']));
                      foreach($resultat as $resultat){
                        $sql="SELECT `prixdetail` FROM `prix` WHERE `idMission` LIKE ? AND `idProduit` LIKE ? AND `idPrix`=?";
                        $prix=$main->query($sql,array($resultat['lieu'],$resultat['codeproduit'],$resultat['idPrix']));
                        $monca+=($prix['prixdetail']*$resultat['quantite']);
                      }
                      $sql="SELECT `lieu` FROM `vente` WHERE `idVP` LIKE ? AND  `date`  LIKE ?";
                      $cacom=$main->query($sql,array($_SESSION['matricule'],$date['date']));
                      if($cacom['lieu']==1){
                        $com=($monca*15.1)/100; 
                      }else if($cacom['lieu']==2){
                           $com=($monca*12.8)/100; 
                      }else if($cacom['lieu']==5){
                           $com=($monca*18.4)/100; 
                      }
                             
                     
                  
                 
                 $totaReal+=$com; endforeach;endif;
                 $Totaltemp= $totaReal-$Man;
                  echo '<b>'.number_format($Totaltemp,2,","," ").' Ar </b>';  
                 ?> </td>
                </tr>
              
             

                </tbody>
            </table>
      
    <br>
            <div class="row entete"  style="margin-top:-20px">
               <div class="col-md-12">
                    <h3 style="font-size:12px"> Statut mois  <?=" ".$main->BimMois(date("m"))?></h3>

                    <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;background:#e91e63">
                        Begin
                        </div>
                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;background:#0099CC">
                        Inter
                        </div>
                         <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;background:#9933CC">
                        advc 1
                        </div>
                         <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;background:#ad1457">
                        advc 2
                        </div>
                         <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;background:#3949ab">
                        profe
                        </div>
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;background:#00acc1">
                        expert
                        </div>
                    </div>
               </div>
           </div>
           <div class="row entete">
               <div class="col-md-12">
                    <h3 style="font-size:12px">Progression de votre statut</h3>
                    <div style="font-size:0.7em;">
                      <span ><?=$statDeb;?></span>
                      <span class="pull-right"><?=$statFin;?></span>
                      
                    </div>                    
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?=$pointM?>%;background:<?=$tabcouleur[$i];?>;height:2px">
                            
                        </div>
                         <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?=$poindD?>%;background:#ccc;height:2px">
                        </div>

                    </div>
               </div>
           </div>
             <div class="row entete" style="margin-top:5px">
               <div class="col-md-12">
                    <h3 style="font-size:12px"> Statut Annuel</h3>

                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;background:#149046">
                        Natural
                        </div>
                         <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;background:#614e1a">
                        Bronze
                        </div>
                         <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;background: #C0C0C0">
                        Silver
                        </div>
                         <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;background: #f2e02e">
                        Gold
                        </div>
                    </div>

               </div>
           </div>
           <div class="row entete" >
               <div class="col-md-12">
                    <h3 style="font-size:12px"> Progression Annuelle</h3>
                    <div style="font-size:0.7em;">
                      <span ><?=$debAn;?></span>
                      <span class="pull-right"><?=$finAn;?></span>
                      
                    </div> 
                    <div class="progress" style="height:2px">
                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$pointP?>%;background:<?=$bgcouleurAn[$j]?>;height:2px">

                        </div>

                       <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?=$restPoint?>%;background:#ccc;style=height:2px">

                        </div>

                    </div>
               </div>
           </div>

           <br>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
           <p>2000 point</p>
      </div>
      <div class="modal-footer">

      </div>
    </div>

  </div>
</div>







