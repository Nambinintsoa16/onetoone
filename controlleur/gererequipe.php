<?php 
    include "header.php";
    include_once("../include/include.php");
//recup idEquipe planing equipe
$sql="SELECT DISTINCT(`IdEquipe`) FROM `planing` WHERE 1";
$planingEquipe=$main->queryAll($sql);

//$sqlDistinctPanier="SELECT DISTINCT (`IdProduit`) FROM `panier` WHERE LLIKE ?";
//$resultatDistinctPanier=$main->query($sqlDistinctPanier,array("P0"));


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
<style type="text/css">
  /* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #ccc;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color:#20c997;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #33b5e5;
  color: #fff;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
 <div class="content-wrapper" style="background: white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
          <div class="row" style="padding-left:7px;padding-right:7px">
            <div class="col-md-12 mb-2" style="background:black;opacity:0.9;margin-top:-20px;padding-top:13px">
                <h4 style="opacity:1;color:white;font-size:14px"> Listes des tous les misssions <?php
$date = new DateTime();
echo $date->format('d-m-Y ');
?></h4>
            </div>
        </div>
      <?php echo $equipe['IdEquipe']; ?>
      <div class="row">
           <div class="col-md-12" >
             <img src="images/equipe 3.jpg" class="bann_accueil" height="300px">
              <div class="content-header">
                  <div class="container-fluid">
                    <div class="row mb-2 ">
                      <div class="col-sm-6">
                        
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item content_dt"><?php $dt=new dateTime();
$date=$dt->format("d-M-Y");
echo $date;
                          ?></li>
                         
                        </ol>
                      </div><!-- /.col -->
                    </div><!-- /.row -->
                  </div><!-- /.container-fluid -->
                </div>
            </div>
        </div> 

        <div class="row block_menu">
          <div class="col-md-3 col-sm-6 col-6 block1">
            <a href="#" data-toggle="modal" data-target="#myModalmissionencours">
              
            
             <div class="row contener_entite">
              
                <div class="Commerciaux">
                  <i class="fa fa-users"></i><br>En cours : <b>6</b></div>
                <div class="badge_accueil">
                 
                </div>
             </div>
             </a>
          </div>
          <div class="col-md-3 col-sm-6 col-6  block2">

             <a href="#"  data-toggle="modal" data-target="#myModalmissiontermine" >
             <div class="produit">
               <div class="text"><i class="fa fa-cubes"></i><br>

                  Terminées <b>3</b></div>
               <div  class="badge_accueil">
                 
                </div>


             </div>
              </a>
          </div>
          <div class="col-md-3 col-sm-6 col-6  block3">

             <a href="#" data-toggle="modal" data-target="#myModalmissionclassement" >
               <div class="Planning">
                 <div class="text"><i class="fa fa-tasks"></i><br>E du Mois</div>
                 <div class="badge_accueil">
                   
                  </div>
               </div>
             </a>
          </div>
          <div class="col-md-3 col-sm-6 col-6  block4">
            <a href="#">
             <div class="penalites">
               <div class="text"><i class="fa fa-exclamation-triangle"></i><br>Pénalités</div>
               <div class="badge_accueil">
                 
                </div>
             </div>
             </a>
          </div>
        </div> 
        <div class="row mb-2" >
         <h4></h4> 

          <div class="table-responsive">

            <table class="table">
             
              <thead>
                <tr>
                  <th scope="col">Code Equipe</th>
                  <th scope="col">Nom Equipe</th>
                  <th scope="col">Destination</th>
                  <th scope="col">Membres</th>
                  <th scope="col">Produits</th>
                  <th scope="col">statut</th>
                  <th scope="col">Info</th>
                </tr>
              </thead>
              <tbody>
                 
                <?php foreach ($planingEquipe as $planingEquipe):
                    $sqleq="SELECT COUNT(`mtrP`) as compte FROM `planing_equipe` WHERE `designationEquipe` LIKE ?";
                    $rsid=$main->query($sqleq,array($planingEquipe['IdEquipe']));
                    $rscont=$rsid['compte'];
                    
                    //selection dans la table equipe
                    $sql1="SELECT `date_depart`, `date_retour` FROM `equipe` WHERE `IdEquipe` LIKE ?";
                    $equipe=$main->query($sql1,array($planingEquipe['IdEquipe']));
                    
                    //prendre panier
                    $sql2="SELECT DISTINCT(`Panier`) FROM `planing` WHERE `IdEquipe` LIKE ?";
                    $panier=$main->query($sql2,array($planingEquipe['IdEquipe']));
                    //prendre id mission
                    $sql3="SELECT DISTINCT (`idMission`) FROM `planing` WHERE 1 ";
                    $idMission=$main->query($sql3,array(planingEquipe['IdEquipe']));
                    //prendre lieu mission
                    $sql4="SELECT `lieu` FROM `mission` WHERE `idMission` LIKE ?";
                    $lieu=$main->query($sql4,array($idMission['idMission']));
                    
                ?>
                    <tr>
                        <?php //var_dump($n); ?>
                      <td><?= $planingEquipe['IdEquipe'];?></td>
                      <td class="nom_equipe"><?= $planingEquipe['IdEquipe'];?></td>/ <!--EQUIPE-009-->
                      <td><?= $lieu['lieu'];?></td>
                      <td><?= $rscont." pers"; ?>&nbsp; <i class="fa fa-plus-circle membre_equipe" id="<?= $lieu['lieu'];?>" data-toggle="modal" data-target="#myModalpers" style="color: blue;margin-top: 8px;cursor:pointer"></i></td>    
                      <td><?= $panier['Panier']; ?>&nbsp;<i class="fa fa-plus-circle produit_panier1" data-toggle="modal" data-target="#myModal" style="color: blue;margin-top: 8px;cursor:pointer"></i></td>
                      <td><?="Actif" ;?></td>
                      <td><a href="info-produit.php"> 
                        <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                        </a>
                      </td>
                    </tr>                
                <?php endforeach; ?>
                <!--   
                <tr>
                  <td>MIS19 0001</td>
                  <td>Mission SAVA</td>
                  <td>SAVA</td>
                  <td>19 pers <i class="fa fa-plus-circle" data-toggle="modal" data-target="#myModalpers" style="color: blue;margin-top: 8px;cursor:pointer"></i></td>
                  <td>14 Produits <i class="fa fa-plus-circle" data-toggle="modal" data-target="#myModal" style="color: blue;margin-top: 8px;cursor:pointer"></i></td>
                  <td>2019-10-01</td>
                  <td>2019-11-30</td>
                  <td>Actif</td>
                  <td><a href="info-produit.php"> 
                    <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                    </a>
                  </td>
                </tr>
                <tr>
                   <td>MIS19 0002</td>
                  <td>Mission TULEAR</td>
                  <td>ANDROY</td>
                  <td>19 pers <i class="fa fa-plus-circle" data-toggle="modal" data-target="#myModalpers" style="color: blue;margin-top: 8px;cursor:pointer"></i></td>
                  <td>14 Produits <i class="fa fa-plus-circle" data-toggle="modal" data-target="#myModal" style="color: blue;margin-top: 8px;cursor:pointer"></i></td>
                  <td>2019-10-01</td>
                  <td>2019-11-30</td>
                  <td>En cours</td>
                  <td><a href="info-produit.php"> 
                   <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                  </a></td>

                </tr>
                <tr>
                  <td>MIS19 0003</td>
                  <td>Mission MANAKARA</td>
                  <td>AMORONIMANIA</td>
                  <td>19 pers <i class="fa fa-plus-circle" data-toggle="modal" data-target="#myModalpers" style="color: blue;margin-top: 8px;cursor:pointer"></i></td>
                  <td>14 Produits <i class="fa fa-plus-circle" data-toggle="modal" data-target="#myModal" style="color: blue;margin-top: 8px;cursor:pointer"></i></td>
                  <td>2019-10-01</td>
                  <td>2019-11-30</td>
                  <td>En cours</td>
                  <td><a href="info-produit.php"> 
                    <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                  </a></td>
                </tr>
                <tr>
                  <td >MIS19 0004</td>
                  <td>Mission MORONDAVA</td>
                  <td>MENABE</td>
                  <td>19 pers <i class="fa fa-plus-circle" data-toggle="modal" data-target="#myModalpers" style="color: blue;margin-top: 8px;cursor:pointer"></i></td>
                  <td>14 Produits <i class="fa fa-plus-circle" data-toggle="modal" data-target="#myModal2" style="color: blue;margin-top: 8px;cursor:pointer"></i></td>
                  <td>2019-10-01</td>
                  <td>2019-11-30</td>
                  <td>Terminée</td>
                  <td><a href="info-produit.php"> 
                    <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                  </a></td>
                </tr>
                -->
              </tbody>
            </table>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </div>
  </div>
  <!-- Content Wrapper. Contains page content -->
   <!-- /.content-wrapper -->
   <?php include "footer.php";?>


   <!-- Central Modal Small -->
<div class="modal fade" id="myModalpers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">
        Tous les membres du  Mission inconnu
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                  <!-- Tab links -->
                    <div class="col-md-12 body-modal">
                      <div class="tab row">
                        <div class="col-md-3"><button style="width: 100%" id="defaultOpen" class="tablinks" onclick="openCity(event, 'commerciaux')">Equipe</button></div>
                        <div class="col-md-3"><button style="width: 100%" class="tablinks" onclick="openCity(event, 'coatch')">Coatch</button></div>
                        <div class="col-md-3"><button style="width: 100%" class="tablinks" onclick="openCity(event, 'magasinier')">Commerciaux</button></div>
                        <div class="col-md-3"><button style="width: 100%" class="tablinks" onclick="openCity(event, 'chauffeur')">Magasinier</button></div>
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

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title  w-100" id="myModalLabel modaltitlePanier" style="">
        Produits Affectés à la mission
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalbodyPanier">
       
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Code</th>
                      <th scope="col">Nom</th>
                      <th scope="col">Nombre</th>
                      <th scope="col"> Vendus</th>
                       <th scope="col">CA</th>
                      <th scope="col"> Restes</th>
                      <th scope="col">Hors planning</th>
                      <th scope="col">Images</th>
                      <th scope="col">Info</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyPanier">
                    <!--dans fonction/Gerer_EquipePanier.php-->
                    
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



   <!-- Central Modal Small -->
<div class="modal fade" id="myModalmissionencours" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel" style="">
        Mission en cours
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                 
                  <th scope="col">Mission</th>
                  <th scope="col">C A</th>
                  <th scope="col">Nbr Produit</th>
                   <th scope="col">Vendus</th>
                  <th scope="col"> Restes</th>
                  <th scope="col">H P</th>
                  <th scope="col">Sanction</th>
                  <th scope="col">Info</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>MISS19001</td>
                  <td>2,000,000 Ar</td>
                  <td> 180 </td>
                  <td>40 </td>
                  <td>120</td>
                  <td>30</td>
                  <td>80,000 Ar</td>
                  <td><a href="info-produit.php"> 
                    <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                  </a></td>
                </tr>
                
                 <tr>
                  <td>MISS19002</td>
                  <td>3,000,000 Ar</td>
                  <td> 280 </td>
                  <td>60 </td>
                  <td>220</td>
                  <td>40</td>
                  <td>180,000 Ar</td>
                  <td><a href="info-produit.php"> 
                    <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                  </a></td>
                </tr>
                 <tr>
                  <td>MISS19003</td>
                  <td>1,000,000 Ar</td>
                  <td> 180 </td>
                  <td>70 </td>
                  <td>110</td>
                  <td>40</td>
                  <td>120,000 Ar</td>
                  <td><a href="info-produit.php"> 
                    <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                  </a></td>
                </tr>
                
                 <tr>
                  <td>MISS19004</td>
                  <td>1,500,000 Ar</td>
                  <td> 180 </td>
                  <td>90 </td>
                  <td>90</td>
                  <td>10</td>
                  <td>50,000 Ar</td>
                  <td><a href="info-produit.php"> 
                    <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                  </a></td>
                </tr>
                <tr>
                  <td>MISS19005</td>
                  <td>4,500,000 Ar</td>
                  <td> 180 </td>
                  <td>170 </td>
                  <td>10</td>
                  <td>20</td>
                  <td>250,000 Ar</td>
                  <td><a href="info-produit.php"> 
                    <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                  </a></td>
                </tr>
                
                <tr>
                  <td>MISS19006</td>
                  <td>4,500,000 Ar</td>
                  <td> 280 </td>
                  <td>240 </td>
                  <td>40</td>
                  <td>20</td>
                  <td>250,000 Ar</td>
                  <td><a href="info-produit.php"> 
                    <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                  </a></td>
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


 <!-- Central Modal Small -->
<div class="modal fade" id="myModalmissiontermine" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel" style="">
        Missions terminées
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                 
                  <th scope="col">Mission</th>
                  <th scope="col">C A</th>
                  <th scope="col">Nbr Produit</th>
                   <th scope="col">Vendus</th>
                  <th scope="col"> Restes</th>
                  <th scope="col">H P</th>
                  <th scope="col">Sanction</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>MISS19001</td>
                  <td>2,000,000 Ar</td>
                  <td> 180 </td>
                  <td>40 </td>
                  <td>120</td>
                  <td>30</td>
                  <td>80,000 Ar</td>
                  <td><a href="#"> 
                   Archiver
                  </a></td>
                </tr>
                
                 <tr>
                  <td>MISS19002</td>
                  <td>3,000,000 Ar</td>
                  <td> 280 </td>
                  <td>60 </td>
                  <td>220</td>
                  <td>40</td>
                  <td>180,000 Ar</td>
                  <td><a href="#"> 
                   Archiver
                  </a></td>
                </tr>
                 <tr>
                  <td>MISS19003</td>
                  <td>1,000,000 Ar</td>
                  <td> 180 </td>
                  <td>70 </td>
                  <td>110</td>
                  <td>40</td>
                  <td>120,000 Ar</td>
                   <td><a href="#"> 
                   Archiver
                  </a></td>
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



<!-- Central Modal Small -->
<div class="modal fade" id="myModalmissionclassement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel" style="">
        Classement equipes du mois
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Rang</th>
                  <th scope="col">Mission</th>
                  <th scope="col">C A</th>
                  <th scope="col">Nbr Produit</th>
                   <th scope="col">Vendus</th>
                  <th scope="col"> Restes</th>
                  <th scope="col">H P</th>
                  <th scope="col">Sanction</th>
                 
                </tr>
              </thead>
              <tbody>
                <tr>
                     <td><a href="#"> 
                   1
                  </a></td>
                  <td>MISS19001</td>
                  <td>4,000,000 Ar</td>
                  <td> 180 </td>
                  <td>40 </td>
                  <td>120</td>
                  <td>30</td>
                  <td>80,000 Ar</td>
                 
                </tr>
                
                 <tr>
                      <td><a href="#"> 
                   2
                  </a></td>
                  <td>MISS19002</td>
                  <td>3,000,000 Ar</td>
                  <td> 280 </td>
                  <td>60 </td>
                  <td>220</td>
                  <td>40</td>
                  <td>180,000 Ar</td>
                 
                </tr>
                 <tr>
                      <td><a href="#"> 
                   3
                  </a></td>
                  <td>MISS19003</td>
                  <td>1,000,000 Ar</td>
                  <td> 180 </td>
                  <td>70 </td>
                  <td>110</td>
                  <td>40</td>
                  <td>120,000 Ar</td>
                  
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

<script type="text/javascript">
  
  function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;
 

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
// document.getElementById("defaultOpen").click();


 $('.modal-content').resizable({
      //alsoResize: ".modal-dialog",
      minHeight: 300,
      minWidth: 300
    });
    $('.modal-dialog').draggable();

    $('#myModal').on('show.bs.modal', function() {
      $(this).find('.modal-body').css({
        'max-height': '100%'
      });
    });
</script>

 