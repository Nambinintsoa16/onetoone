<?php 
$titre = "Details du rapport";
include "header.php";
include_once('../include/include.php');

$coach=$_SESSION['matricule'];
$sql="SELECT `date`,`heure`,`description`,`ca_journaliere` FROM `rapport` WHERE `id_coach` LIKE ?";
$rapport=$main->queryAll($sql,array($coach));
$total_ca=0;
foreach($rapport as $rapport){
    $total_ca+=$rapport['ca_journaliere'];
}
?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" >
      <div class="container-fluid">
          <div class="row" style="margin-top:-10px">
              <div class="col-md-12" style="background:#fff;padding:5px 5px">
                  <ol class="breadcrumb" style="font-size:14px!important;padding-left:0px" >
                        <li class="active" style="padding:0px 5px" > <a href="rapport_vente.php" title="Accueil">Rapport de vente journalière</a> &nbsp;&nbsp;> </b> </li>
                        <li style="padding:0px 5px">Détails du rapport</li>
                </ol>
              </div>
          </div>
        
    <div class="row" style="margin-top:5px">
        <div class="col-md-12" style="background:#fff">
            <table class="table table-hover   table-bordered " style="font-size:13px;margin-top:5px; ">
               <thead>
                  
                   <tr>

                        <td class="text-center" style="font-weight:bold">Date/heure</td>
                        <td class="text-center" style="font-weight:bold">Déscription</td>
                        <td class="text-center" style="font-weight:bold">C.A (*Ar)</td>
                    </tr>
                   
               </thead>
               <tbody>
                        
                        <?php 
                            $rapport=$main->queryAll($sql,array($coach));
                            if($rapport){
                                foreach($rapport as $rapport): ?>
                                <tr>
                                    <td class="text-center" style="font-size:11px;"><?=$rapport['date'].' / '.$rapport['heure']?></td>
                                    <td class="text-center" style="font-size:11px;"><?=$rapport['description']?></td>
                                    <td class="text-center" style="font-size:11px;"><?=number_format($rapport['ca_journaliere'],2,',',' ').' Ar'?></td>
                                </tr>
                        <?php endforeach; }else{ ?>
                                <tr>
                                    <td class="text-center" style="font-size:11px;">-</td>
                                    <td class="text-center" style="font-size:11px;">-</td>
                                    <td class="text-center" style="font-size:11px;">-</td>
                                </tr>
                        <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text-center" style="font-size:11px;font-weight:bold">Total :</td>
                        <td class="text-center" style="font-size:11px;"></td>
                        <td class="text-center" style="font-size:11px;font-weight:bold">
                            <?=number_format($total_ca,2,',',' ').' Ar'?>
                        </td>
                    </tr>
                </tfoot>
            </table>
            
        </div>
         
    </div>
  </div>
</div>

  </div>
</div>

  </div>

<?php include "footer.php";?>