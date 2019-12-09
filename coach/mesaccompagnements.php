<?php
$titre = "Mes accompangements";
include_once("../include/include.php");
include("header.php");
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
    
    p{
           margin-bottom: 2px!important;
    }
</style>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12" style="background:#fff">
                    <div  class="table-responsive">
                        <table  class="table table-striped" style="font-size:12px; margin-top: 10px;">
                            <thead style="background:#33b5e5;color:#fff;font-weight:normal!important">
                              <tr>
                                
                                <th style="width:50%">Date</th>
                                <th style="width:50%">Commerciaux </th>
                              </tr>
                            <tbody>
                                <?php
                                
                                foreach($accompagnement as $row) {
                                          $dt= $row['date_accomp'];
                                          $date = new DateTime($dt);
                                          if($date->format('d-M-Y')==date('d-M-Y')){
                                              $couleur='bg-success';
                                          }else{
                                              $couleur='';
                                          }
                                ?>
                                    <tr class="<?=$couleur?>">
                                        <td class="align-middle"><?php
                                          
                                          echo $date->format('d-M-Y');
                                       
                                       $d?></td>
                                        <td  class="align-middle">
                                           
                                            
                                            <a href="#" data-toggle="modal" data-target="#<?php echo $row['com_1'];?>">
                                                <?php echo $row['com_1'];?>
                                            </a>
                                            <?php
                                                    $sql="SELECT `matricule`,`Nom`,`Prenom`,`Contact` FROM `personnel` WHERE `matricule` LIKE ?";
                                                    $commerciale=$main->query($sql,array($row['com_1']));
                                            ?>
                                            <div class="modal fade" id="<?php echo $row['com_1'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Détails</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                          <div class="card" style="width: 100%;">
                                                              <img class="card-img-top" src="../image/personnel/<?=$row['com_1'].".jpg"?>" alt="<?=$commerciale['Nom']." ".$commerciale['Prenom']?>" style="height:200px;object-fit:cover">
                                                              <div class="card-body">
                                                                <div class="">
                                                                    <p class="card-text"><?=$commerciale['Nom']." ".$commerciale['Prenom']?></p>
                                                                    <p><?php $tel=str_split($commerciale['Contact']);
                                                                            echo $tel[0].$tel[1].$tel[2].' '.$tel[3].$tel[4].' '.$tel[5].$tel[6].$tel[7].' '.$tel[8].$tel[9]; 
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                                <p>
                                                                   <span class="">Tranche d'heure:</span> <span class="">8h 30 à 10h</span>
                                                                </p>
                                                                
                                                                 <p>
                                                                   <span class="">Evaluation</span> <span class="text-success"> Bien</span>
                                                                </p>
                                                                
                                                                  <p>
                                                                   <span class="">Vente </span> <span class="text-success"><?=number_format($main->ca_jour_com($row['com_1'],$date->format('Y-m-d')))." Ar"?></span>
                                                                </p>
                                                                    
                                                              </div>
                                                            </div>
                                                        
                                                      </div>
                                                    
                                                    </div>
                                                  </div>
                                                </div>
                                           
                                            | 
                                            
                                            <a href="#" data-toggle="modal" data-target="#<?php echo $row['com_2'];?>">
                                                <?php echo $row['com_2'];?>
                                            </a>
                                            <?php
                                                    $sql="SELECT `matricule`,`Nom`,`Prenom`,`Contact` FROM `personnel` WHERE `matricule` LIKE ?";
                                                    $commerciale=$main->query($sql,array($row['com_2']));
                                            ?>
                                            <div class="modal fade" id="<?php echo $row['com_2'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Détails</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                          <div class="card" style="width: 100%;">
                                                              <img class="card-img-top" src="../image/personnel/<?=$row['com_2'].".jpg"?>" alt="<?=$commerciale['Nom']." ".$commerciale['Prenom']?>" style="height:200px;object-fit:cover">
                                                              <div class="card-body">
                                                                <div class="">
                                                                    <p class="card-text"><?=$commerciale['Nom']." ".$commerciale['Prenom']?></p>
                                                                    <p><?php $tel=str_split($commerciale['Contact']);
                                                                            echo $tel[0].$tel[1].$tel[2].' '.$tel[3].$tel[4].' '.$tel[5].$tel[6].$tel[7].' '.$tel[8].$tel[9]; 
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                                <p>
                                                                   <span class="">Tranche d'heure:</span> <span class="">8h 30 à 10h</span>
                                                                </p>
                                                                
                                                                 <p>
                                                                   <span class="">Evaluation</span> <span class="text-success"> Bien</span>
                                                                </p>
                                                                
                                                                  <p>
                                                                   <span class="">Vente </span> <span class="text-success"><?=number_format($main->ca_jour_com($row['com_2'],$date->format('Y-m-d')))." Ar"?></span>
                                                                </p>
                                                                    
                                                              </div>
                                                            </div>
                                                        
                                                      </div>
                                                    
                                                    </div>
                                                  </div>
                                                </div>
                                            
                                            </td>
                                    </tr>
                               <?php } ?>
                               
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div><!-- /.row -->
        </div>
    </div>
</div>
<?php include("footer.php");


?>