<?php 
$titre = "Details de vente";
include "header.php";
include_once('../include/include.php');

session_start();
$coach=$_SESSION['matricule'];
if(isset($_GET['date']) and !empty($_GET['date'])){
    $date= new dateTime($_GET['date']);
    $date_now=$date->format('Y-m-d');
}else{
    $date_now="0000-00-00";
}
$sql="SELECT vente.id_historique_coach,historique_personnel.personnel,vente.codeproduit,vente.quantite,vente.lieu,historique_personnel.point FROM `vente`,`historique_personnel` WHERE historique_personnel.id LIKE vente.id_historique_coach AND vente.date LIKE ? AND historique_personnel.personnel LIKE ? AND vente.idVP LIKE ?";
$detail=$main->queryAll($sql,array($date_now,$coach,$_GET['matricule']));
$achat=array();
$rwspan=array();
$nbr_repet=array();
foreach($detail as $detail){
    $achat[$detail['id_historique_coach']]=$detail[point];//achat[453]=5
    if(array_key_exists($detail['id_historique_coach'],$achat)){
        $rwspan[$detail['id_historique_coach']]+=1; //rwspan[453]=2
        $nbr_repet[$detail['id_historique_coach']]+=1;
    }
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-corp">
      <div class="container-fluid">
            <ol class="breadcrumb" style="font-size:14px!important;padding-left:0px">
              <li style="padding:0px 5px"><a href="detail-point-jour.php?date=<?=$date->format('d-m-Y')?>" title="formations">Detail Points &nbsp;&nbsp;></a></li>
              <li class="active" style="padding:0px 5px" >Detail Vente</li>
            </ol>
             <h3 style="font-size:14px;">Répartition de vente du <?=$_GET['date']?></h3>   
             </hr>
            <div class="table-responsive">
             <table class="table table-hover text-center table-bordered" align="center" style="font-size:10px">
                 
                    <tbody>
                        <?php 
                        $details=$main->queryAll($sql,array($date_now,$coach,$_GET['matricule']));
                        foreach($details as $details){
                            $totalqte+=$details['quantite'];
                            
                            if($nbr_repet[$details['id_historique_coach']]==1){
                                $totalpts+=$details['point'];
                            }else if($nbr_repet[$details['id_historique_coach']]>1){
                                $nbr_repet[$details['id_historique_coach']]--;
                            }
                            $totalca+=$main->getPriceProduit($details['codeproduit'],$details['quantite'],$details['lieu']);
                        } ?>
                        <tr>
                          <td scope="col">Total</td>
                          <td scope="col"><?=$totalqte?></td>
                          <td scope="col"><?=number_format($totalca,2,',',' ')." Ar"?></td>
                          <td scope="col"><?=$totalpts?></td>
                          
                        </tr>
                        
                     </tbody>
                </table>
            <table class="table table-hover text-center  table-bordered" align="center" style="font-size:10px">
                    <thead>
                        
                        <tr>
                          <th scope="col">Produit</th>
                          <th scope="col">Quantite</th>
                          <th scope="col">CA</th>
                          <th scope="col">Point du coach</th>
                          
                        </tr>
                        
                     </thead>
                   <tbody>
                       <?php $detail=$main->queryAll($sql,array($date_now,$coach,$_GET['matricule'])); foreach($detail as $detail):
                       ?>
                        <tr>
                          <td class="couleur_table" scope="col" style="background:#dee2e6"><?=$detail['codeproduit']?></td>
                          <td class="couleur_table" scope="col" style="background:#dee2e6"><?=$detail['quantite']?></td>
                          <td class="couleur_table" scope="col" style="background:#dee2e6"><?=number_format($main->getPriceProduit($detail['codeproduit'],$detail['quantite'],$detail['lieu']),2,',',' ')." Ar"?></td>
                          <?php if($rwspan[$detail['id_historique_coach']]>=1): ?>
                          <td class="couleur_table align-middle" scope="col" style="background:#dee2e6;" rowspan="<?=$rwspan[$detail['id_historique_coach']]?>"><?=$detail['point']?></td>
                          <?php $rwspan[$detail['id_historique_coach']]-=2; endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

        </div>
    </div>
    </div>
 </div>
<?php include "footer.php";?>