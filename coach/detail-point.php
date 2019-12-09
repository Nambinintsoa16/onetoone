<?php 
$titre = "Mes points";
include "header.php";
include_once('../include/include.php');

$date_now=date('Y-m-d');
session_start();
$coach=$_SESSION['matricule'];
?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-corp">
      <div class="container-fluid" >
          <div class="row">
              <div class="col-md-12">
                   <ol class="breadcrumb" style="font-size:14px!important;padding-left:0px;background:#fff" >
                      <li style="padding:0px 5px"><a href="moncompte.php" title="Accueil">Mon compte  &nbsp;&nbsp;&nbsp;></a></li>
                      <li class="active" style="padding:0px 5px" >Mes points  </li>
                    </ol>
              </div>
          </div>
          <div class="row"  style="background:#fff;padding:0px 10px;margin-top:-20px">
               <?php 
                    $sql="SELECT `nom_mission` FROM `ma_mission` WHERE `id_coach` LIKE ? AND `statut_mission` LIKE 'En_cours'"; 
                    $mission = $main->query($sql,array($coach));
              ?>
              <h3 style="font-size:15px;margin-top:10px">Info Point<span class="text-right"> <?php echo ($mission)?$mission['nom_mission']:'(*Pas de Mission)';?>  du  <?=date('d-M-Y')?> </span></h3>
              <hr/>   
               <a href="detail-point-jour.php?date=<?=date('d-m-Y')?>" class="btn btn-success btn-xs" align="right" style="width:60px;height:25px;margin-top:6px;margin-right:2px">Détails</a>
               
              
            <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="font-size:11px;">Tranche d'heure</th>
                        <th style="font-size:11px;">Points</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                               $matricules=array();
                               $sompoint=array();
                                      $sql2="SELECT `personnel`,`date`,`heure`,`point` FROM `historique_personnel` WHERE `personnel` LIKE ? AND `date` LIKE ?";
                                      $vente_story=$main->queryAll($sql2,array($coach,$date_now));   //date d'aujourd'hui   $comerciale['matricule'],date_now
                                         
                                          foreach($vente_story as $vente_story):
                                              $heure_limit = new DateTime('08:00:00');
                                              //limite heure
                                              $tab_heure_matin=[new DateTime('08:00:00'),new DateTime('11:29:00')];
                                              $tab_heure_midi=[new DateTime('11:30:00'),new DateTime('13:59:00')];
                                              $tab_heure_apresmidi=[new DateTime('14:00:00'),new DateTime('17:29:00')];
                                              $tab_heure_soir=[new DateTime('17:30:00'),new DateTime('19:00:00')];
                                              $tab_heure=[$tab_heure_matin,$tab_heure_midi,$tab_heure_apresmidi,$tab_heure_soir];
                                    
                                              $heure_bd = new DateTime($vente_story['heure']);
                                              $matricules[$heure_bd->format('H:i:s')]=$commerciale['matricule'];//matricule[13:45:00]=VP00080
                                              
                                              if($tab_heure[0][0]<=$heure_bd and $tab_heure[0][1]>=$heure_bd){
                                                  
                                                  $sompoint['matin']+=(int)$vente_story['point'];
                                                  $matricules['matin'].=",".$commerciale['matricule'];
                                                  
                                              }else if($tab_heure[1][0]<=$heure_bd and $tab_heure[1][1]>=$heure_bd){
                                                  
                                                  $sompoint['midi']+=(int)$vente_story['point'];
                                                  $matricules['midi'].=",".$commerciale['matricule'];
                                                 
                                              }else if($tab_heure[2][0]<=$heure_bd and $tab_heure[2][1]>=$heure_bd){
                                                  
                                                  $sompoint['apresmidi']+=(int)$vente_story['point'];
                                                  
                                                  $matricules['apresmidi'].=",".$commerciale['matricule'];
                                                 
                                                  
                                              }else if($tab_heure[3][0]<=$heure_bd and $tab_heure[3][1]>=$heure_bd){
                                                  
                                                  $sompoint['soir']+=(int)$vente_story['point'];
                                                  $matricules['soir'].=",".$commerciale['matricule'];
                                              }
                                        
                                              ?> 
                      
                      <?php               endforeach;
                      
                            $matricule_matin=array_filter(array_unique(explode(',',$matricules['matin'])));
                            $matricule_midi=array_filter(array_unique(explode(',',$matricules['midi'])));
                            $matricule_apresmidi=array_filter(array_unique(explode(',',$matricules['apresmidi'])));
                            $matricule_soir=array_filter(array_unique(explode(',',$matricules['soir'])));
                            
                      ?>
                      <tr>
                        <td style="font-size:10px;">08:00 -	11:29</td>
            
                        <td style="font-size:10px;"><?php
                            if(is_null($sompoint['matin'])){
                              echo  '-';
                            }else{
                                echo $sompoint['matin'];
                            }
                        ?></td>
                      </tr>
                      
                       <tr>
                        <td style="font-size:10px;">11:30 -	13:59</td>
                        
                        <td style="font-size:10px;"><?php
                            if(is_null($sompoint['midi'])){
                              echo  '-';
                            }else{
                                echo $sompoint['midi'];
                            }
                        ?></td>
                      </tr>
                      
                       <tr>
                        <td style="font-size:10px;">14:00 -	17:29</td>
                       
                        <td style="font-size:11px;"><?php
                            if(is_null($sompoint['apresmidi'])){
                              echo  '-';
                            }else{
                                echo $sompoint['apresmidi'];
                            }
                        ?></td>
                      </tr>
                      
                         <tr>
                        <td style="font-size:10px;">17:30 -	19:00</td>
                        
                        <td style="font-size:11px;"><?php
                            if(is_null($sompoint['soir'])){
                              echo  '-';
                            }else{
                                echo $sompoint['soir'];
                            }
                        ?></td>
                      </tr>
                     
                    </tbody>
                  </table>
          </div>
            
        <div class="row" style="background:#fff;padding:0px 10px">
            <h3 style="font-size:15px;">Les commerciaux qui n'ont pas de vente enregistré </h3>   
              
                    <?php 
                          //membre commerciale du coach
                              $sql1="SELECT `matricule`,`Nom`,`Prenom`,`Contact` FROM `personnel` WHERE `coach` LIKE ?";
                              $commerciale=$main->queryAll($sql1,array($coach));//matricule du coach
                    ?>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="font-size:11px;">VP</th>
                        <th style="font-size:11px;">Contact</th>
                        <th style="font-size:11px;">Tuteur</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($commerciale):
                                foreach($commerciale as $commerciale):
                                  $sql_zero="SELECT * FROM `historique_personnel` WHERE `personnel` LIKE ? AND `date` LIKE ?";//date_now 
                                  $zero_register=$main->queryAll($sql_zero,array($commerciale['matricule'],$date_now));
                            if(!$zero_register){
                                $sql_person="SELECT `Contact`,`personne_a_contacter`,point.NbPoint FROM `personnel`,`point` WHERE `matricule` LIKE ? AND point.idPersonel LIKE personnel.matricule";
                                $person = $main->query($sql_person,array($commerciale['matricule']));
                        ?>
                      <tr>
                        <td style="font-size:10px;">
                            <a href="../image/personnel/<?=$commerciale['matricule'].".jpg"?>" data-lightbox="roadtrip" title="
                                    <div class='text-center '>
                                    <h5 class='text-center'><?=$commerciale['Nom']?></h5>
                                    <h6 class='text-center'><?=$commerciale['Prenom']?></h6>
                                    <h3 class='text-center' style='font-size:11px;'>
                                     Contact : <?php
                                        $tel=str_split($commerciale['Contact']);
                                        echo $tel[0].$tel[1].$tel[2].' '.$tel[3].$tel[4].' '.$tel[5].$tel[6].$tel[7].' '.$tel[8].$tel[9];
                                        ?></a></br>
                                    </h3></div>"><?=$commerciale['matricule']?>
                                    </a>
                        </td>
                        <td style="font-size:10px;"><?=$person['Contact']?></td>
                        <td style="font-size:10px;"><?=$person['personne_a_contacter']?></td>
                        
                      </tr>
                        <?php }endforeach;endif; ?>
                    </tbody>
                  </table>
                  
        </div>
            
           <div class="row" style="background:#fff;padding:0px 10px">
                <h3 style="font-size:15px;">Récaputilatif point et C A Mensuel</h3>   

                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style="font-size:11px;">Date</th>
                        <th style="font-size:11px;">C.A (Ar)</th>
                        <th style="font-size:11px;">Points</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $point_jour=array();
                            $c_a=0;
                            $tt=new dateTime();
                            $dta=$tt->format("t");
                             do{
                               
                               $sql2="SELECT SUM(point) as point FROM `historique_personnel` WHERE date LIKE ? AND `personnel` LIKE ?";
                               if($dta<10){
                                    $vente_story=$main->query($sql2,array(date("Y-m")."-0".$dta,$coach));    
                               }else{
                                   $vente_story=$main->query($sql2,array(date("Y-m")."-".$dta,$coach));
                               }
                               
                               $point_jour[$dta]=(int)$vente_story['point'];
                              
                               $dta--;
                            }while($dta>0);
                            
                            $dta=$tt->format("t");
                            
                            for($i=1;$i<=$dta;$i++):
                                if($i<10){
                                    $testDim=$main_function->dimanche(date('Y-m')."-0".$i);
                                }else{
                                    $testDim=$main_function->dimanche(date('Y-m')."-".$i);
                                }
                                
                                //couleur du jour
                                            if($i==date('d')){
                                                $couleurjour="bg-success";
                                            }else{
                                                $couleurjour="";
                                            }

                                if($testDim=="Sun"){
                                 //echo 'style="background-color:red;color:#fff;"'; ?>
                                 <tr style="background-color:red;color:#fff;">
                                    <td style="font-size:10px;">
                                        <?php
                                            if($i<10){
                                               echo '0'.$i.'-'.date('m-Y');
                                            }else{
                                                echo $i.'-'.date('m-Y');
                                            }
                                            
                                        ?>
                                    </td>
                                    <td  class="text-center" style="font-size:10px;">
                                        -
                                    </td>
                                    <td style="font-size:10px;"><?= $point_jour[$i]." "?></td>
                                   
                                  </tr>
                                <?php    
                                }else{
                        ?>
                                <tr class="<?=$couleurjour?>">
                                    <td style="font-size:10px;">
                                        <?php
                                            if($i<10){
                                               echo '<a href="http://gestion-commerciale.in-expedition.com/coach/detail-point-jour.php?date='.'0'.$i.'-'.date('m-Y').'">'.'0'.$i.'-'.date('m-Y').'</a>';;
                                            }else{
                                                echo '<a href="http://gestion-commerciale.in-expedition.com/coach/detail-point-jour.php?date='.$i.'-'.date('m-Y').'">'.$i.'-'.date('m-Y').'</a>';
                                            }
                                            
                                        ?>
                                    </td>
                                    <td style="font-size:10px;">
                                        <?php
                                            $sql_com="SELECT `matricule` FROM `personnel` WHERE `coach` LIKE ?";
                                            $commerciale=$main->queryAll($sql_com,array($coach));
                                            foreach($commerciale as $commerciale){
                                                $c_a +=($i<10)?$main->ca_jour_com($commerciale['matricule'],date('Y-m')."-0".$i):$main->ca_jour_com($commerciale['matricule'],date('Y-m')."-".$i);
                                            }
                                           echo number_format($c_a,2,',',' ')."";
                                        ?>
                                    </td>
                                    <td style="font-size:10px;"><?= $point_jour[$i]." "?></td>
                                   
                                  </tr>
                      
                        <?php }
                                $c_a=0;
                           endfor;
                        ?>
                    </tbody>
                  </table>
           </div>       
                  
      </div>
    </div>
  </div>
  <!-- Content Wrapper. Contains page content -->
   <!-- /.content-wrapper -->
   <?php include "footer.php";?>
 