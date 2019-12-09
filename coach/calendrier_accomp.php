<?php 
    $titre = "Calendrier de vente";
    include "header.php";
    $coach=$_SESSION['matricule'];
    $activite="vente d'accompagnement";
?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-corp">
      <div class="container-fluid">
            <ol class="breadcrumb" style="font-size:14px!important;padding-left:0px">
              <li style="padding:0px 5px"><a href="vente_accompagnement.php" title="Accueil">Vente d'accompagnement &nbsp;&nbsp; > </a></li>
              <li class="active" style="padding:0px 5px" >Calendrier de Vente</li>
            </ol>

            <div class="row" style="background:#fff;padding:0px 10px">
                           <div class="col-md-12" >
                                <h3 style="font-size:15px;">Calendrier  de vente d'accompagnement</h3>
                           </div>
                           <div class="col-md-12">
                               <table class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th style="font-size:11px;">Date</th>
                                    <th style="font-size:11px;">C.A (Ar)</th>
                                    <th style="font-size:11px;">Commercial</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $point_jour=array();
                                        $c_a=0;
                                        $tt=new dateTime();
                                        
                                        $dta=$tt->format("t");
                                        
                                        for($i=1;$i<=$dta;$i++):
                                            if($i<10){
                                                $testDim=$main_function->dimanche(date('Y-m')."-0".$i);
                                            }else{
                                                $testDim=$main_function->dimanche(date('Y-m')."-".$i);
                                            }
                                             
                                               if($i==date('d')){
                                                $couleurjour="bg-success";
                                                $acolor="white";
                                            }else{
                                                $couleurjour="";
                                                $acolor="";
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
                                                <td  class="text-center" style="font-size:10px;">
                                                    -
                                                </td>
                                               
                                              </tr>
                                            <?php    
                                            }else{
                                                
                                                $sql_ac="SELECT `com_1`,`com_2` FROM `mes-accompagnement` WHERE `date_accomp` LIKE ? AND `id_coach` LIKE ?";
                                                if($i<10){
                                                            $accp=$main->query($sql_ac,array(date('Y-m')."-0".$i,$coach));
                                                        }else{
                                                            $accp=$main->query($sql_ac,array(date('Y-m')."-".$i,$coach));
                                                        }
                                    ?>
                                            <tr class="<?=$couleurjour?>">
                                                <td style="font-size:10px;">
                                                    <?php
                                                        if($i<10 && $accp){
                                                           echo '<a href="detail_accomp.php?com1='.$accp['com_1'].'&com2='.$accp['com_2'].'&date='.'0'.$i.'-'.date('m-Y').'" style="color:'.$acolor.'">'.'0'.$i.'-'.date('m-Y').'</a>';;
                                                        }elseif($i>=10 && $accp){
                                                            echo '<a href="detail_accomp.php?com1='.$accp['com_1'].'&com2='.$accp['com_2'].'&date='.$i.'-'.date('m-Y').'" style="color:'.$acolor.'">'.$i.'-'.date('m-Y').'</a>';
                                                        }else{
                                                            echo ($i<10)?'<a href="#" style="color:'.$acolor.'">'.'0'.$i.'-'.date('m-Y').'</a>':'<a href="#" style="color:'.$acolor.'">'.$i.'-'.date('m-Y').'</a>';
                                                        }
                                                        
                                                    ?>
                                                </td>
                                                <td style="font-size:10px;">
                                                    <?php
                                                        $sql="SELECT vente.date,vente.codeproduit,vente.lieu,vente.quantite FROM `vente`,`historique_personnel` WHERE vente.id_historique_coach LIKE historique_personnel.id AND historique_personnel.personnel LIKE ? AND vente.date LIKE ? AND historique_personnel.activite LIKE ?";
                                                        
                                                        if($i<10){
                                                            $produit=$main->queryAll($sql,array($coach,date('Y-m')."-0".$i,$activite));
                                                        }else{
                                                            $produit=$main->queryAll($sql,array($coach,date('Y-m')."-".$i,$activite));
                                                        }
                                                        
                                                        
                                                        foreach($produit as $produit){
                                                            $c_a +=$main->getPriceProduit($produit['codeproduit'],$produit['quantite'],$produit['lieu']);
                                                        }
                                                       echo number_format($c_a,2,',',' ')."";
                                                    ?>
                                                </td>
                                                <td class="text-center" style="font-size:10px;"><?= ($accp)?$accp['com_1']." / ".$accp['com_2']:'-'?></td>

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
 </div>
 
 
 <?php include "footer.php";?>
 