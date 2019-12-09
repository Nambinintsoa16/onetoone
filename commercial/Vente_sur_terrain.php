<?php
if (isset($_GET['date'])) {
  $dateDB=$_GET['date'];
  $date=new dateTime($dateDB);
  $date_du_jour=$date->format('d-m-Y');
}
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" style="font-size:9px"><a href="?page">Accueil</a></li>
    <li class="breadcrumb-item" style="font-size:9px"><a href="?page=suivi_des_ventes">Calendrier de vente</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="font-size:9px">Détail vente sur terrain</li>
  </ol>
</nav>
<div class="container">
        <div class="row">
        <div class="col-md-12 img-container">

   <div class="col-md-8 col-sm-8 col-xs-8 col-xs-offset-2 col-md-offset-2  col-sm-offset-2" style="margin:auto auto; ">
      <h2  style="text-align:center;width=100%;margin-top:15px;font-size:15px;">
          <b>Mes ventes sur Terrain au <?=$date_du_jour?> </b>
     </h2>

   </div>

</div>



 <table class="table table-bordered table-striped table-responsive" style="font-size:10px; margin-top: 10px;">
    <thead>
      <tr>

        <th class="text-center">Produit</th>
        <th class="text-center">Quantité</th>
        <th class="text-center">Montant </th>
        <th class="text-center">Client </th>
      </tr>
    </thead>
    <tbody>
      <?php
      $quantite=0;
      $prixtotal=0;
       $affiche= "SELECT * FROM `vente` WHERE `idVP` LIKE '".$_SESSION['matricule']."'  AND  `date` LIKE '".$dateDB."'";
        $resultat=$main->queryAll($affiche);
    if($resultat):        
      foreach ($resultat as $resultat):
     $quantite+=$resultat['quantite'];

        ?>

                               <tr>
                                   <td class="text-center">
                                   
      
                                    <a  href="#"data-toggle="modal" data-target="#<?=$resultat['codeproduit']?> "><?=$resultat['codeproduit']?> </a>

<!-- Modal -->
<div class="modal fade" id="<?=$resultat['codeproduit']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title" id="exampleModalLongTitle" style="font-size:13px;">
            <?php
            $sql="SELECT  `designation`, `quantite`,  `idCategorie` FROM `produit` WHERE `idProduit` LIKE ?";
            $infoProduit=$main->query($sql,array($resultat['codeproduit']));
            if($infoProduit){
                echo $infoProduit['designation'];
            }
            ?>
            
           </p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <a href="?page=information_sur_produit&codeProduit=<?=$resultat['codeproduit']?>"><img style="height:160px;" src="../image/produit/<?=$resultat['codeproduit']?>.jpg"></a>
      </div>
      <div class="modal-footer">
        <div class="col-lg-12">
          <h3><strong style="font-size:17px;">
          <?php 
           $sql="SELECT `prixdetail`,`prixgros` FROM `prix` WHERE `idMission` LIKE ? AND `idProduit` LIKE ?"; 
          $prix=$main->query($sql,array($_SESSION['idMission'],$resultat['codeproduit']));
          echo number_format($prix['prixdetail'],'2',',',' ');
          ?> Ariary</strong></h3>
        </div>  
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        
      </div>
    </div>
  </div>
</div>
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   </td>
                                   <td class="text-center" ><?=$resultat['quantite']?></td>
                                  
                                   <td class="text-center"><?php
                      $sql='SELECT * FROM `prix` WHERE `idProduit` LIKE "'.$resultat['codeproduit'].'" AND `idMission`='.$resultat['lieu'];
                      $prix = $main->query($sql);
                      if ($prix) {
                       echo number_format($prix['prixdetail']*$resultat['quantite'],2,","," ")." ";
                       $prixtotal+=($prix['prixdetail']*$resultat['quantite']);
                      }else{
                        echo 0;
                      }
                    $sql_client="SELECT `codeClient` FROM `vente` WHERE `codeproduit` LIKE ? and `idVP` LIKE ? and `date` LIKE ?";
                               $client=$main->query($sql_client,array($resultat['codeproduit'],$_SESSION['matricule'],$dateDB));
                                   ;?>Ar</td>
                                   
                      <td class="text-center">
                               <?php 
                               if(!is_null($client['codeClient'])){ ?>
                                    <a  href="?page=detailClientSurTerrain&codeClient=<?=$client['codeClient']?>">
                                   <?=$client['codeClient'];?>
                                   </a>
                               <?php }else{
                                   echo "client inconnu";
                               }
                               ?>
                       </td>
                        
                                </tr>



                <?php  endforeach; endif;?>
    </tbody>

 </table>




 <table class="table table-bordered table-striped" style="font-size:10px; margin-top: 10px;">
    <thead >

    </thead>
    <tbody>
      <tr>

        <th class="text-center" >Total </th>
        <th class="text-center" ><?=$quantite?> Produits</th>
        <th class="text-center" ><?php echo number_format($prixtotal,2,","," ")." ";?>Ar</th>
      </tr>
    </tbody>

      <tfoot>
        
      </tfoot>
 </table>



        <hr>

      </div>


        </div>

        <hr>

      </div>


