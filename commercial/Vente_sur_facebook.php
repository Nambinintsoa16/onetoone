<?php
$dbfacebook=new main('localhost','inexped1_gestiondevente','inexped1_admin','crea.dev.121*');
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
    <li class="breadcrumb-item active" aria-current="page" style="font-size:9px">Détail vente sur facebook</li>
  </ol>
</nav>
<div class="container">
        <div class="row">
        <div class="col-md-12 img-container">

   <div class="col-md-8 col-sm-8 col-xs-8 col-xs-offset-2 col-md-offset-2  col-sm-offset-2" style="margin:auto auto; ">
      <h2  style="text-align:center;width=100%;margin-top:15px;font-size:15px;">
          <b>Mes ventes sur Facebook au <?=$date_du_jour?> </b>
     </h2>

   </div>

</div>

 <table class="table table-bordered table-striped" style="font-size:13px; margin-top: 10px;">
    <thead>
      <tr>

        <th class="text-center">Produit</th>
        <th class="text-center">Quantité</th>
        <th class="text-center" style="font-size:15px;">Montant de la vente</th>
        <th class="text-center">Client</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $totalProduit=0;
      $totalPrix=0;
      $produit=array();
      $array=array();
      $listeProduit=array();
      $sql="SELECT DISTINCT `NumFact` FROM `facture` INNER JOIN `client` ON facture.idclient LIKE client.idclient WHERE client.idVP LIKE ? AND facture.datedefacture LIKE ?";
  
      $resultat=$dbfacebook->queryAll($sql,array($_SESSION['matricule'],$dateDB));
      
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
            <td class="text-center">
    
                <a  href="#"data-toggle="modal" data-target="#<?= $listeProduit ?>"><?= $listeProduit ?></a>
    
                    <div class="modal fade" id="<?= $listeProduit ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                          <?php
                           $sql="SELECT `designation`,`quantite`,`prix`,`photoproduit` FROM `produit` WHERE 1";
                          $maingestiVente=new main('localhost','inexped1_gestiondevente','inexped1_admin','crea.dev.121*');
                          $infoproduit=$maingestiVente->query($sql);
                          if($infoproduit):
                    
                           ?>
                            <p class="modal-title text-center col-lg-12" id="exampleModalLabel" style="font-size:12px;"><?=$infoproduit['designation'] ?></p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <a href="#">
                                <img style="height:160px;" class="img-thumbnail" src="http://magesty.in-expedition.com/img/produit/<?=$infoproduit['photoproduit']?>">
                            </a>
                    
                          </div>
                          <div class="modal-footer">
                            <div class="col-lg-12">
                              <h3><strong style="font-size:17px;">  <?=number_format($infoproduit['prix'],2,',',' ').' '.'Ariary'?></strong></h3>
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
            <td class="text-center"><?= $produit[$listeProduit];?></td>
            <td class="text-center"> 
                <?php
                        $sql="SELECT `prix` FROM `produit` WHERE `codeproduit` LIKE '".$listeProduit."'";
                        $nomProduit=$dbfacebook->query($sql);
    
                        $prix=$nomProduit['prix']* $produit[$listeProduit];
                        echo (number_format($prix,2,',',' '));
                        $totalPrix+=$prix;
                ?>Ar
            </td>
            <td class="text-center">
                <?php
                    $sqlClient="SELECT comande.codeproduit,client.idclient,comande.quantite,produit.designation,produit.prix FROM `facture`,`client`,`produit`,`comande` WHERE comande.idcomand LIKE facture.idcomande AND comande.codeproduit LIKE produit.codeproduit AND facture.idclient LIKE client.idclient AND client.idVP LIKE ? AND produit.codeproduit LIKE ? AND facture.datedefacture LIKE ?";
                        $rsClient=$dbfacebook->query($sqlClient,array($_SESSION['matricule'],$listeProduit,$_GET['date']));
                    
                ?>
                <a href="?page=historiqueAchatClient&codeClient=<?=$rsClient['idclient']?>"><?=$rsClient['idclient']; ?></a>
            </td>
        </tr>
            <?php  }?>
    </tbody>
 </table>




 <table class="table table-bordered table-striped" style="font-size:13px; margin-top: 10px;">
    <thead>
      <tr>

        <th class="text-center">Total </th>
        <th class="text-center"><?= $totalProduit." "?> Produits</th>
        <th class="text-center" ><?= number_format($totalPrix,2,',',' ')." "?>Ar</th>
      </tr>
    </thead>
 </table>



        <hr>

      </div>


        </div>

        <hr>

      </div>
<!-- Button trigger modal -->


