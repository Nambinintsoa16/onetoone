<?php
include_once('../fonction/main.php');
if(isset($_GET['client'])AND !empty($_GET['client'])):
 $sql="SELECT `Nom`,`Prenom`,`sexe`,`ville`,`contact` FROM `clientTr` WHERE  `codeClient` LIKE ?";
 $client=$main->query($sql,array($_GET['client']));
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" style="font-size:9px"><a href="?page">Accueil</a></li>
    <li class="breadcrumb-item" style="font-size:9px"><a href="?page=moncompte">Mon compte</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="font-size:9px">Detail des point</li>
  </ol>
</nav>
 <hr/> 
<div class="container-fluid" >
    <!--<h4 class="text-center">Mon compte</h4>-->
    <h5 class="text-center" style="padding-top:10px;padding-bottom:20px;">DETAIL CLIENT</h5>
<div class="col-md-12"  >
                 
</div>
 </div>
         <div class="container" style="margin-top:50px;">

         <section class="section--blue">
        
         <a href="../image/client/<?=$_GET['client']?>.jpg" data-lightbox="roadtrip" >
                 <img src="../image/client/<?=$_GET['client']?>.jpg" class="img-thumbnail" style="width:95px;position:absolut;margin-top:-50px;"> <br>
         </a>
         <div class="cont-info float-right col-md-3" style="position:absolut;margin-top:-85px;margin-letf:70px;width:160px;">          
               <p>  <h3 style="text-align:center;width=100%;margin-top:15px;font-size:11px;"><?=$client['Nom']." ".$client['Prenom']."<br/> ( ".$client['ville']." ) ";?></h3>
                 <h4 style="text-align:center; width=100%;font-size:11px;"><?=$client['sexe']?></h4>
                 <h4 style="text-align:center; width=100%;font-size:11px;"></h4>
                 <h4 style="text-align:center; width=100%;font-size:11px;"><?=$client['contact']?></h4>
                 </h3>
                </p> 
        </div>  
       </section>
       </div>

          
               
               
               
               
            <table class="table table-hover   table-bordered table-responsive " style="font-size:13px;margin-top:20px; ">
               <thead>
                   <tr>

                     <td style="width:150px;">Date</td>
                     <td>Ville</td>
                     <td>Produit</td>
                     <td>Quantite</td>
                     <td>Total</td>

                 </tr>
               </thead>
            
            
            
            
               <tbody>
                  <?php 
                  $sql="SELECT * FROM `vente` WHERE `codeClient` LIKE '".$_GET['client']."'";
                  $dataClient=$main->queryAll($sql,array($_GET['client']));
                  if($dataClient):foreach($dataClient as $dataClient):
                  ?>
                     <tr>
                   
                    
                     <td><?=$dataClient['date']?></td>
                     <td><?=$dataClient['ville']?></td>
                     <td><?=$dataClient['codeproduit']?></td>
                     <td ><?=$dataClient['quantite']?></td>
                     <td><?php 
                       $sql="SELECT `prixdetail`,`prixgros` FROM `prix` WHERE `idMission` LIKE ?  AND `idProduit` LIKE ? AND `idPrix` = ?";
                       $prix=$main->query($sql,array($dataClient['lieu'],$dataClient['codeproduit'],$prix['idPrix']));
                       echo $prix['prixdetail']*$dataClient['quantite'];
                       ?></td>
                     
                     </tr>
                 <?php endforeach;endif;?>
                </tbody>
            </table>

            
           

<?php else:;?>


<?php endif;?>




