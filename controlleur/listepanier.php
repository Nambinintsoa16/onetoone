<?php 
include_once("../include/include.php");
include ("header.php");
$sql="SELECT `idProduit`,`designation`,`quantite`,`idCategorie` FROM `produit` WHERE 1 ";
$produit=$main->queryAll($sql);
$contentProduit=scandir("../image/produit");

$sql1="SELECT DISTINCT `desigbation` FROM `panier` WHERE 1";
$panier=$main->queryAll($sql1);
 $couleur=['ff4444','ffbb33','00C851','33b5e5','CC0000','FF8800','007E33','0099CC'];
?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
         <div class="row" style="padding-left:7px;padding-right:7px">
            <div class="col-md-12 mb-2" style="background:black;opacity:0.9;margin-top:-20px;padding-top:13px">
                <h4 style="opacity:1;color:white;font-size:14px"> <?php
$date = new DateTime();
echo $date->format('d-m-Y ');
?>Listes Panier</h4>
            </div>
        </div>
         
        <div class="row mb-2">
            <div class="col-md-12">
                 <img src="images/pannier.jpg" style="height:400px!important" class="bann_accueil">
            </div>
        </div>
      
        <div class="row block_menu" style="margin-top:-180px!important">
            
           
             <?php  $nbr=0; $tab_panier=array(); foreach ($panier as $panier){
                        $tab=explode('P',$panier['desigbation']); //prend le 10 du panier P10
                        $tab_panier[$nbr]=$tab[1];
                        $nbr++;
                    }
                    
                    $i=0;
                    sort($tab_panier);
                    for($p=0;$p<$nbr;$p++){
            ?>
                
                
                <div class="col-md-2 col-sm-3 col-3  block2">
                    
                 <a href="info-pannier.php?designation=<?="P".$tab_panier[$p]; ?>&couleur=<?= $couleur[$i] ?>">
                     <div class="produit " id="produitcliquer"  style="background:#<?= $couleur[$i] ?>">
                       <div class="text textrot"><i class="fa fa-shopping-cart"></i>
                             <?= "P".$tab_panier[$p];?>
                        </div>
                     </div>
                </a>
               </div>
               
          <?php
                    if($i<count($couleur)-1 AND $i>-1){
                        $i++;   
                    }else{
                        $i=0;
                    }
                }
            ?>
            
                 <!-- <div class="row block_menu" style="margin-top:-180px!important">
        
             <div class="col-md-2 col-sm-3 col-3  block2">

                  <a href="info-pannier.php">
                     <div class="produit" style="background:#ff4444">
                       <div class="text"><i class="fa fa-shopping-cart"></i> P 1 
                        </div>
                     </div>
                </a>
             </div>
         
          <div class="col-md-2 col-sm-3 col-3  block2">

              <a href="info-pannier.php">
             <div class="produit"  style="background:#ffbb33">
               <div class="text"><i class="fa fa-shopping-cart"></i> P 2</div>
             

             </div>
            </a>
          </div>
          <div class="col-md-2 col-sm-3 col-3  block2">
                 <a href="info-pannier.php">
            
               <div class="Planning" style="min-height:0px!important;background:#00C851">
                 <div class="text"><i class="fa fa-shopping-cart"></i> P 3</div>
              
               </div>
               </a>
            
          </div>
          <div class="col-md-2 col-sm-3 col-3  block4">
             <a href="info-pannier.php">
             <div class="penalites" style="min-height:0px!important;background:#33b5e5">
               <div class="text"><i class="fa fa-shopping-cart"></i>  P 4</div>
            
             </div>
             </a>
           
          </div>
          
           <div class="col-md-2 col-sm-3 col-3  block4">
             <a href="info-pannier.php">
             <div class="penalites" style="min-height:0px!important;background:#CC0000">
               <div class="text"><i class="fa fa-shopping-cart"></i>  P 5</div>
            
             </div>
             </a>
           
          </div>
         
          <div class="col-md-2 col-sm-3 col-3  block2">

              <a href="info-pannier.php">
             <div class="produit" style="background:#FF8800">
               <div class="text"><i class="fa fa-shopping-cart"></i> P 6</div>
             

             </div>
            </a>
          </div>
          <div class="col-md-2 col-sm-3 col-3  block2">
                 <a href="info-pannier.php">
            
               <div class="Planning" style="min-height:0px!important;background:#007E33">
                 <div class="text"><i class="fa fa-shopping-cart"></i> P 7</div>
              
               </div>
               </a>
            
          </div>
          <div class="col-md-2 col-sm-3 col-3  block4">
             <a href="info-pannier.php">
             <div class="penalites" style="min-height:0px!important;background:#0099CC">
               <div class="text"><i class="fa fa-shopping-cart"></i>  P 8</div>
            
             </div>
             </a>
           
          </div>
          <div class="col-md-2 col-sm-3 col-3  block3">

             <a href="info-pannier.php">
               <div class="Planning" style="min-height:0px!important;background:#2BBBAD">
                 <div class="text"><i class="fa fa-shopping-cart"></i> P 9</div>
                
               </div>
            </a>
            
          </div>
           <div class="col-md-2 col-sm-3 col-3  block2">

              <a href="info-pannier.php">
             <div class="produit" style="background:#4285F4;min-height:0px!important;">
               <div class="text"><i class="fa fa-shopping-cart"></i>

                 P 10</div>
               

             </div>
            </a>
          </div>
          <div class="col-md-2 col-sm-3 col-3  block3">
                 <a href="info-pannier.php">
            
               <div class="Planning" style="background:#0069##5c;min-height:0px!important">
                 <div class="text"><i class="fa fa-shopping-cart"></i> P 11</div>
                
               </div>
            </a>
          </div>
          <div class="col-md-2 col-sm-3 col-3  block4" >
            <a href="info-pannier.php">
             <div class="penalites" style="background:#9933CC!important;min-height:0px!important">
               <div class="text"><i class="fa fa-shopping-cart"></i> P 12</div>
              
             </div>
           </a>
          </div>
          
          <!-- ligne 3 -->
          <!--
         
          <div class="col-md-2 col-sm-3 col-3  block2">

             <a href="info-pannier.php">
             <div class="produit" style="min-height:0px!important;background:#00695c">
               <div class="text"><i class="fa fa-shopping-cart"></i>
                 P 13</div>
             </div>
            </a>
          </div>
          <div class="col-md-2 col-sm-3 col-3  block3">
             <a href="info-pannier.php">
               <div class="Planning" style="min-height:0px!important;background:#0d47a1">
                 <div class="text"><i class="fa fa-shopping-cart"></i> P 14</div>
                 
               </div>
            </a>
          </div>
           <div class="col-md-2 col-sm-3 col-3  block2">
              <a href="info-pannier.php">
             <div class="produit" style="background:blue;min-height:0px!important;background:#311b92">
               <div class="text"><i class="fa fa-shopping-cart"></i>
                 P 15</div>
             </div>
            </a>
          </div>
          <div class="col-md-2 col-sm-3 col-3  block4">
            <a href="info-pannier.php">
             <div class="penalites" style="min-height:0px!important;background:#880e4f">
               <div class="text"><i class="fa fa-shopping-cart"></i> P 16</div>
             </div>
           </a>
          </div>
        </div> 
               
        </div> 
        -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
  
 
<?php include "footer.php";?>