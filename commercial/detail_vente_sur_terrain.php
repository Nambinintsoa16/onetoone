<?php
include_once('../include/include.php');
$sql="SELECT DISTINCT `date` FROM `vente` WHERE `idVP` LIKE ? AND `date`  LIKE  '".date("Y-m")."-%'";
$date=$main->queryAll($sql,array($_SESSION['matricule']));


$montant=0;
$qunatite=0;
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" style="font-size:10px"><a href="?page">Accueil</a></li>
    <li class="breadcrumb-item" style="font-size:10px"><a href="?page=moncompte">Mon compte</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="font-size:10px">Detail vente sur terrain</li>
  </ol>
</nav>   


<div class="form-group text-center">
<button class="btn btn-outline-primary nbProduit" type="button" style="font-size:11px;" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Loading...
</button>
<button class="btn btn-outline-primary nbPrix" type="button" style="font-size:11px;" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Loading...
</button>
<select class="browser-default custom-select Pro" style="font-size:11px; width:100px; height:31.2px;" >
  <option value="5">Produits</option>
  <option value="2">Prix appliqués</option>
  <option value="3">Quantite</option>
  <option value="4">Montant</option>
</select>
</div>

         
            <div class="form-group">  
                 
               <input class = "form-control inputiltre"  type = "text" placeholder = "Rechercher..." style="font-size:9px;"> 
                    
            </div>    

         
          <div class="table-responsive">
                <table class="table table-hover table-bordered" style="font-size:10px;margin-top:20px;" id="tableTrier">
                   <thead>
                      
                       <tr>
    
                            <td class="text-center">Produits </td>
                            <td class="text-center">Prix appliqués</td>
                            <td class="text-center" style="width:10px">Quantite</td>
                            <td class="text-center">Montant</td>
                            
                        </tr>
                       
                      
                   </thead>
                   <tbody class="tbody">
                      <?php  $monca=0;
                            $total=0;
                            $quantite=0;
                            $array=array();//quantite $array['FUM008_5']=2
                            $prix=array(); //prix $prix['FUM008_5']=1000
                            if($date){ foreach($date as $date){
                                 // $sql="SELECT `lieu`,`codeproduit`,`quantite` FROM `vente` WHERE `idVP` LIKE ? AND  `date`  LIKE ?";
                                 $activite="vente d'accompagnement"; // select tous les ventes du mois à part les vente d'accompagnement
                                 $sql="SELECT historique_personnel.activite,vente.idPrix,vente.quantite,vente.lieu,vente.idVP,vente.codeproduit FROM `historique_personnel`,vente WHERE vente.idVP LIKE ? AND vente.date LIKE ? AND historique_personnel.activite != ? AND historique_personnel.id LIKE vente.id_historique_coach ";
                                 
                                 
                                  $resultat=$main->queryAll($sql,array($_SESSION['matricule'],$date['date'],$activite));
                        
                                  foreach($resultat as $resultat){
                                      $cle=$resultat['codeproduit']."_".$resultat['lieu']."_".$resultat['idPrix'];
                                      if(!array_key_exists ($cle,$array)){
                                         $array[$cle]=(int)$resultat['quantite']; 
                                      }else{
                                          $array[$cle]=$array[$cle]+$resultat['quantite']; 
                                      }
                                      
                                      //initialisation prix par produit
                                      if(!array_key_exists ($cle,$prix)){
                                         $prix[$cle]=0; 
                                      }
                                  }
                                  //calcul prix par produit

                                  foreach($array as $key => $value){
                                      $tab=explode("_", $key);
                                      $sql_prix="SELECT `prixdetail` FROM `prix` WHERE `idMission` LIKE ? AND `idProduit` LIKE ? AND `idPrix` LIKE ?";
                                      $prix_detail=$main->query($sql_prix,array($tab[1],$tab[0],$tab[2]));
                                      $prix[$key]=$prix_detail['prixdetail']; // $prix[FUM008_5]=11300 par ex
                                  }
  
                            }
                           
                      
                       foreach($array as $key=>$value){
                               $tab=explode("_", $key);   
                               $total+=$value*$prix[$key];//total du prix avec quantite
                               $quantite+=$value;
                               $sql_mission="SELECT `lieu` FROM `mission` WHERE `idMission` LIKE ?";
                               $mission=$main->query($sql_mission,array($tab[1]));
                               $sql="SELECT `designation`,`quantite` FROM `produit` WHERE `idProduit` LIKE ?";
                               $designation=$main->query($sql,array($tab[0]));
                      ?>    
                     <tr>
                         <td style="font-size:10px;"><a class="profile" href="../image/produit/<?=$tab[0]?>.jpg" data-lightbox="roadtrip" title="<div class='text-center' style='font-size:10px;'><a style='text-align:center;' href='?page=information_sur_produit&codeProduit=<?=$tab[0]?>'><?=$designation['designation']?></a><br/></a>Quantite : <?=$designation['quantite']?><br/>Code produit : <?=$tab[0]?></a><br/>Prix :<?=number_format($prix[$key],2,',',' ');?> Ar</div>"><?=$tab[0]?></a></td>
                         <td style="font-size:10px;"><?= $mission['lieu'] ?></td>
                         <td class="nb" style="font-size:10px;"><?=number_format($value)?></td>
                         <td class="pu" style="font-size:10px;"><?=number_format($prix[$key]*$value,2,',',' ');?></td>

                     </tr>
                     
                     <?php }} ?>
           
                               
                      
                     
    
                    </tbody>
                    <tfoot>
                       
                    </tfoot>
                </table>
                
           <hr/>     
             <table class="table table-bordered">
                 <thead></thead>
                 <tbody>
                    <tr>
                         <td>Total : </td>
                         <td style="font-size:10px;" colspan="2" class="nbProduit text-center"></td>
                         <td style="font-size:10px;" class="nbPrix"></td>
                     </tr> 
                 </tbody>
                    
             </table>   
                
                
                     
          </div>
               

  </div>
</div>