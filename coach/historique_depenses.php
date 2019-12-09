<?php
include "header.php";
include_once('../include/include.php');
$sql="SELECT * FROM `rapport` WHERE `id_coach` LIKE ? AND `type` LIKE 'DEPENSE' AND date LIKE ?";
$coach=$_SESSION['matricule'];
$depense=$main->queryAll($sql,array($coach,date('Y-m-d')));
?>
   <div class="row" style="margin-top:-10px">
              <div class="col-md-12" style="background:#fff;padding:5px 5px">
                  <ol class="breadcrumb" style="font-size:14px!important;padding-left:0px" >
                        <li class="active" style="padding:0px 5px" > <a href="../coach/depense_sur_terrain.php" title="Accueil">Depense sur terrain</a> &nbsp;&nbsp;> </b> </li>
                        <li style="padding:0px 5px">Mes dépenses</li>
                </ol>
              </div>
          </div>
    <div class="container">
          <table class=" table table-bordered" style="font-size: 10px">
              <thead>
                  <tr>
                      <th>Date/Heure</th>
                      <th>Motif</th>
                      <th>Montant journalière</th>
                  </tr>
                  
              </thead>
              <tbody>
                  <?php foreach($depense as $depense):?>
                  <tr>
                      <td><?= $depense['date']."/".$depense['heure']?></td>
                      <td><?= $depense['description']?></td>
                      <td><?= $depense['ca_journaliere']?></td>
                  </tr>
                  <?php endforeach; ?>
                  <tr>
                  <th colspan="2">Total </th>
                  <td>total</td>
              </tbody>
          </table>
    </div>
<?php 
 include "footer.php";
?>