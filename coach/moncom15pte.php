<style>
    th{
        padding:0px!important;
    }
.statut1{
    
    height:35px;
    width:100%; 
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    margin-top:-5px;
    z-index:22222;
    font-size:10px;
}
/********Couleur de fond statut********/
.marron{
    background-color:#614e1a;
}
.gris{
    background-color:#f2e02e;
}
.or{
    background-color:#C0C0C0;
}

</style>
<?php 
$titre = "Detail Point";

include_once('../include/include.php');

$sql="SELECT `Nom`,`Prenom`,`Fonction_Acutelle` FROM `personnel` WHERE `matricule` LIKE '".$_SESSION['matricule']."'";
$matricule=$main->query($sql);

$sql1="SELECT `matricule` FROM `personnel` WHERE `coach` LIKE ?";
$commerciale=$main->queryAll($sql1,array($_SESSION['matricule']));

$sql_pts="SELECT SUM(`point`) as pts_bimestre FROM `historique_personnel` WHERE `personnel` LIKE ? AND `date` BETWEEN ? AND ?";
$date_pts=new DateTime();
if($date_pts->format('m') % 2 != 0){
    $date_pts->modify('+1 month');   
}
$point_bimestre=$main->query($sql_pts,array($_SESSION['matricule'],date('Y-m').'-01',$date_pts->format('Y-m').'-01'));

 $data=$main->progress($_SESSION['matricule']);
     if($data['point']<6400){
       $pointM=($data['point']*100)/6400;
       $poindD=100-$pointM;
     }else if($data['point']<8000){
      $pointM=($data['point']*100)/8000;
      $poindD=100-$pointM;
     }else if($data['point']<12000){
      $pointM=($data['point']*100)/12000;
      $poindD=100-$pointM;
     }else if($data['point']<15000){
      $pointM=($data['point']*100)/15000;
      $poindD=100-$pointM;
     }else if($data['point']<25500){
      $pointM=($data['point']*100)/25500;
      $poindD=100-$pointM;
     }else if($data['point']<36000){
      $pointM=($data['point']*100)/36000;
      $poindD=100-$pointM;
    }

$mois_en_cours=date('Y-m');
$mois = array('Jan','Fev','Mar','Avr','Mai','Jui','Jul','Aou','Sep','Oct','Nov','Dec');
include "header.php";?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-corp">
      <div class="container-fluid">
           <div class="row entete" style="">
               <div class="col-md-5 col-sm-5 col-5">
                   
                   <a href="../image/personnel/<?=$_SESSION['matricule'].".jpg"?>"data-lightbox="roadtrip" title="">
                       <img src="../image/personnel/<?=$_SESSION['matricule'].".jpg"?>" class="img-thumbnail img-profile"  style="" alt="...">
                   </a>
                   <div class="statut1" >
                      <?php
                      
                                  if($point_bimestre['point']<6400){
                                    $statutCouleur="Natural";
                                ?>
                               <h3 class="text-center" aria-hidden="true" style="font-size:10px;"> <?=$statutCouleur;?> <br>
                                <i class="fa fa-star" aria-hidden="true" style="color:green;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:green;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                              </h3>
                                <?php }else if($point_bimestre['point']<8000){
                                    $statutCouleur="Natural";
                                ;?>
                                <h3 class="text-center" aria-hidden="true" style="font-size:10px;"> <?=$statutCouleur;?> <br>
                                <i class="fa fa-star" aria-hidden="true" style="color:green;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:green;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                               </h3>
                                <?php }else if($point_bimestre['point']<12000){
                                    $statutCouleur="Bronze";
                                ?>
                                <h3 class="text-center" aria-hidden="true" style="font-size:10px;"> <?=$statutCouleur;?> <br>
                                <i class="fa fa-star" aria-hidden="true" style="color:#614e1a;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#614e1a;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#614e1a;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                </h3>
                                <?php }else if($point_bimestre['point']<15000){
                                    $statutCouleur="silver";
                                ?>
                                <h3 class="text-center" aria-hidden="true" style="font-size:10px;"> <?=$statutCouleur;?> <br>
                                 <i class="fa fa-star" aria-hidden="true" style="color:#C0C0C0;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#C0C0C0;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#C0C0C0;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#C0C0C0;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                               </h3>
                                <?php }else if($point_bimestre['point']<25500){
                                    $statutCouleur="gold";
                                ?>
                                <h3 class="text-center" aria-hidden="true" style="font-size:10px;"><?=$statutCouleur;?> <br> 
                                 <i class="fa fa-star" aria-hidden="true" style="color:#f2e02e;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#f2e02e;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#f2e02e;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#f2e02e;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:#f2e02e;"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:gray;"></i>
                                </h3>
                                <?php }else if($point_bimestre['point']<36000){
                                    $statutCouleur="Platinium";
                                ?>
                                <h3 class="text-center" style="font-size:10px;"> <?=$statutCouleur;?> <br>
                                 <i class="fa fa-star" style="color:#a0b2c6;"></i>
                                <i class="fa fa-star" style="color:#a0b2c6;"></i>
                                <i class="fa fa-star" style="color:#a0b2c6;"></i>
                                <i class="fa fa-star" style="color:#a0b2c6;"></i>
                                <i class="fa fa-star" style="color:#a0b2c6;"></i>
                                <i class="fa fa-star" style="color:#a0b2c6;"></i>
                               </h3>
                                <?php }else{
                                 $statutCouleur="Platinium";?>
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
                <div class="col-md-7 col-sm-7 col-7 detail">
                    <ul class="text-right" style="list-style-type:none">
                        <li style="margin-bottom:10px" id="myBtn"> <span class="point" style="background:#149046;border-radius:3px;font-size:12px;"><a href="detail-point.php" style="color:#fff" id="PointBimestriel"><?=$point_bimestre['pts_bimestre']." points"?></a></span></li>
                        <li><?=$matricule['Nom'];?></li>
                        <li><?=$matricule['Prenom'];?></li>
                        <li><?=$_SESSION['matricule']?></li>
                        <li id="testPoint">4900 points</li>
                    </ul>
               </div>
               
           </div>
           <div class="row entete">
                <div class="col-md-12">
                  <p class="text-center">C A <?php  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1'); echo $mois[strftime("%m")-1]." ".strftime("%Y"); ?> : <span style="font-weight:bold" class="cacoach"></span></p>
                </div>
           </div>
           <div class="row entete" style="margin-top:-20px">
               <div class="col-md-12">
                    <table class="table table-bordered">
                         <tbody >
                             <tr>
                                 <td>Déduction </td>
                                 <td class="text-right deduction_ca">25,000 Ar</td>
                             </tr>
                              <tr>
                                 <td>Bonnus et Prime</td>
                                 <td class="text-right">10,000 Ar</td>
                             </tr>
                              <tr>
                                 <td>Rénumeration</td>
                                 <td class="text-right">
                                     30,000 Ar
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
           <div class="row entete">
               <div class="col-md-12">
                    <h3 style="font-size:12px">Progression de votre statut</h3>
                    <div class="progress" style="height:2px">
                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$pointM?>%;background:#149046;height:2px">
                       
                        </div>
                         <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$poindD?>%;background:#ccc;height:2px">
                     
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
                    <div class="progress" style="height:2px">
                        <?php
                       $point=$main->getPoint($_SESSION['matricule']);

                      if($point->NbPoint<120000){
                        $pointP=(100*$point->NbPoint)/120000;
                        $restPoint=100-$pointP;
                      }else if($point->NbPoint<180000 ){
                        $pointP=(100*$point->NbPoint)/180000;
                        $restPoint=100-$pointP;
                      }else if($point->NbPoint<360000){
                        $pointP=(100*$point->NbPoint)/360000;
                        $restPoint=100-$pointP;
                      }else if($point->NbPoint<450000){
                        $pointP=(100*$point->NbPoint)/450000;
                        $restPoint=100-$pointP;
                      }

                        ?>
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