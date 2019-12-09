<?php 
$titre = "DEDUCTION SUR SALAIRE";
include "header.php";
include_once('../include/include.php');

$coach=$_SESSION['matricule'];
$raison=$_GET['description']; //ex: Telephone/autre/...

?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" >
      <div class="container-fluid">
          <div class="row" style="margin-top:-10px">
              <div class="col-md-12" style="background:#fff;padding:5px 5px">
                  <ol class="breadcrumb" style="font-size:14px!important;padding-left:0px" >
                        <li class="active" style="padding:0px 5px" > <a href="deduction_salaire.php" title="Accueil">Déduction sur salaire  <b>  <?php  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1'); echo utf8_encode(strftime(" %B %Y")); ?> </a> &nbsp;&nbsp;> </b> </li>
                        <li style="padding:0px 5px">Détail du déduction de <?=$raison?></li>
                </ol>
              </div>
          </div>
        
    <div class="row" style="margin-top:5px">
        <div class="col-md-12" style="background:#fff">
            <table class="table table-hover   table-bordered " style="font-size:13px;margin-top:5px; ">
               <thead>
                  
                   <tr>

                        <td class="text-center" style="font-weight:bold">Date/heure</td>
                        <td class="text-center" style="font-weight:bold">Observation</td>
                        <td class="text-center" style="font-weight:bold">Montant</td>
                    </tr>
                   
                  
               </thead>
               <tbody>
                    <?php
                        $sql="SELECT `date`,`heure`,`observation`,`montont` FROM `penalite` WHERE `IdCodeVp` LIKE ? AND `designation` LIKE ?";
                        $penalite=$main->queryAll($sql,array($_SESSION['matricule'],$raison));
                        if($penalite){
                            foreach($penalite as $penalite):
                    ?>
                    <tr>
                        <td class="text-center" style="font-size:11px;"><?=$penalite['date'].' / '.$penalite['heure']?></td>
                        <td class="text-center" style="font-size:11px;"><?=$penalite['observation']?></td>
                        <td class="text-center" style="font-size:11px;"><?=number_format($penalite['montont'],2,',',' ').' Ar'?></td>
                        
                    </tr>
                    <?php
                            endforeach;
                        }else{ ?>
                        <tr>
                            <td class="text-center" style="font-size:11px;">-</td>
                            <td class="text-center" style="font-size:11px;">-</td>
                            <td class="text-center" style="font-size:11px;">-</td>
                        
                        </tr>
                            
                     <?php    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text-center" style="font-size:11px;font-weight:bold">Total :</td>
                        <td class="text-center" style="font-size:11px;"></td>
                        <td class="text-center" style="font-size:11px;font-weight:bold">
                            <?php 
                                $k=$main_function->malus($raison,$_SESSION['matricule'],date('Y-m'));
                                echo number_format($k,2,","," ");
                            ?>
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