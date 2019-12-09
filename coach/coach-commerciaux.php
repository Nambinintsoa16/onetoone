<?php
include_once("../include/include.php");
include("header.php");
$sql="SELECT `id`, `matricule`, `date_d_embauche`, `Nom`, `Prenom`,  `CIN_COM`, `Contact`, `Contact_flotte`, `Fonction_Acutelle`,`Statut` FROM `personnel` WHERE `Fonction_Acutelle`=? OR `Fonction_Acutelle`=?";
$data=$main->queryAll($sql,array(1,2));
$contImage=scandir("../image/personnel");

$sql1="SELECT COUNT(`id`) as conte FROM `personnel` WHERE 1 ";
$rs1=$main->query($sql1);
$n=$rs1['conte'];

$sql2="SELECT COUNT(`id`) as conte FROM `personnel` WHERE `Statut` LIKE ?";
$rs2=$main->query($sql2,array(1));
$n2=$rs2['conte'];

?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-corp">
      <div class="container-fluid">
        <div class="row">
           <div class="col-md-12" >
             <img src="images/coaching3.jpg" class="bann_accueil" style="height:300px;width:100%;object-fit:cover">
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
        
        <div class="row">
            <div class="col-md-12" style="background:#fff">
              <div  class="table-responsive">
<table class="table" style="font-size:12px; margin-top: 10px;">
   <input class = "form-control inputiltre"  type = "text" placeholder = "Rechercher">
    <thead>
      <tr>

        <th>Photo</th>
        <th>Matricule</th>
        <th>Nom</th>
        <th>Contact</th>
        <th>statut</th>
        <th>Plus</th>
        

      </tr>
    </thead>
    <tbody class="tbode">
    <?php 

       if($data):  
            foreach($data as $data):
        
         $image="";
         $temp_image=$data['matricule'].".jpg";
         if(!in_array( $temp_image,$contImage)){
             $image="../images/avatar.png";
            
         }else{ 
             $image="../image/personnel/".$data['matricule'].".jpg";
             
         }
       
    ?>
                <tr>
                    
                    <td class=""><img class="img-thumbnail" src="<?=$image?>" width="50px" height="50" ></td>
                    <td class=""><?=$data['matricule']?></td>
                    <td class=""><?=$data['Nom']." ".$data['Prenom']?></td>
                    <td class=""><?php /*
                    $sql='SELECT `NbPoint` FROM `point` WHERE `idPersonel` LIKE ?';
                    $point=$main->query($sql,array($data['matricule']));
                    if($point){
                      echo $point['NbPoint'];  
                    }else{
                        echo '00';
                    }
                    
                    */?><?=$data['Contact']?></td>
                    <td class=""><i class="fa fa-warning"></i></td>
                     <td class=""><a href="#"><i class="fa fa-plus"></i></a></td>

                <tr>
       <?php endforeach; endif;?>
    </tbody>

 </table>
                </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Content Wrapper. Contains page content -->
   <!-- /.content-wrapper -->
   <?php include "footer.php";?>
 