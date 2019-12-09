
<?php 
include_once("../include/include.php");
include ("header.php");
$sql="SELECT `idProduit`,`designation`,`quantite`,`idCategorie` FROM `produit` WHERE 1 ";
$produit=$main->queryAll($sql);
$contentProduit=scandir("../image/produit");
?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
         <div class="row" style="padding-left:7px;padding-right:7px">
            <div class="col-md-12 mb-2" style="background:black;opacity:0.9;margin-top:-20px;padding-top:13px">
                <h4 style="opacity:1;color:white;font-size:14px"> Mes paniers journalière du  <?php

echo date('d-m-Y');
$sql1="SELECT * FROM `planing` WHERE `date` LIKE ?";
$panier = $main->queryAll($sql1,array(date("Y-m-d")));
 //tableau de couleur
 $couleur=['ff4444','ffbb33','00C851','33b5e5','CC0000','FF8800','007E33','0099CC'];
?> </h4>
            </div>
        </div>
         
        <div class="row mb-2">
            <div class="col-md-12">
                 <img src="images/pannier.jpg" style="height:400px!important" class="bann_accueil">
            </div>
        </div>
        
        <div class="row block_menu" style="margin-top:-150px!important">
            <?php
                $i=0;
                foreach($panier as $panier){ 
            ?>
             <div class="col-md-2 col-sm-3 col-3  block2">
                  <a href="info-pannier.php?designation=<?= $panier['Panier']; ?>&couleur=<?= $couleur[$i] ?>">
                     <div class="produit couleurPanier1" style="background:#<?= $couleur[$i] ?>">
                       <div class="text"><i class="fa fa-shopping-cart"></i> <?= $panier['Panier']; ?>
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
         
         <!-- <div class="col-md-2 col-sm-3 col-3  block2">

              <a href="info-pannier.php">
             <div class="produit"  style="background:#ffbb33">
               <div class="text"><i class="fa fa-shopping-cart"></i> P 3</div>
             

             </div>
            </a>
          </div>
          <div class="col-md-2 col-sm-3 col-3  block2">
                 <a href="info-pannier.php">
            
               <div class="Planning" style="min-height:0px!important;background:#00C851">
                 <div class="text"><i class="fa fa-shopping-cart"></i> P 5</div>
              
               </div>
               </a>
            
          </div>
          <div class="col-md-2 col-sm-3 col-3  block4">
             <a href="info-pannier.php">
             <div class="penalites" style="min-height:0px!important;background:#33b5e5">
               <div class="text"><i class="fa fa-shopping-cart"></i>  P 6</div>
            
             </div>
             </a>
           
          </div>
          
          
          <div class="col-md-2 col-sm-3 col-3  block2">

              <a href="info-pannier.php">
             <div class="produit" style="background:#CC0000">
               <div class="text"><i class="fa fa-shopping-cart"></i> P 9 
                </div>
             </div>
            </a>
          </div>
         
          <div class="col-md-2 col-sm-3 col-3  block2">

              <a href="info-pannier.php">
             <div class="produit" style="background:#FF8800">
               <div class="text"><i class="fa fa-shopping-cart"></i> P 11</div>
             

             </div>
            </a>
          </div>
          <div class="col-md-2 col-sm-3 col-3  block2">
                 <a href="info-pannier.php">
            
               <div class="Planning" style="min-height:0px!important;background:#007E33">
                 <div class="text"><i class="fa fa-shopping-cart"></i> P 15</div>
              
               </div>
               </a>
            
          </div>
          <div class="col-md-2 col-sm-3 col-3  block4">
             <a href="info-pannier.php">
             <div class="penalites" style="min-height:0px!important;background:#0099CC">
               <div class="text"><i class="fa fa-shopping-cart"></i>  P 16</div>
            
             </div>
             </a>
           
          </div>-->
          
           
        </div> 
      </div><!-- /.container-fluid -->
    </div>
  </div>
  
 
<?php include "footer.php";?>
   
 