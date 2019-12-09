<?php 
include_once("../include/include.php");
include ("header.php");
$sql="SELECT `idProduit`,`designation`,`quantite`,`idCategorie` FROM `produit` WHERE 1 ";
$produit=$main->queryAll($sql);
$contentProduit=scandir("../image/produit");
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
</style>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
         <div class="row" style="padding-left:7px;padding-right:7px">
            <div class="col-md-12 mb-2" style="background:black;opacity:0.9;margin-top:-20px;padding-top:13px">
                <h4 style="opacity:1;color:white;font-size:14px">Listes Produits Enregistrés <?php
$date = new DateTime();
echo $date->format('d-m-Y ');
?></h4>
            </div>
        </div>
         
        <div class="row mb-2">
            <div class="col-md-12">
                 <img src="images/produit-save.jpg" style="height:300px!important" class="bann_accueil">
            </div>
        </div>
        <div class="row block_menu">
          <div class="col-md-3 col-sm-6 col-6 block1">
           
             <div class="row contener_entite">
                <div class="Commerciaux">
                  <i class="fa fa-cubes"></i> <span style="font-size:26px;padding-left:10px"> 60</span><br> Enregistrés </div>
                <div class="badge_accueil">
                 
                </div>
             </div>
            
          </div>
          <div class="col-md-3 col-sm-6 col-6  block2">

            
             <div class="produit">
               <div class="text"><i class="fa fa-cubes"></i><span style="font-size:26px;padding-left:10px">40  </span><br>

                 En vente</div>
               <div  class="badge_accueil">
                 
                </div>


             </div>
            
          </div>
          <div class="col-md-3 col-sm-6 col-6  block3">

            
               <div class="Planning">
                 <div class="text"><i class="fa fa-cubes"></i><span style="font-size:26px;padding-left:10px">5 </span><br>En rupture</div>
                 <div class="badge_accueil">
                   
                  </div>
               </div>
            
          </div>
          <div class="col-md-3 col-sm-6 col-6  block4">
           
             <div class="penalites">
               <div class="text"><i class="fa fa-cubes"></i><span style="font-size:26px;padding-left:10px">20 </span><br> Expirés</div>
               <div class="badge_accueil">
                 
                </div>
             </div>
           
          </div>
        </div> 
    
        

        <div class="row mb-2">
          <div class="col-md-12">
            <div class="table-responsive" style="background:#fff">
            
            <table class="table" style="padding-top:20px">
             
              <input class = "form-control inputiltre"  type = "text" placeholder = "Rechercher"><br>
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Code</th>
                  <th scope="col" style="width:250px">Nom</th>
                  <th scope="col" style="width:120px">Quantite</th>
                  <th scope="col"style="width:120px">Prix</th>
                  <th scope="col">Famille</th>
                  <th scope="col">Groupe</th>
                  <th scope="col">Images</th>
                  <th scope="col">Info</th>
                </tr>
              </thead>
              <tbody class="tbode">
                <?php if($produit):
                    $i=1;
                    foreach($produit as $produit):
                        $image="";
                        $imagetemp="";
                        $imagetemp=$produit['idProduit'].".jpg";
                        if(in_array($imagetemp,$contentProduit)){
                             $image="../image/produit/".$imagetemp;
                        }else{
                             $image="../images/point_interro.jpg";
                        }
                        $sql="SELECT `famille`,`type` FROM `categorie` WHERE `idCategorie`=?";
                        $category=$main->query($sql,array($produit['idCategorie']));
                 ?> 
                <tr>
                  <th scope="row"><?=$i?></th>
                  <td><?=$produit['idProduit']?></td>
                  <td ><?=$produit['designation']?></td>
                  <td><?=$produit['quantite']?></td>
                  <td>4200 Ar <i class="fa fa-plus-circle" data-toggle="modal" data-target="#myModal" style="color: blue;margin-top: 8px;margin-left:10px;cursor:pointer"></i></td>
                  <td><?=$category['famille']?></td>
                  <td><?=$category['type']?></td>
                  <td><img src="<?=$image?>" width="80px"></td>
                  <td><a href="info-produit.php"> 
                    <i class="fa fa-info-circle" style="font-size: 24px;margin-top: 5px"></i>
                  </a></td>
                </tr>
                <?php $i++; endforeach; endif;?>
               
              </tbody>
            </table>

            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
  </div>
  <!-- Content Wrapper. Contains page content -->
   <!-- /.content-wrapper -->
<!-- Central Modal Small -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">



    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel" style="color: red">Birdy café Robusta Information Prix</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-5 col-sm-5 col-12">
             <img src="images/BEV004.png" width="300px" class="img-thumbnail">
          </div>

           <div class="col-md-7 col-sm-7 col-12">
            <span style="text-align: center">Tableau de Variation de Prix du BEV005</span>
            <div class="table-responsive">
        
            <table class="table">
              <thead>
                <tr>
                  
                  <th>Apliqué le</th>
                  <th>Expiré le</th>
                  <th>Prix</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  
                  <td>01-10-2019</td>
                  <td>Actif</td>
                  <td>24,000 Ar</td>
                 
                </tr>
                 <tr>
                  
                  <td>01-09-2019</td>
                  <td>30-09-2019</td>
                  <td>22,000 Ar</td>
                 
                </tr>
                 <tr>
                  
                  <td>01-07-2019</td>
                  <td>30-08-2019</td>
                  <td>20,000 Ar</td>
                 
                </tr>

                 <tr>
                 
                  <td>01-05-2019</td>
                  <td>30-06-2019</td>
                  <td>18,000 Ar</td>
               
                </tr>




              </tbody>
            </table>

            </div>
          </div>
        </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fermer</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->





   <?php include "footer.php";?>
   
 