<?php
    include_once('../fonction/main.php');
    $main_gest=new main('localhost','inexped1_gestiondevente','inexped1_admin','crea.dev.121*');
    $sql_comande="SELECT `idcomand`,`quantite`,`codeproduit`,`datedecomand` FROM `comande` WHERE `idclient` LIKE ?";
    if(isset($_GET['codeClient']) AND !empty($_GET['codeClient'])){
        $comande=$main_gest->queryAll($sql_comande,array($_GET['codeClient']));
        
    }
    $total_quantite=0;
    $total_prix=0;
    foreach($comande as $comande){
        $sql_produit="SELECT `prix` FROM `produit` WHERE `codeproduit` LIKE ?";
        $produit=$main_gest->query($sql_produit,array($comande['codeproduit']));
        $total_quantite+=$comande['quantite'];
        $total_prix+=$produit['prix']*$comande['quantite'];
    } 
    
?>
<style>
    .couleur_table{
        color:black;
    }
</style>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" style="font-size:9px"><a href="?page=liste_des_clients_sur_terrain">MES CLIENTS SUR TERRAIN</a></li>
    <li class="breadcrumb-item" style="font-size:9px"><a href="?page=detailsClientsFB&codeClient=<?=$_GET['codeClient']?>">DETAIL CLIENT SUR FACEBOOK</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="font-size:9px">Historique</li>
  </ol>
</nav>
 <hr/> 
<div class="list-group">
 
    <div class="d-flex w-100 justify-content-between">
      <img class="card-img-top" class="img-thumbnail"  style="height:100%;width:60px;" src="http://magesty.in-expedition.com/img/photoclient/<?=$_GET['codeClient']?>.jpg">
      <small class="text-center" style="padding-right:5px;font-size:10px;">
        <?php
         $CLTQ="SELECT `ville`,`contact`,`liensurfacebook`,`Nom` FROM `client` WHERE `idclient` LIKE ?";
         $CLT=$main_gest->query($CLTQ,array($_GET['codeClient']));
         echo $CLT['Nom'].'<br/>'.$CLT['contact'].'<br/>'.$CLT['ville'];
        ?> </small>
    </div>
  

 </div>
 
 <hr/> 
            <table class="table table-hover text-center  table-bordered" align="center" style="font-size:9px">
                    <thead>
                        
                        <tr style="color:#688a7e;">
                          <th scope="col">Date d'achat</th>
                          <th scope="col">Produit</th>
                          <th scope="col">Quantité</th>
                          <th scope="col">Montant</th>
                        </tr>
                        
                     </thead>
                   <tbody>
                       <?php 
                            $comande=$main_gest->queryAll($sql_comande,array($_GET['codeClient']));
                            foreach($comande as $comande): 
                                $sql_facture="SELECT `idclient`,`datedefacture` FROM `facture` WHERE `idcomande` LIKE ?";
                                $facture=$main_gest->query($sql_facture,array($comande['idcomand']));
                                $sql_produit="SELECT `prix`,`quantite`,`designation` FROM `produit` WHERE `codeproduit` LIKE ?";
                                $produit=$main_gest->query($sql_produit,array($comande['codeproduit']));
                                
                                if($facture):
                       ?>
                        <tr>
                          <td class="couleur_table" scope="col">
                                <?php $date_facture = new DateTime($facture['datedefacture']);echo $date_facture->format('d-m-Y');?>
                          </td>
                          <td class="couleur_table" scope="col">
                              <?php if(file_exists("../image/produit/".$comande['codeproduit'].".jpg")){ ?>
                                  <a href="../image/produit/<?=$comande['codeproduit'].".jpg"?>" data-lightbox="roadtrip" title="
                                    <div class='text-center '>
                                    <h4 class='text-center'><?=$comande['codeproduit']?></h4>
                                    <h3 class='text-center' style='font-size:11px;'>
                                     Prix : <?=number_format($produit['prix'],2,',',' ')." Ar"?></a></br>
                                    <?= "Quantité : ".$produit['quantite']." "?></br>
                                    <span class='text-center'>Désignation :</span></br>
                                    <?= $produit['designation']?>
                                    </h3></div>"><?=$comande['codeproduit']?>
                                    </a>
                                <?php }else{ ?>
                                    <a href="../image/produit/image.jpg" data-lightbox="roadtrip" title="
                                    <div class='text-center '>
                                    <h4 class='text-center'><?=$comande['codeproduit']?></h4>
                                    <h3 class='text-center' style='font-size:11px;'>
                                     Prix : <?=number_format($produit['prix'],2,',',' ')." Ar"?></a></br>
                                    <?= "Quantité : ".$produit['quantite']." "?></br>
                                    <span class='text-center'>Désignation :</span></br>
                                    <?= $produit['designation']?>
                                    </h3></div>"><?=$comande['codeproduit']?>
                                    </a>
                                <?php } ?>
                          </td>
                          <td class="couleur_table" scope="col"><?=$comande['quantite']?></td>
                          <td class="couleur_table" scope="col"><?=number_format($produit['prix']*$comande['quantite'],2,',',' ')." Ar"?></td>
                          
                        </tr>
                        <?php endif;endforeach; ?>
                        <tr>
                          <td class="couleur_table" scope="col" style="background:#dee2e6"><b>Total :</b></td>
                          <td class="couleur_table" scope="col" style="background:#dee2e6"></td>
                          <td class="couleur_table" scope="col" style="background:#dee2e6"><?=$total_quantite." Produit(s)"?></td>
                          <td class="couleur_table" scope="col" style="background:#dee2e6"><?=number_format($total_prix,2,',',' ')." Ar"?></td>
                        </tr>
                    </tbody>
                </table>
