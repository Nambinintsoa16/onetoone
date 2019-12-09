<style>
    .ui-autocomplete{
        background:red!important;
        list-style-type:none;
    }
    
    .ui-autocomplete > li > a{
          color:white;
        
    }
    
</style>
<?php 
include_once("../include/include.php");
include ("header.php");
$sql="SELECT `idProduit`,`designation`,`quantite`,`idCategorie` FROM `produit` WHERE 1 ";
$produit=$main->queryAll($sql);
$contentProduit=scandir("../image/produit");
if(isset($_GET['designation']) and !empty($_GET['designation'])){
    
    $sql_planing ="SELECT DISTINCT `idEquipe` FROM `planing` WHERE `Panier` like ?";
    $planing=$main->queryAll($sql_planing,array($_GET['designation']));
    
    $sql_panier="SELECT `IdProduit` FROM `panier` WHERE `desigbation` LIKE ?";
    $idProduit =$main->queryAll($sql_panier,array($_GET['designation']));
    
    $sql_produit_affecte="SELECT COUNT(*) as compte FROM `panier` WHERE `desigbation` LIKE ?";
    $compte=$main->queryAll($sql_produit_affecte,array($_GET['designation']));
    
    $sql_equipe="SELECT COUNT(DISTINCT(`IdEquipe`)) as compte FROM `planing` WHERE `Panier` LIKE ?";
    $equipe = $main->queryAll($sql_equipe,array($_GET['designation']));
}

?>

<div class="content-wrapper">
   <div class="container">
       <div class="row" style="background-image:url('images/pannier.jpg');min-height:270px;padding-top:30px;padding:30px 20px">
           <div class="col-md-6" style="padding:0px 5px">
               <div >
                <div class="row"  style="background:white;min-height:200px;-webkit-box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);
box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);padding:20px 20px">
                    
                   <div class="col-md-5 col-sm-5 col-5" style="height:150px;border-radius:5px; padding:40px 15px;cursor:pointer;background:#<?php if(isset($_GET['couleur']) and !empty($_GET['couleur'])){ echo $_GET['couleur']; }else{ echo "C0C0C0";} ?>" data-toggle="modal" data-target="#detailpanier">
                      <i class="fa fa-shopping-cart" style="font-size:36px;color:#fff;text-align:center;"></i> <br> <span style="color:#fff;font-size:22px" class="texte panier_id">Panier <?=$_GET['designation'];?></span> 
                   </div> 
                   <div class="col-md-7 col-sm-7 col-7" style="padding:0px 20px">
                       Equipes atachés
                    <ul style="list-style-type:none;padding-left: 10px;font-size:12px">
                        <?php foreach($planing as $planing): ?>
                       <li>- <?= $planing['idEquipe']; ?></li>
                       <?php endforeach; ?>

                    </ul>
                   <p style="margin-top:-10px;">
                       Prévision C A<br>
                     <span style="padding-left:10px;font-size:12px"> - 7,000,000 Ar </span> 
                   </p>
                    
                   </div>
                  
                </div>
            </div>
          </div>
        
       </div>
       
       
       <div class="row" style="padding:10px 0px">
           <div class="col-md-12">
                    <blockquote>
                          <div class="form-row">

                                <div class="form-group col-md-4">
                                  <label for="">Code produit</label>
                                  <input type="text" class="form-control produit produit_panier" name="codeProduit1"  placeholder="Code du produit">
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="action">Action</label>
                                    <i class="fa fa-plus-square ajoutProduit_panier" style="font-size:40px;color:#33b5e5;cursor:pointer"></i>
                                    
                                </div>
                          </div>
                          
                    </blockquote>
               <div class="table-responsive" style="background:#fff;padding:10px 10px">
                   
                   <table class="table infoProduit">
                       <h4>Liste Produit du Panier</h4>
              <thead>
                <tr>
                  <th scope="col">Code Produit</th>
                  <th scope="col">Prix</th>
                  <th scope="col">Statut</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                    <?php foreach($idProduit as $idProduit): ?>
                  <tr>
                      <td ><?= $idProduit['IdProduit']; ?></td>
                      <td> 
                            <a href="#">
                                <?php $sql_prix="SELECT * FROM `prix` WHERE `idProduit` LIKE ?"; $prix =$main->query($sql_prix,array($idProduit['IdProduit'])); echo number_format($prix['prixdetail'],0, ',', ' ')." Ar"; ?>
                            </a>
                      </td>
                      <td> <i class="fa fa-lock" style="font-size: 20px;margin-top: 5px;color: red " aria-hidden="true"></i></td>
                      <td><a href="#"> 
                        <i class="fa fa-edit disabled" style="font-size: 16px;margin-top: 8px;color: #ccc; "></i>
                      </a></td>

                </tr>
                    <?php endforeach; ?>
                <!--<tr>
                      <td >PRO015</td>
                      <td> <a href="#">prix</a></td>
                      <td> <i class="fa fa-lock" style="font-size: 20px;margin-top: 5px;color: red " aria-hidden="true"></i></td>
                      <td><a href="#" class="disabled"> 
                      <i class="fa fa-edit disabled" style="font-size: 16px;margin-top: 8px;color: #ccc;"></i> 
                      </a></td>
                </tr>
                
                <tr>
                      <td >PRO008</td>
                      <td> <a href="#">prix</a></td>
                      <td> <i class="fa fa-unlock" style="font-size: 20px;margin-top: 5px;color: red " aria-hidden="true"></i></td>
                      <td><a href="#"> 
                     
                       <i class="fa fa-edit disabled" style="font-size: 16px;margin-top: 8px;color: green "></i> 
                        
                      </a></td>
                </tr>
                
                <tr>
                      <td >PRO007</td>
                      <td> <a href="#">prix</a></td>
                      <td> <i class="fa fa-lock" style="font-size: 20px;margin-top: 5px;color: red " aria-hidden="true"></i></td>
                      <td><a href="#"> 
                         <i class="fa fa-edit disabled" style="font-size: 16px;margin-top: 8px;color: #ccc;"></i>
                      </a></td>
                </tr>-->
              </tbody>
            </table>
               </div>
               
                
              
                 <!-- Modal -->
                  <div class="modal fade" id="detailpanier" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Détail du panier</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                                    <h2>Detail du Panier </h2>
                           
                           <ul style="list-style-type:none">
                               <li> 
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i> Nombre de Produit Affectés : <?= $compte[0]['compte']; ?>
                               </li>
                               <li> <i class="fa fa-arrow-right" aria-hidden="true"></i> Equipes atachés: <?= $equipe[0]['compte'] ?></li>
                               <li> <i class="fa fa-arrow-right" aria-hidden="true"></i> Date Création: 12-02-2019</li>
                               <li> <i class="fa fa-arrow-right" aria-hidden="true"></i> Mis à jour le : 30-05-2019</li>
                           </ul>
                                        
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