<?php

$titre = "Ma mission";
include_once("../include/include.php");
include_once("header.php");

$sql2 ="SELECT * FROM `ma_mission` where statut_mission like 'En_cours' AND id_coach  LIKE ?";
$mission = $main->query($sql2,array($_SESSION['matricule']));

$sql ="SELECT * FROM `mes-accompagnement`  where id_coach  LIKE ? ORDER BY date_accomp ASC";
$accompagnement = $main->queryAll($sql,array($_SESSION['matricule']));


?>
<style>
    td{
        padding:5px!important;
        padding-left:10px;
        font-size:12px!important;
    }
    
    th{
       font-size:14px!important;
       font-weight:normal;
    }
     h3{
        font-size:14px!important;
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
</style>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-4 col-sm-6 col-12" style="background:#33b5e5;padding:0px 0px;color:#fff;border-radius:5px">
                    <ul style="list-style-type:none;padding-left:15px!important;padding-top:10px">
                        <li class="">Mission <?php echo $mission['nom_mission'];?></li>
                        <li>Du <?php $dt = $mission['date_deb'] ;  formatdt($dt);?> Au <?php $dt = $mission['date_fin'];  formatdt($dt);?>  </li>
                        <li>Statut <?php echo $mission['statut_mission'];?></li>
                    </ul>
            </div>
        </div><!-- /.row -->
        
        <div class="row">
            <div class="col-md-12" style="padding:0px 5px;">
                 <hr>
                <h3><b>CHEF DE MISSION</b></h3>
                <hr>
                <table class="table">
                    <thead style="background:#3F729B;padding:0px 0px;color:#fff">
                        <tr>
                            <th style="width:20%">Matr</th>
                            <th style="width:50%">Nom et Prénom</th>
                            
                            <th style="width:30%">Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $sql="SELECT `mtrP` FROM `planing_equipe`,equipe,ma_mission,fonction WHERE `statut` LIKE 'Active' AND equipe.idEqupe = ma_mission.id_equipe AND `designationEquipe` LIKE equipe.IdEquipe AND fonction.id = `fonction` AND fonction.DesFonction LIKE ?";
                                $chef_mission = $main->queryAll($sql,array('Chef de mission'));
                                foreach($chef_mission as $chef_mission):
                                    $sql_pers="SELECT `Nom`,`Prenom`,`Contact` FROM `personnel` WHERE `matricule` LIKE ?";
                                    $pers=$main->query($sql_pers,array($chef_mission['mtrP']));
                        ?>
                        <tr>

                             <?php if(file_exists('../image/personnel/'.$chef_mission['mtrP'].'.jpg')){ ?>
                                                <td><a href="../image/personnel/<?=$chef_mission['mtrP'].".jpg"?>"data-lightbox="roadtrip" title=""><?=$chef_mission['mtrP']?> </a></td>
                                            <?php }else{ ?>
                                                <td><a href="../images/point_interro.jpg" data-lightbox="roadtrip" title=""><?=$chef_mission['mtrP']?> </a></td>
                                            <?php } ?>
                            <td><?=$pers['Nom']." ".$pers['Prenom']?></td>
                           
                            <td><?=$pers['Contact']?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
             <div class="col-md-12" style="padding:0px 5px;">
                 <hr>
                <h3><b>COACH</b></h3>
                <hr>
                <?php
                    $sql="SELECT `mtrP` FROM `planing_equipe`,fonction,equipe WHERE `fonction` = fonction.id AND fonction.DesFonction LIKE ? AND `statut` LIKE 'Active' AND `designationEquipe` LIKE equipe.IdEquipe AND equipe.idEqupe LIKE ?";
                    $coach_mission=$main->queryAll($sql,array('Coach',$mission['id_equipe']));
                ?>
                          <ul class="nav nav-pills nav-justified col-md-12">
                              <?php 
                                    $i=0;
                                    foreach($coach_mission as $coach_mission): 
                                        if($i==0){
                                            $i=1;
                                            $comm1=$coach_mission['mtrP'];
                              ?>
                                
                            <li class="nav-item col-md-6">
                              <a class="nav-link active privilege btn_click" id="privilege1"><?=$coach_mission['mtrP']?></a>
                            </li>
                             <?php  }else{ 
                                    $comm2=$coach_mission['mtrP'];
                             ?>
                            <li class="nav-item col-md-6 ">
                              <a class="nav-link privilege" id="privilege2"><?=$coach_mission['mtrP']?></a>
                            </li>
                                 <?php } endforeach; ?>
            
                          </ul>
                          
                           <div class="col-md-12" id="tabcontent1" style="padding:5px 5px">
                               <table class="table">
                                    <thead style="background:#3F729B;padding:0px 0px;color:#fff">
                                        <tr>
                                            <th style="width:20%">Matr</th>
                                            <th style="width:50%">Nom et Prénom</th>
                                            <th style="width:30%">Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql="SELECT `matricule`,`Nom`,`Prenom`,`Contact` FROM `personnel` WHERE `coach` LIKE ?";
                                            $com=$main->queryAll($sql,array($comm1));
                                            if($com){
                                            foreach($com as $com):
                                        ?>
                                        <tr>
                                            <?php if(file_exists('../image/personnel/'.$com['matricule'].'.jpg')){ ?>
                                                <td><a href="../image/personnel/<?=$com['matricule'].".jpg"?>"data-lightbox="roadtrip" title=""><?=$com['matricule']?> </a></td>
                                            <?php }else{ ?>
                                                <td><a href="../images/point_interro.jpg" data-lightbox="roadtrip" title=""><?=$com['matricule']?> </a></td>
                                            <?php } ?>
                                            <td><?=$com['Nom']." ".$com['Prenom']?></td>
                                            <td><?php
                                                    $contact=str_split($com['Contact']);
                                                    echo "0".$contact[1].$contact[2]." ".$contact[3].$contact[4]." ".$contact[5].$contact[6].$contact[7]." ".$contact[8].$contact[9];
                                                    
                                                ?></td>
                                        </tr>
                                        <?php endforeach; }else{ ?>
                                        <tr>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                           </div>
                           
                           <div class="col-md-12" id="tabcontent2" style='display:none;padding:5px 5px'>
                              <table class="table">
                                <thead style="background:#3F729B;padding:0px 0px;color:#fff">
                                    <tr>
                                        <th style="width:20%">Matr</th>
                                        <th style="width:50%">Nom et Prénom</th>
                                        <th style="width:30%">Contact</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            $sql="SELECT `matricule`,`Nom`,`Prenom`,`Contact` FROM `personnel` WHERE `coach` LIKE ?";
                                            $com=$main->queryAll($sql,array($comm2));
                                            if($com){
                                            foreach($com as $com):
                                        ?>
                                        <tr>
                                            <?php if(file_exists('../image/personnel/'.$com['matricule'].'.jpg')){ ?>
                                                <td><a href="../image/personnel/<?=$com['matricule'].".jpg"?>"data-lightbox="roadtrip" title=""><?=$com['matricule']?> </a></td>
                                            <?php }else{ ?>
                                                <td><a href="../images/point_interro.jpg" data-lightbox="roadtrip" title=""><?=$com['matricule']?> </a></td>
                                            <?php } ?>
                                            <td><?=$com['Nom']." ".$com['Prenom']?></td>
                                            <td><?php
                                                    $contact=str_split($com['Contact']);
                                                    echo "0".$contact[1].$contact[2]." ".$contact[3].$contact[4]." ".$contact[5].$contact[6].$contact[7]." ".$contact[8].$contact[9];
                                                    
                                                ?></td>
                                        </tr>
                                        <?php endforeach; }else{ ?>
                                        <tr>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                        </tr>
                                        <?php } ?>
                                        
                                </tbody>
                            </table>
                           </div>
                    
               <!-- <table class="table">
                    <thead style="background:#3F729B;padding:0px 0px;color:#fff">
                        <tr>
                             <th style="width:20%">Matr</th>
                            <th style="width:50%">Nom et Prénom</th>
                            <th style="width:30%">Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#">COTN077 </a></td>
                            <td>DOMOINA Nambinintsoa</td>
                            <td>034 11 669 42</td>
                        </tr>
                        
                         <tr>
                            <td><a href="#">COTN112  </a> </td>
                            <td>RAKOTOMALALA  RADO </td>
                            <td> 034 42 836 05 </td>
                        </tr>
                    </tbody>
                </table>-->
            </div>
            <!--
             <div class="col-md-12" style="padding:0px 5px;">
                 <hr>
                <h3><b>COMMERCIAUX</b></h3>
                <hr>
                <table class="table">
                    <thead style="background:#3F729B;padding:0px 0px;color:#fff">
                        <tr>
                            <th style="width:20%">Matr</th>
                            <th style="width:50%">Nom et Prénom</th>
                            <th style="width:30%">Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#">VP19620 </a></td>
                            <td> RAFAMANTANATSOA ELIE EMUNUEL ELIE </td>
                            <td> 034-03-024-82 </td>
                        </tr>
                         <tr>
                            <td><a href="#">VP19618 </a></td>
                            <td>ERISTIE MANOELY  HELGUISSEN </td>
                            <td> 034-90-604-74 </td>
                        </tr>
                        
                         <tr>
                            <td><a href="#">VP19407</a> </td>
                            <td> RAVONIARISOA HAINGONIRINA ODILE </td>
                            <td>  034-41-867-64 </td>
                        </tr>
                        
                          <tr>
                            <td><a href="#">VP12702 </a></td>
                            <td>  HAJA PRIVOT AKRAHAM 		 HAJA </td>
                            <td>  034-51-040-05  </td>
                        </tr>
                        	 	 

                    </tbody>
                </table>
            </div>-->
        </div>
    </div>
  </div>
</div>
<?php include("footer.php");?>