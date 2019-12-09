  <div class="card border-dark mb-12">
  <div class="card-header"><h5 class="card-title">Historique de prix</h5></div>
  <div class="card-body text-dark">
  
 <form class="form">
     <div class="form-group">
        <div class="row">
            
            <div class="col-md-3">
                  <input type="text" class="form-control produit" placeholder="Produit" />
            </div>
            
            <div class="col-md-3">
                  <select class="form-control mission">
                      <option selected hidden style="opacity:0.3">Choix mission</option>
                      <?php
                        $sql="SELECT * FROM `mission` WHERE 1";
                        $mission=$main->queryAll($sql);
                        if($mission):
                            foreach($mission as $mission):
                       ?>
                      <option value="<?=$mission['idMission']?>"><?=$mission['lieu']?></option>
                      
                      <?php
                        endforeach;
                        endif;
                      ?>
                  </select>
            </div>
             <div class="col-md-3">
                  <input type="text" class="form-control prixdet" placeholder="Prix détail" />
            </div>
             <div class="col-md-3">
                  <input type="text" class="form-control prixgros" placeholder="Pris de gros" />
            </div>
            
        </div> 
        
           
     </div>
     <div class="container-fluid">
            <div class="row"> 
        <div class="col-md-9">
            <textarea class="form-control Obs" placeholder="Entrer la raison du changement de prix"></textarea>
        </div> 
        <div class="modal fade mn"  tabindex="-1" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Champ vide</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p style="color: red;">Veuillez remplir tous les champs</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
        <div class="col-md-3">
            <button class="btn btn-success btn-block savePrice"><i class="fa fa-save"></i> &nbsp; Enregistrer</button>
        </div>
        
    </div>
        </div>
    
            
</div>    
 </form> 
    
    


          

    
       <table class="table table-bordered ">
    <thead class="table-primary">
        <tr>
               
               <th colspan="2">MISSION</th>
               <th colspan="2">MISSION SAVA </th>
               <th colspan="2">MISSION NOSY BE </th>
               <th colspan="2">LOCAL </th>
               <th colspan="2">SIEGE </th>
               <th colspan="2">MISSION MAHAJANGA</th>
              
          </tr>
          
          
            <tr>
              
              
               <th>P.Unit</th>
               <th>P.Gr</th>
               <th>P.Unit</th>
               <th>P.Gr</th>
               <th>P.Unit</th>
               <th>P.Gr</th>
               <th>P.Unit</th>
               <th>P.Gr</th>
               <th>P.Unit</th>
               <th>P.Gr</th>               
               <th>P.Unit</th>
               <th>P.Gr</th>              
              
          </tr>
    </thead>
    <tbody class="tbody">
    
    </tbody>
  </table>
    
    
    
  </div>
</div>
              
                
                
                
                
                
            