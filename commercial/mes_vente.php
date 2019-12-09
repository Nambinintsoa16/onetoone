<?php
$dbfacebook=new main('localhost','inexped1_gestiondevente','inexped1_admin','crea.dev.121*');
$fb= $main_function->chiffreAffaireFB(date('Y-m-d'),$_SESSION['matricule']);
$tr= $main_function->chiffreAffaireTR(date('Y-m-d'),$_SESSION['matricule']);
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" style="font-size:9px"><a href="?page">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page" style="font-size:9px">Vente du jour</li>
  </ol>
</nav> 
<button class="btn btn-outline-primary nbPrix" type="button" style="font-size:11px;width:100%;height:30px;" disabled>
   <h2  style="text-align:center;width=100%;margin-top:2px;font-size:10px;">
          <b>Mes ventes du jour  : <?php $total=$tr+$fb;echo number_format($total,2,","," ");?> Ar</b>
     </h2> 
</button>
           

      <h2  style="text-align:center;width=100%;margin-top:15px;font-size:12px;">
          <b>Mes ventes facebook </b>
     </h2>

<table class="table table-bordered table-striped" style="font-size:10px; margin-top: 10px;">
    <thead>
      <tr>

        <th class="text-center">Produit</th>
        <th class="text-center">Quantité</th>
        <th class="text-center">Montant</th>
      </tr>
    </thead>
    <tbody>

    <?php
      $totalProduit=0;
      $totalPrix=0;
      $produit=array();
      $array=array();
      $listeProduit=array();
      $sql="SELECT DISTINCT facture.NumFact FROM `client`,`facture` WHERE facture.datedefacture LIKE '".date("Y-m-d")."'  AND  facture.idclient LIKE client.idclient AND client.idVP LIKE '".$_SESSION['matricule']."'";

      $resultat=$dbfacebook->queryAll($sql);
      if ($resultat){
       foreach ($resultat as $resultat){
           $sql="SELECT `idcomande` FROM `facture` WHERE `NumFact` LIKE '".$resultat['NumFact']."'";
            $idcomande=$dbfacebook->queryAll($sql);
             foreach ($idcomande as $idcomande) {
               array_push($array,  $idcomande['idcomande']);
             }

         }

         foreach ($array as $array) {
           $sql="SELECT `codeproduit`,`quantite` FROM `comande` WHERE `idcomand`=".$array;
            $com=$dbfacebook->query($sql);
            if(!array_key_exists($com['codeproduit'], $produit)){
                $produit[$com['codeproduit']]=$com['quantite'];
                array_push( $listeProduit, $com['codeproduit']) ;
            }else{
              $produit[$com['codeproduit']]=$produit[$com['codeproduit']]+$com['quantite'];
            }
         }
       }

       foreach ($listeProduit as $listeProduit) {
         $totalProduit+=$produit[$listeProduit];
        ?>
                        <tr>
                            <td class="text-center" style="font-size:10px;">

                        <a  href="#"data-toggle="modal" data-target="#<?= $listeProduit ?>"><?= $listeProduit ?></a>

<div class="modal fade" id="<?= $listeProduit ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <?php
       $sql="SELECT `designation`,`quantite`,`prix`,`photoproduit` FROM `produit` WHERE ?";
      $maingestiVente=new main('localhost','inexped1_gestiondevente','inexped1_admin','crea.dev.121*');
      $infoproduit=$maingestiVente->query($sql,array($listeProduit));
      if($infoproduit):

       ?>
        <p class="modal-title text-center col-lg-12" id="exampleModalLabel" style="font-size:10px;"><?=$infoproduit['designation'] ?></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <img style="height:160px;" class="img-thumbnail" src="http://magesty.in-expedition.com/img/produit/<?=$infoproduit['photoproduit']?>">


      </div>
      <div class="modal-footer">
        <div class="col-lg-12">
          <h3><strong style="font-size:10px;">  <?=number_format($infoproduit['prix'],2,","," ").' '.'Ariary'?></strong></h3>
        </div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
      <?php

          endif;
       ?>
    </div>
  </div>
</div>





                             </td>
                            <td class="text-center" style="font-size:10px;"><?= $produit[$listeProduit];?></td>
                            <td class="text-center" style="font-size:10px;"> <?php
                            $sql="SELECT `prix` FROM `produit` WHERE `codeproduit` LIKE '".$listeProduit."'";
                            $nomProduit=$dbfacebook->query($sql);

                        echo $prix=$nomProduit['prix']* $produit[$listeProduit];

                         $totalPrix+=$prix;
                        ?>Ar</td>
                         </tr>



                <?php  }?>



    </tbody>

 </table>




 <table class="table table-bordered table-striped" style="font-size:10px; margin-top: 10px;">
    <thead >

    </thead>
    <tbody>
      
    </tbody>
          <td style="font-size:10px;">Total FB : </td>
          <td style="font-size:10px;"><?=$totalProduit." "?>Produits</td>
          <td style="font-size:10px;"><?php echo number_format($totalPrix,2,","," ")." ";?>Ar</td>
      <tfoot>
        <tr>
          
        </tr>
      </tfoot>
 </table>
 <h2  style="text-align:center;width=100%;margin-top:15px;font-size:12px;">
          <b>Mes ventes sur terrain </b>
     </h2>
 
 <table class="table table-bordered table-striped" style="font-size:10px; margin-top: 20px;">
    <thead>
      <tr>

        <th class="text-center">Produit</th>
        <th class="text-center">Quantité</th>
        <th class="text-center">Montant</th>
      </tr>
    </thead>
    <tbody>
     <?php
      $quantite=0;
      $prixtotal=0;
       $affiche= "SELECT * FROM `vente` WHERE `idVP` LIKE '".$_SESSION['matricule']."'  AND  `date` LIKE '".date("Y-m-d")."'";
        $resultat=$main->queryAll($affiche);
    if($resultat):        
      foreach ($resultat as $resultat):
     $quantite+=$resultat['quantite'];

        ?>

                               <tr>
                                   <td class="text-center" style="font-size:10px;" style="font-size:10px;">
                                   
      
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
      <a href="?page=information_sur_produit&codeProduit=<?=$resultat['codeproduit']?>"> <img style="height:160px;" src="../image/produit/<?=$resultat['codeproduit']?>.jpg"></a>
      </div>
      <div class="modal-footer">
        <div class="col-lg-12">
          <h3><strong style="font-size:17px;"><?php 
          $sql="SELECT `prixdetail`,`prixgros` FROM `prix` WHERE `idMission` LIKE ? AND `idProduit` LIKE ?"; 
          $prix=$main->query($sql,array($_SESSION['idMission'],$resultat['codeproduit']));
          echo number_format($prix['prixdetail'],2,","," ");
          ?> Ariary</strong></h3>
        </div>  
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        
      </div>
    </div>
  </div>
</div>
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   </td>
                                   <td class="text-center" style="font-size:10px;"><?=$resultat['quantite']?></td>
                                  
                                   <td class="text-center" style="font-size:10px;"><?php
                      $sql='SELECT * FROM `prix` WHERE `idProduit` LIKE "'.$resultat['codeproduit'].'" AND `idMission`='.$resultat['lieu'];
                      $prix = $main->query($sql);
                      if ($prix) {
                       echo number_format($prix['prixdetail']*$resultat['quantite'],2,","," ")." ";
                       $prixtotal+=($prix['prixdetail']*$resultat['quantite']);
                      }else{
                        echo 0;
                      }

                                   ;?>Ar</td>
                                </tr>



                <?php  endforeach; endif;?>

 </table>




 <table class="table table-bordered table-striped" style="font-size:10px; margin-top: 10px;">
    <thead >

    </thead>
    <tbody>
      
    </tbody>
          <td style="font-size:10px;">Total VT : </td>
          <td style="font-size:10px;"><?=$quantite." "?>Produits</td>
          <td style="font-size:10px;"><?php echo number_format($prixtotal,2,","," ")." ";?>Ar</td>
      <tfoot>
        <tr>
          
        </tr>
      </tfoot>
 </table>



     



