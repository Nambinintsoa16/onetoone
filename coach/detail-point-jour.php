<?php 
$titre = "Detail points";
include "header.php";
include_once('../include/include.php');

$coach=$_SESSION['matricule'];
if(isset($_GET['date']) and !empty($_GET['date'])){
    $date= new dateTime($_GET['date']);
    $date_now=$date->format('Y-m-d');
}else{
    $date_now="0000-00-00";
}

?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-corp">
      <div class="container-fluid">
            <ol class="breadcrumb" style="font-size:14px!important;padding-left:0px">
              <li style="padding:0px 5px"><a href="moncompte.php" title="Accueil">Mon compte &nbsp;&nbsp; > </a></li>
              <li style="padding:0px 5px"><a href="detail-point.php" title="formations">Mes points &nbsp;&nbsp;></a></li>
              <li class="active" style="padding:0px 5px" >Detail Points</li>
            </ol>
          <div class="row"  style="background:#fff;padding:0px 10px;margin-top:-20px">
               <?php 
                    $sql="SELECT `nom_mission` FROM `ma_mission` WHERE `id_coach` LIKE ? AND `statut_mission` LIKE 'En_cours'"; 
                    $mission = $main->query($sql,array($coach));
              ?>
              <h3 style="font-size:15px;margin-top:10px">Detail Points et C A  <?php echo ($mission)?$mission['nom_mission']:'(*Pas de Mission)';?> du <?=$_GET['date']?></h3>
              <hr/>   
               
               
               
            <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="font-size:11px;">Tranche d'heure</th>
                        <th style="font-size:11px;">Points</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                              //membre commerciale du coach
                              $sql1="SELECT `matricule` FROM `personnel` WHERE `coach` LIKE ?";
                              $commerciale=$main->queryAll($sql1,array($coach));//matricule du coach
                               $matricules=array();
                               $sompoint=array();
                              if($commerciale):
                                foreach($commerciale as $commerciale):
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
                      
                                endforeach;
                                
                            endif;
                            
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
                       
                        <td style="font-size:10px;"><?php
                            if(is_null($sompoint['apresmidi'])){
                              echo  '-';
                            }else{
                                echo $sompoint['apresmidi'];
                            }
                        ?></td>
                      </tr>
                      
                         <tr>
                        <td style="font-size:10px;">17:30 -	19:00</td>
                        
                        <td style="font-size:10px;"><?php
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
                        <td style="font-size:10px;"><a href="../image/personnel/<?=$commerciale['matricule'].".jpg"?>" data-lightbox="roadtrip" title="
                                    <div class='text-center' style='padding:5px 5px; background:#ccc;color:#000'>
                                    <h5 class='text-center'><?=$commerciale['Nom']?></h5>
                                    <h6 class='text-center'><?=$commerciale['Prenom']?></h6>
                                    <h3 class='text-center' style='font-size:11px;'>
                                     Contact : <?php
                                        $tel=str_split($commerciale['Contact']);
                                        echo $tel[0].$tel[1].$tel[2].' '.$tel[3].$tel[4].' '.$tel[5].$tel[6].$tel[7].' '.$tel[8].$tel[9];
                                        ?></a></br>
                                    </h3></div>"><?=$commerciale['matricule']?>
                                    </a></td>
                        <td style="font-size:10px;"><?=$person['Contact']?></td>
                        <td style="font-size:10px;"><?=$person['personne_a_contacter']?></td>
                      </tr>
                        <?php }endforeach;endif; ?>
                    </tbody>
                  </table>
                  
        </div>
        
        <div class="row" style="background:#fff;padding:0px 10px">
            <h3 style="font-size:15px;">Répartition   points  par  commercial</h3>   
              
                    <?php
                          //membre commerciale du coach
                          $sql1="SELECT `matricule`,`Nom`,`Prenom`,`Contact` FROM `personnel` WHERE `coach` LIKE ?";
                          $commerciale=$main->queryAll($sql1,array($coach));
                      
                    ?>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="font-size:11px;">VP</th>
                        <th style="font-size:11px;">Contact</th>
                        <th style="font-size:11px;">C.A</th>
                        <th style="font-size:11px;">Point du coach</th>
                      </tr>
                    </thead>
                    <tbody>
                         <?php
                            $point_du_com=array();
                            if($commerciale):
                                foreach($commerciale as $commerciale):
                                   /* $sql2="SELECT historique_personnel.point,historique_personnel.heure FROM `personnel` INNER JOIN `historique_personnel` ON personnel.matricule LIKE historique_personnel.personnel AND historique_personnel.personnel LIKE ? AND historique_personnel.date LIKE ?";
                                    $point=$main->queryAll($sql2,array($commerciale['matricule'],$date_now));  
                                    if(empty($point['point'])):
                                            foreach($point as $point){
                                                    //limite heure
                                                      $tab_heure_matin=[new DateTime('08:00:00'),new DateTime('11:29:00')];
                                                      $tab_heure_midi=[new DateTime('11:30:00'),new DateTime('13:59:00')];
                                                      $tab_heure_apresmidi=[new DateTime('14:00:00'),new DateTime('17:29:00')];
                                                      $tab_heure_soir=[new DateTime('17:30:00'),new DateTime('19:00:00')];
                                                      $tab_heure=[$tab_heure_matin,$tab_heure_midi,$tab_heure_apresmidi,$tab_heure_soir];
                                            
                                                      $heure_bd = new DateTime($point['heure']);
                                                      
                                                      if($tab_heure[0][0]<=$heure_bd and $tab_heure[0][1]>=$heure_bd){
                                                          
                                                          if(array_key_exists($commerciale['matricule'], $point_du_com)){
                                                              if((int)$point['point']==25 || (int)$point['point']==15){
                                                                  $point_du_com[$commerciale['matricule']]+=((int)$point['point']/5);
                                                              }else if((int)$point['point']==50){
                                                                  $point_du_com[$commerciale['matricule']]+=(int)((int)$point['point']/7);
                                                              }else if((int)$point['point']==10){
                                                                  $point_du_com[$commerciale['matricule']]+=(int)((int)$point['point']/3);
                                                              }
                                                              
                                                          }else{
                                                              if((int)$point['point']==25 || (int)$point['point']==15){
                                                                  $point_du_com[$commerciale['matricule']]=((int)$point['point']/5);
                                                              }else if((int)$point['point']==50){
                                                                  $point_du_com[$commerciale['matricule']]=(int)((int)$point['point']/7);
                                                              }else if((int)$point['point']==10){
                                                                  $point_du_com[$commerciale['matricule']]=(int)((int)$point['point']/3);
                                                              }
                                                          }
                                                          
                                                      }else if($tab_heure[1][0]<=$heure_bd and $tab_heure[1][1]>=$heure_bd){
                                                          
                                                          if(array_key_exists($commerciale['matricule'], $point_du_com)){
                                                              if((int)$point['point']==15){
                                                                  $point_du_com[$commerciale['matricule']]+=((int)$point['point']/5);
                                                              }else if((int)$point['point']==25){
                                                                  $point_du_com[$commerciale['matricule']]+=((int)$point['point']/(25/3));
                                                              }
                                                              
                                                          }else{
                                                              if((int)$point['point']==15){
                                                                  $point_du_com[$commerciale['matricule']]=((int)$point['point']/5);
                                                              }else if((int)$point['point']==25){
                                                                  $point_du_com[$commerciale['matricule']]=((int)$point['point']/(25/3));
                                                              }
                                                          }
                                                          
                                                      }else if($tab_heure[2][0]<=$heure_bd and $tab_heure[2][1]>=$heure_bd){
                                                          if(array_key_exists($commerciale['matricule'], $point_du_com)){
                                                              if((int)$point['point']==50){
                                                                  $point_du_com[$commerciale['matricule']]+=(int)((int)$point['point']/7);
                                                              }else if((int)$point['point']==25){
                                                                  $point_du_com[$commerciale['matricule']]+=((int)$point['point']/5);
                                                              }
                                                          }else{
                                                              if((int)$point['point']==50){
                                                                  $point_du_com[$commerciale['matricule']]=(int)((int)$point['point']/7);
                                                              }else if((int)$point['point']==25){
                                                                  $point_du_com[$commerciale['matricule']]=((int)$point['point']/5);
                                                              }
                                                          }
                                                         
                                                      }else if($tab_heure[3][0]<=$heure_bd and $tab_heure[3][1]>=$heure_bd){
                                                          
                                                            if(array_key_exists($commerciale['matricule'], $point_du_com)){
                                                              if((int)$point['point']==10){
                                                                  $point_du_com[$commerciale['matricule']]+=((int)$point['point']/5);
                                                              }else if((int)$point['point']==25){
                                                                  $point_du_com[$commerciale['matricule']]+=((int)$point['point']/(25/3));
                                                              }
                                                              
                                                              }else{
                                                                  if((int)$point['point']==10){
                                                                      $point_du_com[$commerciale['matricule']]=(int)((int)$point['point']/5)+1;
                                                                  }else if((int)$point['point']==25){
                                                                      $point_du_com[$commerciale['matricule']]=((int)$point['point']/(25/3));
                                                                  }
                                                              }
                                                              
                                                      }
                                                      
                                            }*/
                                            //COMPTAGE DE POINT
                                            $sql="SELECT vente.id_historique_coach,historique_personnel.point FROM `vente`,`historique_personnel` WHERE historique_personnel.id LIKE vente.id_historique_coach AND vente.date LIKE ? AND historique_personnel.personnel LIKE ? AND vente.idVP LIKE ?";
                                            $detail=$main->queryAll($sql,array($date_now,$coach,$commerciale['matricule']));
                                            $achat=array();
                                            $nbr_repet=array();
                                            $totalpts=0;
                                            foreach($detail as $detail){
                                                $achat[$detail['id_historique_coach']]=$detail[point];//achat[453]=5
                                                if(array_key_exists($detail['id_historique_coach'],$achat)){
                                                    $nbr_repet[$detail['id_historique_coach']]+=1;
                                                }
                                            }
                                            $details=$main->queryAll($sql,array($date_now,$coach,$commerciale['matricule']));
                                            foreach($details as $details){
                                                if($nbr_repet[$details['id_historique_coach']]==1){
                                                    $totalpts+=$details['point'];
                                                }else if($nbr_repet[$details['id_historique_coach']]>1){
                                                    $nbr_repet[$details['id_historique_coach']]--;
                                                }
                                            }
                                            //FIN DU COMPTAGE DE POINT
                        ?>
                      <tr>
                        <td style="font-size:10px;">
                            <a href="historiqueAchat.php?matricule=<?=$commerciale['matricule']?>&date=<?=$date->format('d-m-Y')?>"><?=$commerciale['matricule']?></a>
                            <!--<a href="../image/personnel/<?=$commerciale['matricule'].".jpg"?>" data-lightbox="roadtrip" title="
                                    <div class='text-center '>
                                    <h5 class='text-center'><?=$commerciale['Nom']?></h5>
                                    <h6 class='text-center'><?=$commerciale['Prenom']?></h6>
                                    <h3 class='text-center' style='font-size:11px;'>
                                     Contact : <?php
                                        $tel=str_split($commerciale['Contact']);
                                        echo $tel[0].$tel[1].$tel[2].' '.$tel[3].$tel[4].' '.$tel[5].$tel[6].$tel[7].' '.$tel[8].$tel[9];
                                        ?></br>
                                    </h3></div>"><?=$commerciale['matricule']?>
                                    </a>-->
                                    
                        </td>
                        <td style="font-size:10px;"><?php $tel=str_split($commerciale['Contact']);
                                        echo $tel[0].$tel[1].$tel[2].' '.$tel[3].$tel[4].' '.$tel[5].$tel[6].$tel[7].' '.$tel[8].$tel[9];?></td>
                        <td style="font-size:10px;"><?=number_format($main->ca_jour_com($commerciale['matricule'],$date_now),2,',',' ')." Ar"?></td>
                        <td style="font-size:10px;"><?=$totalpts;?></td>
                      </tr>
                      <?php /*endif;*/endforeach;endif; ?>
                    </tbody>
                  </table>
                  
        </div>
                  
      </div>
    </div>
  </div>
  <!-- Content Wrapper. Contains page content -->
   <!-- /.content-wrapper -->
   <?php include "footer.php";?>
 