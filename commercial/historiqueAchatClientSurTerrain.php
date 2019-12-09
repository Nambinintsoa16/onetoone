<?php
    include_once('../fonction/main.php');
    
    
    $vente="SELECT * FROM `vente` WHERE `codeClient` LIKE ?";
    $resultatVente=$main->queryAll($vente,array($_GET['codeClient']));
    

    
?>
<style>
    .couleur_table{
        color:black;
    }
</style>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" style="font-size:9px"><a href="?page=liste_des_clients_sur_terrain">MES CLIENTS SUR TERRAIN</a></li>
    <li class="breadcrumb-item" style="font-size:9px"><a href="?page=detailClientSurTerrain&codeClient=<?=$_GET['codeClient']?>">DETAIL CLIENT SUR TERRAIN</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="font-size:9px">Historique</li>
  </ol>
</nav>
 <hr/> 
 <div class="list-group">
 
    <div class="d-flex w-100 justify-content-between">
        <?php if(file_exists("../image/client/".$_GET['codeClient'].".jpg")){ ?>
       
       <img class="card-img-top"   style="height:100%;width:60px;" src="../image/client/<?=$_GET['codeClient'].".jpg"?>">
    <?php } else{?>
    
         <img src="http://magesty.in-expedition.com/img/photoclient/CLT-pardefaut.jpg" alt="Photo client sur terrain"  style="height:100%;width:60px;">
    <?php }?>
      <small class="text-center" style="padding-right:5px;font-size:10px;">
          <?php
          $sqlCl="SELECT `Nom`,`Prenom`,`ville`,`quartier` FROM `clientTr` WHERE `codeClient` LIKE ?";
          $tr=$main->query($sqlCl,array($_GET['codeClient']));
          echo $tr['Nom']." ".$tr['Prenom']."<br/>".$tr['Nom']."<br/>".$tr['contact']."<br/>".$tr['ville']."<br/>".$tr['quartier'];
          ?>
          
        </small>
    </div>
  

 </div>
 <hr/> 
            <table class="table table-hover text-center  table-bordered" align="center" style="font-size:10px">
                    <thead>
                        
                        <tr>
                          <th scope="col">Date </th>
                          <th scope="col">Produit</th>
                          <th scope="col" style="width:20px;">Nombre(s)</th>
                          <th scope="col">Montant</th>
                          
                        </tr>
                        
                     </thead>
                   <tbody>
                        <?php
                            foreach($resultatVente as $resultatVente){
                                    $prix="SELECT `prixdetail` FROM `prix` WHERE `idMission` LIKE ? AND `idProduit` LIKE ? ";
                                    $rsPrix=$main->query($prix,array($resultatVente['lieu'],$resultatVente['codeproduit']));
                                    $prixTotal+=$resultatVente['quantite']*$rsPrix['prixdetail'];
                                    $total_quantite+=$resultatVente['quantite'];
                                    //choix du produit
                                        $produit="SELECT `designation`, `quantite` FROM `produit` WHERE `idProduit` LIKE ? ";
                                        $rsProduit=$main->query($produit,array($resultatVente['codeproduit']));
                        ?>
                        <tr>
                           
                          <td class="couleur_table" scope="col"><?php $date_facture = new DateTime($resultatVente['date']);echo $date_facture->format('d-m-Y'); ?></td>
                          <td class="couleur_table" scope="col">
                              <?php if(file_exists("../image/produit/".$resultatVente['codeproduit'].".jpg")){ ?>
                              <a href="../image/produit/<?=$resultatVente['codeproduit'].".jpg"?>" data-lightbox="roadtrip"  title="
                                <div class='text-center '>
                                    <h4 class='text-center'><?=$resultatVente['codeproduit']?>
                                    <a href='?page=information_sur_produit&codeProduit=<?=$resultatVente['codeproduit']?>' style='color:white;'><i class='fa fa-info-circle'></i></a> </h4>
                                    <h3 class='text-center' style='font-size:12px;'>
                                        Prix: <?= " ".number_format($rsPrix['prixdetail'],2,',',' ')." Ar"?> </br>
                                        Quantité: <?= $rsProduit['quantite']?></br>
                                        Désignation: </br><?= $rsProduit['designation']?></br>
                                        
                                    </h3>
                                </div>
                              ">
                                 
                                  <?=$resultatVente['codeproduit']?>
                                  <!--<img style="width:60%;" class="col-lg-2 image img-thumbnail" src="http://gestion-commerciale.in-expedition.com/image/produit/<?=$resultatVente['codeproduit'].".jpg"?>" >-->
                              </a>
                              <?php }else{?>
                                <a href="../image/produit/image.jpg" data-lightbox="roadtrip"  title="
                                    <div class='text-center '>
                                        <h4 class='text-center'>
                                        <?= $rsProduit['designation']?>
                                        </h4>
                                        <h3 class='text-center' style='font-size:12px;'>
                                        <?=$resultatVente['codeproduit']?>
                                        <a href='?page=information_sur_produit&codeProduit=<?=$resultatVente['codeproduit']?>' style='color:white;'><i class='fa fa-info-circle'></i></a> 
                                           </br>
                                            Prix: <?= " ".number_format($rsPrix['prixdetail'],2,',',' ')." Ar"?> </br>
                                            Quantité: <?= $rsProduit['quantite']?></br>
                                           
                                     
                                        </h3>
                                    </div>
                                   ">
                                 
                                  <?=$resultatVente['codeproduit']?>
                                  <!--<img style="width:60%;" class="col-lg-2 image img-thumbnail" src="http://gestion-commerciale.in-expedition.com/image/produit/<?=$resultatVente['codeproduit'].".jpg"?>" >-->
                              </a>    
                              <?php }?>
                          </td>
                          <td class="couleur_table" scope="col"><?=$resultatVente['quantite']?></td>
                          <td class="couleur_table" scope="col"><?=number_format($rsPrix['prixdetail']*$resultatVente['quantite'],2,',',' ')." Ar"?></td>

                        </tr>
                       <?php } ?>
                        <tr>
                          <td class="couleur_table" scope="col" style="background:#dee2e6"><b>Total :</b></td>
                          <td class="couleur_table" scope="col" style="background:#dee2e6"></td>
                          <td class="couleur_table" scope="col" style="background:#dee2e6"><?=$total_quantite?></td>
                          <td class="couleur_table" scope="col" style="background:#dee2e6"><?=number_format( $prixTotal,2,',',' ')." Ar"?></td>
                        </tr>
                    </tbody>
                </table>
<hr/>
        