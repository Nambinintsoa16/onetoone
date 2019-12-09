<?php 
    $titre = "Detail d'accompagnement";
    include "header.php";
    $coach=$_SESSION['matricule'];
    $activite="vente d'accompagnement";
   // $sql="SELECT vente.idVP,vente.codeproduit,vente.quantite,vente.lieu FROM `mes-accompagnement`,vente,historique_personnel WHERE `date_accomp` LIKE ? AND `id_coach` LIKE ? AND vente.date LIKE date_accomp AND historique_personnel.personnel LIKE `id_coach` AND vente.id_historique_coach LIKE historique_personnel.id AND historique_personnel.activite LIKE ?";
    $date = new DateTime($_GET['date']);
    
   // $detail_accomp=$main->queryAll($sql,array($date->format('Y-m-d'),$coach,$activite));
    
    $com1=$_GET['com1'];
    $com2=$_GET['com2'];
    
?>
<style>
    a:hover{
        color:black!important;
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
    #tabcontent1, #tabcontent2{
        padding-left:0px!important;
    }
</style>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-corp">
      <div class="container-fluid">
          <ol class="breadcrumb" style="font-size:14px!important;padding-left:0px">
              <li style="padding:0px 5px"><a href="calendrier_accomp.php" title="Accueil">Calendrier de vente &nbsp;&nbsp; > </a></li>
              <li class="active" style="padding:0px 5px" >Détail vente d'accompagnement</li>
          </ol>
          <div class="row" style="background:#fff;padding:0px 10px">
                          <ul class="nav nav-pills nav-justified col-md-12">
                            <li class="nav-item col-md-6">
                              <a class="nav-link active privilege" id="privilege1"><?=$com1?></a>
                            </li>
                            <li class="nav-item col-md-6 ">
                              <a class="nav-link privilege" id="privilege2"><?=$com2?></a>
                            </li>
            
                          </ul>
                          
                          <?php
                                
                                        
                                $sql="SELECT vente.idVP,vente.codeproduit,vente.quantite,vente.lieu FROM `vente`,historique_personnel WHERE historique_personnel.id LIKE vente.id_historique_coach AND historique_personnel.personnel LIKE ? AND vente.date LIKE ? AND vente.idVP LIKE ? AND historique_personnel.activite LIKE ?";
                                $detail_accomp = $main->queryAll($sql,array($coach,$date->format('Y-m-d'),$com1,$activite));
                          ?>
                          
                           <div class="col-md-12" id="tabcontent1" style="padding-left:0px!important;background:#none">
                               <table class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th style="font-size:11px;">Produit</th>
                                    <th style="font-size:11px;">Qtt</th>
                                    <th style="font-size:11px;">Prix (Ar)</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                            $totalqtt=0;
                                            $totalprix=0;
                                        if($detail_accomp){
                                            $quantite_vp=array();
                                            
                                            foreach($detail_accomp as $detail_accomp){
                                                $cle=$detail_accomp['codeproduit']."_".$detail_accomp['lieu'];
                                                if(array_key_exists($cle,$quantite_vp)){
                                                    $quantite_vp[$cle]+=$detail_accomp['quantite'];
                                                }else{
                                                    $quantite_vp[$cle]=$detail_accomp['quantite'];
                                                }
                                            }
                                           
                                            foreach($quantite_vp as $key=>$quantite_vp): 
                                                $produit_lieu=explode("_", $key);
                                                $totalqtt+=$quantite_vp[$key];
                                                $totalprix+=$main->getPriceProduit($produit_lieu[0],$quantite_vp[$key],$produit_lieu[1]);
                                            ?>
                                                 <tr>
                                                    <td  class="text-center" style="font-size:10px;">
                                                        <?=$produit_lieu[0]?>
                                                    </td>
                                                    <td  class="text-center" style="font-size:10px;">
                                                        <?=$quantite_vp[$key]?> 
                                                    </td>
                                                    <td  class="text-center" style="font-size:10px;">
                                                        <?=number_format($main->getPriceProduit($produit_lieu[0],$quantite_vp[$key],$produit_lieu[1]),2,',',' '); ?>
                                                    </td>
                                                   
                                                  </tr>
                                        <?php endforeach; 
                                        }else{
                                        ?>
                                                    <tr>
                                                    <td  class="text-center" style="font-size:10px;">
                                                        -
                                                    </td>
                                                    <td  class="text-center" style="font-size:10px;">
                                                       -
                                                    </td>
                                                    <td  class="text-center" style="font-size:10px;">
                                                        -
                                                    </td>
                                                   
                                                  </tr>
                                        <?php } ?>
                                            
                                </tbody>
                                <tfoot style="background:#e9ecef">
                                    <td class="text-center" style="font-size:11px;font-weight:bold">Total:</td>
                                        <td class="text-center" style="font-size:11px;font-weight:bold"><?=$totalqtt?></td>
                                        <td class="text-center" style="font-size:11px;font-weight:bold"><?=number_format($totalprix,2,',',' ')?></td>
                              </table>
                           </div>
                           
                           <?php
                                
                                        
                                $sql="SELECT vente.idVP,vente.codeproduit,vente.quantite,vente.lieu FROM `vente`,historique_personnel WHERE historique_personnel.id LIKE vente.id_historique_coach AND historique_personnel.personnel LIKE ? AND vente.date LIKE ? AND vente.idVP LIKE ? AND historique_personnel.activite LIKE ?";
                                $detail_accomp = $main->queryAll($sql,array($coach,$date->format('Y-m-d'),$com2,$activite));
                          ?>
                           
                           <div class="col-md-12" id="tabcontent2" style='display:none;'>
                               <table class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th style="font-size:11px;">Produit</th>
                                    <th style="font-size:11px;">Quantité</th>
                                    <th style="font-size:11px;">Prix (Ar)</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $totalqtt=0;
                                        $totalprix=0;
                                        if($detail_accomp){
                                            $quantite_vp=array();
                                            foreach($detail_accomp as $detail_accomp){
                                                $cle=$detail_accomp['codeproduit']."_".$detail_accomp['lieu'];
                                                if(array_key_exists($cle,$quantite_vp)){
                                                    $quantite_vp[$cle]+=$detail_accomp['quantite'];
                                                }else{
                                                    $quantite_vp[$cle]=$detail_accomp['quantite'];
                                                }
                                                
                                            }
                                           
                                            foreach($quantite_vp as $key=>$quantite_vp): 
                                                $produit_lieu=explode("_", $key);
                                                $totalqtt+=$quantite_vp[$key];
                                                $totalprix+=$main->getPriceProduit($produit_lieu[0],$quantite_vp[$key],$produit_lieu[1]);
                                            ?>
                                                 <tr>
                                                    <td  class="text-center" style="font-size:10px;">
                                                        <?=$produit_lieu[0]?>
                                                    </td>
                                                    <td  class="text-center" style="font-size:10px;">
                                                        <?=$quantite_vp[$key]?> 
                                                    </td>
                                                    <td  class="text-center" style="font-size:10px;">
                                                       
                                                        <?=number_format($main->getPriceProduit($produit_lieu[0],$quantite_vp[$key],$produit_lieu[1]),2,',',' '); ?>
                                                    </td>
                                                   
                                                  </tr>
                                    <?php endforeach; }else{ ?>
                                                    <tr>
                                                    <td  class="text-center" style="font-size:10px;">
                                                        -
                                                    </td>
                                                    <td  class="text-center" style="font-size:10px;">
                                                       -
                                                    </td>
                                                    <td  class="text-center" style="font-size:10px;">
                                                        -
                                                    </td>
                                                   
                                                  </tr>
                                    <?php } ?>
                                            
                                </tbody>
                                <tfoot style="background:#e9ecef">
                                    <tr>
                                        <td class="text-center" style="font-size:11px;font-weight:bold">Total:</td>
                                        <td class="text-center" style="font-size:11px;font-weight:bold"><?=$totalqtt?></td>
                                        <td class="text-center" style="font-size:11px;font-weight:bold"><?=number_format($totalprix,2,',',' ')?></td>
                                    </tr>
                                </tfoot>
                                
                              </table>
                           </div>
                              
                       </div>  
            
           
      </div>
    </div>
</div>

<?php include "footer.php";?>