<?php
include_once("../include/include.php");
include("header.php");

$sql="SELECT `IdEquipe`,`province`,`Panier` FROM `planing` WHERE `date` LIKE ?";
$date = new DateTime(date('Y-m-d'));
$date->modify('-1 day');
$equipe = $main->queryAll($sql,array($date->format('Y-m-d')));

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
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
             <div class="row" style="padding-left:7px;padding-right:7px">
            <div class="col-md-12 mb-2" style="background:black;opacity:0.9;margin-top:-20px;padding-top:13px">
                <h4 style="opacity:1;color:white;font-size:14px">Mes résources  <?=date("d-M-Y")?></h4>
            </div>
        </div>
         <!--
        <div class="row mb-2">
            <div class="col-md-12">
                 <img src="images/ressource.jpg" style="height:300px!important" class="bann_accueil">
            </div>
        </div>-->
        
        <div class="row mb-2">
          <div class="col-md-12" style="background:#fff">
              <div  class="table-responsive">
<table class="table" style="font-size:12px; margin-top: 10px;">
   <input class = "form-control inputiltre" id="demo" type = "text" placeholder = "Rechercher">
    <thead style="background:#33b5e5;color:#fff;font-weight:normal!important">
      <tr>

        <th >Code Equipe</th>
        <th >Mission</th>
        <th >Jour Mission</th>
        <th class="text-center">Statut </th>
        <th class="text-center">Detail</th>
      </tr>
  
    <tbody id="test">
            <?php foreach($equipe as $equipe): ?>
                          <tr>
                              <td><?=$equipe['IdEquipe']?></td>
                              <td><?=$equipe['province']?></td>
                              
                              <td>J10</td>
                             
                              <td  class="text-center"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i></td>
                              <td class="text-center"><a href="ventejournalieredetail.php"> <i class="fa fa-plus "></i> </a></td>
                          </tr>
            <?php endforeach; ?>
                           
    </tbody>

 </table>
                </div> 
          </div>
          
         
          
          
          
        </div><!-- /.row -->
    </div>
    </div>
</div>
<?php include("footer.php");


?>