<?php
$titre = "Depense sur Terrain";
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
     h2{
        font-size:14px!important;
    }
   .bloc_rapport > i{
        font-size:24px!important;
        color:#0277bd;
    }
</style>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
                <div class="row" style="padding:10px 10px">
               <div class="col-md-12" style="height:200px;background:#42a5f5;border-radius:5px;padding-top:5px">
                   <button type="button" class="btn btn-warning pull-right">
                      Jour du <span class="badge badge-light"> <?php formatdt($dt);?></span>
                      <span class="sr-only"> </span>
                    </button>
                    <br>
                     <br>
                     
              
               </div>
           </div>
        </div>
         <div class="row" style="padding:10px 10px;margin-top:-50px">
               <div class="col-md-6 col-sm-6 col-6" style="padding:5px 5px;cursor:pointer" data-toggle="modal" data-target="#exampleModal">
                    <div class="bloc_rapport" style="min-height:50px;background:#fff;border-radius:5px;padding:10px 10px;font-size:16px">
                       <i  class="fa fa-edit"></i>
                       <h2>Dépenses du jour</h2>
                       
                    </div>
                    <div style="height:20px;background:#0277bd;width:100%"></div>
               </div>
               <a class="col-md-6 col-sm-6 col-6" href="../coach/historique_depenses.php" style="padding:5px 5px" >
                    <div class="bloc_rapport" style="min-height:50px;background:#fff;border-radius:5px;padding:10px 10px">
                         <i class="fa fa-list"></i>
                       <h2> Mes dépenses</h2> 
                    </div>
                    <div style="height:20px;background:#0277bd;width:100%"></div>
               </a>
           </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Vos dépenses sur terrain du <?php formatdt($dt);?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-row">
                <div class="col-sm-8 col-8">
                    <select class="browser-default custom-select type">
                            <option disabled selected>Choisissez le motif</option>
                            <option>Hégergement</option>
                            <option>Restauration</option>
                            <option>Carburant</option>
                            <option>Autre</option>
                        </select>

                </div>
               <div class="col-sm-4 col-4">
                   <input type="number" class="form-control cout" placeholder="Coût" style="margin-left:0px;padding:5px 5px">
               </div>
            </div><br>
            <div class="form-row">
                    <div class="col-sm-12 col-12">
                        <textarea class="form-control designation" placeholder="Description" style="padding: 5px 5px;"></textarea>
                    </div>
                </div><br>
            <div class="form-row">
                        <div class="col-sm-8 col-8">
                        </div>
                    <div class="col-sm-4 col-4">
                        <button type="button" class="btn btn-primary btn-sm ajout_dps"  style="margin-left:0px;height:35px!important;margin-top:2px;width:100%">Ajouter</button>
                    </div>
             </div>
        </form>
        <br>
        <div class="row">
            <div class="col-md-12" >
                <table class="table">
                    <thead style="background:#0099CC;">
                        <tr>
                            <th style="color:#fff">Num</th>
                            <th style="color:#fff">Raison</th>
                            <th style="color:#fff">Cout</th>
                            <th style="color:#fff">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody class="tbody">

                    </tbody>
                </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Annulez</button>
        <button type="button" class="btn btn-success sauver" style="margin-top:2px">Enregistrez</button>
        
      </div>
    </div>
  </div>
</div>
<?php include("footer.php");


?>

