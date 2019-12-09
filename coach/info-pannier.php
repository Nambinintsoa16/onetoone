
<?php 
$titre = "Detail Panier";

include_once('../include/include.php');

include "header.php";

$contentProduit=scandir("../image/produit");
if(isset($_GET['designation']) and !empty($_GET['designation'])){
    
    $sql_planing ="SELECT DISTINCT `idEquipe` FROM `planing` WHERE `Panier` like ?";
    $planing=$main->queryAll($sql_planing,array($_GET['designation']));
    
    $sql_panier="SELECT `IdProduit`,`status` FROM `panier` WHERE `desigbation` LIKE ?";
    $idProduit =$main->queryAll($sql_panier,array($_GET['designation']));
    
    $sql_produit_affecte="SELECT COUNT(*) as compte FROM `panier` WHERE `desigbation` LIKE ?";
    $compte=$main->queryAll($sql_produit_affecte,array($_GET['designation']));
    
    $sql_equipe="SELECT COUNT(DISTINCT(`IdEquipe`)) as compte FROM `planing` WHERE `Panier` LIKE ?";
    $equipe = $main->queryAll($sql_equipe,array($_GET['designation']));
}

//MISSION
$sql="SELECT `nom_mission` FROM `ma_mission` WHERE `id_coach` LIKE ? AND `statut_mission` LIKE 'En_cours'"; 
$mission = $main->query($sql,array($_SESSION['matricule']));
//Produit
$sql_produit="SELECT `designation`,`quantite` FROM `produit` WHERE `idProduit` LIKE ?";

?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-corp">
      <div class="container-fluid">
       
       
       <div class="row" style="padding:10px 0px">
           <div class="col-md-12">
               <div class="table-responsive" style="background:#fff;padding:10px 10px">
                   
                   <table class="table infoProduit text-center">
                       <h4 style="font-size:15px">Produit du panier <?php echo $_GET['designation']." - ";echo ($mission)?$mission['nom_mission']:'(*Pas de Mission)'; echo " ".$_GET['date']?></h4>
              <thead>
                <tr style="font-size:12px">
                  <th scope="col">Code Produit</th>
                  <th scope="col">Prix</th>
                  <th scope="col">Statut</th>
                </tr>
              </thead>
              <tbody style="font-size:11px">
                    <?php foreach($idProduit as $idProduit): 
                        $produit=$main->query($sql_produit,array($idProduit['IdProduit']));
                    ?>
                  <tr>
                      <td>
                          <?php if(file_exists("../image/produit/".$idProduit['IdProduit'].".jpg")){ ?>
                          <a href="../image/produit/<?= $idProduit['IdProduit'].".jpg";?>" data-lightbox="roadtrip" title="<?=$produit['designation']?>"><?= $idProduit['IdProduit']; ?></a>
                          <?php }else{ ?>
                          <a href="../image/produit/image.jpg" data-lightbox="roadtrip" title="<?=$produit['designation']?>"><?= $idProduit['IdProduit']; ?></a>
                          <?php } ?>
                      </td>
                      <td> 
                            <a href="#">
                                <?php $sql_prix="SELECT * FROM `prix` WHERE `idProduit` LIKE ?"; $prix =$main->query($sql_prix,array($idProduit['IdProduit'])); echo number_format($prix['prixdetail'],0, ',', ' ')." Ar"; ?>
                            </a>
                      </td>
                      <td><?=($idProduit['status']=='Actif')?'<i class="fa fa-lock" align="center" style="color: green " aria-hidden="true"></i>':'<i class="fa fa-lock" align="center" style="color: red " aria-hidden="true"></i>' ?> </td>

                </tr>
                    <?php endforeach; ?>
                
              </tbody>
            </table>
               </div>
               
               
                <!-- Modal -->
                  <div class="modal fade" id="detailpanier" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Détail du panier</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
 
                                        <i class="fa fa-circle-o" aria-hidden="true"></i> Nombre de Produit Affectés : <?= $compte[0]['compte']; ?><br>
                                  
                                   <i class="fa fa-circle-o" aria-hidden="true"></i></i> Equipes atachés: <?= $equipe[0]['compte'] ?><br>
                                   <i class="fa fa-circle-o" aria-hidden="true"></i> Date Création: 12-02-2019<br>
                                   <i class="fa fa-circle-o" aria-hidden="true"></i> Mis à jour le : 30-05-2019<br>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                <!-- ***************************************** --> 
                
           </div>
           
          
       </div>
   </div>
</div>


<?php include "footer.php";?>