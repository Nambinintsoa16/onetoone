<?php 
$titre = "DEDUCTION SUR SALAIRE";
include "header.php";
include_once('../include/include.php');

$coach=$_SESSION['matricule'];

?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" >
      <div class="container-fluid">
          <div class="row" style="padding:0px 5px">
                  <div class="col-md-12" style="background:#fff;padding:5px 0px">
                        <ol class="breadcrumb" style="font-size:14px!important;padding:0px 5px;background:#fff" >
                          <li ><a href="moncompte.php" title="Accueil">Mon compte  &nbsp;&nbsp;&nbsp;></a></li>
                          <li class="active" style="padding:0px 5px" > Bonnus et Prime  <b>  <?php  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1'); echo utf8_encode(strftime(" %B %Y")); ?>  </b> </li>
                        </ol>
                  </div>
            </div>
        
    <div class="row" style="margin-top:5px">
        <div class="col-md-12" style="background:#fff">
            <table class="table table-hover   table-bordered " style="font-size:13px;margin-top:5px; ">
               <thead>
                  
                   <tr>

                        <td class="text-center" style="font-weight:bold">Date/heure</td>
                        <td class="text-center" style="font-weight:bold">Motif</td>
                        <td class="text-center" style="font-weight:bold">Montant</td>
                    </tr>
                   
                  
               </thead>
               <tbody>
                    <?php
                        $sql="SELECT `date`,`heure`,`motif`,`montant` FROM `BonusEtPrime` WHERE `IdCodeVp` LIKE ?";
                        $bonus=$main->queryAll($sql,array($_SESSION['matricule']));
                        if($bonus){
                            foreach($bonus as $bonus):
                    ?>
                    <tr>
                        <td class="text-center" style="font-size:11px;"><?=$bonus['date'].' / '.$bonus['heure']?></td>
                        <td class="text-center" style="font-size:11px;"><?=$bonus['motif']?></td>
                        <td class="text-center" style="font-size:11px;"><?=number_format($bonus['montant'],2,',',' ').' Ar'?></td>
                        
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
                                $sql="SELECT `montant` FROM `BonusEtPrime` WHERE `IdCodeVp` LIKE ?";
                                $bonus=$main->queryAll($sql,array($_SESSION['matricule']));
                                $total_bonus=0;
                                foreach($bonus as $bonus){
                                    $total_bonus+=($bonus['montant']);
                                }                            
                            
                                echo number_format($total_bonus,2,","," ");
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