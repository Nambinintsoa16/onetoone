<?php
include_once("../include/include.php");
include("header.php");


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
                <h4 style="opacity:1;color:white;font-size:14px">Mes panier  <?=date("d-M-Y")?></h4>
            </div>
        </div>
         
        <div class="row mb-2">
            <div class="col-md-12">
                 <img src="images/ressource.jpg" style="height:300px!important" class="bann_accueil">
            </div>
        </div>
        
        <div class="row mb-2">
          <div class="col-md-12" style="background:#fff">
              <div  class="table-responsive">
<table class="table" style="font-size:12px; margin-top: 10px;">
   <input class = "form-control inputiltre"  type = "text" placeholder = "Rechercher">
    <thead style="background:#33b5e5;color:#fff;font-weight:normal!important">
      <tr>

        <th >Nom</th>
        <th >Equipe attaché</th>
       
        <th >Statut</th>
        <th class="text-center">Detail</th>
       
        

      </tr>
  
    <tbody>
                          <tr>
                              <td>P1</td>
                              <td>EQUIPE-002, EQUIPE-003, EQUIPE-002</td>
                             
                              
                              
                             
                              <td  class="text-center"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i></td>
                              <td class="text-center"><a href="ventejournalieredetail.php"> <i class="fa fa-plus "></i> </a></td>
                          </tr>
                          
                           <tr>
                              <td>P3</td>
                              <td>EQUIPE-006, EQUIPE-001 </td>
                             
                           
                           
                              <td  class="text-center"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:green"></i></td>
                              <td class="text-center"><a href="ventejournalieredetail.php"> <i class="fa fa-plus "></i> </a></td>
                          </tr>
                          
                           <tr>
                              <td>P5</td>
                              <td>EQUIPE-005,EQUIPE-008</td>
                             
                               
                               
                              <td  class="text-center"><i class="fa fa-exclamation-triangle" aria-hidden="true"  style="color:orange"></i></td>
                              <td class="text-center"><a href="ventejournalieredetail.php"> <i class="fa fa-plus "></i> </a></td>
                          </tr>
                          
            
                          
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