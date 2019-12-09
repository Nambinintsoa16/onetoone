<style>
    th{
        padding:0px!important;
    }

.statut > h3{
    
    padding:8px 0px;
    color:white;
    
    
}


</style>
<?php 
$titre = "Mon compte";

include_once('../include/include.php');

$sql="SELECT `Nom`,`Prenom`,`Fonction_Acutelle` FROM `personnel` WHERE `matricule` LIKE '".$_SESSION['matricule']."'";
$matricule=$main->query($sql);

$sql1="SELECT `matricule` FROM `personnel` WHERE `coach` LIKE ?";
$commerciale=$main->queryAll($sql1,array($_SESSION['matricule']));

$sql_pts="SELECT SUM(`point`) as pts_bimestre FROM `historique_personnel` WHERE `personnel` LIKE ? AND `date` BETWEEN ? AND ?";
$date_pts=new DateTime();
$date_pts2=new DateTime();
if($date_pts->format('m') % 2 != 0){
    $date_pts->modify('+1 month');  
    $point_bimestre=$main->query($sql_pts,array($_SESSION['matricule'],date('Y-m').'-01',$date_pts->format('Y-m').'-01'));
}else{
    $date_pts->modify('-1 month'); 
    $date_pts2->modify('+1 month');
    $point_bimestre=$main->query($sql_pts,array($_SESSION['matricule'],$date_pts->format('Y-m').'-01',$date_pts2->format('Y-m').'-01'));
}



$tabcouleur=['#e91e63','#0099CC','#9933CC','#ad1457'];
 $data=$main->progress($_SESSION['matricule']);
     if($data['point']<6400){
       $pointM=($data['point']*100)/6400;
       $poindD=100-$pointM;
       $i=0;
        $statDeb="0";
        $statFin="6400";

       
       
       
     }else if($data['point']<8000){
      $pointM=($data['point']*100)/8000;
      $poindD=100-$pointM;
      $i=0;
      $statDeb="6400";
      $statFin="8000";
      

     }else if($data['point']<12000){
      $pointM=($data['point']*100)/12000;
      $poindD=100-$pointM;
      $i=1;
      $statDeb="8000";
      $statFin="12000";
     }else if($data['point']<15000){
      $pointM=($data['point']*100)/15000;
      $poindD=100-$pointM;
      $i=2;
        $statDeb="12000";
      $statFin="15000";
     }else if($data['point']<25500){
      $pointM=($data['point']*100)/25500;
      $poindD=100-$pointM;
      $i=3;
      $statDeb="15000";
      $statFin="25500";
     }else if($data['point']<36000){
      $pointM=($data['point']*100)/36000;
      $poindD=100-$pointM;
      $i=3;
      $statDeb="Advc1";
      $statFin="Advc2";
    }
    
//Point Annuelle
$tabcouleurAn=['#149046','#614e1a','#C0C0C0','#f2e02e'];
          $point=$main->getPoint($_SESSION['matricule']);

                      if($point->NbPoint<120000){
                        $pointP=(100*$point->NbPoint)/120000;
                        $restPoint=100-$pointP;
                        $statutAn="Natural";
                        $j=0;
                       
                      }else if($point->NbPoint<180000 ){
                        $pointP=(100*$point->NbPoint)/180000;
                        $restPoint=100-$pointP;
                        $statutAn="Bronze";
                        $j=0;
                      }else if($point->NbPoint<360000){
                        $pointP=(100*$point->NbPoint)/360000;
                        $restPoint=100-$pointP;
                        $statutAn="Silver";
                        $j=0;
                      }else if($point->NbPoint<450000){
                        $pointP=(100*$point->NbPoint)/450000;
                        $restPoint=100-$pointP;
                        $statutAn="Gold";
                        $j=0;
                      }
                      
                        $mois_en_cours=date('Y-m');
                        $mois = array('Jan','Fev','Mar','Avr','Mai','Jui','Jul','Aou','Sep','Oct','Nov','Dec');
                        include "header.php";

                        ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-corp">
      <div class="container-fluid">
           <div class="row entete" style="">
               <div class="col-md-5 col-sm-5 col-5">
                   
                   <a href="../image/personnel/<?=$_SESSION['matricule'].".jpg"?>"data-lightbox="roadtrip" title="">
                       <img src="../image/personnel/<?=$_SESSION['matricule'].".jpg"?>" class="img-thumbnail img-responsive  img-profile"  style="" alt="...">
                   </a>
                  
                       <div class="">
                           <div class="" style="padding:0px 0px">
                                <div class="statut" style="padding-top:-5px!important;color:#fff;background-color:<?=$tabcouleur[$i];?>">
                                     <?php
                                  if($point_bimestre['point']<6400){
                                    $statutCouleur="Beginner";//green
                                    
                                ?>
                                
                               <h3 class="text-center" aria-hidden="true" style="font-size:10px;"><span style='padding-right:5px;'><?=$statutCouleur;?></span> <br>
                                <i class="fa fa-star" aria-hidden="true" style="color:#fff;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:grey;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:grey;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:grey;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:grey;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:grey;"></i>
                              </h3>
                                <?php }else if($point_bimestre['point']<8000){
                                    $statutCouleur="Intermédiaire";//marron
                                    
                                ?>
                                <h3 class="text-center" aria-hidden="true" style="font-size:10px;"> <?=$statutCouleur;?> <br>
                                <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#614e1a;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                </h3>
                                <?php }else if($point_bimestre['point']<12000){
                                    $statutCouleur="Advanced1";//gris
                                    
                                ?>
                                <h3 class="text-center" aria-hidden="true" style="font-size:10px;"> <?=$statutCouleur;?> <br>
                                 <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                               </h3>
                                <?php }else if($point_bimestre['point']<15000){
                                    $statutCouleur="Advanced2";//or
                                    
                                ?>
                                <h3 class="text-center" aria-hidden="true" style="font-size:10px;"><?=$statutCouleur;?> <br> 
                                 <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#FFF;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                </h3>
                                <?php }else if($point_bimestre['point']<25500){
                                    $statutCouleur="Proféssionnel";
                                    $statutAn="P";
                                ?>
                                <h3 class="text-center" style="font-size:10px;"> <?=$statutCouleur;?> <br>
                                 <i class="fa fa-star" style="color:#FFF;"></i>
                                <i class="fa fa-star" style="color:#FFF;"></i>
                                <i class="fa fa-star" style="color:#FFF;"></i>
                                <i class="fa fa-star" style="color:#FFF;"></i>
                                <i class="fa fa-star" style="color:#FFF;"></i>
                                <i class="fa fa-star" style="color:#FFF;"></i>
                               </h3>
                                <?php }else if($point_bimestre['point']<36000){
                                    $statutCouleur="Proféssionnel";
                                ?>
                                <h3 class="text-center" style="font-size:10px;"> <?=$statutCouleur?> <br>
                                 <i class="fa fa-star" style="color:#a0b2c6;"></i>
                                <i class="fa fa-star" style="color:#a0b2c6;"></i>
                                <i class="fa fa-star" style="color:#a0b2c6;"></i>
                                <i class="fa fa-star" style="color:#a0b2c6;"></i>
                                <i class="fa fa-star" style="color:#a0b2c6;"></i>
                                <i class="fa fa-star" style="color:#a0b2c6;"></i>
                               </h3>                               
                                <?php }else{
                                 $statutCouleur="Expert";?>
                                <h3 class="text-center" style="font-size:10px;"> <?=$statutCouleur;?> <br>
                                <i class="fa fa-star" style="color:#a0b2c6;"></i>
                                <i class="fa fa-star" style="color:#a0b2c6;"></i>
                                <i class="fa fa-star" style="color:#a0b2c6;"></i>
                                <i class="fa fa-star" style="color:#a0b2c6;"></i>
                                <i class="fa fa-star" style="color:#a0b2c6;"></i>
                                <i class="fa fa-star" style="color:#a0b2c6;"></i>
                        <?php } ?>
                                </div>
                           </div>
                          <!--  <div class="col-md-4 col-sm-4 col-4">
                               <div class="statut2 text-center" id="statut2"  style="height:35px;padding:10px 0px;color:#fff;background-color:<?=$tabcouleurAn[$i];?>" ><?=$statutAn;?></div>
                           </div>
                           -->
                           
                   </div>
               </div>
                <div class="col-md-7 col-sm-7 col-7 detail">
                    <ul class="text-right" style="list-style-type:none;font-size:11px;">
                        <li style="margin-bottom:10px" id="myBtn"> <span class="point" style="background:<?=$tabcouleur[$i]?>;border-radius:3px;font-size:12px;"><a href="detail-point.php" style="color:#fff" id="PointBimestriel"><?=$data['point']." points"?></a></span></li>
                        <li><?=$matricule['Nom'];?></li>
                        <li><?=$matricule['Prenom'];?></li>
                        <li><?=$_SESSION['matricule']?></li>
                       <!--<li id="testPoint">11000 points</li>-->
                       <li id="testpointAn"><?=$point->NbPoint." points"?></li>
                    </ul>
               </div>
           </div>
           <div class="row">
               <div class="col-md-12" >
                    <div class="pull-right statut2 col-md-4 col-sm-4 col-4" style="margin-top:-38px;background-color:<?=$tabcouleurAn[$j]?>;color:white;padding:8px 5px 0px 5px;">
                                    <?=$statutAn;?>
                                    <span style="font-size:12px" class="badge badge-light"><?=" ".$point->NbPoint?> points</span>
                                </div>
               </div>
           </div>
           <div class="row entete" style="margin-top:-5px">
                <div class="col-md-12">
                  <p class="text-center">C A <?php  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1'); echo $mois[strftime("%m")-1]." ".strftime("%Y"); ?> : <span style="font-weight:bold" class="cacoach"></span></p>
                </div>
           </div>
           <div class="row entete" style="margin-top:-20px">
               <div class="col-md-12">
                    <table class="table table-bordered">
                         <tbody >
                             <tr>
                                 <td><a href="deduction_salaire.php">Déduction</a></td>
                                 <?php 
                                        $sql_deduct="SELECT SUM(`montont`) as compte FROM `penalite` WHERE `IdCodeVp` LIKE ? AND `date` LIKE ?";
                                        $deduction=$main->query($sql_deduct,array($_SESSION['matricule'],date('Y-m')."-%"));
                                 ?>
                                <!-- <td class="text-right deduction_ca"> Ar</td>-->
                                <td class="text-right"> <?=number_format($deduction['compte'],2,","," ")." Ar";?></td>
                             </tr>
                              <tr>
                                 <td><a href="bonus-prime.php">Bonus et Prime</a></td>
                                 <td class="text-right">
                                     <?php 
                                            $sql="SELECT `montant` FROM `BonusEtPrime` WHERE `IdCodeVp` LIKE ?";
                                            $bonus=$main->queryAll($sql,array($_SESSION['matricule']));
                                            $total_bonus=0;
                                            foreach($bonus as $bonus){
                                                $total_bonus+=($bonus['montant']);
                                            }                            
                                        
                                            echo number_format($total_bonus,2,","," ");
                                        ?>
                                 </td>
                             </tr>
                              <tr>
                                 <td><a href="renumeration.php">Rénumeration</a></td>
                                 <td class="text-right">
                                      Ar
                                 </td>
                             </tr>
                         </tbody>
                     </table>
               </div>
           </div>
           <br>
            <div class="row entete"  style="margin-top:-20px">
               <div class="col-md-12">
                    <h3 style="font-size:12px"> Statut mois  Jan-Fev</h3>
                  
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;background:#e91e63">
                            Begin
                        </div>
                         <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;background:#0099CC">
                            Inter
                        </div>
                         <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;background: #9933CC">
                            Advc1
                        </div>
                         <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;background: #ad1457">
                          Advc2
                        </div>
                    </div>
               </div>
           </div>
           <div class="row entete">
               <div class="col-md-12">
                    <h4 style="font-size:12px">Progression de votre statut</h4>
                   
                    <div>
                      <span><?=$statDeb;?></span>
                      <span class="pull-right"><?=$statFin;?></span>

                    </div>
                        
                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?=$pointM;?>%;background:#149046;height:2px">
                            
                        </div>
                         <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$poindD?>%;background:#ccc;height:2px">
                     
                        </div>
                       
                    </div>
                    
                    
             
           </div>
             <div class="row entete" style="margin-top:5px; padding-left:10px;padding-right:10px">
               <div class="col-md-12" style="">
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
               <div class="col-md-12" style="padding-left:10px; padding-right:10px">
                    <h3 style="font-size:12px"> Progression Annuelle</h3>
                    <div class="progress" style="height:2px;"> <!--style="height:2px"-->
                        <!--POINT ANNUELLE -->
                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$pointP?>%;background:#149046;style="height:2px"">
                                 
                        </div>
                         <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$restPoint?>%;background:#ccc;style="height:2px"">
                                
                        </div>

                    </div>
               </div>
           </div>
           
           <div class="modal">
            <div class="modal-content">
                <span class="close-button">×</span>
                <h1>Hello, I am a modal!</h1>
            </div>
        </div>
      </div>
    </div>
 </div>
 



<?php include "footer.php";?>

</script>