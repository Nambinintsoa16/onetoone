<?php
$titre = "Terrain";
include_once("../include/include.php");
include("header.php");
$sql2 ="SELECT * FROM `mes_terrains` where id_coach  LIKE ?";
$terrain = $main->queryAll($sql2,array($_SESSION['matricule']));
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
        <div class="row mb-2">
          <div class="col-md-12" style="background:#fff">
              <div  class="table-responsive">
<table class="table" style="font-size:12px; margin-top: 10px;">
  
    <thead style="background:#33b5e5;color:#fff;font-weight:normal!important">
      <tr>
        <th style="width:25%">Date </th>
        <th style="width:37%">Ville </th>
       <!-- <th style="width:37%">Trajet </th>-->
       
      </tr>
    <tbody>
          <?php foreach($terrain as $ter) {
            $dt= $ter['date_ter'];
            $date = new DateTime($dt);
            if($date->format('d-M-Y')==date('d-M-Y')){
                $couleur='bg-success';
            }else{
                $couleur='';
            }
          ?>
            <tr class="<?=$couleur?>">
                <td class="align-middle daty"><?php 
                echo $date->format('d-M-Y');
                ;?></td>
                <td>
                    <a href="#" class="trajet"><?=$ter['ville'];?></a>
                </td>
            
            </tr>
       <?php } ?>
                          
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

