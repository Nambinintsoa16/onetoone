<style>
    th{
        font-weight:normal;
        padding:3px!important;
        vertical-align: top!important;
    }
    h4{
        font-size:14px;
        color:#fff;
    }
    .formating{
        margin-top:-23px;
    }
    .bghead{
        background:#17a2b8;
        color:#fff;
    }
    .pointbg{
        background:#fff;
        color:black;
        padding:5px 5px;
        font-size:12px;
        border-radius:2px;
    }
    ul{
        list-style-type:none;
        padding-left:5px!important;
    }
    ul > li{
        margin-left:0px!important;
        
    }
    .content-statut{
       
        height:40px; 
        padding:10px 5px;
        border-radius:3px;
    }
     a:not([href]):not([tabindex]) {
    color: inherit;
    text-decoration: none;
    border: solid 1px grey;
    border-radius: 0px;
    }
    .nav-justified .nav-item {
    padding: 0;
}
h3{
        font-size:10px!important;
        padding:10px 0px;
    }
#sanction{
    font-size:0.8em;
}
</style>
<?php
    include_once("../include/include.php");
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
$tabcouleur=['#FF8800','#0099CC','#9933CC','#ad1457','"3949ab','"00acc1'];
 $data=$main->progress($_SESSION['matricule']);
$tabcouleur=['#FF8800','#0099CC','#9933CC','#ad1457','#3949ab','#00acc1'];
     if($data['point']<1800){
       $pointM=($data['point']*100)/1800;
       $poindD=100-$pointM;
       $i=0;
      $statDeb="0";
      $statFin="1800";
      $statbim="Beginner";
     }else if($data['point']<3600){
      $pointM=($data['point']*100)/3600;
      $poindD=100-$pointM;
      $i=1;
      $statDeb="1800";
      $statFin="3600";
      $statbim="Intermediate";
     }else if($data['point']<5400){
      $pointM=($data['point']*100)/5400;
      $poindD=100-$pointM;
      $i=2;
      $statDeb="3600";
      $statFin="5400";
      $statbim="Advance 1";
     }else if($data['point']<7200){
      $pointM=($data['point']*100)/7200;
      $poindD=100-$pointM;
      $i=3;
      $statDeb="5400";
      $statFin="72000";
      $statbim="Advaced 2";
     }else if($data['point']<9000){
      $pointM=($data['point']*100)/9000;
      $poindD=100-$pointM;
      $i=4;
      $statDeb="7200";
      $statFin="9000";
      $statbim="Professionnelle";
     }else if($data['point']<10800){
      $pointM=($data['point']*100)/10800;
      $poindD=100-$pointM;
      $i=5;
      $statDeb="9000";
      $statFin="10800";
      $statbim="Expert";
    }
    
//Point Annuelle
$tabcouleurAn=['#149046','#614e1a','#C0C0C0','#f2e02e'];
          $point=$main->getPoint($_SESSION['matricule']);

                      if($point->NbPoint<70000){
                        $pointP=(100*$point->NbPoint)/70000;
                        $restPoint=100-$pointP;
                        $statutAn="Natural";
                        $j=0;
                       
                      }else if($point->NbPoint<90000 ){
                        $pointP=(100*$point->NbPoint)/90000;
                        $restPoint=100-$pointP;
                        $statutAn="Bronze";
                        $j=1;
                      }else if($point->NbPoint<130000){
                        $pointP=(100*$point->NbPoint)/130000;
                        $restPoint=100-$pointP;
                        $statutAn="Silver";
                        $j=2;
                      }else if($point->NbPoint<130000){
                        $pointP=(100*$point->NbPoint)/130000;
                        $restPoint=100-$pointP;
                        $statutAn="Gold";
                        $j=3;
                      }
$mois_en_cours=date('Y-m');
$mois = array('Jan','Fev','Mar','Avr','Mai','Jui','Jul','Aou','Sep','Oct','Nov','Dec');

?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" style="font-size:9px"><a href="?page">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="font-size:9px">Privilège</li>
  </ol>
</nav>
<div class="container-fluid" >
    <div class="row" style="padding-bottom:15px;">
        <div class="col-md-12">
            <ul class="nav nav-pills nav-justified col-md-12">
                <li class="nav-item col-md-6">
                    <a class="nav-link active privilege" id="privilege1">Bi-mestriel</a>
                </li>
                <li class="nav-item col-md-6 ">
                    <a class="nav-link privilege" id="privilege2">Annuelle</a>
                </li>
    
            </ul>                 
        </div> 
    </div>
    <div id="tabcontent1" style="background:#fff;">
            <div class="row bg-default" style="z-index:10000;border:1px solid grey;border-radius:5px 5px 5px 5px; box-shadow: 5px 10px #grey;padding:5px">
                
                            <div class="col-md-12" style="padding-bottom:5px;">
                                <h3 style="font-size:14px;text-transform:uppercase;"> <b>Votre statut bimestriel</b></h3>
                                <h3 style="font-size:14px;margin-top: -41px;" class="text-right"> 
                                    <span class="statutBimestriel" style="width:200px;height:55px; padding:1px 5px;background:<?=$tabcouleur[$i];?>;color:#fff;border-radius:2px">
                                        <?=$statbim;?><br/>
                                        </span>
                                </h3>
                            </div>
                                 </br>
                                 <h1 style="width:60%;box-shadow: 0 5px 5px -5px #333 ;color:<?=$tabcouleur[$i]?>;font-size:13px;margin:auto;text-align:center;margin-left:20%" class="text-center"> 
                                  <?php if($data){echo $data['point'].' '.'Points';}else{echo "00 Point";}?>
                                 </h1>
                                 <hr/>
                                
                                 <!--PROGRESS BAR STATUT-->
                            <div class="col-md-12 mb-3">
                          
                                <div>
                                  <span style="font-size:0.7em;"><?=$statDeb;?></span>
                                  <span style="font-size:0.7em;" class="pull-right"><?=$statFin;?></span>
            
                                </div>
                                <div class="progress">
                                  <div class="progress-bar" role="progressbar" style="width:<?=$pointM;?>%;background-color:<?=$tabcouleur[$i];?>;height:2px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                  <div class="progress-bar" role="progressbar" style="width:<?=$pointD;?>%;background-color:grey;height:2px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
        
                            </div>
                            <div class="col-md-12">
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
                                <br>
                            </div>
                            <div class="col-md-12">
                                <h3 style="font-size:14px;text-transform:uppercase;">Vous avez: </h3>
                                    <ul id="sanction" class="privStatBimestriel">
                                        <!--MAin.JS-->
                                    </ul>
                         </div>
                            <br>
            </div>


    <!-- contenu du tabs -->
    <!-- *****************contenu du 1er privilege*********************** -->
            <div class="row" style="background:#fff;margin-top:20px;">

                <div class="col-md-12" style="background:#fff;">
                    <hr>
                    <div class="content-statut " style="background:silver;">
                        <h4 class="text-center"style="color:black;">PRIVILEGE BI-MESTRIELLE </h4>
                      
        
                    </div>
                </div>   
        
                <div class="col-md-12" style="background:#fff;">
                     <hr>
                     <div class="content-statut" style="background:#e91e63;">
                         <h4>Statut Begin </h4>
                     <h4 class="text-right formating" ><span class="pointbg">1 800 Points </span></h4>
                     </div>
                     
                        <ul id="sanction" class="beg">
                            <li> - Réduction de sanctions téléphoniques : 20%</li>
                        </ul>
                </div>
                <div class="col-md-12" style="background:#fff">
                     <hr>
                      <div class="content-statut" style="background:#0099CC;">
                         <h4>Statut Intérmediaire</h4>
                         <h4 class="text-right formating" ><span class="pointbg">3 600 Points </span></h4>
                     </div>
                    
                        <ul id="sanction" class="inter">
                            <li> - Réduction de sanctions téléphoniques : 30%</li>
                            <li> - Réduction de sanctions sur absence : 20%</li>
                            <li> - Réduction de Malus : 20% </li>
                        </ul>
             
                </div>
            
                <div class="col-md-12" style="background:#fff">
                     <hr>
                     
                      <div class="content-statut" style="background:#9933CC;">
                         <h4>statut Advance 1  </h4>
                         <h4 class="text-right formating" ><span class="pointbg">5 400 Points</span></h4>
                      </div>   
                                    <ul id="sanction" class="adv1">
                                     <li> - Bonus mensuel : 5.000,00Ar</li>
                                     <li> - Jour de repos supplémentaire après mission* : 1 jour </li>
                                     <li> - Réduction de sanctions téléphoniques : 40%</li>
                                     <li> - Réduction de sanctions sur absence : 30%</li>
                                     <li> - Réduction de Malus : 30%</li>
                                    </ul>
                             
                </div>
            
                <div class="col-md-12" style="background:#fff ">
                     <hr>
                     
                     <div class="content-statut" style="background:#ad1457;">
                     <h4>Statut Advance 2</h4>
                     <h4 class="text-right formating" ><span class="pointbg">7 200 Points</span></h4>
                    </div>
                                    <ul id="sanction" class="adv2">
                                     <li> - Bonus mensuel : 10.000,00Ar</li>
                                     <li> - Jour de repos supplémentaire après mission* : 2jours </li>
                                     <li> - Réduction de sanctions téléphoniques : 60%</li>
                                     <li> - Réduction de sanctions sur absence : 50%</li>
                                     <li> - Réduction de Malus : 50%</li>
                                     <li> - Réduction de frais de transport en cas  d'abandon sur mission : 20%</li>
                                    </ul>
                               
                </div>
            
                <div class="col-md-12" style="background:#fff">
                     <hr>
                      <div class="content-statut" style="background:#3949ab;">
                        <h4>Statut Professionelle</h4>
                        <h4 class="text-right formating" ><span class="pointbg">9 000 Points</span></h4>
                     </div>
                                    <ul id="sanction" class="pro">
                                     <li> - Bonus mensuel : 20.000,00Ar </li>
                                     <li> - Jour de repos supplémentaire après mission* : 3jours</li>
                                     <li> - Réduction de sanctions téléphoniques : 70%</li>
                                     <li> - Réduction de sanctions sur absence : 70%</li>
                                     <li> - Réduction de Malus : 80%</li>
                                     <li> - Réduction de frais de transport en cas  d'abandon sur mission : 40%</li>
                                     
                                    </ul>
                    
                </div>
            
                <div class="col-md-12" style="background:#fff">
                     <hr>
                 
                      <div class="content-statut" style="background: #00acc1;">
                         <h4>Statut Expert</h4>
                         <h4 class="text-right formating" ><span class="pointbg">10 800 Points</span></h4>
                    </div>
                                <ul id="sanction" class="exp">
                                 <li> - Bonus mensuel : 30.000,00 Ar</li>
                                 <li> - Jour de repos supplémentaire après mission* : 5jours</li>
                                 <li> - Réduction de sanctions téléphoniques : 75%</li>
                                 <li> - Réduction de sanctions sur absence : 75%</li>
                                 <li> - Réduction de Malus : 100%</li>
                                 <li> - Réduction de frais de transport en cas  d'abandon sur mission : 60%</li>
                                 <li> - Priorité sur avances sur salaire à hauteur de pourcent du salaire en cours : 60%</li>
                                
                                </ul>
                           
                            
                 </div>
            </div>
    </div>
    
<!--****************************************************** contenu du 2eme privilege*************************** -->
<div id="tabcontent2" style='display:none;background:#fff;margin-top:20px;'>
    
    <div class="row bg-default" style="z-index:10000;border:1px solid grey;border-radius:5px 5px 5px 5px; box-shadow: 5px 10px #grey;">
                    
                    <div class="col-md-12" style="padding:5px;">
                        <h3 style="font-size:14px;text-transform:uppercase;"> <b>Votre statut Annuelle</b></h3>
                        <h3 style="font-size:14px;margin-top: -41px;" class="text-right"> 
                            <span class="statAnnuelle" style="width:200px;height:40px; padding:1px 5px;background:<?=$tabcouleurAn[$j];?>;color:#fff;border-radius:2px"><?=$statutAn;?></span>
                            <p></p>
                        </h3>
                    </div>
                         </br>  
                  <h1 style="width:60%;box-shadow: 0 5px 5px -5px #333 ;color:<?=$tabcouleurAn[$j];?>;font-size:13px;margin:auto;text-align:center;margin-left:20%;margin-bottom:20px;" class="text-center"> 
                                <?=$point->NbPoint?>&nbsp;points
                                 </h1>         
                         <!--PROGRESS BAR STATUT-->
                    <div class="col-md-12 mb-3">
                  
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" style="width:<?=$pointP;?>%;background-color:<?=$tabcouleurAn[$j]?>;height:2px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                          <div class="progress-bar" role="progressbar" style="width:<?=$restPoint;?>%;background-color:grey;height:2px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                    </div>

                    <div class="col-md-12">
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
                        <br>
                    </div>
                    <div class="col-md-12">
                        <h3 style="font-size:14px;text-transform:uppercase;">Vous avez: </h3>
                            <ul id="sanction" class="privStatAnnuelle">
                                
                             
                            </ul>
                    </div>
                    <br>
    </div>
    <!------Fin progressBar statut-------------->
    <div class="row">
        <div class="col-md-12">
            <hr>
            <div class="content-statut" style="background:silver;">
                <h4 class="text-center"style="color:black;">PRIVILEGE ANNUELLE </h4>
              

            </div>
        </div>
        
        <div class="col-md-12" style="background:#fff">
             <hr>
              <div class="content-statut" style="background:green;">
                <h4>Statut Natural</h4>
                <h4 class="text-right formating" ><span class="pointbg">70 000 Points</span></h4>
             </div>
             <ul id="sanction" class="nat">
                 <li>Aucun privilege</li>
                 
             </ul>
            
        </div>
        <div class="col-md-12" style="background:#fff">
             <hr>
              <div class="content-statut" style="background:#614e1a;">
                <h4>Statut Bronze</h4>
                <h4 class="text-right formating" ><span class="pointbg">70 000 Points</span></h4>
             </div>
             <ul id="sanction" class="br">
                 
                 <li>Avances spéciales annuelles remboursables sur 2 mois :50 000,00 Ar</li>
             </ul>
            
        </div>        
        <div class="col-md-12" style="background:#fff">
             <hr>
              <div class="content-statut" style="background:#C0C0C0;">
                <h4>Statut silver</h4>
                <h4 class="text-right formating" ><span class="pointbg">90 000 Points</span></h4>
             </div>
            <ul id="sanction" class="sil">
                <li>Avances spéciales annuelles remboursables sur 4 mois : 100.000,00 Ar</li>
             
            </ul>
        </div>        
        <div class="col-md-12" style="background:#fff">
             <hr>
              <div class="content-statut" style="background:#efd807;">
                <h4>Statut Gold</h4>
                <h4 class="text-right formating" ><span class="pointbg">130 000 Points</span></h4>
             </div>
            <ul id="sanction" class="gold">
                <li>Avances spéciales annuelles remboursables sur 6 mois: 360.000,00 Ar</li>
             
            </ul>
        </div>        
    </div>
</div>


            <!--fin gestion point-->