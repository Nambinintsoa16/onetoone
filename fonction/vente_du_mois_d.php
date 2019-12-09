<?php
include_once('../include/include.php');
if(isset($_POST['mois'])):
    $mois=date("Y").'-'.$_POST['mois'];

?>

    <thead>
      <tr>
        <th style="font-size:10px">Jour</th>
        <th style="font-size:10px">Vente sur facebook</th>
        <th style="font-size:10px">Vente Terrain</th>
     
      </tr>
    </thead>
    <tbody>
      <?php
      $i=1;
      $dtt=new dateTime($mois);
      $nbjou= $dtt->format('t');
      $db_gestion_de_vente=new main('localhost','inexped1_gestiondevente','inexped1_admin','crea.dev.121*');
    do{
      $dt=new dateTime($mois.'-'.$i);
      $date=$dt->format('Y-m-d');
      $dateT=$dt->format('Y/m/d');?>
     <tr <?php

      $testDim="";
     $testDim=$main_function->dimanche($date);
     if($testDim=="Sun"){
      echo 'style="background-color:red;color:#fff;"';
     }
     $jour_france=array('Mon'=>'Lun','Tue'=>'Mar','Wed'=>'Mer','Thu'=>'Jeu','Fri'=>'Ven','Sat'=>'Sam','Sun'=>'Dim');
     $date1=date('D',strtotime($date));
    ?>>

        <td style="font-size:10px;"> 
            <?php 
                echo $jour_france[$date1]." ".$i;
            ?>
        </td>
        <td style="font-size:10px;" class="ventefb"> <a href="?page=Vente_sur_facebook&date=<?=$date?>" >
<?php

$CA_FB=0;
$sql="SELECT facture.idcomande FROM `facture`,`client` WHERE facture.idclient LIKE client.idclient AND facture.datedefacture  LIKE '".$date."' AND  client.idVP LIKE '".$_SESSION['matricule']."'";
$facture=$db_gestion_de_vente->queryAll($sql);
foreach ($facture as $facture) {
   $sql="SELECT `codeproduit`,`quantite` FROM `comande` WHERE `idcomand` =".$facture['idcomande'];
   $produit=$db_gestion_de_vente->query($sql);

  $sql='SELECT `prix` FROM `produit` WHERE `codeproduit` LIKE "'.$produit['codeproduit'].'"';
  $prix_produit=$db_gestion_de_vente->query($sql);
   $CA_FB+=($prix_produit['prix']*$produit['quantite']);
 
}
echo number_format($CA_FB,2,","," ").'Ar';

?>
        </a></td>
        <td style="font-size:10px;" class="venteTr"> <a href="?page=Vente_sur_terrain&date=<?=$date?>" >

<?php
  $CA_du_mois=0;
$sql="SELECT `quantite`,`lieu`,`codeproduit`,`idPrix` FROM `vente` WHERE `idVP` LIKE '".$_SESSION['matricule']."'  AND `date` LIKE '".$date."'";

                    $produit=$main->queryAll($sql);
               foreach ($produit as $produit) {
              $sql="SELECT  `prixdetail` FROM `prix` WHERE `idProduit` LIKE '".$produit['codeproduit']."' AND `idMission`=".$produit['lieu']." AND  `idPrix` = ".$produit['idPrix'];
              $prixdetail=$main->query($sql);
              $CA_du_mois+=$prixdetail['prixdetail']*$produit['quantite'];

                   }

echo number_format($CA_du_mois,2,","," ").' Ar';
?>
        </a></td>


      </tr>

    <?php
    $dateWhile=explode('-', $date);
    $datetemp=$dateWhile[0].'-'.$dateWhile[1];
  $i++;  }while ($i <=  $nbjou);
       ?>

    </tbody>




                <?php endif;?>



