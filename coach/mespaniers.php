<?php
$titre = "Mes Paniers";
include_once("../include/include.php");
include("header.php");
$sql2 ="SELECT * FROM `mes-accompagnement` where id_coach  LIKE ?";
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
        <th style="min-width:120px" class="text-center">Date </th>
        <th style="min-width:120px" class="text-center">Panier  </th>
       
      </tr>
    <tbody>
                          <?php foreach($terrain as $ter) {
                                $dt= $ter['date_accomp'];
                                $date = new DateTime($dt);
                                if($date->format('d-M-Y')==date('d-M-Y')){
                                    $couleur='bg-success';
                                }else{
                                    $couleur='';
                                }
                          ?>
            <tr class="<?=$couleur?>">
                <td class="text-center"><?php 
                echo $date->format('d-M-Y');
                ;?></td>
                <td class="text-center"><a href="info-pannier.php?designation=<?=$ter['panier']?>&date=<?=$date->format('d-M-Y')?>&couleur=0099CC"><?php echo $ter['panier'];?></a></td>
               
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