<?php 
include_once("../include/include.php");
include "header.php";?>

<style>
    h4{
        font-size:12px;
        font-weight:normal!important;
    }
    label{
        font-size:12px!important;
    }
    .form-row{
        margin-bottom:0px!important;
    }
</style>
 <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h4>Créer une mission</h4>
        <div class="row">
            <div class="col-md-12" style="padding:0px 0px">
                 <blockquote style="margin: 0px 0px!important">
                 <h4 class="text-left py-1" style="font-size:14px;color:#000"> Information Mission
           </h4>
            <div class="form-row py-1">
              <label for="inputnom" class="col-md-4 col-sm-4 col-4 align-middle">Equipe</label>
              <select class="form-control nom_equipe col-md-8 col-sm-8 col-8" >
                  
                  <?php 
                     $sql="SELECT `IdEquipe` FROM `equipe` WHERE 1";
                     $result=$main->queryAll($sql);
                     if($result):
                     foreach( $result as $result ):
                  ?>
                    <option><?=$result['IdEquipe']?></option>  
                    
                  <?php endforeach; endif; ?>    
              </select>
            </div>
            </blockquote>
        </div>
        </div>
        <div class="row">
          <div class="col-md-12" style="padding:0px 0px">
             <blockquote style="margin: 0px 0px!important">
                <h4 class="text-left py-2" style="font-size:14px;color:#000"> Membre de l'équipe </h4>
                <div class="form-row contChefEquipe">
                    <label for="inputnom" class="col-md-12 col-sm-12 col-12">Chef de Mission</label>
                    <input type="text" class="form-control autoCompletePersonnel Chef col-md-8 col-sm-8 col-8"  placeholder="Ajouter chef de mission">
                   <label class="col-md-4 col-sm-4 col-4" style="padding-top:5px"> <buttom class="chefaddinput btn btn-primary" style="font-size:12px;height:35px;cursor:pointer;margin-left:2px">Ajouter</buttom></label>
                </div>
         
            <div class="form-row">
              <label for="inputnom" class="col-md-12 col-sm-12 col-12">Coach</label>
              <input type="text" class="form-control autoCompletePersonnel Coach col-md-8 col-sm-8 col-8" placeholder="Ajoutez coach">
              <label for="inputnom" class="col-md-4 col-sm-4 col-4"  style="padding-top:5px"> <buttom class="coach-add-input btn btn-primary" style="font-size:12px;color:#33b5e5;cursor:pointer;height:35px;;margin-left:2px;color:#fff">Ajouter</buttom></label>
            </div>
            
            <div class="form-row">
              <label for="inputnom" class="col-md-12 col-sm-12 col-12">Commerciaux</label>
              <input type="text" class="form-control autoCompletePersonnel Commerciaux col-md-8 col-sm-8 col-8"  placeholder="Ajoutez commerciaux">
               <label for="inputnom" class="col-md-4 col-sm-4 col-4"  style="padding-top:5px"> <buttom class="infoCom btn btn-primary" style="font-size:12px;color:#33b5e5;cursor:pointer;height:35px;;margin-left:2px;color:#fff">Ajouter</buttom></label>
            </div>
            
            
            
              <div class="form-row">
              <label for="inputnom" class="col-md-12 col-sm-12 col-12">Magasinier</label>
              <input type="text" class="form-control autoCompletePersonnel magasinier col-md-8 col-sm-8 col-8"  placeholder="Ajoutez Magasinier">
               <label for="inputnom" class="col-md-4 col-sm-4 col-4"  style="padding-top:5px"> <buttom class="infoCom btn btn-primary" style="font-size:12px;color:#33b5e5;cursor:pointer;height:35px;;margin-left:2px;color:#fff">Ajouter</buttom></label>
            </div>
          </div>
           </div>
        </div>
        <br>
   
 
                 <div class="row px-1">
                    
         <div class="col-md-12">
              <h4 class="text-left">Liste Chef de Mission</h4>
             <div class="table-responsive">
                   <table class="table infoEquipe" >
                      <thead class="" style="background:#3F729B;color:#fff;font-size:12px;font-weight:normal">
                        <tr>
                          <th scope="col" >Matricule</th>
                          <th scope="col">Nom et Prénom</th>
                          <th scope="col">Fonction</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody style="font-size:10px!important;font-weight:normal!important">
                       
                      </tbody>
                    </table>
             </div>
      
         </div>
     </div>  
             <div class="row px-1">
                
         <div class="col-md-12">
              <h4 class="text-left">Liste Coach</h4>
 <table class="table infoCoach" >
  <thead class="" style="background:#3F729B;color:#fff;font-size:12px;font-weight:normal">
    <tr>
      <th scope="col" class="MatriculeCoach">Matricule</th>
      <th scope="col">Nom et Prénom</th>
      <th scope="col">Fonction</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody style="font-size:10px!important;font-weight:normal!important">
   
  </tbody>
</table>
</div>
</div>

    <div class="row px-1">
        
         <div class="col-md-12">
             <h4 class="text-left">Liste Commerciaux</h4>
 <table class="table infoCommerc" >
  <thead class="" style="background:#3F729B;color:#fff;font-size:12px;font-weight:normal">
    <tr>
      <th scope="col" >Matricule</th>
      <th scope="col">Nom et Prénom</th>
      <th scope="col">Fonction</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody style="font-size:10px!important;font-weight:normal!important">
   
  </tbody>
</table>
</div>
</div>


 <div class="row px-1">
         <div class="col-md-12">
              <h4 class="text-left">Liste magasinier</h4>
 <table class="table infoMag" >
  <thead class="" style="background:#3F729B;color:#fff;font-size:12px;font-weight:normal">
    <tr>
      <th scope="col">Matricule</th>
      <th scope="col">Nom et Prénom</th>
        <th scope="col">Fonction</th>
      <th scope="col"></th>
   

  <tbody style="font-size:10px!important;font-weight:normal!important">
   
  </tbody>
</table>

 </div>
 </div>

            </blockquote>


 </div>
 </div>


             <blockquote style="min-height:60px;margin: 0px 0px!important">
                 <button type="submit" class="btn btn-success pull-right enregistreEquipe">Enregistrez</button>  
        </blockquote>
            </div>
            
                 
        </div>
      </div><!-- /.container-fluid -->
    </div>
  </div>
  <!-- Content Wrapper. Contains page content -->
   <!-- /.content-wrapper -->
   <?php include "footer.php";?>
 