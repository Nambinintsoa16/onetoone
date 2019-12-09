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
</style>
<?php 
include_once("../include/include.php");
include_once("header.php");

$sql = "SELECT * FROM `planing` WHERE `date` LIKE ?"; 
$date_now = date('Y-m-d');
?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="text-transform: uppercase;"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item" style="font-size:20px"></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
          <div class="row" style="padding-left:7px;padding-right:7px">
            <div class="col-md-12 mb-2" style="background:black;opacity:0.9;margin-top:-20px;padding-top:13px">
                <h4 style="opacity:1;color:white;font-size:14px!important">Vente En cours du <?= date('d-m-Y')?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                 <img src="images/banniereventejournaliere.jpg" class="bann_accueil">
            </div>
        </div>
        
        
         <div class="row block_menu">
          <div class="col-md-6 col-sm-6 col-6 block1">
           
             <div class="row contener_entite">
                <div class="Commerciaux">
                  <i class="fa fa-money"></i> <span style="font-size:20px;padding-left:20px">C A encours</span><br>
                    <?php 
                            $resultat=$main->queryAll($sql,array($date_now));
                            $ca_total=0;
                            foreach($resultat as $resultat){
                                $ca_total += $main->ca_jour($resultat['IdEquipe'],$date_now); //calcul somme des C.A du jour des équipes
                            }
                            echo number_format($ca_total,0,'.',',')." Ar";
                        ?>
                  </div>
                <div class="badge_accueil">
                 
                </div>
             </div>
            
          </div>
          <div class="col-md-6 col-sm-6 col-6  block3">

            
               <div class="Planning">
                 <div class="text"><i class="fa fa-users"></i><span style="font-size:20px;padding-left:20px">Equipes du jours</span><br>
                    <?php
                            //comptage des équipes actifs
                            $sql_count="SELECT COUNT(DISTINCT(`IdEquipe`)) as compte FROM `planing` WHERE `date` LIKE ?";
                            $count_actif = $main->query($sql_count,array($date_now)); // nombre d'équipe aujourd'hui
                            echo $count_actif['compte'];
                     ?>
                 </div>
                 <div class="badge_accueil">
                   
                  </div>
               </div>
            
          </div>
          
        </div> 
        
        <div class="row">
            <div class="col-md-12" style="background:#fff;padding:20px 20px">
                <h4>Liste vente en cours du jour</h4>
                <hr>
                <input class = "form-control inputiltre"   type = "text" placeholder = "Rechercher">
                <div  class="table-responsive mt-2" >
                  <table class="table table-bordered">
                      <thead style="background:#33b5e5;color:#fff;font-weight:normal!important">
                          <tr>
                              <th style="width:250px">Code équipe</th>
                              <th style="width:250px">Localisation</th>
                              <th style="width:150px">Panier</th>
                              <th style="width:220px">C A (Ar)</th>
                              <th style="width:125px">Statut</th>
                              <th style="width:100px">Detail</th>
                          </tr>
                      </thead>
                      <tbody id="test">
                          <?php 
                                $resultat=$main->queryAll($sql,array($date_now));
                                foreach($resultat as $resultat):
                            ?>
                          <tr>
                              <td><?= $resultat['IdEquipe']; ?></td>
                              <td><?= $resultat['province']; ?></td>
                              <td><?= $resultat['Panier']; ?></td>
                              <td><?php $ca=$main->ca_jour($resultat['IdEquipe'],$date_now);echo number_format($ca,0,',',' ')." Ar"; ?></td>
                              <td  class="text-center">
                                  <?php if($ca>=50000){
                                            $couleur='green';
                                        }else if($ca>=40000 and $ca_jour<50000){
                                            $couleur='blue';
                                        }else if($ca>=30000 and $ca_jour<40000){
                                            $couleur='#ff9933';
                                        }else{
                                            $couleur='red';
                                        }
                                  ?>
                                  <i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:<?=$couleur?>"></i>
                              </td>
                              <td class="text-center"><a href="ventejournalieredetail.php?equipe=<?= $resultat['IdEquipe']; ?>&test_jour=cours""> <i class="fa fa-plus "></i> </a></td>
                          </tr>
                          <?php endforeach; ?>
                        
                      </tbody>
                      
                  </table>               

                </div>
            </div>
        </div>
      
      </div><!-- /.container-fluid -->
    </div>
  </div>
  <!-- Content Wrapper. Contains page content -->
   <!-- /.content-wrapper -->
   <?php include "footer.php";?>
 