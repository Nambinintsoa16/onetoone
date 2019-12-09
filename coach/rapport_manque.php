<?php 
$titre = "Manques";
include_once('header.php');
$titre = "Mes points";
include_once('../include/include.php');
$date = new DateTime();
$dt = $date->format('Y-m-d');
?>
<style>
    h2{
        font-size:14px!important;
    }
   .bloc_rapport > i{
        font-size:24px!important;
        color:#0277bd;
    }
</style>
 <div class="content-wrapper">
    <div class="content-corp">
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
           
           <div class="row" style="padding:10px 10px;margin-top:-50px">
               <div class="col-md-6 col-sm-6 col-6" style="padding:5px 5px;cursor:pointer" data-toggle="modal" data-target="#modalmanque">
                    <div class="bloc_rapport" style="min-height:50px;background:#fff;border-radius:5px;padding:10px 10px;font-size:16px">
                       <i  class="fa fa-edit"></i>
                       <h2>Manques du toujour</h2>
                        
                    </div>
                    <div style="height:20px;background:#0277bd;width:100%"></div>
               </div>
               <div class="col-md-6 col-sm-6 col-6" style="padding:5px 5px">
                    <div class="bloc_rapport" style="min-height:50px;background:#fff;border-radius:5px;padding:10px 10px">
                         <i class="fa fa-list"></i>
                       <h2>Listes manques</h2> 
                    </div>
                    <div style="height:20px;background:#0277bd;width:100%"></div>
               </div>
           </div>
           
        </div>
    </div>
</div>

<div class="modal fade" id="modalmanque" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter manques</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <form>
            <div class="form-row">
                <div class="col-sm-6 col-6">
                     <input type="text" class="form-control designation" placeholder="Commerciaux" style="margin-left:0px;padding:5px 5px">
                </div>
               <div class="col-sm-6 col-6">
                   <select class="form-control objet">
                       <option>
                           Produit
                       </option>
                       <option>
                           Argent
                       </option>
                   </select>
               </div>
               
               <div class="col-sm-12 col-12 mt-2">
                   <input type="number" class="form-control cout" placeholder="Coût" style="margin-left:0px;padding:5px 5px">
               </div>
               <div class="col-sm-12 col-12 mt-2 mb-2">
                   <textarea class="form-control" rows="4" id="comment"></textarea>
               </div>
               <div class="col-sm-9 col-9"></div>
                <div class="col-sm-3 col-3">
                     <button type="button" class="btn btn-primary btn-sm ajout_dps pull-right" id="" style="margin-left:0px;height:35px!important;margin-top:2px;width:100%">Ajouter</button>
                </div>
               
            </div>
        </form>
        <br>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuller</button>
           <button type="button" class="btn btn-success" data-dismiss="modal">Enregistrer</button>
        
        
        
      </div>
    </div>
  </div>
</div>
<?php include_once('footer.php');?>