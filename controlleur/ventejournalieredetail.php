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
<?php 
include_once("../include/include.php");
include_once("header.php");

if(isset($_GET['test_jour']) and !empty($_GET['test_jour']) and isset($_GET['equipe']) and !empty($_GET['equipe'])){
                        if($_GET['test_jour']=="hier"){
                            $hier = new DateTime('-1 day');
                            echo $hier -> format('d-m-Y');
                            $date_hier=$hier->format('Y-m-d');
                        }elseif($_GET['test_jour']=="cours"){
                            echo date('d-m-Y');
                            $date_hier=date('Y-m-d');
                        }   
                        $nom_equipe=$_GET['equipe'];
}

$sql_planing="SELECT `province` FROM `planing` WHERE `IdEquipe` LIKE ? AND `date` LIKE ?";

    $sql_planing_equipe = "SELECT `mtrP` FROM `planing_equipe` WHERE `designationEquipe` LIKE ?"; //asiana date depart sy retour:condition
    $membre=$main->queryAll($sql_planing_equipe,array($nom_equipe));
    $sql_vente_equipe = "SELECT DISTINCT(`idVP`) FROM `vente` WHERE `idVP` LIKE ? AND `date` LIKE ?";
    $c_a_jour=0;
    foreach($membre as $membre){
        $vente=$main->query($sql_vente_equipe,array($membre['mtrP'],$date_hier));
        $sql_personel="SELECT `Nom`,`Prenom` FROM `personnel` WHERE `matricule` LIKE ?";//information du membre de l'equipe
        $personel=$main->query($sql_personel,array($membre['mtrP']));
        $c_a_moyenne=0;
        $i=0;
        if(!is_null($vente['idVP'])){ // si le commerciale a de vente
            $c_a_jour+=$main->ca_jour_com($vente['idVP'],$date_hier);
            $i++;
        } 
    }
     //chiffre d'affaire moyenne
    
    //calcul date mission
    $sql_equipe="SELECT * FROM `equipe` WHERE `date_depart` <= ? AND `date_retour` >= ? AND `IdEquipe` LIKE ?";
    $equipe=$main->query($sql_equipe,array($date_hier,$date_hier,$nom_equipe));
    if($equipe){
                $date_deb = new DateTime($equipe['date_depart']);
                $date_fin = new DateTime($equipe['date_retour']);
                //calcul C.A réalisé
                $ca_realise=0;
                $date_encour=new DateTime($equipe['date_depart']);
                $date_actuel=new DateTime($date_hier);
                
                $sql_planing_equipe = "SELECT `mtrP` FROM `planing_equipe` WHERE `designationEquipe` LIKE ?";
                $sql_vente_equipe = "SELECT DISTINCT(`idVP`) FROM `vente` WHERE `idVP` LIKE ? AND `date` LIKE ?";
                $temps=0;//nombre de jour passé dans la mission
                 while($date_encour<=$date_actuel){
                
                $membre=$main->queryAll($sql_planing_equipe,array($nom_equipe));
                        $temps++;
                        foreach($membre as $membre){
                            $vente=$main->query($sql_vente_equipe,array($membre['mtrP'],$date_encour->format('Y-m-d')));
                            $i=0;
                            if(!is_null($vente['idVP'])){ // si le commerciale a de vente
                                $ca_realise+=$main->ca_jour_com($vente['idVP'],$date_encour->format('Y-m-d'));
                                $i++;
                            } 
                        }
                        $date_encour->modify("+1 day");
                }
                $c_a_moyenne=$ca_realise/$temps;
                $date_mission= $date_deb->format('d-m-Y')." au ".$date_fin->format('d-m-Y');
    }else{
        $date_mission="inconnu";
    }
    
    if(isset($_GET['equipe']) and !empty($_GET['equipe'])){
        $resultat_planing =$main->query($sql_planing,array($_GET['equipe'],$date_hier));
       
        $destination=$resultat_planing['province'];
        $nom_equipe=$_GET['equipe'];
    
    }else{$nom_equipe="";}

?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
           <div class="row" style="padding-left:7px;padding-right:7px">
            <div class="col-md-12 mb-2" style="background:black;opacity:0.9;margin-top:-20px;padding-top:13px">
                <h4 style="opacity:1;color:white;font-size:14px!important">DETAIL VENTE EQUIPE <?php
                echo strtoupper($destination)." ".$date_hier;
  
?></h4>
            </div>
        </div>
        <div class="row" style="padding:0px 0px;">
            <div class="col-md-4" style="padding:5px 10px;min-height:180px">
                <div class="" style="background:#fff;min-height:170px;padding-top:50px;padding:40px 30px"> 
                    <p class="text-center" style="background:#33b5e5;padding:5px 5px;-webkit-box-shadow: 10px 10px 6px -9px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 6px -9px rgba(0,0,0,0.75);
box-shadow: 10px 10px 6px -9px rgba(0,0,0,0.75);color:#fff"><i class="fa fa-users" style="font-size:120px;color:#fff"> </i> <br>
<?php echo $nom_equipe." ".$destination;?> </p>
                </div>
                
            </div>
            
             <div class="col-md-8" style="padding:5px 10px;min-height:200px">
                 <div class="" style="background:#fff;min-height:230px;padding:20px 30px" > 
                    <p>INFORMATION EQUIPES</p>
                    <div class="table-responsive">
                         <table class="table">
                        <tbody>
                             <tr>
                                <td> Mission </td>
                                 <td class="text-right">
                                        <?php /*
                                            $sql_equipe="SELECT * FROM `equipe` WHERE `IdEquipe` LIKE ?"; 
                                            $equipe=$main->query($sql_equipe,array($nom_equipe));
                                            $date_deb = new DateTime($equipe['date_depart']);
                                            
                                                echo $date_debut->format('d-m-Y')." au ".$date_fin->format('d-m-Y');*/
                                                echo $date_mission;
                                            
                                        ?>
                                 </td>
                            </tr>
                            
                            <tr>
                                <td>C A Réalisé :</td>
                                 <td class="text-right"><?=number_format($ca_realise,2,',','.')?> Ar</td>
                            </tr>
                            <tr>
                                <td>C A du jour :</td>
                                 <td class="text-right"><?= number_format($c_a_jour,2,',','.')." Ar"; ?></td>
                            </tr>
                            
                            <tr>
                                <td>Moyene C A : </td>
                                 <td class="text-right"> <?= number_format($c_a_moyenne,2,',','.')." Ar" ?></td>
                            </tr>

                            <tr>
                                <td>Statut de l'équipe : </td>
                                 <td class="text-right">En alerte</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                   
                 </div>
                 
            </div>
        </div>
        <div class="row" style="padding:10px 10px;">
           <div class="col-md-12" style="background:#fff;padding:20px 30px;">
              <h2 style="font-size:16px;text-transform:uppercase">Detail de la vente journalière par commerciale </h2>
              
              
              <hr>
                <input class = "form-control inputiltre" id="demo" type = "text" placeholder = "Rechercher">
                <div  class="table-responsive mt-2" >
                    <!-- Detail de la vente journalière par commerciale  -->
                  <table class="table table-bordered">
                      <thead style="background:#33b5e5;color:#fff;font-weight:normal!important">
                           
                          <tr>
                              <th class="text-center" style="width:250px">Matricule</th>
                              <th class="text-center" style="width:250px">Nom et Prénom</th>
                              <th class="text-center" style="width:150px">C A <br> COM</th>
                              <th class="text-center" style="width:220px">C A <br> MAG</th>
                              <th class="text-center" style="width:155px">Validation <br> CTRL</th>
                              <th class="text-center" style="width:125px">Statut</th>
                              <th class="text-center" style="width:100px">Detail</th>
                          </tr>
                      </thead>
                      <tbody id="test">
                          <?php
                                $sql_planing_equipe = "SELECT `mtrP` FROM `planing_equipe` WHERE `designationEquipe` LIKE ?";
                                $membre=$main->queryAll($sql_planing_equipe,array($nom_equipe));
                                $sql_vente_equipe = "SELECT DISTINCT(`idVP`) FROM `vente` WHERE `idVP` LIKE ? AND `date` LIKE ?";
                                foreach($membre as $membre):
                                    $vente=$main->query($sql_vente_equipe,array($membre['mtrP'],$date_hier));
                                    $sql_personel="SELECT `Nom`,`Prenom` FROM `personnel` WHERE `matricule` LIKE ?";//information du membre de l'equipe
                                    $personel=$main->query($sql_personel,array($membre['mtrP']));
                                    if(!is_null($vente['idVP'])){ // si le commerciale a de vente
                                        $ca_jour=$main->ca_jour_com($vente['idVP'],$date_hier);
                            ?>
                          <tr>
                              <td class="text-center"><?= $vente['idVP']; ?></td>
                              <td class="text-center"><?= $personel['Nom']." ".$personel['Prenom']; ?></td>
                              <td class="text-center"><?= number_format($ca_jour,0,',','.')." Ar"; ?></td>
                              <td class="text-center">120,000</td>
                              <td class="text-center"> <button class="btn btn-danger btn-sm" style="width:30px">?</button> <button class="btn btn-success btn-sm" style="width:30px">ok</button></td>
                              <td class="text-center">
                                  <?php if($ca_jour>=50000){
                                            $couleur='green';
                                        }else if($ca_jour>=40000 and $ca_jour<50000){
                                            $couleur='blue';
                                        }else if($ca_jour>=30000 and $ca_jour<40000){
                                            $couleur='#ff9933';
                                        }else{
                                            $couleur='red';
                                        }
                                  ?>
                                  <i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:<?=$couleur?>"></i>
                              </td>
                              <td class="text-center"><a href="ventejournalieredetail.php"> <i class="fa fa-plus "></i> </a></td>
                          </tr>
                          <?php } endforeach; ?>
                      </tbody>
                  </table>               
                </div>
           </div> 
        </div>
        
        
         <div class="row" style="padding:10px 10px;">
           <div class="col-md-12" style="background:#fff;padding:20px 30px;">
              <h2 style="font-size:16px;text-transform:uppercase">Detail de la vente journalière Par Produit</h2>
              
              
              <hr>
                <input class = "form-control inputiltre" type = "text" placeholder = "Rechercher">
                <div  class="table-responsive mt-2" >
                  <table class="table table-bordered">
                      <thead style="background:#33b5e5;color:#fff;font-weight:normal!important">
                          <tr>
                              <th style="width:250px">Code Produit</th>
                              <th style="width:250px">Designation</th>
                              <th style="width:150px">Quantite</th>
                              <th style="width:220px">C A</th>
                              <th style="width:100px">Detail</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                                $array=array();//quantite $array['FUM008_5']=2
                                $prix=array(); //prix $prix['FUM008_5']=1000
                                
                                $membre=$main->queryAll($sql_planing_equipe,array($nom_equipe));
                                $sql_vente_equipe = "SELECT DISTINCT(`idVP`) FROM `vente` WHERE `idVP` LIKE ? AND `date` LIKE ?";
                                foreach($membre as $membre){
                                    $vente=$main->query($sql_vente_equipe,array($membre['mtrP'],$date_hier));
                                    if(!is_null($vente['idVP'])){ // si le commerciale a de vente
                                            $sql_produit="SELECT `quantite`,`lieu`,`codeproduit` FROM `vente` WHERE `date` LIKE ? AND `idVP` LIKE ?";
                                            $produit_vendu=$main->queryAll($sql_produit,array($date_hier,$vente['idVP']));
                                            foreach($produit_vendu as $produit_vendu){
                                                  $cle=$produit_vendu['codeproduit']."_".$produit_vendu['lieu'];
                                                  if(!array_key_exists ($cle,$array)){
                                                     $array[$cle]=(int)$produit_vendu['quantite']; 
                                                  }else{
                                                      $array[$cle]=$array[$cle]+$produit_vendu['quantite']; 
                                                  }
                                                  //initialisation prix par produit
                                                  if(!array_key_exists ($cle,$prix)){
                                                     $prix[$cle]=0; 
                                                  }
                                            }
                                    }
                                }
                                //calcul prix par produit
                                foreach($array as $key => $value){
                                      $tab=explode("_", $key);
                                      $sql_prix="SELECT `prixdetail` FROM `prix` WHERE `idMission` LIKE ? AND `idProduit` LIKE ?";
                                      $prix_detail=$main->query($sql_prix,array($tab[1],$tab[0]));
                                      $prix[$key]=$prix_detail['prixdetail']; // $prix[FUM008_5]=11300 par ex
                                }
                                //var_dump($prix);
                                foreach($array as $key=>$value):
                                     $tab=explode("_", $key); 
                                     $sql_designation="SELECT `designation` FROM `produit` WHERE `idProduit` LIKE ?";
                                     $designation=$main->query($sql_designation,array($tab[0]));
                                     
                                ?>
                          <tr>
                              <td class="text-center"><?= $tab[0]?></td>
                              <td class="text-center"><?=$designation['designation']; ?></td>
                              <td class="text-center"><?= $value ?></td>
                              <td class="text-center"><?= number_format($value*$prix[$key],0,',','.')." Ar";?></td>
                              <td class="text-center"><a href="ventejournalieredetail.php"> <i class="fa fa-plus "></i> </a></td>
                          </tr>
                          <?php 
                                    
                                endforeach;
                          ?>
                      </tbody>
                      
                  </table>               

                </div>
           </div> 
        </div>
                
      </div>
    </div>
</div>

<?php include_once("footer.php");?>